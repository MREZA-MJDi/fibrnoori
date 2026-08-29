<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FiberRequest\UpdateFiberRequestStatusRequest;
use App\Models\FiberRequest;
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
        $query = FiberRequest::query()
            ->with([
                'user',
                'tariff',
                'modem',
            ])
            ->latest();


        /*
         * Search
         */
        $search = trim((string) $request->input('search'));

        if ($search !== '') {
            $query->where(function ($q) use ($search) {

                $q->where('tracking_code', 'like', "%{$search}%")
                    ->orWhere('full_name', 'like', "%{$search}%")
                    ->orWhere('mobile', 'like', "%{$search}%")
                    ->orWhere('national_code', 'like', "%{$search}%");
            });
        }


        /*
         * Status filter
         */
        $allowedStatuses = [
            'pending',
            'reviewing',
            'approved',
            'completed',
            'rejected',
        ];

        $status = $request->input('status');

        if (
            is_string($status)
            && in_array($status, $allowedStatuses, true)
        ) {
            $query->where('status', $status);
        }


        /*
         * Pagination
         */
        $fiberRequests = $query
            ->paginate(20)
            ->withQueryString();


        return view(
            'admin.requests.index',
            compact('fiberRequests')
        );
    }


    public function show(
        FiberRequest $fiberRequest
    ): View {
        $fiberRequest->load([
            'user',
            'tariff',
            'modem',
            'statusHistories.changedBy',
        ]);

        return view(
            'admin.requests.show',
            compact('fiberRequest')
        );
    }


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
