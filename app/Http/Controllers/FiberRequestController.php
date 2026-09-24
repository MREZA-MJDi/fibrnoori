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
use Illuminate\Support\Facades\DB;
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

        return view(
            'account.requests.create',
            compact('tariffs')
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

        if (! $fiberRequest->isPending()) {
            return redirect()
                ->route(
                    'account.requests.show',
                    $fiberRequest
                )
                ->with(
                    'error',
                    'این درخواست دیگر قابل ویرایش نیست.'
                );
        }

        $tariffs = Tariff::query()
            ->where('is_active', true)
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
            ]
        );
    }

    public function update(
        StoreFiberRequest $request,
        FiberRequest $fiberRequest
    ): RedirectResponse {
        abort_unless(
            $fiberRequest->user_id === $request->user()->id,
            403
        );

        /*
         * The request may change between page load and submit.
         */
        $fiberRequest->refresh();

        if (! $fiberRequest->isPending()) {
            return back()->with(
                'error',
                'این درخواست دیگر قابل ویرایش نیست.'
            );
        }

        $validated = $request->validated();

        $hasModem = $request->boolean('has_modem');

        $tariff = Tariff::query()
            ->where('is_active', true)
            ->findOrFail(
                $validated['tariff_id']
            );

        DB::transaction(function () use (
            $fiberRequest,
            $validated,
            $hasModem,
            $tariff
        ) {
            $oldModemId = $fiberRequest->modem_id;

            /*
             * Customer already has a modem.
             */
            if ($hasModem) {
                if ($oldModemId) {
                    Modem::query()
                        ->whereKey($oldModemId)
                        ->lockForUpdate()
                        ->increment('stock');
                }

                $modemId = null;
                $modemPrice = 0;
            }

            /*
             * Customer needs a modem.
             */
            else {
                if ($oldModemId) {
                    $modem = Modem::query()
                        ->whereKey($oldModemId)
                        ->where('is_active', true)
                        ->lockForUpdate()
                        ->first();

                    if ($modem) {
                        $modemId = $modem->id;
                        $modemPrice = (int) $modem->price;
                    } else {
                        $modemId = null;
                        $modemPrice = 0;
                    }
                } else {
                    $modem = Modem::query()
                        ->where('is_active', true)
                        ->where('stock', '>', 0)
                        ->orderBy('sort_order')
                        ->lockForUpdate()
                        ->first();

                    if (! $modem) {
                        abort(
                            422,
                            'در حال حاضر مودم موجود نیست.'
                        );
                    }

                    $modem->decrement('stock');

                    $modemId = $modem->id;
                    $modemPrice = (int) $modem->price;
                }
            }

            $tariffPrice = (int) $tariff->price;

            $totalPrice =
                $tariffPrice
                + $modemPrice;

            $fiberRequest->update([
                'tariff_id' => $tariff->id,
                'modem_id' => $modemId,

                'full_name' =>
                    $validated['full_name'],

                'father_name' =>
                    $validated['father_name'],

                'national_code' =>
                    $validated['national_code'],

                'birth_certificate_number' =>
                    $validated['birth_certificate_number'],

                'birth_date' =>
                    $validated['birth_date'],

                'mobile' =>
                    $validated['mobile'],

                'landline' =>
                    $validated['landline'] ?? null,

                'province' =>
                    $validated['province'],

                'city' =>
                    $validated['city'],

                'address' =>
                    $validated['address'],

                'postal_code' =>
                    $validated['postal_code'],

                'tariff_price' =>
                    $tariffPrice,

                'modem_price' =>
                    $modemPrice,

                'total_price' =>
                    $totalPrice,

                'customer_note' =>
                    $validated['customer_note'] ?? null,
            ]);
        });

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
