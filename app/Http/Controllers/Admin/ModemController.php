<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Modem\StoreModemRequest;
use App\Http\Requests\Admin\Modem\UpdateModemRequest;
use App\Models\Modem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ModemController extends Controller
{
    public function index(): View
    {
        $modems = Modem::query()
            ->orderBy('sort_order')
            ->orderByDesc('id')
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
        $data = $request->validated();

        unset($data['image']);

        if ($request->hasFile('image')) {
            $data['image'] = $request
                ->file('image')
                ->store('modems', 'public');
        }

        Modem::create($data);

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
        $data = $request->validated();

        unset(
            $data['image'],
            $data['remove_image']
        );

        /*
         * Remove current image.
         */
        if (
            $request->boolean('remove_image')
            && $modem->image
        ) {
            $this->deleteImage($modem->image);

            $data['image'] = null;
        }

        /*
         * Upload new image.
         */
        if ($request->hasFile('image')) {
            $newImage = $request
                ->file('image')
                ->store('modems', 'public');

            if ($modem->image) {
                $this->deleteImage($modem->image);
            }

            $data['image'] = $newImage;
        }

        $modem->update($data);

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
        if ($modem->image) {
            $this->deleteImage($modem->image);
        }

        $modem->delete();

        return redirect()
            ->route('admin.modems.index')
            ->with(
                'success',
                'مودم با موفقیت حذف شد.'
            );
    }

    private function deleteImage(string $path): void
    {
        $disk = Storage::disk('public');

        if ($disk->exists($path)) {
            $disk->delete($path);
        }
    }
}
