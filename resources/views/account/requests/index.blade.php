<x-layouts.account
    title="درخواست‌های من | فیبر نوری"
    heading="درخواست‌های من"
>

    <div class="space-y-6">

        {{-- Header --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                <div class="min-w-0">

                    <span class="inline-flex rounded-full bg-primary-50 px-3 py-1.5 text-xs font-black text-primary-700">
                        حساب کاربری
                    </span>

                    <h2 class="mt-3 text-2xl font-black tracking-tight text-slate-950">
                        درخواست‌های من
                    </h2>

                    <p class="mt-2 max-w-2xl text-sm leading-7 text-slate-500">
                        تمام درخواست‌های ثبت‌شده برای اتصال فیبر نوری را از اینجا مشاهده و پیگیری کنید.
                    </p>

                </div>


                <a
                    href="{{ route('account.requests.create') }}"
                    class="inline-flex min-h-11 w-full shrink-0 items-center justify-center gap-2 rounded-xl bg-primary-600 px-5 text-sm font-black text-white shadow-sm transition hover:bg-primary-700 sm:w-auto"
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
                            d="M12 5v14M5 12h14"
                        />
                    </svg>

                    ثبت درخواست جدید
                </a>

            </div>

        </section>


        {{-- Flash --}}
        <x-flash />


        @if ($fiberRequests->isNotEmpty())

            {{-- Desktop table --}}
            <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                <div class="hidden overflow-x-auto md:block">

                    <table class="w-full min-w-[760px] text-right">

                        <thead class="border-b border-slate-200 bg-slate-50">

                        <tr>

                            <th class="px-6 py-4 text-xs font-black text-slate-500">
                                درخواست
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

                        @foreach ($fiberRequests as $request)

                            @php
                                $status = match ($request->status) {
                                    'pending' => [
                                        'label' => 'در انتظار بررسی',
                                        'class' => 'border-amber-200 bg-amber-50 text-amber-700',
                                    ],
                                    'reviewing' => [
                                        'label' => 'در حال بررسی',
                                        'class' => 'border-blue-200 bg-blue-50 text-blue-700',
                                    ],
                                    'approved' => [
                                        'label' => 'تأیید شده',
                                        'class' => 'border-indigo-200 bg-indigo-50 text-indigo-700',
                                    ],
                                    'completed' => [
                                        'label' => 'تکمیل شده',
                                        'class' => 'border-emerald-200 bg-emerald-50 text-emerald-700',
                                    ],
                                    'rejected' => [
                                        'label' => 'رد شده',
                                        'class' => 'border-red-200 bg-red-50 text-red-700',
                                    ],
                                    default => [
                                        'label' => $request->status,
                                        'class' => 'border-slate-200 bg-slate-50 text-slate-600',
                                    ],
                                };
                            @endphp


                            <tr class="transition hover:bg-slate-50/70">

                                <td class="px-6 py-5">

                                    <p class="break-all font-mono text-sm font-black text-slate-900">
                                        {{ $request->tracking_code }}
                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">
                                        #{{ $request->id }}
                                    </p>

                                </td>


                                <td class="px-6 py-5">

                                    <p class="text-sm font-bold text-slate-800">
                                        {{ $request->tariff?->name ?? 'بدون تعرفه' }}
                                    </p>

                                    @if ($request->tariff?->speed_mbps)

                                        <p class="mt-1 text-xs text-slate-400">
                                            {{ number_format($request->tariff->speed_mbps) }} Mbps
                                        </p>

                                    @endif

                                </td>


                                <td class="px-6 py-5">

                                    <p class="text-sm font-bold text-slate-800">
                                        {{ $request->modem?->name ?? 'بدون مودم' }}
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

                                    <span class="inline-flex rounded-full border px-3 py-1.5 text-xs font-black {{ $status['class'] }}">
                                        {{ $status['label'] }}
                                    </span>

                                </td>


                                <td class="whitespace-nowrap px-6 py-5">

                                    <p class="text-xs font-bold text-slate-600">
                                        {{ $request->created_at?->format('Y/m/d') }}
                                    </p>

                                    <p class="mt-1 text-[11px] text-slate-400">
                                        {{ $request->created_at?->format('H:i') }}
                                    </p>

                                </td>


                                <td class="px-6 py-5">

                                    <a
                                        href="{{ route('account.requests.show', $request) }}"
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


                {{-- Mobile --}}
                <div class="divide-y divide-slate-100 md:hidden">

                    @foreach ($fiberRequests as $request)

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
                                    'class' => 'bg-slate-50 text-slate-600',
                                ],
                            };
                        @endphp


                        <article class="p-5">

                            <div class="flex items-start justify-between gap-3">

                                <div class="min-w-0">

                                    <p class="text-[11px] font-bold text-slate-400">
                                        کد پیگیری
                                    </p>

                                    <p class="mt-1 truncate font-mono text-sm font-black text-slate-900">
                                        {{ $request->tracking_code }}
                                    </p>

                                </div>


                                <span class="shrink-0 rounded-full px-2.5 py-1.5 text-[10px] font-black {{ $status['class'] }}">
                                    {{ $status['label'] }}
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

                                <div class="min-w-0 rounded-2xl bg-slate-50 p-3">

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
                                        تومان
                                    </p>

                                </div>

                            </div>


                            <div class="mt-4 flex items-center justify-between gap-3">

                                <p class="text-[11px] font-bold text-slate-400">
                                    {{ $request->created_at?->format('Y/m/d - H:i') }}
                                </p>


                                <a
                                    href="{{ route('account.requests.show', $request) }}"
                                    class="inline-flex min-h-10 items-center justify-center rounded-xl bg-primary-600 px-4 text-xs font-black text-white transition hover:bg-primary-700"
                                >
                                    مشاهده جزئیات
                                </a>

                            </div>

                        </article>

                    @endforeach

                </div>

            </section>


            {{-- Pagination --}}
            @if ($fiberRequests->hasPages())

                <div class="pt-1">
                    {{ $fiberRequests->links() }}
                </div>

            @endif

        @else

            {{-- Empty --}}
            <section class="rounded-3xl border border-dashed border-slate-300 bg-white px-5 py-16 text-center shadow-sm sm:px-8">

                <div class="mx-auto grid size-16 place-items-center rounded-3xl bg-primary-50 text-primary-600">

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


                <h2 class="mt-5 text-lg font-black text-slate-950">
                    هنوز درخواستی ثبت نکرده‌اید
                </h2>

                <p class="mx-auto mt-2 max-w-md text-sm leading-7 text-slate-500">
                    برای شروع، درخواست اتصال فیبر نوری خود را ثبت کنید.
                </p>


                <div class="mt-6">

                    <a
                        href="{{ route('account.requests.create') }}"
                        class="inline-flex min-h-11 items-center justify-center rounded-xl bg-primary-600 px-5 text-sm font-black text-white transition hover:bg-primary-700"
                    >
                        ثبت اولین درخواست
                    </a>

                </div>

            </section>

        @endif

    </div>

</x-layouts.account>
