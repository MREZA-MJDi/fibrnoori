<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FiberRequest;
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
        ];

        return view(
            'admin.dashboard',
            compact('stats')
        );
    }
}
