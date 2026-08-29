<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FiberRequest;
use App\Models\Modem;
use App\Models\Tariff;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_requests' => FiberRequest::count(),

            'pending_requests' => FiberRequest::where(
                'status',
                'pending'
            )->count(),

            'reviewing_requests' => FiberRequest::where(
                'status',
                'reviewing'
            )->count(),

            'approved_requests' => FiberRequest::where(
                'status',
                'approved'
            )->count(),

            'completed_requests' => FiberRequest::where(
                'status',
                'completed'
            )->count(),

            'rejected_requests' => FiberRequest::where(
                'status',
                'rejected'
            )->count(),

            'total_tariffs' => Tariff::count(),

            'total_modems' => Modem::count(),
        ];

        $latestRequests = FiberRequest::query()
            ->with([
                'user:id,name,mobile',
                'tariff:id,name',
                'modem:id,name',
            ])
            ->latest('created_at')
            ->take(8)
            ->get();

        $newRequestsCount = FiberRequest::query()
            ->where('status', 'pending')
            ->count();

        return view('admin.dashboard', [
            'stats' => $stats,
            'latestRequests' => $latestRequests,
            'newRequestsCount' => $newRequestsCount,
        ]);
    }
}
