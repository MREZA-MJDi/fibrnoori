<x-layouts.account
    title="جزئیات درخواست | فیبر نوری"
    heading="جزئیات درخواست"
>

    @php
        $statusLabels = [
            'pending' => 'در انتظار بررسی',
            'reviewing' => 'در حال بررسی',
            'approved' => 'تأیید شده',
            'completed' => 'تکمیل شده',
            'rejected' => 'رد شده',
        ];

        $statusClasses = [
            'pending' => 'border-amber-200 bg-amber-50 text-amber-700',
            'reviewing' => 'border-blue-200 bg-blue-50 text-blue-700',
            'approved' => 'border-indigo-200 bg-indigo-50 text-indigo-700',
            'completed' => 'border-emerald-200 bg-emerald-50 text-emerald-700',
            'rejected' => 'border-red-200 bg-red-50 text-red-700',
        ];

        $currentStatusLabel =
            $statusLabels[$fiberRequest->status]
            ?? $fiberRequest->status;

        $currentStatusClass =
            $statusClasses[$fiberRequest->status]
            ?? 'border-slate-200 bg-slate-50 text-slate-600';
    @endphp


    <div class="space-y-6">

        <x-flash />


        {{-- Header --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

                <div class="min-w-0">

                    <div class="flex flex-wrap items-center gap-2">

                        <span
                            class="inline-flex rounded-full border px-3 py-1.5 text-xs font-black {{ $currentStatusClass }}"
                        >
                            {{ $currentStatusLabel }}
                        </span>

                        <span class="text-xs font-medium text-slate-400">
                            درخواست #{{ $fiberRequest->id }}
                        </span>

                    </div>

                    <h2 class="mt-3 break-all font-mono text-xl font-black tracking-tight text-slate-950 sm:text-2xl">
                        {{ $fiberRequest->tracking_code }}
                    </h2>

                    <p class="mt-2 text-sm text-slate-500">
                        ثبت شده در
                        {{ $fiberRequest->created_at?->format('Y/m/d - H:i') }}
                    </p>

                </div>


                <a
                    href="{{ route('account.requests.index') }}"
                    class="inline-flex min-h-11 items-center justify-center rounded-xl border border-slate-200 px-5 text-sm font-black text-slate-700 transition hover:bg-slate-50"
                >
                    بازگشت به درخواست‌ها
                </a>

            </div>

        </section>


        {{-- Status --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="mb-6">

                <h3 class="text-lg font-black text-slate-950">
                    وضعیت درخواست
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    آخرین وضعیت درخواست شما در سامانه.
                </p>

            </div>


            <div class="rounded-2xl border p-5 {{ $currentStatusClass }}">

                <div class="flex items-center justify-between gap-4">

                    <div>

                        <p class="text-xs font-bold opacity-70">
                            وضعیت فعلی
                        </p>

                        <p class="mt-2 text-base font-black">
                            {{ $currentStatusLabel }}
                        </p>

                    </div>


                    <div class="grid size-11 shrink-0 place-items-center rounded-xl bg-white/70">

                        @switch($fiberRequest->status)

                            @case('pending')
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.8"
                                stroke="currentColor"
                                class="size-5"
                            >
                                <circle cx="12" cy="12" r="8.5"/>
                                <path stroke-linecap="round" d="M12 7v5l3 2"/>
                            </svg>
                            @break

                            @case('completed')
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
                                    d="m7 12 3 3 7-7"
                                />
                                <circle cx="12" cy="12" r="9"/>
                            </svg>
                            @break

                            @case('rejected')
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
                                    d="m8 8 8 8M16 8l-8 8"
                                />
                                <circle cx="12" cy="12" r="9"/>
                            </svg>
                            @break

                            @default
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.8"
                                stroke="currentColor"
                                class="size-5"
                            >
                                <circle cx="12" cy="12" r="8.5"/>
                                <path stroke-linecap="round" d="M12 7v5l3 2"/>
                            </svg>

                        @endswitch

                    </div>

                </div>

            </div>

        </section>


        {{-- Customer information --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="mb-6">

                <h3 class="text-lg font-black text-slate-950">
                    اطلاعات متقاضی
                </h3>

            </div>


            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

                {{-- Full name --}}
                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        نام و نام خانوادگی
                    </p>

                    <p class="mt-2 break-words text-sm font-black text-slate-900">
                        {{ $fiberRequest->full_name }}
                    </p>

                </div>


                {{-- Father name --}}
                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        نام پدر
                    </p>

                    <p class="mt-2 break-words text-sm font-black text-slate-900">
                        {{ $fiberRequest->father_name }}
                    </p>

                </div>


                {{-- National code --}}
                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        کد ملی
                    </p>

                    <p
                        dir="ltr"
                        class="mt-2 text-sm font-black text-slate-900"
                    >
                        {{ $fiberRequest->national_code }}
                    </p>

                </div>


                {{-- Birth certificate --}}
                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        شماره شناسنامه
                    </p>

                    <p
                        dir="ltr"
                        class="mt-2 text-sm font-black text-slate-900"
                    >
                        {{ $fiberRequest->birth_certificate_number }}
                    </p>

                </div>


                {{-- Birth date --}}
                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        تاریخ تولد
                    </p>

                    <p
                        dir="ltr"
                        class="mt-2 text-sm font-black text-slate-900"
                    >
                        {{ $fiberRequest->birth_date }}
                    </p>

                </div>


                {{-- Mobile --}}
                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        شماره موبایل
                    </p>

                    <p
                        dir="ltr"
                        class="mt-2 text-sm font-black text-slate-900"
                    >
                        {{ $fiberRequest->mobile }}
                    </p>

                </div>


                {{-- Landline --}}
                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        شماره ثابت
                    </p>

                    <p
                        dir="ltr"
                        class="mt-2 text-sm font-black text-slate-900"
                    >
                        {{ $fiberRequest->landline ?: 'ثبت نشده' }}
                    </p>

                </div>

            </div>

        </section>


        {{-- Address --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="mb-6">

                <h3 class="text-lg font-black text-slate-950">
                    آدرس محل نصب
                </h3>

            </div>


            <div class="grid gap-4 sm:grid-cols-2">

                {{-- Province --}}
                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        استان
                    </p>

                    <p class="mt-2 text-sm font-black text-slate-900">
                        {{ $fiberRequest->province }}
                    </p>

                </div>


                {{-- City --}}
                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        شهر
                    </p>

                    <p class="mt-2 text-sm font-black text-slate-900">
                        {{ $fiberRequest->city }}
                    </p>

                </div>


                {{-- Address --}}
                <div class="rounded-2xl bg-slate-50 p-4 sm:col-span-2">

                    <p class="text-xs font-bold text-slate-400">
                        آدرس
                    </p>

                    <p class="mt-2 break-words text-sm leading-8 text-slate-800">
                        {{ $fiberRequest->address }}
                    </p>

                </div>


                {{-- Postal code --}}
                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        کد پستی
                    </p>

                    <p
                        dir="ltr"
                        class="mt-2 text-sm font-black text-slate-900"
                    >
                        {{ $fiberRequest->postal_code }}
                    </p>

                </div>

            </div>

        </section>


        {{-- Services --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="mb-6">

                <h3 class="text-lg font-black text-slate-950">
                    سرویس انتخاب‌شده
                </h3>

            </div>


            <div class="grid gap-4 sm:grid-cols-2">

                {{-- Tariff --}}
                <div class="rounded-2xl border border-slate-200 p-5">

                    <p class="text-xs font-bold text-slate-400">
                        تعرفه
                    </p>

                    <p class="mt-2 text-base font-black text-slate-900">
                        {{ $fiberRequest->tariff?->name ?? 'بدون تعرفه' }}
                    </p>

                    @if ($fiberRequest->tariff?->speed_mbps)

                        <p class="mt-2 text-xs text-primary-600">
                            سرعت
                            {{ number_format($fiberRequest->tariff->speed_mbps) }}
                            Mbps
                        </p>

                    @endif

                    <p class="mt-3 text-sm text-slate-500">
                        {{ number_format($fiberRequest->tariff_price) }}
                        تومان
                    </p>

                </div>


                {{-- Modem --}}
                <div class="rounded-2xl border border-slate-200 p-5">

                    <p class="text-xs font-bold text-slate-400">
                        مودم
                    </p>

                    <p class="mt-2 break-words text-base font-black text-slate-900">
                        {{ $fiberRequest->modem?->name ?? 'مودم شخصی' }}
                    </p>

                    <p class="mt-3 text-sm text-slate-500">
                        {{ number_format($fiberRequest->modem_price) }}
                        تومان
                    </p>

                </div>

            </div>


            {{-- Total --}}
            <div class="mt-5 rounded-2xl bg-slate-950 p-5 text-white">

                <div class="flex items-center justify-between gap-4">

                    <span class="text-sm font-bold text-slate-300">
                        مبلغ نهایی
                    </span>

                    <span class="text-xl font-black">
                        {{ number_format($fiberRequest->total_price) }}
                        تومان
                    </span>

                </div>

            </div>

        </section>


        {{-- Notes --}}
        @if ($fiberRequest->customer_note || $fiberRequest->admin_note)

            <section class="grid gap-4 lg:grid-cols-2">

                @if ($fiberRequest->customer_note)

                    <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

                        <h3 class="text-sm font-black text-slate-900">
                            توضیحات شما
                        </h3>

                        <p class="mt-3 break-words text-sm leading-8 text-slate-600">
                            {{ $fiberRequest->customer_note }}
                        </p>

                    </div>

                @endif


                @if ($fiberRequest->admin_note)

                    <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

                        <h3 class="text-sm font-black text-slate-900">
                            توضیحات کارشناس
                        </h3>

                        <p class="mt-3 break-words text-sm leading-8 text-slate-600">
                            {{ $fiberRequest->admin_note }}
                        </p>

                    </div>

                @endif

            </section>

        @endif


        {{-- Status history --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="mb-6">

                <h3 class="text-lg font-black text-slate-950">
                    تاریخچه درخواست
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    روند تغییر وضعیت درخواست شما.
                </p>

            </div>


            @if ($fiberRequest->statusHistories->isNotEmpty())

                <div class="space-y-4">

                    @foreach ($fiberRequest->statusHistories->sortByDesc('created_at') as $history)

                        <div class="flex gap-4">

                            <div class="flex shrink-0 flex-col items-center">

                                <span class="grid size-10 place-items-center rounded-xl bg-slate-100 text-slate-500">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.8"
                                        stroke="currentColor"
                                        class="size-5"
                                    >
                                        <circle cx="12" cy="12" r="8.5"/>
                                        <path stroke-linecap="round" d="M12 7v5l3 2"/>
                                    </svg>

                                </span>

                            </div>


                            <div class="min-w-0 flex-1 rounded-2xl bg-slate-50 p-4">

                                <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">

                                    <div class="flex flex-wrap items-center gap-2">

                                        @if ($history->from_status)

                                            <span class="text-xs font-bold text-slate-400">
                                                {{ $statusLabels[$history->from_status] ?? $history->from_status }}
                                            </span>

                                            <span class="text-slate-300">
                                                →
                                            </span>

                                        @endif

                                        <span class="text-sm font-black text-slate-900">
                                            {{ $statusLabels[$history->to_status] ?? $history->to_status }}
                                        </span>

                                    </div>


                                    <time
                                        class="text-xs text-slate-400"
                                        datetime="{{ $history->created_at?->toIso8601String() }}"
                                    >
                                        {{ $history->created_at?->format('Y/m/d H:i') }}
                                    </time>

                                </div>


                                @if ($history->note)

                                    <p class="mt-3 break-words text-sm leading-7 text-slate-600">
                                        {{ $history->note }}
                                    </p>

                                @endif

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-5 py-10 text-center">

                    <p class="text-sm font-bold text-slate-500">
                        هنوز سابقه‌ای برای این درخواست ثبت نشده است.
                    </p>

                </div>

            @endif

        </section>


        {{-- Actions --}}
        <div class="flex flex-col gap-3 sm:flex-row sm:justify-between">

            <a
                href="{{ route('account.requests.index') }}"
                class="inline-flex min-h-11 items-center justify-center rounded-xl border border-slate-200 px-5 text-sm font-black text-slate-700 transition hover:bg-slate-50"
            >
                بازگشت
            </a>


            @if ($fiberRequest->status === 'pending')

                <a
                    href="{{ route('account.requests.edit', $fiberRequest) }}"
                    class="inline-flex min-h-11 items-center justify-center rounded-xl bg-primary-600 px-5 text-sm font-black text-white transition hover:bg-primary-700"
                >
                    ویرایش درخواست
                </a>

            @endif

        </div>

    </div>

</x-layouts.account>