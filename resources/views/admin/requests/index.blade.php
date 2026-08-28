<x-layouts.admin
    title="درخواست‌ها | فیبره نوری"
    heading="درخواست‌های فیبر نوری"




<div class="space-y-6">

    {{-- Header --}}
    <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

        <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

            <div class="min-w-0">

                <p class="text-xs font-black text-primary-600">
                    مدیریت درخواست‌ها
                </p>

                <h2 class="mt-2 text-xl font-black tracking-tight text-slate-950 sm:text-2xl">
                    درخواست‌های مشتریان
                </h2>

                <p class="mt-2 text-sm leading-7 text-slate-500">
                    درخواست‌های ثبت‌شده را مشاهده و برای بررسی، تأیید یا رد مدیریت کنید.
                </p>

            </div>

            <div class="grid size-14 shrink-0 place-items-center rounded-2xl bg-primary-50 text-primary-600">

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


    {{-- Filters --}}
    <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">

        <form
            method="GET"
            action="{{ route('admin.requests.index') }}"
            class="grid gap-4 lg:grid-cols-[1fr_220px_auto]"
        >

            <x-input
                name="search"
                label="جستجو"
                placeholder="کد پیگیری، نام، موبایل یا کد ملی..."
                :value="request('search')"
            />

            <div class="w-full space-y-2">

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

                    <option
                        value="pending"
                        @selected(request('status') === 'pending')
                    >
                    در انتظار بررسی
                    </option>

                    <option
                        value="reviewing"
                        @selected(request('status') === 'reviewing')
                    >
                    در حال بررسی
                    </option>

                    <option
                        value="approved"
                        @selected(request('status') === 'approved')
                    >
                    تأیید شده
                    </option>

                    <option
                        value="completed"
                        @selected(request('status') === 'completed')
                    >
                    تکمیل شده
                    </option>

                    <option
                        value="rejected"
                        @selected(request('status') === 'rejected')
                    >
                    رد شده
                    </option>

                </select>

            </div>

            <div class="flex items-end gap-2">

                <x-button
                    type="submit"
                    class="w-full lg:w-auto"
                >
                    جستجو
                </x-button>

                @if (request()->hasAny(['search', 'status']))

                    <x-button
                        href="{{ route('admin.requests.index') }}"
                        variant="secondary"
                        class="shrink-0"
                    >
                        پاک کردن
                    </x-button>

                @endif

            </div>

        </form>

    </section>


    {{-- Requests --}}
    <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        @if ($requests->count())

            {{-- Desktop --}}
            <div class="hidden overflow-x-auto lg:block">

                <table class="w-full min-w-[900px] text-right">

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
                            مبلغ
                        </th>

                        <th class="px-6 py-4 text-xs font-black text-slate-500">
                            وضعیت
                        </th>

                        <th class="px-6 py-4 text-xs font-black text-slate-500">
                            تاریخ
                        </th>

                        <th class="px-6 py-4 text-xs font-black text-slate-500">
                        </th>

                    </tr>

                    </thead>

                    <tbody class="divide-y divide-slate-100">

                    @foreach ($requests as $request)

                        @php

                            $status = match ($request->status) {

                                'pending' => [
                                    'label' => 'در انتظار بررسی',
                                    'class' => 'bg-amber-50 text-amber-700',
                                ],

                                'reviewing' => [
                                    'label' => 'در حال بررسی',
                                    'class' => 'bg-blue-50 text-blue-700',
                                ],

                                'approved' => [
                                    'label' => 'تأیید شده',
                                    'class' => 'bg-indigo-50 text-indigo-700',
                                ],

                                'completed' => [
                                    'label' => 'تکمیل شده',
                                    'class' => 'bg-emerald-50 text-emerald-700',
                                ],

                                'rejected' => [
                                    'label' => 'رد شده',
                                    'class' => 'bg-red-50 text-red-700',
                                ],

                                default => [
                                    'label' => $request->status,
                                    'class' => 'bg-slate-100 text-slate-700',
                                ],

                            };

                        @endphp

                        <tr class="transition hover:bg-slate-50/70">

                            <td class="px-6 py-5">

                                <p class="text-sm font-black text-slate-900">
                                    {{ $request->tracking_code }}
                                </p>

                                <p class="mt-1 text-xs text-slate-400">
                                    #{{ $request->id }}
                                </p>

                            </td>


                            <td class="px-6 py-5">

                                <p class="text-sm font-bold text-slate-800">
                                    {{ $request->full_name }}
                                </p>

                                <p
                                    class="mt-1 text-xs text-slate-400"
                                    dir="ltr"
                                >
                                    {{ $request->mobile }}
                                </p>

                            </td>


                            <td class="px-6 py-5">

                                <p class="text-sm font-bold text-slate-800">
                                    {{ $request->tariff?->name ?? '—' }}
                                </p>

                            </td>


                            <td class="px-6 py-5">

                                <p class="text-sm font-black text-slate-900">
                                    {{ number_format($request->total_price) }}
                                </p>

                                <p class="mt-1 text-xs text-slate-400">
                                    تومان
                                </p>

                            </td>


                            <td class="px-6 py-5">

                                <span
                                    class="inline-flex rounded-full px-3 py-1.5 text-xs font-bold {{ $status['class'] }}"
                                >
                                    {{ $status['label'] }}
                                </span>

                            </td>


                            <td class="px-6 py-5">

                                <p class="whitespace-nowrap text-xs font-medium text-slate-500">
                                    {{ $request->created_at ? verta($request->created_at)->format('Y/m/d') : '—' }}
                                </p>

                                <p class="mt-1 whitespace-nowrap text-[11px] text-slate-400">
                                    {{ $request->created_at ? verta($request->created_at)->format('H:i') : '' }}
                                </p>

                            </td>


                            <td class="px-6 py-5">

                                <a
                                    href="{{ route('admin.requests.show', $request) }}"
                                    class="inline-flex min-h-10 items-center justify-center rounded-xl border border-slate-200 px-3 text-xs font-bold text-slate-700 transition hover:border-primary-200 hover:bg-primary-50 hover:text-primary-700"
                                >
                                    مشاهده
                                </a>

                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>


            {{-- Mobile / Tablet --}}
            <div class="grid divide-y divide-slate-100 lg:hidden">

                @foreach ($requests as $request)

                    @php

                        $status = match ($request->status) {

                            'pending' => [
                                'label' => 'در انتظار بررسی',
                                'class' => 'bg-amber-50 text-amber-700',
                            ],

                            'reviewing' => [
                                'label' => 'در حال بررسی',
                                'class' => 'bg-blue-50 text-blue-700',
                            ],

                            'approved' => [
                                'label' => 'تأیید شده',
                                'class' => 'bg-indigo-50 text-indigo-700',
                            ],

                            'completed' => [
                                'label' => 'تکمیل شده',
                                'class' => 'bg-emerald-50 text-emerald-700',
                            ],

                            'rejected' => [
                                'label' => 'رد شده',
                                'class' => 'bg-red-50 text-red-700',
                            ],

                            default => [
                                'label' => $request->status,
                                'class' => 'bg-slate-100 text-slate-700',
                            ],

                        };

                    @endphp

                    <article class="p-5">

                        <div class="flex items-start justify-between gap-4">

                            <div class="min-w-0">

                                <p class="truncate text-sm font-black text-slate-950">
                                    {{ $request->tracking_code }}
                                </p>

                                <p class="mt-1 text-xs text-slate-400">
                                    {{ $request->full_name }}
                                </p>

                            </div>

                            <span
                                class="shrink-0 rounded-full px-3 py-1.5 text-[11px] font-bold {{ $status['class'] }}"
                            >
                                {{ $status['label'] }}
                            </span>

                        </div>


                        <div class="mt-5 grid grid-cols-2 gap-3">

                            <div class="rounded-2xl bg-slate-50 p-3">

                                <p class="text-[11px] font-bold text-slate-400">
                                    تعرفه
                                </p>

                                <p class="mt-1 truncate text-xs font-bold text-slate-800">
                                    {{ $request->tariff?->name ?? '—' }}
                                </p>

                            </div>


                            <div class="rounded-2xl bg-slate-50 p-3">

                                <p class="text-[11px] font-bold text-slate-400">
                                    مبلغ
                                </p>

                                <p class="mt-1 text-xs font-black text-slate-800">
                                    {{ number_format($request->total_price) }}
                                    تومان
                                </p>

                            </div>

                        </div>


                        <div class="mt-4 flex items-center justify-between gap-3">

                            <div>

                                <p class="text-xs text-slate-400">
                                    {{ $request->created_at ? verta($request->created_at)->format('Y/m/d') : '—' }}
                                </p>

                                <p class="mt-1 text-[11px] text-slate-400">
                                    {{ $request->created_at ? verta($request->created_at)->format('H:i') : '' }}
                                </p>

                            </div>


                            <a
                                href="{{ route('admin.requests.show', $request) }}"
                                class="inline-flex min-h-10 items-center justify-center rounded-xl bg-primary-600 px-4 text-xs font-bold text-white transition hover:bg-primary-700"
                            >
                                مشاهده درخواست
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

                <h3 class="mt-5 text-base font-black text-slate-900">
                    درخواستی پیدا نشد
                </h3>

                <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500">
                    هنوز درخواستی با مشخصات انتخاب‌شده ثبت نشده است.
                </p>

            </div>

        @endif

    </section>

</div>

</x-layouts.admin>
