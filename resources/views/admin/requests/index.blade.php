<x-layouts.admin
    title="درخواست‌ها | فیبر نوری"
    heading="درخواست‌های مشتریان"
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
    @endphp


    <div class="space-y-6">

        {{-- Header --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

                <div class="min-w-0">

                    <span class="inline-flex rounded-full bg-primary-50 px-3 py-1.5 text-xs font-black text-primary-700">
                        مدیریت درخواست‌ها
                    </span>

                    <h2 class="mt-3 text-2xl font-black tracking-tight text-slate-950 sm:text-3xl">
                        درخواست‌های مشتریان
                    </h2>

                    <p class="mt-2 max-w-2xl text-sm leading-7 text-slate-500">
                        درخواست‌های ثبت‌شده برای اتصال فیبر نوری را مشاهده، بررسی و مدیریت کنید.
                    </p>

                </div>


                <div class="grid size-14 shrink-0 place-items-center rounded-2xl bg-slate-950 text-white">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="size-6"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 5h6M9 9h6M9 13h4M5 4h14v16H5z"
                        />
                    </svg>

                </div>

            </div>

        </section>


        {{-- Flash --}}
        <x-flash />


        {{-- Filters --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">

            <form
                method="GET"
                action="{{ route('admin.requests.index') }}"
                class="grid gap-4 lg:grid-cols-[minmax(0,1fr)_220px_auto]"
            >

                {{-- Search --}}
                <div class="space-y-2">

                    <label
                        for="search"
                        class="block text-sm font-bold text-slate-800"
                    >
                        جستجو
                    </label>

                    <input
                        id="search"
                        name="search"
                        type="search"
                        value="{{ request('search') }}"
                        placeholder="کد پیگیری، نام، موبایل یا کد ملی..."
                        class="block min-h-12 w-full rounded-xl border border-slate-200 bg-white px-4 text-sm text-slate-900 shadow-sm outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
                    >

                </div>


                {{-- Status --}}
                <div class="space-y-2">

                    <label
                        for="status"
                        class="block text-sm font-bold text-slate-800"
                    >
                        وضعیت
                    </label>

                    <select
                        id="status"
                        name="status"
                        class="block min-h-12 w-full rounded-xl border border-slate-200 bg-white px-4 text-sm text-slate-900 shadow-sm outline-none transition hover:border-slate-300 focus:border-primary-500 focus:ring-4 focus:ring-primary-100"
                    >

                        <option value="">
                            همه وضعیت‌ها
                        </option>

                        @foreach ($statusLabels as $value => $label)

                            <option
                                value="{{ $value }}"
                                @selected(request('status') === $value)
                            >
                            {{ $label }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Actions --}}
                <div class="flex items-end gap-2">

                    <button
                        type="submit"
                        class="inline-flex min-h-12 flex-1 items-center justify-center rounded-xl bg-primary-600 px-5 text-sm font-black text-white transition hover:bg-primary-700 lg:flex-none"
                    >
                        جستجو
                    </button>


                    @if (request()->filled('search') || request()->filled('status'))

                        <a
                            href="{{ route('admin.requests.index') }}"
                            class="inline-flex min-h-12 shrink-0 items-center justify-center rounded-xl border border-slate-200 px-4 text-sm font-black text-slate-700 transition hover:bg-slate-50"
                        >
                            پاک کردن
                        </a>

                    @endif

                </div>

            </form>

        </section>


        {{-- Requests list --}}
        <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

            @if ($requests->isNotEmpty())

                {{-- =================================================
                     Desktop
                ================================================== --}}
                <div class="hidden overflow-x-auto lg:block">

                    <table class="w-full min-w-[1050px] text-right">

                        <thead class="border-b border-slate-200 bg-slate-50">

                        <tr>

                            <th class="px-6 py-4 text-xs font-black text-slate-500">
                                درخواست
                            </th>

                            <th class="px-6 py-4 text-xs font-black text-slate-500">
                                مشتری
                            </th>

                            <th class="px-6 py-4 text-xs font-black text-slate-500">
                                تعرفه
                            </th>

                            <th class="px-6 py-4 text-xs font-black text-slate-500">
                                مودم
                            </th>

                            <th class="px-6 py-4 text-xs font-black text-slate-500">
                                مبلغ
                            </th>

                            <th class="px-6 py-4 text-xs font-black text-slate-500">
                                وضعیت
                            </th>

                            <th class="px-6 py-4 text-xs font-black text-slate-500">
                                تاریخ
                            </th>

                            <th class="px-6 py-4"></th>

                        </tr>

                        </thead>


                        <tbody class="divide-y divide-slate-100">

                        @foreach ($requests as $request)

                            <tr class="transition hover:bg-slate-50/70">

                                {{-- Request --}}
                                <td class="px-6 py-5">

                                    <p class="break-all font-mono text-sm font-black text-slate-900">
                                        {{ $request->tracking_code }}
                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">
                                        درخواست #{{ $request->id }}
                                    </p>

                                </td>


                                {{-- Customer --}}
                                <td class="px-6 py-5">

                                    <p class="text-sm font-black text-slate-900">
                                        {{ $request->full_name }}
                                    </p>

                                    <p
                                        dir="ltr"
                                        class="mt-1 text-xs text-slate-400"
                                    >
                                        {{ $request->mobile }}
                                    </p>

                                </td>


                                {{-- Tariff --}}
                                <td class="px-6 py-5">

                                    <p class="text-sm font-bold text-slate-800">
                                        {{ $request->tariff?->name ?? 'بدون تعرفه' }}
                                    </p>

                                    @if ($request->tariff?->speed_mbps)

                                        <p class="mt-1 text-xs text-slate-400">
                                            {{ number_format($request->tariff->speed_mbps) }}
                                            Mbps
                                        </p>

                                    @endif

                                </td>


                                {{-- Modem --}}
                                <td class="px-6 py-5">

                                    <p class="text-sm font-bold text-slate-800">
                                        {{ $request->modem?->name ?? 'بدون مودم' }}
                                    </p>

                                </td>


                                {{-- Price --}}
                                <td class="px-6 py-5">

                                    <p class="text-sm font-black text-slate-900">
                                        {{ number_format($request->total_price) }}
                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">
                                        تومان
                                    </p>

                                </td>


                                {{-- Status --}}
                                <td class="px-6 py-5">

                                    <span
                                        class="inline-flex rounded-full border px-3 py-1.5 text-xs font-black {{ $statusClasses[$request->status] ?? 'border-slate-200 bg-slate-50 text-slate-600' }}"
                                    >
                                        {{ $statusLabels[$request->status] ?? $request->status }}
                                    </span>

                                </td>


                                {{-- Date --}}
                                <td class="whitespace-nowrap px-6 py-5">

                                    <p class="text-xs font-bold text-slate-600">
                                        {{ $request->created_at?->format('Y/m/d') }}
                                    </p>

                                    <p class="mt-1 text-[11px] text-slate-400">
                                        {{ $request->created_at?->format('H:i') }}
                                    </p>

                                </td>


                                {{-- Action --}}
                                <td class="px-6 py-5">

                                    <a
                                        href="{{ route('admin.requests.show', $request) }}"
                                        class="inline-flex min-h-10 items-center justify-center rounded-xl border border-slate-200 px-3 text-xs font-black text-slate-700 transition hover:border-primary-200 hover:bg-primary-50 hover:text-primary-700"
                                    >
                                        مشاهده
                                    </a>

                                </td>

                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>


                {{-- =================================================
                     Mobile / Tablet
                ================================================== --}}
                <div class="grid divide-y divide-slate-100 lg:hidden">

                    @foreach ($requests as $request)

                        <article class="p-5">

                            <div class="flex items-start justify-between gap-3">

                                <div class="min-w-0">

                                    <p class="text-[11px] font-bold text-slate-400">
                                        کد پیگیری
                                    </p>

                                    <p class="mt-1 truncate font-mono text-sm font-black text-slate-950">
                                        {{ $request->tracking_code }}
                                    </p>

                                </div>


                                <span
                                    class="shrink-0 rounded-full border px-2.5 py-1.5 text-[10px] font-black {{ $statusClasses[$request->status] ?? 'border-slate-200 bg-slate-50 text-slate-600' }}"
                                >
                                    {{ $statusLabels[$request->status] ?? $request->status }}
                                </span>

                            </div>


                            <div class="mt-4">

                                <p class="text-sm font-black text-slate-900">
                                    {{ $request->full_name }}
                                </p>

                                <p
                                    dir="ltr"
                                    class="mt-1 text-xs text-slate-400"
                                >
                                    {{ $request->mobile }}
                                </p>

                            </div>


                            <div class="mt-4 grid grid-cols-2 gap-3">

                                <div class="rounded-2xl bg-slate-50 p-3">

                                    <p class="text-[11px] font-bold text-slate-400">
                                        تعرفه
                                    </p>

                                    <p class="mt-1 truncate text-xs font-bold text-slate-800">
                                        {{ $request->tariff?->name ?? 'بدون تعرفه' }}
                                    </p>

                                </div>


                                <div class="rounded-2xl bg-slate-50 p-3">

                                    <p class="text-[11px] font-bold text-slate-400">
                                        مبلغ
                                    </p>

                                    <p class="mt-1 text-xs font-black text-slate-800">
                                        {{ number_format($request->total_price) }}
                                    </p>

                                    <p class="mt-0.5 text-[10px] text-slate-400">
                                        تومان
                                    </p>

                                </div>


                                <div class="rounded-2xl bg-slate-50 p-3">

                                    <p class="text-[11px] font-bold text-slate-400">
                                        مودم
                                    </p>

                                    <p class="mt-1 truncate text-xs font-bold text-slate-800">
                                        {{ $request->modem?->name ?? 'بدون مودم' }}
                                    </p>

                                </div>


                                <div class="rounded-2xl bg-slate-50 p-3">

                                    <p class="text-[11px] font-bold text-slate-400">
                                        تاریخ
                                    </p>

                                    <p class="mt-1 text-xs font-bold text-slate-800">
                                        {{ $request->created_at?->format('Y/m/d') }}
                                    </p>

                                    <p class="mt-1 text-[10px] text-slate-400">
                                        {{ $request->created_at?->format('H:i') }}
                                    </p>

                                </div>

                            </div>


                            <div class="mt-4 flex items-center justify-between gap-3">

                                <span class="text-[11px] font-bold text-slate-400">
                                    #{{ $request->id }}
                                </span>


                                <a
                                    href="{{ route('admin.requests.show', $request) }}"
                                    class="inline-flex min-h-10 items-center justify-center rounded-xl bg-primary-600 px-4 text-xs font-black text-white transition hover:bg-primary-700"
                                >
                                    مشاهده جزئیات
                                </a>

                            </div>

                        </article>

                    @endforeach

                </div>


                {{-- Pagination --}}
                @if ($requests->hasPages())

                    <div class="border-t border-slate-200 px-5 py-4 sm:px-6">
                        {{ $requests->withQueryString()->links() }}
                    </div>

                @endif

            @else

                {{-- Empty --}}
                <div class="px-6 py-16 text-center sm:px-8">

                    <div class="mx-auto grid size-16 place-items-center rounded-3xl bg-slate-100 text-slate-400">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.8"
                            stroke="currentColor"
                            class="size-7"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M9 5h6M9 9h6M9 13h4M5 4h14v16H5z"
                            />
                        </svg>

                    </div>


                    <h3 class="mt-5 text-base font-black text-slate-950">
                        درخواستی پیدا نشد
                    </h3>

                    <p class="mx-auto mt-2 max-w-md text-sm leading-7 text-slate-500">
                        @if (request()->filled('search') || request()->filled('status'))
                            با فیلترهای فعلی هیچ درخواستی پیدا نشد.
                        @else
                            هنوز هیچ درخواستی در سیستم ثبت نشده است.
                        @endif
                    </p>


                    @if (request()->filled('search') || request()->filled('status'))

                        <a
                            href="{{ route('admin.requests.index') }}"
                            class="mt-6 inline-flex min-h-11 items-center justify-center rounded-xl border border-slate-200 px-5 text-sm font-black text-slate-700 transition hover:bg-slate-50"
                        >
                            پاک کردن فیلترها
                        </a>

                    @endif

                </div>

            @endif

        </section>

    </div>

</x-layouts.admin>
