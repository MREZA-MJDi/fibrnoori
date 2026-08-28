<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\FiberRequest;
use App\Models\Modem;
use App\Models\Tariff;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FiberRequestController extends Controller
{
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
            'account.requests.show',
            compact('fiberRequest')
        );
    }
}
