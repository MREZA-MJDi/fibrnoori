<?php

namespace App\Http\Controllers;

use App\Models\Modem;
use App\Models\Tariff;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('site.home');
    }

    public function tariffs(): View
    {
        $tariffs = Tariff::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view(
            'site.tariffs',
            compact('tariffs')
        );
    }

    public function modems(): View
    {
        $modems = Modem::query()
            ->where('is_active', true)
            ->where('stock', '>', 0)
            ->orderBy('sort_order')
            ->get();

        return view(
            'site.modems',
            compact('modems')
        );
    }

    public function contact(): View
    {
        return view('site.contact');
    }
}
