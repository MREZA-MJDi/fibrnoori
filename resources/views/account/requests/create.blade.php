<x-layouts.account
    title="ثبت درخواست | فیبر نوری"
    heading="ثبت درخواست جدید"
>

    <div class="mx-auto w-full max-w-4xl space-y-6">

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


        <x-flash />


        <form
            method="POST"
            action="{{ route('account.requests.store') }}"
            class="space-y-6"
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

                    <x-input
                        name="birth_date"
                        label="تاریخ تولد"
                        :value="old('birth_date')"
                        placeholder="مثلاً 1378/05/12"
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
                    type="submit"
                    class="inline-flex min-h-12 items-center justify-center gap-2 rounded-xl bg-primary-600 px-6 text-sm font-black text-white shadow-sm transition hover:bg-primary-700 focus-visible:ring-4 focus-visible:ring-primary-100 active:scale-[0.99]"
                >
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
                            d="m5 12 4 4L19 7"
                        />
                    </svg>

                </button>

            </div>

        </form>

    </div>

</x-layouts.account>