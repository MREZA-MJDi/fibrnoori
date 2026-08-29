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
        $requests = FiberRequest::query()
            ->with([
                'user:id,name,mobile',
                'tariff:id,name,speed_mbps,price',
                'modem:id,name,price',
            ])
            ->when(
                $request->filled('search'),
                function ($query) use ($request) {
                    $search = trim($request->string('search')->toString());

                    $query->where(function ($query) use ($search) {
                        $query
                            ->where('tracking_code', 'like', "%{$search}%")
                            ->orWhere('full_name', 'like', "%{$search}%")
                            ->orWhere('mobile', 'like', "%{$search}%")
                            ->orWhere('national_code', 'like', "%{$search}%");
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
