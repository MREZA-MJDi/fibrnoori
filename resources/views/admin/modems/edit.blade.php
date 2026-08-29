<x-layouts.admin
    title="ویرایش مودم | فیبر نوری"
    heading="ویرایش مودم"
>

    <div class="mx-auto w-full max-w-4xl space-y-6">

        <section>

            <span class="inline-flex rounded-full bg-primary-50 px-3 py-1.5 text-xs font-black text-primary-700">
                مدیریت تجهیزات
            </span>

            <h2 class="mt-3 text-2xl font-black tracking-tight text-slate-950 sm:text-3xl">
                ویرایش مودم
            </h2>

            <p class="mt-2 text-sm leading-8 text-slate-500">
                اطلاعات مودم
                «{{ $modem->name }}»
                را مدیریت کنید.
            </p>

        </section>


        <x-flash />


        <form
            method="POST"
            action="{{ route('admin.modems.update', $modem) }}"
            enctype="multipart/form-data"
            class="space-y-6"
        >

            @csrf
            @method('PUT')


            {{-- Basic --}}
            <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-5 py-5 sm:px-7">

                    <h3 class="text-base font-black text-slate-950">
                        اطلاعات اصلی
                    </h3>

                </div>


                <div class="grid gap-5 p-5 sm:grid-cols-2 sm:p-7">

                    <x-input
                        name="name"
                        label="نام مودم"
                        :value="old('name', $modem->name)"
                        required
                    />

                    <x-input
                        name="slug"
                        label="Slug"
                        :value="old('slug', $modem->slug)"
                        dir="ltr"
                        required
                    />

                    <x-input
                        name="price"
                        label="قیمت (تومان)"
                        type="number"
                        :value="old('price', $modem->price)"
                        min="0"
                        inputmode="numeric"
                        required
                    />

                    <x-input
                        name="stock"
                        label="موجودی"
                        type="number"
                        :value="old('stock', $modem->stock)"
                        min="0"
                        inputmode="numeric"
                        required
                    />

                    <x-input
                        name="sort_order"
                        label="ترتیب نمایش"
                        type="number"
                        :value="old('sort_order', $modem->sort_order)"
                        min="0"
                        inputmode="numeric"
                    />

                </div>

            </section>


            {{-- Image --}}
            <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-5 py-5 sm:px-7">

                    <h3 class="text-base font-black text-slate-950">
                        تصویر مودم
                    </h3>

                </div>


                <div class="space-y-5 p-5 sm:p-7">

                    @if ($modem->image)

                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center">

                            <div class="grid size-32 shrink-0 place-items-center overflow-hidden rounded-3xl bg-slate-50">

                                <img
                                    src="{{ asset('storage/' . $modem->image) }}"
                                    alt="{{ $modem->name }}"
                                    class="size-full object-contain"
                                >

                            </div>


                            <div class="min-w-0">

                                <p class="text-sm font-black text-slate-900">
                                    تصویر فعلی
                                </p>

                                <p class="mt-2 break-all font-mono text-xs leading-6 text-slate-400">
                                    {{ $modem->image }}
                                </p>

                            </div>

                        </div>

                        <label class="flex items-center gap-3 rounded-2xl bg-red-50 p-4">

                            <input
                                type="checkbox"
                                name="remove_image"
                                value="1"
                                @checked(old('remove_image'))
                            class="size-4 rounded border-red-300 text-red-600 focus:ring-red-500"
                            >

                            <span class="text-sm font-bold text-red-700">
                                حذف تصویر فعلی
                            </span>

                        </label>

                    @endif


                    <div class="space-y-2">

                        <label
                            for="image"
                            class="block text-sm font-bold text-slate-800"
                        >
                            {{ $modem->image ? 'تصویر جدید' : 'انتخاب تصویر' }}
                        </label>

                        <input
                            id="image"
                            type="file"
                            name="image"
                            accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                            class="block w-full rounded-xl border border-slate-200 bg-white px-3 py-3 text-sm text-slate-700 shadow-sm outline-none transition file:ml-4 file:rounded-lg file:border-0 file:bg-primary-50 file:px-4 file:py-2 file:text-xs file:font-black file:text-primary-700 hover:border-slate-300 focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
                        >

                        <p class="text-xs leading-6 text-slate-400">
                            JPG، JPEG، PNG یا WEBP — حداکثر ۲ مگابایت
                        </p>

                        @error('image')
                        <p class="text-xs font-medium leading-5 text-red-600">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>

                </div>

            </section>


            {{-- Description --}}
            <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-5 py-5 sm:px-7">

                    <h3 class="text-base font-black text-slate-950">
                        توضیحات و امکانات
                    </h3>

                </div>


                <div class="space-y-5 p-5 sm:p-7">

                    <div class="space-y-2">

                        <label
                            for="description"
                            class="block text-sm font-bold text-slate-800"
                        >
                            توضیحات
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="4"
                            class="block w-full resize-y rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm leading-7 text-slate-900 shadow-sm outline-none transition hover:border-slate-300 focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
                        >{{ old('description', $modem->description) }}</textarea>

                        @error('description')
                        <p class="text-xs font-medium leading-5 text-red-600">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>


                    @php
                        $features = old(
                            'features',
                            is_array($modem->features)
                                ? $modem->features
                                : []
                        );
                    @endphp


                    <div class="space-y-2">

                        <label class="block text-sm font-bold text-slate-800">
                            امکانات
                        </label>

                        <div class="space-y-2">

                            @for ($i = 0; $i < max(5, count($features)); $i++)

                                <input
                                    type="text"
                                    name="features[]"
                                    value="{{ $features[$i] ?? '' }}"
                                    placeholder="مثلاً پشتیبانی از Wi-Fi 6"
                                    class="block min-h-11 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
                                >

                            @endfor

                        </div>

                        @error('features')
                        <p class="text-xs font-medium leading-5 text-red-600">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>

                </div>

            </section>


            {{-- Status --}}
            <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

                <label class="flex items-start gap-3">

                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        @checked(old('is_active', $modem->is_active))
                    class="mt-1 size-4 rounded border-slate-300 text-primary-600 focus:ring-primary-500"
                    >

                    <span>

                        <span class="block text-sm font-black text-slate-900">
                            مودم فعال باشد
                        </span>

                        <span class="mt-1 block text-xs leading-6 text-slate-500">
                            مودم فعال در سایت و فرم ثبت درخواست نمایش داده می‌شود.
                        </span>

                    </span>

                </label>

            </section>


            {{-- Actions --}}
            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-between">

                <button
                    type="button"
                    onclick="document.getElementById('delete-modem-form').requestSubmit()"
                    class="inline-flex min-h-11 items-center justify-center rounded-xl bg-red-50 px-5 text-sm font-black text-red-700 transition hover:bg-red-100"
                >
                    حذف مودم
                </button>


                <div class="flex flex-col gap-3 sm:flex-row">

                    <a
                        href="{{ route('admin.modems.index') }}"
                        class="inline-flex min-h-11 items-center justify-center rounded-xl border border-slate-200 px-5 text-sm font-black text-slate-700 transition hover:bg-slate-50"
                    >
                        انصراف
                    </a>

                    <button
                        type="submit"
                        class="inline-flex min-h-11 items-center justify-center gap-2 rounded-xl bg-primary-600 px-6 text-sm font-black text-white shadow-sm transition hover:bg-primary-700"
                    >
                        ذخیره تغییرات

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="size-5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m5 12 4 4L19 7"
                            />
                        </svg>

                    </button>

                </div>

            </div>

        </form>


        {{-- Separate delete form --}}
        <form
            id="delete-modem-form"
            method="POST"
            action="{{ route('admin.modems.destroy', $modem) }}"
            onsubmit="return confirm('آیا از حذف مودم «{{ $modem->name }}» مطمئن هستید؟');"
        >
            @csrf
            @method('DELETE')
        </form>

    </div>

</x-layouts.admin>
