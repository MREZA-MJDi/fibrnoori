<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FiberRequest\UpdateFiberRequestStatusRequest;
use App\Models\FiberRequest;
use App\Services\FiberRequestService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FiberRequestController extends Controller
{
    public function __construct(
        protected FiberRequestService $fiberRequestService
    ) {
    }

    public function index(): View
    {
        $fiberRequests = FiberRequest::query()
            ->with([
                'user',
                'tariff',
                'modem',
            ])
            ->latest()
            ->paginate(20);

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
