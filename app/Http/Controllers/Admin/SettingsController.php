<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function index(): View
    {
        $settings = [
            'site_name' => 'فیبره نوری',
            'service_name' => 'اینترنت فیبر نوری',
            'system_status' => 'active',
            'sms_status' => 'ready',
        ];

        return view('admin.settings', compact('settings'));
    }
}
