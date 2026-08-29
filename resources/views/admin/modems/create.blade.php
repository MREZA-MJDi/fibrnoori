<x-layouts.admin
    title="افزودن مودم | فیبر نوری"
    heading="افزودن مودم"
>

    <div class="mx-auto w-full max-w-4xl space-y-6">

        <section>
            <span class="inline-flex rounded-full bg-primary-50 px-3 py-1.5 text-xs font-black text-primary-700">
                مدیریت تجهیزات
            </span>

            <h2 class="mt-3 text-2xl font-black tracking-tight text-slate-950 sm:text-3xl">
                افزودن مودم جدید
            </h2>

            <p class="mt-2 text-sm leading-8 text-slate-500">
                اطلاعات مودم را وارد کنید تا در سایت و فرم ثبت درخواست نمایش داده شود.
            </p>
        </section>

        <x-flash />

        <form
            method="POST"
            action="{{ route('admin.modems.store') }}"
            enctype="multipart/form-data"
            class="space-y-6"
        >
            @csrf

            {{-- Basic information --}}
            <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-5 py-5 sm:px-7">
                    <h3 class="text-base font-black text-slate-950">
                        اطلاعات اصلی
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        مشخصات اصلی مودم.
                    </p>
                </div>

                <div class="grid gap-5 p-5 sm:grid-cols-2 sm:p-7">

                    <x-input
                        name="name"
                        label="نام مودم"
                        :value="old('name')"
                        placeholder="مودم فیبر حرفه‌ای"
                        required
                    />

                    <x-input
                        name="slug"
                        label="Slug"
                        :value="old('slug')"
                        placeholder="fiber-pro"
                        dir="ltr"
                        required
                    />

                    <x-input
                        name="price"
                        label="قیمت (تومان)"
                        type="number"
                        :value="old('price', 0)"
                        min="0"
                        inputmode="numeric"
                        required
                    />

                    <x-input
                        name="stock"
                        label="موجودی"
                        type="number"
                        :value="old('stock', 0)"
                        min="0"
                        inputmode="numeric"
                        required
                    />

                    <x-input
                        name="sort_order"
                        label="ترتیب نمایش"
                        type="number"
                        :value="old('sort_order', 0)"
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

                    <p class="mt-1 text-sm text-slate-500">
                        تصویر محصول را انتخاب کنید.
                    </p>

                </div>


                <div class="p-5 sm:p-7">

                    <div class="space-y-2">

                        <label
                            for="image"
                            class="block text-sm font-bold text-slate-800"
                        >
                            فایل تصویر
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
                            placeholder="توضیح کوتاه درباره مودم..."
                        >{{ old('description') }}</textarea>

                        @error('description')
                        <p class="text-xs font-medium leading-5 text-red-600">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>


                    <div class="space-y-2">

                        <label class="block text-sm font-bold text-slate-800">
                            امکانات
                        </label>

                        <div class="space-y-2">

                            @for ($i = 0; $i < 5; $i++)

                                <input
                                    type="text"
                                    name="features[]"
                                    value="{{ old('features.' . $i) }}"
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

                        @error('features.*')
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
                        @checked(old('is_active', true))
                    class="mt-1 size-4 rounded border-slate-300 text-primary-600 focus:ring-primary-500"
                    >

                    <span>

                        <span class="block text-sm font-black text-slate-900">
                            مودم فعال باشد
                        </span>

                        <span class="mt-1 block text-xs leading-6 text-slate-500">
                            مودم فعال در سایت و فرم درخواست نمایش داده می‌شود.
                        </span>

                    </span>

                </label>

            </section>


            {{-- Actions --}}
            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                <a
                    href="{{ route('admin.modems.index') }}"
                    class="inline-flex min-h-12 items-center justify-center rounded-xl border border-slate-200 px-5 text-sm font-black text-slate-700 transition hover:bg-slate-50"
                >
                    انصراف
                </a>

                <button
                    type="submit"
                    class="inline-flex min-h-12 items-center justify-center gap-2 rounded-xl bg-primary-600 px-6 text-sm font-black text-white shadow-sm transition hover:bg-primary-700"
                >
                    ایجاد مودم

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

        </form>

    </div>

</x-layouts.admin>
