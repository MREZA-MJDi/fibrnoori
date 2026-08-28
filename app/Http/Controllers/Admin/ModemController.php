<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Modem\StoreModemRequest;
use App\Http\Requests\Admin\Modem\UpdateModemRequest;
use App\Models\Modem;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ModemController extends Controller
{
    public function index(): View
    {
        $modems = Modem::query()
            ->orderBy('sort_order')
            ->latest()
            ->paginate(20);

        return view(
            'admin.modems.index',
            compact('modems')
        );
    }

    public function create(): View
    {
        return view('admin.modems.create');
    }

    public function store(
        StoreModemRequest $request
    ): RedirectResponse {
        Modem::create(
            $request->validated()
        );

        return redirect()
            ->route('admin.modems.index')
            ->with(
                'success',
                'مودم با موفقیت ایجاد شد.'
            );
    }

    public function edit(Modem $modem): View
    {
        return view(
            'admin.modems.edit',
            compact('modem')
        );
    }

    public function update(
        UpdateModemRequest $request,
        Modem $modem
    ): RedirectResponse {
        $modem->update(
            $request->validated()
        );

        return redirect()
            ->route('admin.modems.index')
            ->with(
                'success',
                'مودم با موفقیت ویرایش شد.'
            );
    }

    public function destroy(
        Modem $modem
    ): RedirectResponse {
        $modem->delete();

        return redirect()
            ->route('admin.modems.index')
            ->with(
                'success',
                'مودم با موفقیت حذف شد.'
            );
    }
}
