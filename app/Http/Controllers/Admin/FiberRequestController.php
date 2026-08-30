<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FiberRequest\UpdateFiberRequestStatusRequest;
use App\Models\FiberRequest;
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

    /**
     * Display all fiber requests.
     */
    public function index(Request $request): View
    {
        $requests = FiberRequest::query()
            ->with([
                'user:id,name,mobile',
                'tariff:id,name,speed_mbps,price',
                'modem:id,name,price',
            ])
            ->when(
                $request->filled('search'),
                function ($query) use ($request) {
                    $search = trim(
                        $request->string('search')->toString()
                    );

                    $query->where(function ($query) use ($search) {
                        $query
                            ->where(
                                'tracking_code',
                                'like',
                                "%{$search}%"
                            )
                            ->orWhere(
                                'full_name',
                                'like',
                                "%{$search}%"
                            )
                            ->orWhere(
                                'mobile',
                                'like',
                                "%{$search}%"
                            )
                            ->orWhere(
                                'national_code',
                                'like',
                                "%{$search}%"
                            );
                    });
                }
            )
            ->when(
                $request->filled('status'),
                fn ($query) => $query->where(
                    'status',
                    $request->string('status')->toString()
                )
            )
            ->latest('created_at')
            ->paginate(20)
            ->withQueryString();

        return view(
            'admin.requests.index',
            compact('requests')
        );
    }


    /**
     * Display a single fiber request.
     */
    public function show(
        FiberRequest $fiberRequest
    ): View {
        $fiberRequest->load([
            'user:id,name,mobile',
            'tariff:id,name,speed_mbps,price',
            'modem:id,name,price',
            'statusHistories.changedBy:id,name,mobile',
        ]);

        return view(
            'admin.requests.show',
            [
                'request' => $fiberRequest,
            ]
        );
    }

public function export(
    FiberRequest $fiberRequest
) {
    $fiberRequest->load([
        'tariff',
        'modem',
    ]);

    $headers = [
        'کد پیگیری',
        'نام و نام خانوادگی',
        'نام پدر',
        'کد ملی',
        'شماره شناسنامه',
        'تاریخ تولد',
        'شماره موبایل',
        'شماره ثابت',
        'استان',
        'شهر',
        'آدرس',
        'کد پستی',
        'تعرفه',
        'سرعت',
        'مودم',
        'قیمت تعرفه',
        'قیمت مودم',
        'مبلغ کل',
        'وضعیت',
        'توضیحات مشتری',
        'یادداشت مدیر',
        'تاریخ ثبت',
    ];

    $statusLabels = [
        'pending' => 'در انتظار بررسی',
        'reviewing' => 'در حال بررسی',
        'approved' => 'تأیید شده',
        'rejected' => 'رد شده',
    ];

    $row = [
        $fiberRequest->tracking_code,
        $fiberRequest->full_name,
        $fiberRequest->father_name,
        $fiberRequest->national_code,
        $fiberRequest->birth_certificate_number,
        $fiberRequest->birth_date,
        $fiberRequest->mobile,
        $fiberRequest->landline ?? '',
        $fiberRequest->province,
        $fiberRequest->city,
        $fiberRequest->address,
        $fiberRequest->postal_code,
        $fiberRequest->tariff?->name ?? '',
        $fiberRequest->tariff?->speed_mbps
            ? $fiberRequest->tariff->speed_mbps . ' Mbps'
            : '',
        $fiberRequest->modem?->name ?? 'مودم شخصی',
        $fiberRequest->tariff_price,
        $fiberRequest->modem_price,
        $fiberRequest->total_price,
        $statusLabels[$fiberRequest->status]
            ?? $fiberRequest->status,
        $fiberRequest->customer_note ?? '',
        $fiberRequest->admin_note ?? '',
        $fiberRequest->created_at?->format('Y/m/d H:i:s'),
    ];

    $escape = function ($value): string {
        $value = (string) ($value ?? '');

        return '"' . str_replace('"', '""', $value) . '"';
    };

    $content = "\xEF\xBB\xBF";

    $content .= collect($headers)
        ->map($escape)
        ->implode(',')
        . "\r\n";

    $content .= collect($row)
        ->map($escape)
        ->implode(',')
        . "\r\n";

    return response($content, 200, [
        'Content-Type' => 'text/csv; charset=UTF-8',
        'Content-Disposition' =>
            'attachment; filename="fiber-request-' .
            $fiberRequest->tracking_code .
            '.csv"',
        'Cache-Control' => 'no-store, no-cache',
    ]);
}


    /**
     * Complete the request and permanently delete it.
     *
     * The request status is NOT changed to "completed".
     * The record itself is removed after admin confirmation.
     *
     * request_status_histories are automatically deleted because
     * the foreign key uses cascadeOnDelete().
     */
    public function complete(
        FiberRequest $fiberRequest
    ): RedirectResponse {
        DB::transaction(function () use ($fiberRequest) {

            $fiberRequest->delete();
        });

        return redirect()
            ->route('admin.requests.index')
            ->with(
                'success',
                'درخواست با موفقیت تکمیل و از سیستم حذف شد.'
            );
    }


    /**
     * Update request status.
     *
     * Available statuses remain:
     * pending
     * reviewing
     * approved
     * rejected
     *
     * "completed" is intentionally handled by complete()
     * because completion means deleting the request.
     */
    public function updateStatus(
        UpdateFiberRequestStatusRequest $request,
        FiberRequest $fiberRequest
    ): RedirectResponse {
        $this->fiberRequestService->updateStatus(
            $fiberRequest,
            $request->validated('status'),
            $request->validated('note'),
            $request->user()->id,
            $request->ip()
        );

        return back()->with(
            'success',
            'وضعیت درخواست با موفقیت تغییر کرد.'
        );
    }
}