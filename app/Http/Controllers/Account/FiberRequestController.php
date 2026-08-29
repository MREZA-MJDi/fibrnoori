<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\FiberRequest\StoreFiberRequest;
use App\Models\FiberRequest;
use App\Models\Modem;
use App\Models\Tariff;
use App\Services\FiberRequestService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FiberRequestController extends Controller
{
    public function __construct(
        protected FiberRequestService $fiberRequestService
    ) {
    }

    public function index(Request $request): View
    {
        $fiberRequests = FiberRequest::query()
            ->where(
                'user_id',
                $request->user()->id
            )
            ->with([
                'tariff',
                'modem',
            ])
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'account.requests.index',
            compact('fiberRequests')
        );
    }

    public function create(): View
    {
        $tariffs = Tariff::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $modems = Modem::query()
            ->where('is_active', true)
            ->where('stock', '>', 0)
            ->orderBy('sort_order')
            ->get();

        return view(
            'account.requests.create',
            compact(
                'tariffs',
                'modems'
            )
        );
    }

    public function store(
        StoreFiberRequest $request
    ): RedirectResponse {
        $fiberRequest = $this->fiberRequestService->create(
            $request->validated(),
            $request->user()->id
        );

        return redirect()
            ->route(
                'account.requests.show',
                $fiberRequest
            )
            ->with(
                'success',
                'درخواست شما با موفقیت ثبت شد.'
            );
    }

    public function edit(
        Request $request,
        FiberRequest $fiberRequest
    ): View {
        abort_unless(
            $fiberRequest->user_id === $request->user()->id,
            403
        );

        /*
         * Only active tariffs.
         */
        $tariffs = Tariff::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        /*
         * Keep the currently selected modem visible,
         * even if it is no longer in stock.
         */
        $modems = Modem::query()
            ->where('is_active', true)
            ->where(function ($query) use ($fiberRequest) {
                $query
                    ->where('stock', '>', 0)
                    ->orWhere('id', $fiberRequest->modem_id);
            })
            ->orderBy('sort_order')
            ->get();

        $fiberRequest->load([
            'tariff',
            'modem',
        ]);

        return view(
            'account.requests.edit',
            [
                'request' => $fiberRequest,
                'tariffs' => $tariffs,
                'modems' => $modems,
            ]
        );
    }

    public function update(
        Request $request,
        FiberRequest $fiberRequest
    ): RedirectResponse {
        abort_unless(
            $fiberRequest->user_id === $request->user()->id,
            403
        );

        /*
         * Editing a request after it has entered review
         * should not be allowed.
         */
        if (
            !in_array(
                $fiberRequest->status,
                ['pending'],
                true
            )
        ) {
            return back()->with(
                'error',
                'این درخواست دیگر قابل ویرایش نیست.'
            );
        }

        /*
         * Temporary validation.
         *
         * Later we can move this to a dedicated
         * UpdateFiberRequestRequest.
         */
        $validated = $request->validate([
            'full_name' => [
                'required',
                'string',
                'max:150',
            ],

            'national_code' => [
                'required',
                'digits:10',
            ],

            'mobile' => [
                'required',
                'string',
                'regex:/^09\d{9}$/',
            ],

            'tariff_id' => [
                'required',
                'integer',
                'exists:tariffs,id',
            ],

            'modem_id' => [
                'nullable',
                'integer',
                'exists:modems,id',
            ],

            'province' => [
                'required',
                'string',
                'max:100',
            ],

            'city' => [
                'required',
                'string',
                'max:100',
            ],

            'address' => [
                'required',
                'string',
                'max:5000',
            ],

            'postal_code' => [
                'required',
                'digits:10',
            ],

            'customer_note' => [
                'nullable',
                'string',
                'max:5000',
            ],
        ]);

        $tariff = Tariff::query()
            ->where('is_active', true)
            ->findOrFail($validated['tariff_id']);

        $newModem = null;

        if (!empty($validated['modem_id'])) {
            $newModem = Modem::query()
                ->where('is_active', true)
                ->findOrFail($validated['modem_id']);
        }

        /*
         * Current and new modem IDs.
         */
        $oldModemId = $fiberRequest->modem_id;
        $newModemId = $newModem?->id;

        /*
         * Change stock safely.
         */
        if ($oldModemId !== $newModemId) {

            /*
             * New modem needs stock.
             */
            if ($newModem) {
                if (!$newModem->hasStock()) {
                    return back()
                        ->withErrors([
                            'modem_id' => 'مودم انتخاب‌شده موجود نیست.',
                        ])
                        ->withInput();
                }

                $newModem->decrement('stock');
            }

            /*
             * Return previous modem to stock.
             */
            if ($oldModemId) {
                Modem::query()
                    ->whereKey($oldModemId)
                    ->increment('stock');
            }
        }

        $modemPrice = $newModem?->price ?? 0;

        $fiberRequest->update([
            'tariff_id' => $tariff->id,
            'modem_id' => $newModemId,

            'full_name' => $validated['full_name'],
            'national_code' => $validated['national_code'],
            'mobile' => $validated['mobile'],

            'province' => $validated['province'],
            'city' => $validated['city'],
            'address' => $validated['address'],
            'postal_code' => $validated['postal_code'],

            'tariff_price' => $tariff->price,
            'modem_price' => $modemPrice,
            'total_price' => $tariff->price + $modemPrice,

            'customer_note' => $validated['customer_note'] ?? null,
        ]);

        return redirect()
            ->route(
                'account.requests.show',
                $fiberRequest
            )
            ->with(
                'success',
                'اطلاعات درخواست با موفقیت ویرایش شد.'
            );
    }

    public function show(
        Request $request,
        FiberRequest $fiberRequest
    ): View {
        abort_unless(
            $fiberRequest->user_id === $request->user()->id,
            403
        );

        $fiberRequest->load([
            'tariff',
            'modem',
            'statusHistories.changedBy',
        ]);

        return view(
            'account.requests.show',
            compact('fiberRequest')
        );
    }
}
