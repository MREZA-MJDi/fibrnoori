<x-layouts.admin
    title="ویرایش تعرفه | فیبر نوری"
    heading="ویرایش تعرفه"
>

    <div class="mx-auto w-full max-w-4xl space-y-6">

        {{-- Header --}}
        <section>

            <span class="inline-flex rounded-full bg-primary-50 px-3 py-1.5 text-xs font-black text-primary-700">
                مدیریت تعرفه‌ها
            </span>

            <h2 class="mt-3 text-2xl font-black tracking-tight text-slate-950 sm:text-3xl">
                ویرایش تعرفه
            </h2>

            <p class="mt-2 text-sm leading-8 text-slate-500">
                اطلاعات تعرفه
                «{{ $tariff->name }}»
                را ویرایش کنید.
            </p>

        </section>


        <x-flash />


        <form
            method="POST"
            action="{{ route('admin.tariffs.update', $tariff) }}"
            class="space-y-6"
        >

            @csrf
            @method('PUT')


            {{-- Basic information --}}
            <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-5 py-5 sm:px-7">

                    <h3 class="text-base font-black text-slate-950">
                        اطلاعات اصلی
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        مشخصات پایه سرویس.
                    </p>

                </div>


                <div class="grid gap-5 p-5 sm:grid-cols-2 sm:p-7">

                    <x-input
                        name="name"
                        label="نام تعرفه"
                        :value="old('name', $tariff->name)"
                        required
                    />


                    <x-input
                        name="slug"
                        label="Slug"
                        :value="old('slug', $tariff->slug)"
                        dir="ltr"
                        required
                    />


                    <x-input
                        name="speed_mbps"
                        label="سرعت (Mbps)"
                        type="number"
                        :value="old('speed_mbps', $tariff->speed_mbps)"
                        min="1"
                        inputmode="numeric"
                        required
                    />


                    <x-input
                        name="duration_days"
                        label="مدت (روز)"
                        type="number"
                        :value="old('duration_days', $tariff->duration_days)"
                        min="1"
                        inputmode="numeric"
                        required
                    />


                    <x-input
                        name="price"
                        label="قیمت (تومان)"
                        type="number"
                        :value="old('price', $tariff->price)"
                        min="0"
                        inputmode="numeric"
                        required
                    />


                    <x-input
                        name="sort_order"
                        label="ترتیب نمایش"
                        type="number"
                        :value="old('sort_order', $tariff->sort_order)"
                        min="0"
                        inputmode="numeric"
                    />

                </div>

            </section>


            {{-- Description & features --}}
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
                            class="block w-full resize-y rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm leading-7 text-slate-900 shadow-sm outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
                            placeholder="توضیح کوتاه درباره این تعرفه..."
                        >{{ old('description', $tariff->description) }}</textarea>

                        @error('description')
                        <p class="text-xs font-medium leading-5 text-red-600">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>


                    @php
                        $features = old('features', is_array($tariff->features) ? $tariff->features : []);
                    @endphp


                    <div class="space-y-2">

                        <label
                            for="feature-0"
                            class="block text-sm font-bold text-slate-800"
                        >
                            امکانات
                        </label>

                        <div class="space-y-2">

                            @for ($i = 0; $i < max(5, count($features)); $i++)

                                <input
                                    id="feature-{{ $i }}"
                                    type="text"
                                    name="features[]"
                                    value="{{ $features[$i] ?? '' }}"
                                    class="block min-h-11 w-full rounded-xl border border-slate-200 bg-white px-4 text-sm text-slate-900 shadow-sm outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
                                    placeholder="مثلاً پشتیبانی ۲۴ ساعته"
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

                <div class="flex items-start gap-4">

                    <input
                        id="is_active"
                        type="checkbox"
                        name="is_active"
                        value="1"
                        @checked(old('is_active', $tariff->is_active))
                    class="mt-1 size-4 rounded border-slate-300 text-primary-600 focus:ring-primary-500"
                    >

                    <div>

                        <label
                            for="is_active"
                            class="text-sm font-black text-slate-900"
                        >
                            تعرفه فعال باشد
                        </label>

                        <p class="mt-1 text-xs leading-6 text-slate-500">
                            تعرفه فعال در سایت و فرم ثبت درخواست نمایش داده می‌شود.
                        </p>

                    </div>

                </div>

            </section>


            {{-- Actions --}}
            {{-- Actions --}}
            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-between">

                <form
                    method="POST"
                    action="{{ route('admin.tariffs.destroy', $tariff) }}"
                    onsubmit="return confirm('آیا از حذف این تعرفه مطمئن هستید؟');"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="inline-flex min-h-11 w-full items-center justify-center rounded-xl bg-red-50 px-5 text-sm font-black text-red-700 transition hover:bg-red-100 sm:w-auto"
                    >
                        حذف تعرفه
                    </button>
                </form>


                <div class="flex flex-col gap-3 sm:flex-row">

                    <a
                        href="{{ route('admin.tariffs.index') }}"
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

    </div>

</x-layouts.admin>
