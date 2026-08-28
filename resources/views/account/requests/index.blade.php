<x-layouts.account
    title="درخواست‌های من | فیبره نوری"
    heading="درخواست‌های من"
>

    <div class="space-y-6">

        {{-- Header --}}
        <section class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <h2 class="text-xl font-black text-slate-950">
                    درخواست‌های من
                </h2>

                <p class="mt-1 text-sm leading-6 text-slate-500">
                    درخواست‌های ثبت‌شده و وضعیت آن‌ها را مشاهده کنید.
                </p>
            </div>

            <x-button
                href="{{ url('/account/requests/create') }}"
                size="sm"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    class="size-4"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 5v14M5 12h14"
                    />
                </svg>

                درخواست جدید
            </x-button>

        </section>

        {{-- Requests --}}
        @if ($requests->count())

            <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                {{-- Desktop table --}}
                <div class="hidden overflow-x-auto md:block">

                    <table class="w-full min-w-[760px] text-right">

                        <thead class="border-b border-slate-100 bg-slate-50/80">
                        <tr>
                            <th class="px-6 py-4 text-xs font-black text-slate-500">
                                کد رهگیری
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
                                جزئیات
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
                                        'class' => 'bg-emerald-50 text-emerald-700',
                                    ],
                                    'rejected' => [
                                        'label' => 'رد شده',
                                        'class' => 'bg-red-50 text-red-700',
                                    ],
                                    'completed' => [
                                        'label' => 'تکمیل شده',
                                        'class' => 'bg-violet-50 text-violet-700',
                                    ],
                                    default => [
                                        'label' => $request->status,
                                        'class' => 'bg-slate-100 text-slate-700',
                                    ],
                                };
                            @endphp

                            <tr class="transition hover:bg-slate-50/70">

                                <td class="px-6 py-5">
                                        <span class="font-mono text-sm font-black text-slate-900">
                                            {{ $request->tracking_code }}
                                        </span>
                                </td>

                                <td class="px-6 py-5">
                                    <p class="text-sm font-bold text-slate-800">
                                        {{ $request->tariff?->name ?? '---' }}
                                    </p>

                                    @if ($request->modem)
                                        <p class="mt-1 text-xs text-slate-400">
                                            + {{ $request->modem->name }}
                                        </p>
                                    @endif
                                </td>

                                <td class="px-6 py-5">
                                        <span class="text-sm font-black text-slate-900">
                                            {{ number_format($request->total_price) }}
                                        </span>

                                    <span class="text-xs text-slate-400">
                                            تومان
                                        </span>
                                </td>

                                <td class="px-6 py-5">
                                        <span class="inline-flex rounded-full px-3 py-1.5 text-xs font-bold {{ $status['class'] }}">
                                            {{ $status['label'] }}
                                        </span>
                                </td>

                                <td class="px-6 py-5">
                                        <span class="text-xs font-medium text-slate-500">
                                            {{ $request->created_at?->format('Y/m/d') }}
                                        </span>
                                </td>

                                <td class="px-6 py-5">
                                    <a
                                        href="{{ url('/account/requests/' . $request->id) }}"
                                        class="inline-flex min-h-9 items-center justify-center rounded-lg bg-slate-100 px-3 text-xs font-bold text-slate-700 transition hover:bg-primary-50 hover:text-primary-700"
                                    >
                                        مشاهده
                                    </a>
                                </td>

                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>

                {{-- Mobile cards --}}
                <div class="grid gap-3 p-4 md:hidden">

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
                                    'class' => 'bg-emerald-50 text-emerald-700',
                                ],
                                'rejected' => [
                                    'label' => 'رد شده',
                                    'class' => 'bg-red-50 text-red-700',
                                ],
                                'completed' => [
                                    'label' => 'تکمیل شده',
                                    'class' => 'bg-violet-50 text-violet-700',
                                ],
                                default => [
                                    'label' => $request->status,
                                    'class' => 'bg-slate-100 text-slate-700',
                                ],
                            };
                        @endphp

                        <article class="rounded-2xl border border-slate-200 p-4">

                            <div class="flex items-start justify-between gap-3">

                                <div class="min-w-0">

                                    <p class="text-[11px] font-bold text-slate-400">
                                        کد رهگیری
                                    </p>

                                    <p class="mt-1 truncate font-mono text-sm font-black text-slate-900">
                                        {{ $request->tracking_code }}
                                    </p>

                                </div>

                                <span class="shrink-0 rounded-full px-3 py-1.5 text-[11px] font-bold {{ $status['class'] }}">
                                    {{ $status['label'] }}
                                </span>

                            </div>

                            <div class="mt-4 grid grid-cols-2 gap-3">

                                <div class="rounded-xl bg-slate-50 p-3">
                                    <p class="text-[11px] text-slate-400">
                                        تعرفه
                                    </p>

                                    <p class="mt-1 truncate text-xs font-bold text-slate-800">
                                        {{ $request->tariff?->name ?? '---' }}
                                    </p>
                                </div>

                                <div class="rounded-xl bg-slate-50 p-3">
                                    <p class="text-[11px] text-slate-400">
                                        مبلغ
                                    </p>

                                    <p class="mt-1 text-xs font-black text-slate-800">
                                        {{ number_format($request->total_price) }}
                                        تومان
                                    </p>
                                </div>

                            </div>

                            <div class="mt-4 flex items-center justify-between gap-3">

                                <span class="text-[11px] text-slate-400">
                                    {{ $request->created_at?->format('Y/m/d') }}
                                </span>

                                <a
                                    href="{{ url('/account/requests/' . $request->id) }}"
                                    class="inline-flex min-h-10 items-center justify-center rounded-xl bg-primary-600 px-4 text-xs font-bold text-white transition hover:bg-primary-700"
                                >
                                    مشاهده جزئیات
                                </a>

                            </div>

                        </article>

                    @endforeach

                </div>

            </section>

            {{-- Pagination --}}
            @if ($requests->hasPages())
                <div class="pt-2">
                    {{ $requests->links() }}
                </div>
            @endif

        @else

            {{-- Empty state --}}
            <section class="rounded-3xl border border-dashed border-slate-300 bg-white px-5 py-14 text-center shadow-sm sm:px-8">

                <div class="mx-auto grid size-16 place-items-center rounded-2xl bg-primary-50 text-primary-600">

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
                    <x-button href="{{ url('/account/requests/create') }}">
                        ثبت اولین درخواست
                    </x-button>
                </div>

            </section>

        @endif

    </div>

</x-layouts.account>
