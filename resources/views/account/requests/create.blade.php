<x-layouts.account
    title="ثبت درخواست | فیبر نوری"
    heading="ثبت درخواست جدید"
>

    @php
        /*
        |--------------------------------------------------------------------------
        | Old values
        |--------------------------------------------------------------------------
        */

        $oldBirthDate = old('birth_date');

        $birthParts = $oldBirthDate
            ? preg_split('/[\/\-]/', $oldBirthDate)
            : [];

        $birthYear = old(
            'birth_year',
            $birthParts[0] ?? ''
        );

        $birthMonth = old(
            'birth_month',
            $birthParts[1] ?? ''
        );

        $birthDay = old(
            'birth_day',
            $birthParts[2] ?? ''
        );

        /*
        |--------------------------------------------------------------------------
        | Jalali months
        |--------------------------------------------------------------------------
        */

        $jalaliMonths = [
            1 => 'فروردین',
            2 => 'اردیبهشت',
            3 => 'خرداد',
            4 => 'تیر',
            5 => 'مرداد',
            6 => 'شهریور',
            7 => 'مهر',
            8 => 'آبان',
            9 => 'آذر',
            10 => 'دی',
            11 => 'بهمن',
            12 => 'اسفند',
        ];
    @endphp


    <div
        x-data="fiberRequestForm()"
        class="mx-auto w-full max-w-4xl space-y-6"
    >


        {{-- ================================================================
             Validation summary
        ================================================================= --}}
        @if ($errors->any())

            <section
                class="rounded-3xl border border-red-200 bg-red-50 p-5 shadow-sm sm:p-6"
            >

                <div class="flex items-start gap-3">

                    <div
                        class="grid size-10 shrink-0 place-items-center rounded-xl bg-white text-red-600 shadow-sm"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.8"
                            stroke="currentColor"
                            class="size-5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 9v4m0 4h.01M10.3 3.5h3.4L21 18.2a1.5 1.5 0 0 1-1.3 2.3H4.3A1.5 1.5 0 0 1 3 18.2z"
                            />
                        </svg>
                    </div>

                    <div class="min-w-0">

                        <p class="text-sm font-black text-red-900">
                            اطلاعات فرم کامل یا معتبر نیست.
                        </p>

                        <p class="mt-1 text-xs leading-6 text-red-700">
                            موارد مشخص‌شده را بررسی کنید و دوباره تلاش کنید.
                        </p>

                    </div>

                </div>

            </section>

        @endif


        {{-- ================================================================
             Header
        ================================================================= --}}
        <section>

            <span
                class="inline-flex rounded-full bg-primary-50 px-3 py-1.5 text-xs font-black text-primary-700"
            >
                درخواست اتصال
            </span>

            <h2
                class="mt-3 text-2xl font-black tracking-tight text-slate-950 sm:text-3xl"
            >
                ثبت درخواست فیبر نوری
            </h2>

            <p class="mt-2 text-sm leading-8 text-slate-500">
                اطلاعات خود را با دقت وارد کنید تا درخواست شما سریع‌تر بررسی شود.
            </p>

        </section>


        <x-flash />


        {{-- ================================================================
             Main form
        ================================================================= --}}
        <form
            method="POST"
            action="{{ route('account.requests.store') }}"
            class="space-y-6"
            @submit.prevent="submitForm($event)"
        >

            @csrf


            {{-- ============================================================
                 Customer information
            ============================================================== --}}
            <section
                class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm"
            >

                <div
                    class="border-b border-slate-100 px-5 py-5 sm:px-7"
                >

                    <div class="flex items-start gap-3">

                        <div
                            class="grid size-10 shrink-0 place-items-center rounded-xl bg-primary-50 text-primary-600"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.8"
                                stroke="currentColor"
                                class="size-5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.25a7.5 7.5 0 0 1 15 0"
                                />
                            </svg>
                        </div>

                        <div>

                            <h3 class="text-base font-black text-slate-950">
                                اطلاعات متقاضی
                            </h3>

                            <p class="mt-1 text-sm leading-6 text-slate-500">
                                اطلاعات هویتی و تماس خود را وارد کنید.
                            </p>

                        </div>

                    </div>

                </div>


                <div
                    class="grid gap-5 p-5 sm:grid-cols-2 sm:p-7"
                >

                    {{-- Full name --}}
                    <x-input
                        name="full_name"
                        label="نام و نام خانوادگی"
                        :value="old('full_name', auth()->user()->name)"
                        autocomplete="name"
                        required
                    />


                    {{-- Father name --}}
                    <x-input
                        name="father_name"
                        label="نام پدر"
                        :value="old('father_name')"
                        required
                    />


                    {{-- National code --}}
                    <x-input
                        name="national_code"
                        label="کد ملی"
                        :value="old('national_code')"
                        inputmode="numeric"
                        maxlength="10"
                        autocomplete="off"
                        required
                    />


                    {{-- Birth certificate --}}
                    <x-input
                        name="birth_certificate_number"
                        label="شماره شناسنامه"
                        :value="old('birth_certificate_number')"
                        inputmode="numeric"
                        maxlength="30"
                        required
                    />


                    {{-- ====================================================
                         Jalali Birth Date
                    ===================================================== --}}
                    <div class="space-y-3 sm:col-span-2">

                        <div>

                            <label
                                for="birth_year"
                                class="block text-sm font-bold text-slate-800"
                            >
                                تاریخ تولد
                                <span class="text-red-500">*</span>
                            </label>

                            <p class="mt-1 text-xs leading-6 text-slate-500">
                                تاریخ تولد را به صورت شمسی وارد کنید.
                                مثال:
                                <span class="font-bold text-slate-700">
                                    ۱۳۷۸ / مرداد / ۱۲
                                </span>
                            </p>

                        </div>


                        <div
                            class="grid grid-cols-2 gap-3 sm:grid-cols-3"
                        >

                            {{-- Day --}}
                            <div>

                                <label
                                    for="birth_day"
                                    class="mb-2 block text-xs font-bold text-slate-500"
                                >
                                    روز
                                </label>

                                <select
                                    id="birth_day"
                                    name="birth_day"
                                    x-model="birthDay"
                                    required
                                    class="block min-h-12 w-full rounded-xl border border-slate-200 bg-white px-4 text-sm text-slate-900 shadow-sm outline-none transition hover:border-slate-300 focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
                                >

                                    <option value="">
                                        روز
                                    </option>

                                    @for ($day = 1; $day <= 31; $day++)

                                        <option
                                            value="{{ $day }}"
                                            @selected((int) $birthDay === $day)
                                        >
                                            {{ $day }}
                                        </option>

                                    @endfor

                                </select>

                            </div>


                            {{-- Month --}}
                            <div>

                                <label
                                    for="birth_month"
                                    class="mb-2 block text-xs font-bold text-slate-500"
                                >
                                    ماه
                                </label>

                                <select
                                    id="birth_month"
                                    name="birth_month"
                                    x-model="birthMonth"
                                    required
                                    class="block min-h-12 w-full rounded-xl border border-slate-200 bg-white px-4 text-sm text-slate-900 shadow-sm outline-none transition hover:border-slate-300 focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
                                >

                                    <option value="">
                                        ماه
                                    </option>

                                    @foreach ($jalaliMonths as $monthNumber => $monthName)

                                        <option
                                            value="{{ $monthNumber }}"
                                            @selected((int) $birthMonth === $monthNumber)
                                        >
                                            {{ $monthName }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>


                            {{-- Year --}}
                            <div class="col-span-2 sm:col-span-1">

                                <label
                                    for="birth_year"
                                    class="mb-2 block text-xs font-bold text-slate-500"
                                >
                                    سال
                                </label>

                                <input
                                    id="birth_year"
                                    name="birth_year"
                                    type="text"
                                    x-model="birthYear"
                                    value="{{ $birthYear }}"
                                    inputmode="numeric"
                                    maxlength="4"
                                    autocomplete="bday-year"
                                    placeholder="مثلاً 1378"
                                    required
                                    class="block min-h-12 w-full rounded-xl border border-slate-200 bg-white px-4 text-sm text-slate-900 shadow-sm outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
                                >

                            </div>

                        </div>


                        {{-- Birth date errors --}}
                        <div class="space-y-1">

                            @error('birth_date')
                            <p class="text-xs font-bold leading-6 text-red-600">
                                {{ $message }}
                            </p>
                            @enderror

                            @error('birth_year')
                            <p class="text-xs font-bold leading-6 text-red-600">
                                {{ $message }}
                            </p>
                            @enderror

                            @error('birth_month')
                            <p class="text-xs font-bold leading-6 text-red-600">
                                {{ $message }}
                            </p>
                            @enderror

                            @error('birth_day')
                            <p class="text-xs font-bold leading-6 text-red-600">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>

                    </div>


                    {{-- Mobile --}}
                    <x-input
                        name="mobile"
                        label="شماره موبایل"
                        type="tel"
                        :value="old('mobile', auth()->user()->mobile)"
                        inputmode="tel"
                        autocomplete="tel"
                        maxlength="11"
                        required
                    />


                    {{-- Landline --}}
                    <x-input
                        name="landline"
                        label="شماره ثابت"
                        type="tel"
                        :value="old('landline')"
                        inputmode="tel"
                        maxlength="20"
                    />

                </div>

            </section>


            {{-- ============================================================
                 Service
            ============================================================== --}}
            <section
                class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm"
            >

                <div
                    class="border-b border-slate-100 px-5 py-5 sm:px-7"
                >

                    <div class="flex items-start gap-3">

                        <div
                            class="grid size-10 shrink-0 place-items-center rounded-xl bg-primary-50 text-primary-600"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.8"
                                stroke="currentColor"
                                class="size-5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M8.25 7.5h7.5m-7.5 4.5h7.5m-7.5 4.5h4.5M5.25 3.75h13.5a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V5.25a1.5 1.5 0 0 1 1.5-1.5Z"
                                />
                            </svg>
                        </div>

                        <div>

                            <h3 class="text-base font-black text-slate-950">
                                انتخاب سرویس
                            </h3>

                            <p class="mt-1 text-sm leading-6 text-slate-500">
                                تعرفه و تجهیزات موردنیاز خود را مشخص کنید.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="space-y-5 p-5 sm:p-7">

                    {{-- Tariff --}}
                    <div class="space-y-3">

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
                            x-model="tariffId"
                            required
                            class="block min-h-12 w-full rounded-xl border border-slate-200 bg-white px-4 text-sm text-slate-900 shadow-sm outline-none transition hover:border-slate-300 focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
                        >

                            <option value="">
                                انتخاب تعرفه
                            </option>


                            @foreach ($tariffs as $tariff)

                                <option
                                    value="{{ $tariff->id }}"
                                    data-name="{{ $tariff->name }}"
                                    data-speed="{{ $tariff->speed_mbps }}"
                                    data-price="{{ $tariff->price }}"
                                    data-duration="{{ $tariff->duration_days }}"
                                    data-description="{{ $tariff->description }}"
                                    data-features='@json($tariff->features ?? [])'
                                    @selected(old('tariff_id') == $tariff->id)
                                >
                                {{ $tariff->name }}
                                · {{ number_format($tariff->price) }} تومان
                                · {{ number_format($tariff->speed_mbps) }} Mbps
                                </option>

                            @endforeach

                        </select>


                        @error('tariff_id')

                        <p class="text-xs font-medium leading-5 text-red-600">
                            {{ $message }}
                        </p>

                        @enderror


                        {{-- Selected tariff live summary --}}
                        <div
                            x-show="selectedTariff"
                            x-cloak
                            x-transition
                            class="rounded-2xl border border-primary-100 bg-primary-50/60 p-4"
                        >

                            <div class="flex items-start justify-between gap-4">

                                <div class="min-w-0">

                                    <p class="text-xs font-bold text-primary-700">
                                        تعرفه انتخاب‌شده
                                    </p>

                                    <p
                                        class="mt-1 break-words text-sm font-black text-slate-950"
                                        x-text="tariffName"
                                    ></p>

                                </div>

                                <div
                                    class="shrink-0 rounded-xl bg-white px-3 py-2 text-left shadow-sm"
                                >

                                    <p class="text-[11px] font-bold text-slate-400">
                                        قیمت
                                    </p>

                                    <p class="mt-0.5 text-sm font-black text-primary-700">
                                        <span x-text="formatPrice(tariffPrice)"></span>
                                        تومان
                                    </p>

                                </div>

                            </div>


                            <div class="mt-3 flex flex-wrap gap-2">

                                <span
                                    class="inline-flex items-center rounded-full bg-white px-3 py-1.5 text-xs font-bold text-slate-600 shadow-sm"
                                >
                                    سرعت:
                                    <span
                                        class="mr-1 text-slate-900"
                                        x-text="tariffSpeed + ' Mbps'"
                                    ></span>
                                </span>

                                <span
                                    x-show="tariffDuration"
                                    class="inline-flex items-center rounded-full bg-white px-3 py-1.5 text-xs font-bold text-slate-600 shadow-sm"
                                >
                                    مدت:
                                    <span
                                        class="mr-1 text-slate-900"
                                        x-text="tariffDuration + ' روز'"
                                    ></span>
                                </span>

                            </div>

                        </div>

                    </div>


                    {{-- Modem --}}
                    <div
                        class="rounded-2xl border border-slate-200 bg-slate-50 p-4"
                    >

                        <label
                            for="has_modem"
                            class="flex cursor-pointer items-start gap-3"
                        >

                            <input
                                id="has_modem"
                                type="checkbox"
                                name="has_modem"
                                value="1"
                                x-model="hasModem"
                                @checked(old('has_modem'))
                            class="mt-1 size-5 rounded border-slate-300 text-primary-600 focus:ring-primary-500"
                            >


                            <span class="min-w-0">

                                <span
                                    class="block text-sm font-black text-slate-900"
                                >
                                    مودم دارم و نیازی به دریافت مودم ندارم
                                </span>

                                <span
                                    class="mt-1 block text-xs leading-6 text-slate-500"
                                >
                                    در صورت انتخاب این گزینه، مودمی برای درخواست شما ثبت نمی‌شود.
                                </span>

                            </span>

                        </label>


                        <div
                            class="mt-4 rounded-xl border border-slate-200 bg-white px-4 py-3"
                        >

                            <div class="flex items-center justify-between gap-3">

                                <span class="text-xs font-bold text-slate-500">
                                    وضعیت مودم
                                </span>

                                <span
                                    class="text-xs font-black"
                                    :class="
                                        hasModem
                                            ? 'text-emerald-600'
                                            : 'text-amber-600'
                                    "
                                    x-text="
                                        hasModem
                                            ? 'مودم شخصی'
                                            : 'نیازمند مودم'
                                    "
                                ></span>

                            </div>

                        </div>

                    </div>

                </div>

            </section>


            {{-- ============================================================
                 Address
            ============================================================== --}}
            <section
                class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm"
            >

                <div
                    class="border-b border-slate-100 px-5 py-5 sm:px-7"
                >

                    <div class="flex items-start gap-3">

                        <div
                            class="grid size-10 shrink-0 place-items-center rounded-xl bg-primary-50 text-primary-600"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.8"
                                stroke="currentColor"
                                class="size-5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19.5 10.5c0 6-7.5 10.5-7.5 10.5S4.5 16.5 4.5 10.5a7.5 7.5 0 1 1 15 0Z"
                                />
                            </svg>
                        </div>

                        <div>

                            <h3 class="text-base font-black text-slate-950">
                                آدرس محل نصب
                            </h3>

                            <p class="mt-1 text-sm leading-6 text-slate-500">
                                آدرس دقیق محل دریافت سرویس را وارد کنید.
                            </p>

                        </div>

                    </div>

                </div>


                <div
                    class="grid gap-5 p-5 sm:grid-cols-2 sm:p-7"
                >

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
                            placeholder="خیابان، کوچه، پلاک، واحد و..."
                            class="block w-full resize-y rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm leading-7 text-slate-900 shadow-sm outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
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


            {{-- ============================================================
                 Customer note
            ============================================================== --}}
            <section
                class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm"
            >

                <div
                    class="border-b border-slate-100 px-5 py-5 sm:px-7"
                >

                    <h3 class="text-base font-black text-slate-950">
                        توضیحات
                    </h3>

                    <p class="mt-1 text-sm leading-6 text-slate-500">
                        در صورت نیاز توضیحات تکمیلی خود را وارد کنید.
                    </p>

                </div>


                <div class="p-5 sm:p-7">

                    <textarea
                        id="customer_note"
                        name="customer_note"
                        rows="4"
                        placeholder="توضیحات تکمیلی..."
                        class="block w-full resize-y rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm leading-7 text-slate-900 shadow-sm outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
                    >{{ old('customer_note') }}</textarea>


                    @error('customer_note')

                    <p class="mt-2 text-xs font-medium leading-5 text-red-600">
                        {{ $message }}
                    </p>

                    @enderror

                </div>

            </section>


            {{-- ============================================================
                 Actions
            ============================================================== --}}
            <div
                class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end"
            >

                <a
                    href="{{ route('account.requests.index') }}"
                    class="inline-flex min-h-12 items-center justify-center rounded-xl border border-slate-200 px-5 text-sm font-black text-slate-700 transition hover:bg-slate-50"
                >
                    انصراف
                </a>


                <button
                    type="button"
                    @click="openPreview()"
                    class="inline-flex min-h-12 items-center justify-center gap-2 rounded-xl bg-primary-600 px-6 text-sm font-black text-white shadow-sm transition hover:bg-primary-700 focus-visible:ring-4 focus-visible:ring-primary-100 active:scale-[0.99]"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="size-5"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 12s3.5-6 9.75-6 9.75 6 9.75 6-3.5 6-9.75 6-9.75-6-9.75-6Z"
                        />

                        <circle
                            cx="12"
                            cy="12"
                            r="2.75"
                        />
                    </svg>

                    بررسی اطلاعات و ادامه

                </button>

            </div>


            {{-- ============================================================
                 Preview Modal
            ============================================================== --}}
            <div
                x-show="previewOpen"
                x-cloak
                x-transition.opacity
                class="fixed inset-0 z-[100] overflow-y-auto"
                @keydown.escape.window="previewOpen = false"
            >

                {{-- Backdrop --}}
                <div
                    class="fixed inset-0 bg-slate-950/60 backdrop-blur-sm"
                    @click="previewOpen = false"
                ></div>


                {{-- Modal wrapper --}}
                <div
                    class="relative flex min-h-full items-center justify-center p-4 sm:p-6"
                >

                    <div
                        x-show="previewOpen"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="translate-y-4 scale-[0.98] opacity-0"
                        x-transition:enter-end="translate-y-0 scale-100 opacity-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="translate-y-0 scale-100 opacity-100"
                        x-transition:leave-end="translate-y-4 scale-[0.98] opacity-0"
                        class="relative w-full max-w-2xl overflow-hidden rounded-3xl bg-white shadow-2xl"
                        @click.stop
                    >

                        {{-- Modal header --}}
                        <div
                            class="border-b border-slate-100 px-5 py-5 sm:px-7"
                        >

                            <div
                                class="flex items-start justify-between gap-4"
                            >

                                <div class="flex items-start gap-3">

                                    <div
                                        class="grid size-11 shrink-0 place-items-center rounded-2xl bg-primary-50 text-primary-600"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.8"
                                            stroke="currentColor"
                                            class="size-5"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M9 12.75 11.25 15 15 9.75"
                                            />

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M6.75 3.75h10.5A2.25 2.25 0 0 1 19.5 6v12a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 18V6a2.25 2.25 0 0 1 2.25-2.25Z"
                                            />
                                        </svg>
                                    </div>

                                    <div>

                                        <p class="text-xs font-bold text-primary-600">
                                            مرحله نهایی
                                        </p>

                                        <h3 class="mt-1 text-lg font-black text-slate-950">
                                            بررسی اطلاعات درخواست
                                        </h3>

                                        <p class="mt-1 text-sm leading-6 text-slate-500">
                                            اطلاعات را یک‌بار بررسی کنید و سپس درخواست را ثبت کنید.
                                        </p>

                                    </div>

                                </div>


                                <button
                                    type="button"
                                    @click="previewOpen = false"
                                    class="grid size-10 shrink-0 place-items-center rounded-xl text-slate-400 transition hover:bg-slate-100 hover:text-slate-700"
                                    aria-label="بستن"
                                >

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.8"
                                        stroke="currentColor"
                                        class="size-5"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M6 6l12 12M18 6 6 18"
                                        />
                                    </svg>

                                </button>

                            </div>

                        </div>


                        {{-- Modal body --}}
                        <div
                            class="max-h-[70vh] space-y-4 overflow-y-auto p-5 sm:p-7"
                        >

                            {{-- Customer preview --}}
                            <section
                                class="rounded-2xl border border-slate-200 bg-slate-50/70 p-4 sm:p-5"
                            >

                                <div
                                    class="mb-4 flex items-center justify-between gap-3"
                                >

                                    <div>

                                        <h4 class="text-sm font-black text-slate-950">
                                            اطلاعات متقاضی
                                        </h4>

                                        <p class="mt-1 text-xs text-slate-500">
                                            اطلاعات هویتی و تماس
                                        </p>

                                    </div>

                                </div>


                                <div class="grid gap-3 sm:grid-cols-2">

                                    {{-- Name --}}
                                    <div
                                        class="rounded-xl bg-white p-3.5"
                                    >
                                        <p class="text-[11px] font-bold text-slate-400">
                                            نام و نام خانوادگی
                                        </p>

                                        <p
                                            class="mt-1.5 break-words text-sm font-black text-slate-900"
                                            x-text="fullName || 'ثبت نشده'"
                                        ></p>
                                    </div>


                                    {{-- Father --}}
                                    <div
                                        class="rounded-xl bg-white p-3.5"
                                    >
                                        <p class="text-[11px] font-bold text-slate-400">
                                            نام پدر
                                        </p>

                                        <p
                                            class="mt-1.5 break-words text-sm font-black text-slate-900"
                                            x-text="fatherName || 'ثبت نشده'"
                                        ></p>
                                    </div>


                                    {{-- National code --}}
                                    <div
                                        class="rounded-xl bg-white p-3.5"
                                    >
                                        <p class="text-[11px] font-bold text-slate-400">
                                            کد ملی
                                        </p>

                                        <p
                                            dir="ltr"
                                            class="mt-1.5 text-sm font-black text-slate-900"
                                            x-text="nationalCode || 'ثبت نشده'"
                                        ></p>
                                    </div>


                                    {{-- Birth certificate --}}
                                    <div
                                        class="rounded-xl bg-white p-3.5"
                                    >
                                        <p class="text-[11px] font-bold text-slate-400">
                                            شماره شناسنامه
                                        </p>

                                        <p
                                            dir="ltr"
                                            class="mt-1.5 text-sm font-black text-slate-900"
                                            x-text="birthCertificate || 'ثبت نشده'"
                                        ></p>
                                    </div>


                                    {{-- Birth date --}}
                                    <div
                                        class="rounded-xl bg-white p-3.5"
                                    >
                                        <p class="text-[11px] font-bold text-slate-400">
                                            تاریخ تولد
                                        </p>

                                        <p
                                            class="mt-1.5 text-sm font-black text-slate-900"
                                            dir="ltr"
                                            x-text="birthDateText || 'ثبت نشده'"
                                        ></p>
                                    </div>


                                    {{-- Mobile --}}
                                    <div
                                        class="rounded-xl bg-white p-3.5"
                                    >
                                        <p class="text-[11px] font-bold text-slate-400">
                                            شماره موبایل
                                        </p>

                                        <p
                                            dir="ltr"
                                            class="mt-1.5 text-sm font-black text-slate-900"
                                            x-text="mobile || 'ثبت نشده'"
                                        ></p>
                                    </div>


                                    {{-- Landline --}}
                                    <div
                                        class="rounded-xl bg-white p-3.5 sm:col-span-2"
                                    >
                                        <p class="text-[11px] font-bold text-slate-400">
                                            شماره ثابت
                                        </p>

                                        <p
                                            dir="ltr"
                                            class="mt-1.5 text-sm font-black text-slate-900"
                                            x-text="landline || 'ثبت نشده'"
                                        ></p>
                                    </div>

                                </div>

                            </section>


                            {{-- Tariff preview --}}
                            <section
                                class="rounded-2xl border border-primary-100 bg-primary-50/50 p-4 sm:p-5"
                            >

                                <div
                                    class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between"
                                >

                                    <div class="min-w-0">

                                        <p class="text-xs font-bold text-primary-700">
                                            سرویس انتخاب‌شده
                                        </p>

                                        <h4
                                            class="mt-1 break-words text-base font-black text-slate-950"
                                            x-text="tariffName || 'انتخاب نشده'"
                                        ></h4>

                                        <div class="mt-3 flex flex-wrap gap-2">

                                            <span
                                                class="rounded-full bg-white px-3 py-1.5 text-xs font-bold text-slate-600 shadow-sm"
                                            >
                                                سرعت:
                                                <span
                                                    class="mr-1 font-black text-slate-900"
                                                    x-text="tariffSpeed ? tariffSpeed + ' Mbps' : '—'"
                                                ></span>
                                            </span>

                                            <span
                                                x-show="tariffDuration"
                                                class="rounded-full bg-white px-3 py-1.5 text-xs font-bold text-slate-600 shadow-sm"
                                            >
                                                مدت:
                                                <span
                                                    class="mr-1 font-black text-slate-900"
                                                    x-text="tariffDuration + ' روز'"
                                                ></span>
                                            </span>

                                        </div>

                                    </div>


                                    <div
                                        class="shrink-0 rounded-2xl bg-white px-4 py-3 shadow-sm"
                                    >

                                        <p class="text-[11px] font-bold text-slate-400">
                                            قیمت تعرفه
                                        </p>

                                        <p
                                            class="mt-1 text-lg font-black text-primary-700"
                                        >
                                            <span
                                                x-text="tariffPrice ? formatPrice(tariffPrice) : '—'"
                                            ></span>

                                            <span class="text-xs">
                                                تومان
                                            </span>
                                        </p>

                                    </div>

                                </div>


                                {{-- Description --}}
                                <div
                                    x-show="tariffDescription"
                                    class="mt-4 rounded-xl bg-white p-4"
                                >

                                    <p class="text-[11px] font-bold text-slate-400">
                                        توضیحات تعرفه
                                    </p>

                                    <p
                                        class="mt-2 whitespace-pre-line text-sm leading-7 text-slate-600"
                                        x-text="tariffDescription"
                                    ></p>

                                </div>


                                {{-- Features --}}
                                <div
                                    x-show="tariffFeatures.length"
                                    class="mt-4"
                                >

                                    <p class="text-[11px] font-bold text-slate-400">
                                        ویژگی‌های تعرفه
                                    </p>

                                    <div class="mt-2 flex flex-wrap gap-2">

                                        <template
                                            x-for="feature in tariffFeatures"
                                            :key="feature"
                                        >

                                            <span
                                                class="inline-flex items-center gap-1 rounded-full bg-white px-3 py-1.5 text-xs font-bold text-slate-600 shadow-sm"
                                            >

                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="2"
                                                    stroke="currentColor"
                                                    class="size-3.5 text-emerald-600"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="m5 12 4 4L19 7"
                                                    />
                                                </svg>

                                                <span x-text="feature"></span>

                                            </span>

                                        </template>

                                    </div>

                                </div>

                            </section>


                            {{-- Modem preview --}}
                            <section
                                class="rounded-2xl border border-slate-200 bg-white p-4 sm:p-5"
                            >

                                <div
                                    class="flex items-center justify-between gap-4"
                                >

                                    <div>

                                        <p class="text-xs font-bold text-slate-400">
                                            مودم
                                        </p>

                                        <p
                                            class="mt-1 text-sm font-black text-slate-900"
                                            x-text="
                                                hasModem
                                                    ? 'مودم شخصی'
                                                    : 'نیازمند دریافت مودم'
                                            "
                                        ></p>

                                    </div>


                                    <span
                                        class="rounded-full px-3 py-1.5 text-xs font-black"
                                        :class="
                                            hasModem
                                                ? 'bg-emerald-50 text-emerald-700'
                                                : 'bg-amber-50 text-amber-700'
                                        "
                                        x-text="
                                            hasModem
                                                ? 'مودم دارم'
                                                : 'مودم لازم است'
                                        "
                                    ></span>

                                </div>

                            </section>


                            {{-- Address preview --}}
                            <section
                                class="rounded-2xl border border-slate-200 bg-white p-4 sm:p-5"
                            >

                                <div class="mb-4">

                                    <h4 class="text-sm font-black text-slate-950">
                                        آدرس محل نصب
                                    </h4>

                                </div>


                                <div class="grid gap-3 sm:grid-cols-2">

                                    <div
                                        class="rounded-xl bg-slate-50 p-3.5"
                                    >

                                        <p class="text-[11px] font-bold text-slate-400">
                                            استان
                                        </p>

                                        <p
                                            class="mt-1.5 text-sm font-black text-slate-900"
                                            x-text="province || 'ثبت نشده'"
                                        ></p>

                                    </div>


                                    <div
                                        class="rounded-xl bg-slate-50 p-3.5"
                                    >

                                        <p class="text-[11px] font-bold text-slate-400">
                                            شهر
                                        </p>

                                        <p
                                            class="mt-1.5 text-sm font-black text-slate-900"
                                            x-text="city || 'ثبت نشده'"
                                        ></p>

                                    </div>


                                    <div
                                        class="rounded-xl bg-slate-50 p-3.5 sm:col-span-2"
                                    >

                                        <p class="text-[11px] font-bold text-slate-400">
                                            آدرس
                                        </p>

                                        <p
                                            class="mt-1.5 break-words text-sm leading-7 text-slate-700"
                                            x-text="address || 'ثبت نشده'"
                                        ></p>

                                    </div>


                                    <div
                                        class="rounded-xl bg-slate-50 p-3.5"
                                    >

                                        <p class="text-[11px] font-bold text-slate-400">
                                            کد پستی
                                        </p>

                                        <p
                                            dir="ltr"
                                            class="mt-1.5 text-sm font-black text-slate-900"
                                            x-text="postalCode || 'ثبت نشده'"
                                        ></p>

                                    </div>

                                </div>

                            </section>


                            {{-- Note preview --}}
                            <section
                                x-show="customerNote"
                                class="rounded-2xl border border-slate-200 bg-slate-50/70 p-4 sm:p-5"
                            >

                                <p class="text-xs font-bold text-slate-400">
                                    توضیحات مشتری
                                </p>

                                <p
                                    class="mt-2 whitespace-pre-line break-words text-sm leading-7 text-slate-700"
                                    x-text="customerNote"
                                ></p>

                            </section>


                            {{-- Price summary --}}
                            <section
                                class="rounded-2xl bg-slate-950 p-5 text-white"
                            >

                                <div
                                    class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between"
                                >

                                    <div>

                                        <p class="text-sm font-bold text-slate-300">
                                            قیمت پایه سرویس
                                        </p>

                                        <p class="mt-1 text-xs leading-6 text-slate-400">
                                            مبلغ دقیق نهایی هنگام ثبت درخواست توسط سیستم محاسبه می‌شود.
                                        </p>

                                    </div>


                                    <div class="text-right sm:text-left">

                                        <p
                                            class="text-2xl font-black tracking-tight"
                                            x-text="
                                                tariffPrice
                                                    ? formatPrice(tariffPrice) + ' تومان'
                                                    : '—'
                                            "
                                        ></p>

                                        <p
                                            x-show="!hasModem"
                                            class="mt-1 text-[11px] text-slate-400"
                                        >
                                            هزینه مودم در صورت تخصیص، جداگانه محاسبه می‌شود.
                                        </p>

                                    </div>

                                </div>

                            </section>

                        </div>


                        {{-- Modal footer --}}
                        <div
                            class="border-t border-slate-100 bg-white px-5 py-4 sm:px-7"
                        >

                            <div
                                class="flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-between"
                            >

                                <button
                                    type="button"
                                    @click="previewOpen = false"
                                    class="inline-flex min-h-12 items-center justify-center rounded-xl border border-slate-200 px-5 text-sm font-black text-slate-700 transition hover:bg-slate-50"
                                >
                                    بازگشت و ویرایش
                                </button>


                                <button
                                    type="button"
                                    @click="confirmSubmit()"
                                    class="inline-flex min-h-12 items-center justify-center gap-2 rounded-xl bg-primary-600 px-6 text-sm font-black text-white shadow-sm transition hover:bg-primary-700 focus-visible:ring-4 focus-visible:ring-primary-100 active:scale-[0.99]"
                                >

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

                                    تأیید و ثبت درخواست

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </form>

    </div>


    {{-- ================================================================
         Alpine component
    ================================================================= --}}
    <script>
        function fiberRequestForm() {
            return {
                previewOpen: false,

                birthYear: @js($birthYear),
                birthMonth: @js($birthMonth),
                birthDay: @js($birthDay),

                tariffId: @js(old('tariff_id', '')),
                hasModem: @js((bool) old('has_modem')),

            fullName: '',
                fatherName: '',
                nationalCode: '',
                birthCertificate: '',
                birthDateText: '',
                mobile: '',
                landline: '',

                province: '',
                city: '',
                address: '',
                postalCode: '',

                customerNote: '',

                tariffName: '',
                tariffSpeed: '',
                tariffPrice: '',
                tariffDuration: '',
                tariffDescription: '',
                tariffFeatures: [],

                normalizeDigits(value) {
                if (value === null || value === undefined) {
                    return '';
                }

                return String(value)
                    .replace(/[۰-۹]/g, digit => {
                        return '۰۱۲۳۴۵۶۷۸۹'.indexOf(digit);
                    })
                    .replace(/[٠-٩]/g, digit => {
                        return '٠١٢٣٤٥٦٧٨٩'.indexOf(digit);
                    });
            },

            formatPrice(value) {
                if (
                    value === null
                    || value === undefined
                    || value === ''
                ) {
                    return '';
                }

                const number = Number(
                    this.normalizeDigits(value)
                );

                if (Number.isNaN(number)) {
                    return '';
                }

                return new Intl.NumberFormat('en-US')
                    .format(number);
            },

            getInputValue(id) {
                const element = document.getElementById(id);

                return element
                    ? element.value.trim()
                    : '';
            },

            getSelectedTariff() {
                const select =
                    document.getElementById('tariff_id');

                if (!select) {
                    return null;
                }

                const option =
                    select.options[select.selectedIndex];

                if (!option || !option.value) {
                    return null;
                }

                return option;
            },

            loadTariffPreview() {
                const option = this.getSelectedTariff();

                if (!option) {
                    this.tariffName = '';
                    this.tariffSpeed = '';
                    this.tariffPrice = '';
                    this.tariffDuration = '';
                    this.tariffDescription = '';
                    this.tariffFeatures = [];

                    return;
                }

                this.tariffName =
                    option.dataset.name || option.text.trim();

                this.tariffSpeed =
                    option.dataset.speed || '';

                this.tariffPrice =
                    option.dataset.price || '';

                this.tariffDuration =
                    option.dataset.duration || '';

                this.tariffDescription =
                    option.dataset.description || '';

                try {
                    const parsed =
                        JSON.parse(
                            option.dataset.features || '[]'
                        );

                    this.tariffFeatures =
                        Array.isArray(parsed)
                            ? parsed
                            : [];
                } catch (error) {
                    this.tariffFeatures = [];
                }
            },

            loadFormPreview() {
                this.fullName =
                    this.getInputValue('full_name');

                this.fatherName =
                    this.getInputValue('father_name');

                this.nationalCode =
                    this.normalizeDigits(
                        this.getInputValue('national_code')
                    );

                this.birthCertificate =
                    this.normalizeDigits(
                        this.getInputValue(
                            'birth_certificate_number'
                        )
                    );

                this.mobile =
                    this.normalizeDigits(
                        this.getInputValue('mobile')
                    );

                this.landline =
                    this.normalizeDigits(
                        this.getInputValue('landline')
                    );

                this.province =
                    this.getInputValue('province');

                this.city =
                    this.getInputValue('city');

                this.address =
                    this.getInputValue('address');

                this.postalCode =
                    this.normalizeDigits(
                        this.getInputValue('postal_code')
                    );

                this.customerNote =
                    this.getInputValue('customer_note');

                this.birthYear =
                    this.normalizeDigits(
                        document.getElementById(
                            'birth_year'
                        )?.value || ''
                    );

                this.birthMonth =
                    this.normalizeDigits(
                        document.getElementById(
                            'birth_month'
                        )?.value || ''
                    );

                this.birthDay =
                    this.normalizeDigits(
                        document.getElementById(
                            'birth_day'
                        )?.value || ''
                    );

                if (
                    this.birthYear
                    && this.birthMonth
                    && this.birthDay
                ) {
                    const monthNames = [
                        '',
                        'فروردین',
                        'اردیبهشت',
                        'خرداد',
                        'تیر',
                        'مرداد',
                        'شهریور',
                        'مهر',
                        'آبان',
                        'آذر',
                        'دی',
                        'بهمن',
                        'اسفند',
                    ];

                    const monthName =
                        monthNames[
                            Number(this.birthMonth)
                            ] || '';

                    this.birthDateText =
                        `${this.birthYear} / ${monthName} / ${this.birthDay}`;
                } else {
                    this.birthDateText = '';
                }

                this.hasModem =
                    document.getElementById(
                        'has_modem'
                    )?.checked || false;

                this.loadTariffPreview();
            },

            validateBeforePreview() {
                const form =
                    document.querySelector('form');

                if (!form) {
                    return false;
                }

                /*
                 * Use browser native validation first.
                 */
                if (!form.checkValidity()) {
                    form.reportValidity();

                    return false;
                }

                /*
                 * A tariff must be selected.
                 */
                if (!this.tariffId) {
                    alert('لطفاً یک تعرفه انتخاب کنید.');

                    return false;
                }

                /*
                 * Jalali date pieces must be complete.
                 */
                if (
                    !this.birthYear
                    || !this.birthMonth
                    || !this.birthDay
                ) {
                    alert('لطفاً تاریخ تولد را کامل وارد کنید.');

                    return false;
                }

                return true;
            },

            openPreview() {
                this.loadFormPreview();

                if (!this.validateBeforePreview()) {
                    return;
                }

                this.previewOpen = true;

                document.body.classList.add(
                    'overflow-hidden'
                );
            },

            confirmSubmit() {
                this.previewOpen = false;

                document.body.classList.remove(
                    'overflow-hidden'
                );

                this.$nextTick(() => {
                    const form =
                        document.querySelector('form');

                    if (form) {
                        form.submit();
                    }
                });
            },

            submitForm(event) {
                /*
                 * The form is intentionally blocked from direct submit.
                 * User must confirm from preview modal.
                 */
                this.openPreview();
            },

            init() {
                this.loadTariffPreview();

                const tariffSelect =
                    document.getElementById(
                        'tariff_id'
                    );

                if (tariffSelect) {
                    tariffSelect.addEventListener(
                        'change',
                        () => {
                            this.tariffId =
                                tariffSelect.value;

                            this.loadTariffPreview();
                        }
                    );
                }

                window.addEventListener(
                    'beforeunload',
                    () => {
                        document.body.classList.remove(
                            'overflow-hidden'
                        );
                    }
                );
            }
        };
        }
    </script>

</x-layouts.account>
