<x-layouts.account
    title="ثبت درخواست | فیبر نوری"
    heading="ثبت درخواست جدید"
>

    @php
        $oldBirthDate = old('birth_date');

        $oldBirthYear = '';
        $oldBirthMonth = '';
        $oldBirthDay = '';

        if ($oldBirthDate && preg_match('/^(\d{4})\/(\d{1,2})\/(\d{1,2})$/', $oldBirthDate, $matches)) {
            $oldBirthYear = $matches[1];
            $oldBirthMonth = $matches[2];
            $oldBirthDay = $matches[3];
        }

        $tariffData = $tariffs->map(function ($tariff) {
            return [
                'id' => (int) $tariff->id,
                'name' => (string) $tariff->name,
                'speed' => (int) $tariff->speed_mbps,
                'price' => (int) $tariff->price,
                'duration' => (int) $tariff->duration_days,
                'description' => (string) ($tariff->description ?? ''),
                'features' => is_array($tariff->features ?? null)
                    ? $tariff->features
                    : [],
            ];
        })->values();
    @endphp


    <div
        class="mx-auto w-full max-w-4xl space-y-6"
        x-data="fiberRequestForm()"
    >

        <x-flash />


        {{-- Validation summary --}}
        @if ($errors->any())

            <section class="rounded-3xl border border-red-200 bg-red-50 p-5">

                <div class="flex items-start gap-3">

                    <div class="grid size-10 shrink-0 place-items-center rounded-xl bg-white text-red-600">
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
                                d="M12 9v4m0 4h.01M10.3 4.8 2.9 17a2 2 0 0 0 1.73 3h14.74a2 2 0 0 0 1.73-3L13.73 4.8a2 2 0 0 0-3.46 0Z"
                            />
                        </svg>
                    </div>

                    <div class="min-w-0">

                        <h3 class="text-sm font-black text-red-800">
                            اطلاعات واردشده را بررسی کنید.
                        </h3>

                        <ul class="mt-2 space-y-1 text-xs leading-6 text-red-700">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>

                </div>

            </section>

        @endif


        {{-- Header --}}
        <section>

            <span class="inline-flex rounded-full bg-primary-50 px-3 py-1.5 text-xs font-black text-primary-700">
                درخواست اتصال
            </span>

            <h2 class="mt-3 text-2xl font-black tracking-tight text-slate-950 sm:text-3xl">
                ثبت درخواست فیبر نوری
            </h2>

            <p class="mt-2 text-sm leading-8 text-slate-500">
                اطلاعات خود را با دقت وارد کنید تا درخواست شما سریع‌تر بررسی شود.
            </p>

        </section>


        <form
            x-ref="form"
            method="POST"
            action="{{ route('account.requests.store') }}"
            class="space-y-6"
            @submit.prevent="submitForm()"
        >

            @csrf


            {{-- Customer --}}
            <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-5 py-5 sm:px-7">

                    <h3 class="text-base font-black text-slate-950">
                        اطلاعات متقاضی
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        اطلاعات هویتی و تماس خود را وارد کنید.
                    </p>

                </div>


                <div class="grid gap-5 p-5 sm:grid-cols-2 sm:p-7">

                    <x-input
                        name="full_name"
                        label="نام و نام خانوادگی"
                        :value="old('full_name', auth()->user()->name)"
                        autocomplete="name"
                        required
                    />

                    <x-input
                        name="father_name"
                        label="نام پدر"
                        :value="old('father_name')"
                        required
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
                        name="birth_certificate_number"
                        label="شماره شناسنامه"
                        :value="old('birth_certificate_number')"
                        inputmode="numeric"
                        maxlength="30"
                        required
                    />


                    {{-- Birth date --}}
                    <div class="space-y-2 sm:col-span-2">

                        <label class="block text-sm font-bold text-slate-800">
                            تاریخ تولد
                            <span class="text-red-500">*</span>
                        </label>


                        <div class="grid gap-3 sm:grid-cols-3">

                            {{-- Day --}}
                            <div>

                                <label
                                    for="birth_day"
                                    class="mb-1.5 block text-xs font-bold text-slate-500"
                                >
                                    روز
                                </label>

                                <select
                                    id="birth_day"
                                    name="birth_day"
                                    x-model="birthDay"
                                    required
                                    class="block min-h-12 w-full rounded-xl border border-slate-200 bg-white px-4 text-sm text-slate-900 shadow-sm outline-none transition focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
                                >
                                    <option value="">
                                        روز
                                    </option>

                                    @for ($day = 1; $day <= 31; $day++)
                                        <option value="{{ $day }}">
                                            {{ $day }}
                                        </option>
                                    @endfor

                                </select>

                            </div>


                            {{-- Month --}}
                            <div>

                                <label
                                    for="birth_month"
                                    class="mb-1.5 block text-xs font-bold text-slate-500"
                                >
                                    ماه
                                </label>

                                <select
                                    id="birth_month"
                                    name="birth_month"
                                    x-model="birthMonth"
                                    required
                                    class="block min-h-12 w-full rounded-xl border border-slate-200 bg-white px-4 text-sm text-slate-900 shadow-sm outline-none transition focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
                                >
                                    <option value="">
                                        ماه
                                    </option>

                                    <option value="1">فروردین</option>
                                    <option value="2">اردیبهشت</option>
                                    <option value="3">خرداد</option>
                                    <option value="4">تیر</option>
                                    <option value="5">مرداد</option>
                                    <option value="6">شهریور</option>
                                    <option value="7">مهر</option>
                                    <option value="8">آبان</option>
                                    <option value="9">آذر</option>
                                    <option value="10">دی</option>
                                    <option value="11">بهمن</option>
                                    <option value="12">اسفند</option>

                                </select>

                            </div>


                            {{-- Year --}}
                            <div>

                                <label
                                    for="birth_year"
                                    class="mb-1.5 block text-xs font-bold text-slate-500"
                                >
                                    سال
                                </label>

                                <input
                                    id="birth_year"
                                    type="text"
                                    name="birth_year"
                                    x-model="birthYear"
                                    value="{{ $oldBirthYear }}"
                                    inputmode="numeric"
                                    maxlength="4"
                                    required
                                    class="block min-h-12 w-full rounded-xl border border-slate-200 bg-white px-4 text-sm text-slate-900 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
                                    placeholder="مثلاً 1378"
                                />

                            </div>

                        </div>


                        @error('birth_date')
                        <p class="text-xs font-medium leading-5 text-red-600">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>


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


            {{-- Service --}}
            <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-5 py-5 sm:px-7">

                    <h3 class="text-base font-black text-slate-950">
                        انتخاب سرویس
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        تعرفه موردنظر خود را انتخاب کنید.
                    </p>

                </div>


                <div class="space-y-5 p-5 sm:p-7">


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
                            x-ref="tariff"
                            id="tariff_id"
                            name="tariff_id"
                            x-model="selectedTariffId"
                            required
                            class="block min-h-12 w-full rounded-xl border border-slate-200 bg-white px-4 text-sm text-slate-900 shadow-sm outline-none transition hover:border-slate-300 focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
                        >

                            <option value="">
                                انتخاب تعرفه
                            </option>

                            @foreach ($tariffs as $tariff)

                                <option value="{{ $tariff->id }}">
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

                    </div>


                    {{-- LIVE Tariff Preview --}}
                    <div
                        x-show="selectedTariff"
                        x-cloak
                        class="overflow-hidden rounded-2xl border border-primary-100 bg-primary-50/50"
                    >

                        <div class="border-b border-primary-100 px-5 py-4">

                            <div class="flex items-center justify-between gap-4">

                                <div>

                                    <p class="text-xs font-bold text-primary-600">
                                        تعرفه انتخاب‌شده
                                    </p>

                                    <h4
                                        class="mt-1 text-base font-black text-slate-950"
                                        x-text="selectedTariff?.name || '—'"
                                    ></h4>

                                </div>


                                <div class="grid size-11 shrink-0 place-items-center rounded-xl bg-white text-primary-600 shadow-sm">

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
                                            d="M13 10V3L4 14h7v7l9-11h-7Z"
                                        />
                                    </svg>

                                </div>

                            </div>

                        </div>


                        <div class="grid gap-4 p-5 sm:grid-cols-3">

                            <div class="rounded-xl bg-white p-4">

                                <p class="text-xs font-bold text-slate-400">
                                    سرعت
                                </p>

                                <p class="mt-2 text-sm font-black text-slate-900">
                                    <span x-text="formatNumber(selectedTariff?.speed || 0)"></span>
                                    Mbps
                                </p>

                            </div>


                            <div class="rounded-xl bg-white p-4">

                                <p class="text-xs font-bold text-slate-400">
                                    مدت سرویس
                                </p>

                                <p class="mt-2 text-sm font-black text-slate-900">
                                    <span x-text="formatNumber(selectedTariff?.duration || 0)"></span>
                                    روز
                                </p>

                            </div>


                            <div class="rounded-xl bg-white p-4">

                                <p class="text-xs font-bold text-slate-400">
                                    قیمت تعرفه
                                </p>

                                <p class="mt-2 text-sm font-black text-slate-900">
                                    <span x-text="formatNumber(selectedTariff?.price || 0)"></span>
                                    تومان
                                </p>

                            </div>

                        </div>


                        <div
                            x-show="selectedTariff?.description"
                            class="px-5 pb-5"
                        >

                            <div class="rounded-xl bg-white p-4">

                                <p class="text-xs font-bold text-slate-400">
                                    توضیحات
                                </p>

                                <p
                                    class="mt-2 text-sm leading-7 text-slate-600"
                                    x-text="selectedTariff?.description || ''"
                                ></p>

                            </div>

                        </div>


                        <div
                            x-show="selectedTariff?.features && selectedTariff.features.length"
                            class="px-5 pb-5"
                        >

                            <div class="rounded-xl bg-white p-4">

                                <p class="text-xs font-bold text-slate-400">
                                    امکانات سرویس
                                </p>

                                <div class="mt-3 flex flex-wrap gap-2">

                                    <template
                                        x-for="feature in (selectedTariff?.features || [])"
                                        :key="feature"
                                    >

                                        <span
                                            class="rounded-full bg-slate-100 px-3 py-1.5 text-xs font-bold text-slate-700"
                                            x-text="feature"
                                        ></span>

                                    </template>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Modem --}}
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">

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

                                <span class="block text-sm font-black text-slate-900">
                                    مودم دارم و نیازی به دریافت مودم ندارم
                                </span>

                                <span class="mt-1 block text-xs leading-6 text-slate-500">
                                    در صورت انتخاب این گزینه، برای شما مودم ثبت نمی‌شود.
                                </span>

                            </span>

                        </label>

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


            {{-- Note --}}
            <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-5 py-5 sm:px-7">

                    <h3 class="text-base font-black text-slate-950">
                        توضیحات
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        در صورت نیاز توضیحات تکمیلی خود را وارد کنید.
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

                    مشاهده پیش‌نمایش و ثبت

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
                            d="M13.5 4.5 20 11l-6.5 6.5M20 11H4"
                        />
                    </svg>

                </button>

            </div>

        </form>


        {{-- Preview Modal --}}
        <div
            x-show="previewOpen"
            x-cloak
            x-transition.opacity
            class="fixed inset-0 z-[100] flex items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm"
            @keydown.escape.window="previewOpen = false"
        >

            <div
                x-show="previewOpen"
                x-transition
                @click.outside="previewOpen = false"
                class="max-h-[90vh] w-full max-w-2xl overflow-y-auto rounded-3xl bg-white shadow-2xl"
            >

                {{-- Modal Header --}}
                <div class="sticky top-0 z-10 border-b border-slate-100 bg-white px-5 py-5 sm:px-7">

                    <div class="flex items-start justify-between gap-4">

                        <div>

                            <span class="inline-flex rounded-full bg-primary-50 px-3 py-1.5 text-xs font-black text-primary-700">
                                پیش‌نمایش درخواست
                            </span>

                            <h3 class="mt-2 text-xl font-black text-slate-950">
                                بررسی نهایی اطلاعات
                            </h3>

                            <p class="mt-1 text-sm text-slate-500">
                                قبل از ثبت، اطلاعات واردشده را بررسی کنید.
                            </p>

                        </div>


                        <button
                            type="button"
                            @click="previewOpen = false"
                            class="grid size-10 shrink-0 place-items-center rounded-xl border border-slate-200 text-slate-500 transition hover:bg-slate-50"
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
                                    d="m7 7 10 10M17 7 7 17"
                                />
                            </svg>

                        </button>

                    </div>

                </div>


                <div class="space-y-5 p-5 sm:p-7">


                    {{-- Customer preview --}}
                    <section class="rounded-2xl border border-slate-200 p-5">

                        <h4 class="text-sm font-black text-slate-950">
                            اطلاعات متقاضی
                        </h4>

                        <div class="mt-4 grid gap-3 sm:grid-cols-2">

                            <div>
                                <p class="text-xs text-slate-400">
                                    نام و نام خانوادگی
                                </p>
                                <p
                                    class="mt-1 text-sm font-black text-slate-900"
                                    x-text="value('full_name')"
                                ></p>
                            </div>

                            <div>
                                <p class="text-xs text-slate-400">
                                    نام پدر
                                </p>
                                <p
                                    class="mt-1 text-sm font-black text-slate-900"
                                    x-text="value('father_name')"
                                ></p>
                            </div>

                            <div>
                                <p class="text-xs text-slate-400">
                                    کد ملی
                                </p>
                                <p
                                    dir="ltr"
                                    class="mt-1 text-sm font-black text-slate-900"
                                    x-text="value('national_code')"
                                ></p>
                            </div>

                            <div>
                                <p class="text-xs text-slate-400">
                                    شماره شناسنامه
                                </p>
                                <p
                                    dir="ltr"
                                    class="mt-1 text-sm font-black text-slate-900"
                                    x-text="value('birth_certificate_number')"
                                ></p>
                            </div>

                            <div>
                                <p class="text-xs text-slate-400">
                                    تاریخ تولد
                                </p>
                                <p
                                    dir="ltr"
                                    class="mt-1 text-sm font-black text-slate-900"
                                    x-text="formattedBirthDate()"
                                ></p>
                            </div>

                            <div>
                                <p class="text-xs text-slate-400">
                                    موبایل
                                </p>
                                <p
                                    dir="ltr"
                                    class="mt-1 text-sm font-black text-slate-900"
                                    x-text="value('mobile')"
                                ></p>
                            </div>

                        </div>

                    </section>


                    {{-- Tariff preview --}}
                    <section class="rounded-2xl border border-primary-100 bg-primary-50/40 p-5">

                        <div class="flex items-start justify-between gap-4">

                            <div>

                                <p class="text-xs font-bold text-primary-600">
                                    تعرفه انتخاب‌شده
                                </p>

                                <h4
                                    class="mt-1 text-lg font-black text-slate-950"
                                    x-text="selectedTariff?.name || 'تعرفه‌ای انتخاب نشده'"
                                ></h4>

                            </div>

                            <div class="shrink-0 rounded-xl bg-white px-3 py-2 text-left shadow-sm">

                                <p class="text-[11px] font-bold text-slate-400">
                                    قیمت تعرفه
                                </p>

                                <p class="mt-1 text-sm font-black text-slate-900">

                                    <span
                                        x-text="formatNumber(selectedTariff?.price || 0)"
                                    ></span>

                                    تومان

                                </p>

                            </div>

                        </div>


                        <div class="mt-4 grid gap-3 sm:grid-cols-2">

                            <div class="rounded-xl bg-white p-4">

                                <p class="text-xs font-bold text-slate-400">
                                    سرعت
                                </p>

                                <p class="mt-1 text-sm font-black text-slate-900">

                                    <span
                                        x-text="formatNumber(selectedTariff?.speed || 0)"
                                    ></span>

                                    Mbps

                                </p>

                            </div>


                            <div class="rounded-xl bg-white p-4">

                                <p class="text-xs font-bold text-slate-400">
                                    مدت
                                </p>

                                <p class="mt-1 text-sm font-black text-slate-900">

                                    <span
                                        x-text="formatNumber(selectedTariff?.duration || 0)"
                                    ></span>

                                    روز

                                </p>

                            </div>

                        </div>


                        <div
                            x-show="selectedTariff?.description"
                            class="mt-3 rounded-xl bg-white p-4"
                        >

                            <p class="text-xs font-bold text-slate-400">
                                توضیحات تعرفه
                            </p>

                            <p
                                class="mt-1 text-sm leading-7 text-slate-600"
                                x-text="selectedTariff?.description || ''"
                            ></p>

                        </div>


                        <div
                            x-show="selectedTariff?.features?.length"
                            class="mt-3 rounded-xl bg-white p-4"
                        >

                            <p class="text-xs font-bold text-slate-400">
                                امکانات
                            </p>

                            <div class="mt-3 flex flex-wrap gap-2">

                                <template
                                    x-for="feature in (selectedTariff?.features || [])"
                                    :key="feature"
                                >

                                    <span
                                        class="rounded-full bg-slate-100 px-3 py-1.5 text-xs font-bold text-slate-700"
                                        x-text="feature"
                                    ></span>

                                </template>

                            </div>

                        </div>

                    </section>


                    {{-- Modem preview --}}
                    <section class="rounded-2xl border border-slate-200 p-5">

                        <h4 class="text-sm font-black text-slate-950">
                            مودم
                        </h4>

                        <p
                            class="mt-2 text-sm font-bold text-slate-700"
                            x-text="hasModem
                                ? 'مودم شخصی دارم و نیازی به مودم ندارم'
                                : 'درخواست دریافت مودم دارم'"
                        ></p>

                    </section>


                    {{-- Address preview --}}
                    <section class="rounded-2xl border border-slate-200 p-5">

                        <h4 class="text-sm font-black text-slate-950">
                            آدرس محل نصب
                        </h4>

                        <div class="mt-4 space-y-3">

                            <div class="grid gap-3 sm:grid-cols-2">

                                <div>
                                    <p class="text-xs text-slate-400">
                                        استان
                                    </p>
                                    <p
                                        class="mt-1 text-sm font-black text-slate-900"
                                        x-text="value('province')"
                                    ></p>
                                </div>

                                <div>
                                    <p class="text-xs text-slate-400">
                                        شهر
                                    </p>
                                    <p
                                        class="mt-1 text-sm font-black text-slate-900"
                                        x-text="value('city')"
                                    ></p>
                                </div>

                            </div>


                            <div>
                                <p class="text-xs text-slate-400">
                                    آدرس
                                </p>
                                <p
                                    class="mt-1 break-words text-sm leading-7 text-slate-700"
                                    x-text="value('address')"
                                ></p>
                            </div>


                            <div>
                                <p class="text-xs text-slate-400">
                                    کد پستی
                                </p>
                                <p
                                    dir="ltr"
                                    class="mt-1 text-sm font-black text-slate-900"
                                    x-text="value('postal_code')"
                                ></p>
                            </div>

                        </div>

                    </section>


                    {{-- Note preview --}}
                    <section
                        x-show="value('customer_note')"
                        class="rounded-2xl border border-slate-200 p-5"
                    >

                        <h4 class="text-sm font-black text-slate-950">
                            توضیحات شما
                        </h4>

                        <p
                            class="mt-2 break-words text-sm leading-7 text-slate-600"
                            x-text="value('customer_note')"
                        ></p>

                    </section>


                    {{-- Price note --}}
                    <div class="rounded-2xl border border-amber-200 bg-amber-50 p-4">

                        <div class="flex items-start gap-3">

                            <div class="grid size-9 shrink-0 place-items-center rounded-lg bg-white text-amber-600">

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
                                        d="M12 9v4m0 4h.01M10.3 4.8 2.9 17a2 2 0 0 0 1.73 3h14.74a2 2 0 0 0 1.73-3L13.73 4.8a2 2 0 0 0-3.46 0Z"
                                    />
                                </svg>

                            </div>

                            <p class="text-xs leading-6 text-amber-800">
                                مبلغ نهایی پس از ثبت درخواست و محاسبه وضعیت مودم توسط سامانه مشخص می‌شود.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Modal footer --}}
                <div class="sticky bottom-0 border-t border-slate-100 bg-white p-5 sm:px-7">

                    <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

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
                            class="inline-flex min-h-12 items-center justify-center rounded-xl bg-primary-600 px-6 text-sm font-black text-white shadow-sm transition hover:bg-primary-700"
                        >
                            تأیید و ثبت درخواست
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Alpine --}}
    <script>
        function fiberRequestForm() {
            return {
                previewOpen: false,

                selectedTariffId: @js((string) old('tariff_id', '')),

            selectedTariff: null,

                hasModem: @js((bool) old('has_modem')),

            birthYear: @js($oldBirthYear),

            birthMonth: @js($oldBirthMonth),

            birthDay: @js($oldBirthDay),

            tariffs: @js($tariffData),

            init() {
                this.syncTariff();

                this.$watch('selectedTariffId', () => {
                    this.syncTariff();
                });
            },

            syncTariff() {
                const id = Number(this.selectedTariffId);

                this.selectedTariff =
                    this.tariffs.find(tariff => Number(tariff.id) === id)
                    ?? null;
            },

            value(name) {
                const element = document.querySelector(`[name="${name}"]`);

                return element?.value?.trim() || 'ثبت نشده';
            },

            formattedBirthDate() {
                if (!this.birthYear || !this.birthMonth || !this.birthDay) {
                    return 'ثبت نشده';
                }

                return [
                    String(this.birthYear).padStart(4, '0'),
                    String(this.birthMonth).padStart(2, '0'),
                    String(this.birthDay).padStart(2, '0'),
                ].join('/');
            },

            formatNumber(value) {
                const number = Number(value || 0);

                return new Intl.NumberFormat('fa-IR').format(number);
            },

            openPreview() {
                const form = this.$refs.form;

                if (!form.checkValidity()) {
                    form.reportValidity();
                    return;
                }

                this.syncTariff();

                if (!this.selectedTariff) {
                    alert('لطفاً ابتدا یک تعرفه انتخاب کنید.');
                    return;
                }

                if (!this.birthYear || !this.birthMonth || !this.birthDay) {
                    alert('لطفاً تاریخ تولد را کامل وارد کنید.');
                    return;
                }

                this.previewOpen = true;
            },

            confirmSubmit() {
                const form = this.$refs.form;

                if (!form.checkValidity()) {
                    this.previewOpen = false;

                    setTimeout(() => {
                        form.reportValidity();
                    }, 100);

                    return;
                }

                this.previewOpen = false;

                form.submit();
            },

            submitForm() {
                this.openPreview();
            },
        };
        }
    </script>

</x-layouts.account>
