<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tariff\StoreTariffRequest;
use App\Http\Requests\Admin\Tariff\UpdateTariffRequest;
use App\Models\Tariff;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TariffController extends Controller
{
    public function index(): View
    {
        $tariffs = Tariff::query()
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->paginate(20);

        return view(
            'admin.tariffs.index',
            compact('tariffs')
        );
    }

    public function create(): View
    {
        return view('admin.tariffs.create');
    }

    public function store(
        StoreTariffRequest $request
    ): RedirectResponse {
        Tariff::create(
            $request->validated()
        );

        return redirect()
            ->route('admin.tariffs.index')
            ->with(
                'success',
                'تعرفه با موفقیت ایجاد شد.'
            );
    }

    public function edit(Tariff $tariff): View
    {
        return view(
            'admin.tariffs.edit',
            compact('tariff')
        );
    }

    public function update(
        UpdateTariffRequest $request,
        Tariff $tariff
    ): RedirectResponse {
        $tariff->update(
            $request->validated()
        );

        return redirect()
            ->route('admin.tariffs.index')
            ->with(
                'success',
                'تعرفه با موفقیت ویرایش شد.'
            );
    }

    public function destroy(
        Tariff $tariff
    ): RedirectResponse {
        $tariff->delete();

        return redirect()
            ->route('admin.tariffs.index')
            ->with(
                'success',
                'تعرفه با موفقیت حذف شد.'
            );
    }
}
