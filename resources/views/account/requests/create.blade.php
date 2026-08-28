<x-layouts.account
    title="ثبت درخواست | فیبره نوری"
    heading="ثبت درخواست جدید"
>

    <div class="mx-auto w-full max-w-4xl space-y-6">

        {{-- Header --}}
        <section>
            <p class="text-sm font-bold text-primary-600">
                درخواست اتصال
            </p>

            <h2 class="mt-1 text-xl font-black text-slate-950 sm:text-2xl">
                ثبت درخواست فیبر نوری
            </h2>

            <p class="mt-2 text-sm leading-7 text-slate-500">
                اطلاعات خود را با دقت وارد کنید تا درخواست شما سریع‌تر بررسی شود.
            </p>
        </section>

        <form
            method="POST"
            action="{{ url('/account/requests') }}"
            class="space-y-6"
        >

            @csrf

            {{-- Customer information --}}
            <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-5 py-5 sm:px-7">
                    <h3 class="text-base font-black text-slate-950">
                        اطلاعات متقاضی
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        مشخصات هویتی خود را وارد کنید.
                    </p>
                </div>

                <div class="grid gap-5 p-5 sm:grid-cols-2 sm:p-7">

                    <x-input
                        name="full_name"
                        label="نام و نام خانوادگی"
                        :value="old('full_name', auth()->user()->name)"
                        required
                        autocomplete="name"
                    />

                    <x-input
                        name="national_code"
                        label="کد ملی"
                        :value="old('national_code')"
                        inputmode="numeric"
                        maxlength="10"
                        required
                    />

                    <x-input
                        name="mobile"
                        label="شماره موبایل"
                        type="tel"
                        :value="old('mobile', auth()->user()->mobile)"
                        inputmode="tel"
                        required
                    />

                </div>

            </section>

            {{-- Service selection --}}
            <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-5 py-5 sm:px-7">

                    <h3 class="text-base font-black text-slate-950">
                        انتخاب سرویس
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        تعرفه و مودم موردنظر خود را انتخاب کنید.
                    </p>

                </div>

                <div class="grid gap-5 p-5 sm:p-7">

                    {{-- Tariff --}}
                    <div class="space-y-2">

                        <label
                            for="tariff_id"
                            class="block text-sm font-bold text-slate-800"
                        >
                            تعرفه
                            <span class="text-red-500">*</span>
                        </label>

                        <select
                            id="tariff_id"
                            name="tariff_id"
                            required
                            class="block min-h-12 w-full rounded-xl border border-slate-200 bg-white px-4 text-sm text-slate-900 shadow-sm outline-none transition hover:border-slate-300 focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
                        >

                            <option value="">
                                انتخاب تعرفه
                            </option>

                            @foreach ($tariffs as $tariff)

                                <option
                                    value="{{ $tariff->id }}"
                                    @selected(old('tariff_id') == $tariff->id)
                                >
                                {{ $tariff->name }}
                                — {{ number_format($tariff->price) }} تومان
                                — {{ $tariff->speed_mbps }} مگابیت
                                </option>

                            @endforeach

                        </select>

                        @error('tariff_id')
                        <p class="text-xs font-medium leading-5 text-red-600">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>

                    {{-- Modem --}}
                    <div class="space-y-2">

                        <label
                            for="modem_id"
                            class="block text-sm font-bold text-slate-800"
                        >
                            مودم
                            <span class="text-xs font-medium text-slate-400">
                                (اختیاری)
                            </span>
                        </label>

                        <select
                            id="modem_id"
                            name="modem_id"
                            class="block min-h-12 w-full rounded-xl border border-slate-200 bg-white px-4 text-sm text-slate-900 shadow-sm outline-none transition hover:border-slate-300 focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
                        >

                            <option value="">
                                بدون مودم
                            </option>

                            @foreach ($modems as $modem)

                                <option
                                    value="{{ $modem->id }}"
                                    @selected(old('modem_id') == $modem->id)
                                >
                                {{ $modem->name }}
                                — {{ number_format($modem->price) }} تومان
                                </option>

                            @endforeach

                        </select>

                        @error('modem_id')
                        <p class="text-xs font-medium leading-5 text-red-600">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>

                </div>

            </section>

            {{-- Address --}}
            <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-5 py-5 sm:px-7">

                    <h3 class="text-base font-black text-slate-950">
                        آدرس محل نصب
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        آدرس دقیق محل دریافت سرویس را وارد کنید.
                    </p>

                </div>

                <div class="grid gap-5 p-5 sm:grid-cols-2 sm:p-7">

                    <x-input
                        name="province"
                        label="استان"
                        :value="old('province')"
                        required
                    />

                    <x-input
                        name="city"
                        label="شهر"
                        :value="old('city')"
                        required
                    />

                    <div class="space-y-2 sm:col-span-2">

                        <label
                            for="address"
                            class="block text-sm font-bold text-slate-800"
                        >
                            آدرس کامل
                            <span class="text-red-500">*</span>
                        </label>

                        <textarea
                            id="address"
                            name="address"
                            rows="4"
                            required
                            class="block w-full resize-y rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm leading-7 text-slate-900 shadow-sm outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
                            placeholder="خیابان، کوچه، پلاک، واحد و..."
                        >{{ old('address') }}</textarea>

                        @error('address')
                        <p class="text-xs font-medium leading-5 text-red-600">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>

                    <x-input
                        name="postal_code"
                        label="کد پستی"
                        :value="old('postal_code')"
                        inputmode="numeric"
                        maxlength="10"
                        required
                    />

                </div>

            </section>

            {{-- Customer note --}}
            <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-5 py-5 sm:px-7">

                    <h3 class="text-base font-black text-slate-950">
                        توضیحات
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        در صورت نیاز توضیحی برای کارشناس بنویسید.
                    </p>

                </div>

                <div class="p-5 sm:p-7">

                    <textarea
                        name="customer_note"
                        rows="4"
                        class="block w-full resize-y rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm leading-7 text-slate-900 shadow-sm outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
                        placeholder="توضیحات تکمیلی..."
                    >{{ old('customer_note') }}</textarea>

                    @error('customer_note')
                    <p class="mt-2 text-xs font-medium leading-5 text-red-600">
                        {{ $message }}
                    </p>
                    @enderror

                </div>

            </section>

            {{-- Actions --}}
            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                <x-button
                    href="{{ url('/account/requests') }}"
                    variant="secondary"
                >
                    انصراف
                </x-button>

                <x-button type="submit" size="lg">
                    ثبت درخواست

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
                            d="M5 13l4 4L19 7"
                        />
                    </svg>
                </x-button>

            </div>

        </form>

    </div>

</x-layouts.account>
