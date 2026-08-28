<?php

namespace App\Http\Controllers;

use App\Http\Requests\FiberRequest\StoreFiberRequest;
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
            ->where('user_id', $request->user()->id)
            ->with([
                'tariff',
                'modem',
            ])
            ->latest()
            ->paginate(10);

        return view(
            'fiber-requests.index',
            compact('fiberRequests')
        );
    }

    public function create(): View
    {
        $tariffs = Tariff::query()
            ->active()
            ->get();

        $modems = Modem::query()
            ->active()
            ->get();

        return view(
            'fiber-requests.create',
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
                'fiber-requests.show',
                $fiberRequest
            )
            ->with(
                'success',
                'درخواست شما با موفقیت ثبت شد.'
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
            'statusHistories',
        ]);

        return view(
            'fiber-requests.show',
            compact('fiberRequest')
        );
    }
}
