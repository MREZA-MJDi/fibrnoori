<x-layouts.admin
    title="داشبورد مدیریت | فیبره نوری"
    heading="داشبورد مدیریت"
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
            'pending' => 'bg-amber-50 text-amber-700 border-amber-200',
            'reviewing' => 'bg-blue-50 text-blue-700 border-blue-200',
            'approved' => 'bg-indigo-50 text-indigo-700 border-indigo-200',
            'completed' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
            'rejected' => 'bg-red-50 text-red-700 border-red-200',
        ];
    @endphp


    <div class="space-y-6">

        {{-- Hero --}}
        <section class="relative overflow-hidden rounded-3xl bg-slate-950 p-6 text-white shadow-sm sm:p-8">

            <div class="relative z-10 flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">

                <div class="max-w-2xl">

                    <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-xs font-bold text-slate-300">

                        <span class="size-2 rounded-full bg-emerald-400"></span>

                        سیستم فعال است

                    </div>

                    <h2 class="mt-4 text-2xl font-black tracking-tight sm:text-3xl">
                        خوش آمدید، {{ auth()->user()->name ?? 'مدیر سیستم' }} 👋
                    </h2>

                    <p class="mt-3 text-sm leading-7 text-slate-400">
                        وضعیت درخواست‌های فیبر نوری را بررسی کنید و درخواست‌های جدید را سریع‌تر مدیریت کنید.
                    </p>

                </div>


                <div class="shrink-0">

                    <a
                        href="{{ route('admin.requests.index') }}"
                        class="inline-flex min-h-12 items-center justify-center gap-2 rounded-xl bg-white px-5 text-sm font-black text-slate-950 transition hover:-translate-y-0.5 hover:bg-slate-100"
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
                                d="M9 5h6M9 9h6M9 13h4M5 4h14v16H5z"
                            />
                        </svg>

                        مدیریت درخواست‌ها

                    </a>

                </div>

            </div>


            <div class="pointer-events-none absolute -left-20 -top-20 size-64 rounded-full bg-primary-600/20 blur-3xl"></div>

            <div class="pointer-events-none absolute -bottom-32 right-1/3 size-72 rounded-full bg-blue-500/10 blur-3xl"></div>

        </section>


        {{-- Main statistics --}}
        <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">

            {{-- Total --}}
            <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-xs font-bold text-slate-400">
                            کل درخواست‌ها
                        </p>

                        <p class="mt-3 text-3xl font-black tracking-tight text-slate-950">
                            {{ number_format($stats['total_requests']) }}
                        </p>

                    </div>

                    <div class="grid size-11 shrink-0 place-items-center rounded-2xl bg-primary-50 text-primary-600">

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
                                d="M9 5h6M9 9h6M9 13h4M5 4h14v16H5z"
                            />
                        </svg>

                    </div>

                </div>

                <a
                    href="{{ route('admin.requests.index') }}"
                    class="mt-5 inline-flex text-xs font-bold text-primary-600 hover:text-primary-700"
                >
                    مشاهده همه درخواست‌ها
                </a>

            </div>


            {{-- Pending --}}
            <div class="rounded-3xl border border-amber-200 bg-amber-50/50 p-5 shadow-sm">

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-xs font-bold text-amber-700">
                            درخواست‌های جدید
                        </p>

                        <p class="mt-3 text-3xl font-black tracking-tight text-slate-950">
                            {{ number_format($stats['pending_requests']) }}
                        </p>

                    </div>

                    <div class="relative grid size-11 shrink-0 place-items-center rounded-2xl bg-amber-100 text-amber-600">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.8"
                            stroke="currentColor"
                            class="size-5"
                        >
                            <circle
                                cx="12"
                                cy="12"
                                r="8.5"
                            />

                            <path
                                stroke-linecap="round"
                                d="M12 7v5l3 2"
                            />
                        </svg>

                        @if ($stats['pending_requests'] > 0)

                            <span class="absolute -right-1 -top-1 size-3 rounded-full bg-red-500 ring-2 ring-amber-50"></span>

                        @endif

                    </div>

                </div>

                <a
                    href="{{ route('admin.requests.index', ['status' => 'pending']) }}"
                    class="mt-5 inline-flex text-xs font-bold text-amber-700 hover:text-amber-800"
                >
                    بررسی درخواست‌های جدید
                </a>

            </div>


            {{-- Reviewing --}}
            <div class="rounded-3xl border border-blue-200 bg-blue-50/50 p-5 shadow-sm">

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-xs font-bold text-blue-700">
                            در حال بررسی
                        </p>

                        <p class="mt-3 text-3xl font-black tracking-tight text-slate-950">
                            {{ number_format($stats['reviewing_requests']) }}
                        </p>

                    </div>

                    <div class="grid size-11 shrink-0 place-items-center rounded-2xl bg-blue-100 text-blue-600">

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
                                d="M12 6v6l4 2"
                            />

                            <circle
                                cx="12"
                                cy="12"
                                r="9"
                            />
                        </svg>

                    </div>

                </div>

                <a
                    href="{{ route('admin.requests.index', ['status' => 'reviewing']) }}"
                    class="mt-5 inline-flex text-xs font-bold text-blue-700 hover:text-blue-800"
                >
                    مشاهده درخواست‌ها
                </a>

            </div>


            {{-- Completed --}}
            <div class="rounded-3xl border border-emerald-200 bg-emerald-50/50 p-5 shadow-sm">

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-xs font-bold text-emerald-700">
                            تکمیل‌شده
                        </p>

                        <p class="mt-3 text-3xl font-black tracking-tight text-slate-950">
                            {{ number_format($stats['completed_requests']) }}
                        </p>

                    </div>

                    <div class="grid size-11 shrink-0 place-items-center rounded-2xl bg-emerald-100 text-emerald-600">

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

                            <circle
                                cx="12"
                                cy="12"
                                r="9"
                            />
                        </svg>

                    </div>

                </div>

                <a
                    href="{{ route('admin.requests.index', ['status' => 'completed']) }}"
                    class="mt-5 inline-flex text-xs font-bold text-emerald-700 hover:text-emerald-800"
                >
                    مشاهده درخواست‌ها
                </a>

            </div>

        </section>


        {{-- Secondary statistics --}}
        <section class="grid gap-4 sm:grid-cols-2">

            <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">

                <div class="flex items-center justify-between gap-4">

                    <div>

                        <p class="text-xs font-bold text-slate-400">
                            تعرفه‌های فعال
                        </p>

                        <p class="mt-2 text-2xl font-black text-slate-950">
                            {{ number_format($stats['total_tariffs']) }}
                        </p>

                    </div>

                    <a
                        href="{{ route('admin.tariffs.index') }}"
                        class="inline-flex min-h-10 items-center rounded-xl bg-slate-100 px-4 text-xs font-black text-slate-700 transition hover:bg-slate-200"
                    >
                        مدیریت تعرفه‌ها
                    </a>

                </div>

            </div>


            <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">

                <div class="flex items-center justify-between gap-4">

                    <div>

                        <p class="text-xs font-bold text-slate-400">
                            مودم‌ها
                        </p>

                        <p class="mt-2 text-2xl font-black text-slate-950">
                            {{ number_format($stats['total_modems']) }}
                        </p>

                    </div>

                    <a
                        href="{{ route('admin.modems.index') }}"
                        class="inline-flex min-h-10 items-center rounded-xl bg-slate-100 px-4 text-xs font-black text-slate-700 transition hover:bg-slate-200"
                    >
                        مدیریت مودم‌ها
                    </a>

                </div>

            </div>

        </section>


        {{-- Latest requests --}}
        <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

            <div class="flex flex-col gap-4 border-b border-slate-200 p-5 sm:flex-row sm:items-center sm:justify-between sm:p-6">

                <div>

                    <div class="flex items-center gap-2">

                        <h3 class="text-lg font-black text-slate-950">
                            آخرین درخواست‌ها
                        </h3>

                        @if ($newRequestsCount > 0)

                            <span class="rounded-full bg-red-50 px-2.5 py-1 text-[10px] font-black text-red-600">
                                {{ number_format($newRequestsCount) }} جدید
                            </span>

                        @endif

                    </div>

                    <p class="mt-1 text-sm text-slate-500">
                        آخرین درخواست‌های ثبت‌شده توسط مشتریان
                    </p>

                </div>

                <a
                    href="{{ route('admin.requests.index') }}"
                    class="inline-flex min-h-10 items-center justify-center rounded-xl border border-slate-200 px-4 text-xs font-black text-slate-700 transition hover:bg-slate-50"
                >
                    مشاهده همه
                </a>

            </div>


            @if ($latestRequests->isNotEmpty())

                {{-- Desktop table --}}
                <div class="hidden overflow-x-auto md:block">

                    <table class="w-full text-right">

                        <thead class="border-b border-slate-100 bg-slate-50">

                        <tr>

                            <th class="whitespace-nowrap px-6 py-4 text-xs font-black text-slate-500">
                                درخواست
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 text-xs font-black text-slate-500">
                                مشتری
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 text-xs font-black text-slate-500">
                                تعرفه
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 text-xs font-black text-slate-500">
                                وضعیت
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 text-xs font-black text-slate-500">
                                تاریخ
                            </th>

                            <th class="px-6 py-4"></th>

                        </tr>

                        </thead>

                        <tbody class="divide-y divide-slate-100">

                        @foreach ($latestRequests as $request)

                            <tr class="transition hover:bg-slate-50">

                                <td class="px-6 py-4">

                                    <div>

                                        <p class="text-sm font-black text-slate-900">
                                            {{ $request->tracking_code ?? '#' . $request->id }}
                                        </p>

                                        <p class="mt-1 text-xs text-slate-400">
                                            درخواست #{{ $request->id }}
                                        </p>

                                    </div>

                                </td>


                                <td class="px-6 py-4">

                                    <p class="text-sm font-bold text-slate-800">
                                        {{ $request->full_name ?: ($request->user->name ?? 'بدون نام') }}
                                    </p>

                                    <p class="mt-1 text-xs text-slate-400" dir="ltr">
                                        {{ $request->mobile }}
                                    </p>

                                </td>


                                <td class="px-6 py-4">

                                    <p class="text-sm font-bold text-slate-700">
                                        {{ $request->tariff?->name ?? '—' }}
                                    </p>

                                </td>


                                <td class="px-6 py-4">

                                        <span class="inline-flex rounded-full border px-2.5 py-1 text-[11px] font-black {{ $statusClasses[$request->status] ?? 'border-slate-200 bg-slate-50 text-slate-600' }}">
                                            {{ $statusLabels[$request->status] ?? $request->status }}
                                        </span>

                                </td>


                                <td class="whitespace-nowrap px-6 py-4">

                                    <p class="text-xs font-bold text-slate-600">
                                        {{ $request->created_at?->format('Y/m/d') }}
                                    </p>

                                    <p class="mt-1 text-[11px] text-slate-400">
                                        {{ $request->created_at?->format('H:i') }}
                                    </p>

                                </td>


                                <td class="px-6 py-4">

                                    <a
                                        href="{{ route('admin.requests.show', $request) }}"
                                        class="inline-flex min-h-9 items-center rounded-lg bg-slate-100 px-3 text-xs font-black text-slate-700 transition hover:bg-slate-200"
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
                <div class="divide-y divide-slate-100 md:hidden">

                    @foreach ($latestRequests as $request)

                        <a
                            href="{{ route('admin.requests.show', $request) }}"
                            class="block p-5 transition hover:bg-slate-50"
                        >

                            <div class="flex items-start justify-between gap-4">

                                <div class="min-w-0">

                                    <p class="truncate text-sm font-black text-slate-900">
                                        {{ $request->full_name ?: ($request->user->name ?? 'بدون نام') }}
                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">
                                        {{ $request->tracking_code ?? '#' . $request->id }}
                                    </p>

                                </div>

                                <span class="shrink-0 rounded-full border px-2.5 py-1 text-[10px] font-black {{ $statusClasses[$request->status] ?? 'border-slate-200 bg-slate-50 text-slate-600' }}">
                                    {{ $statusLabels[$request->status] ?? $request->status }}
                                </span>

                            </div>


                            <div class="mt-4 flex items-center justify-between gap-4">

                                <div>

                                    <p class="text-xs font-bold text-slate-600">
                                        {{ $request->tariff?->name ?? 'بدون تعرفه' }}
                                    </p>

                                    <p class="mt-1 text-[11px] text-slate-400">
                                        {{ $request->created_at?->format('Y/m/d - H:i') }}
                                    </p>

                                </div>

                                <span class="text-xs font-black text-primary-600">
                                    مشاهده ←
                                </span>

                            </div>

                        </a>

                    @endforeach

                </div>

            @else

                <div class="px-6 py-16 text-center">

                    <div class="mx-auto grid size-14 place-items-center rounded-2xl bg-slate-100 text-slate-400">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.6"
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

                    <h3 class="mt-4 text-sm font-black text-slate-900">
                        هنوز درخواستی ثبت نشده است
                    </h3>

                    <p class="mt-2 text-xs text-slate-400">
                        با ثبت اولین درخواست، اطلاعات آن در این بخش نمایش داده می‌شود.
                    </p>

                </div>

            @endif

        </section>


        {{-- Quick actions --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">

            <div>

                <h3 class="text-lg font-black text-slate-950">
                    دسترسی سریع
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    مدیریت سریع بخش‌های اصلی پنل
                </p>

            </div>


            <div class="mt-5 grid gap-3 sm:grid-cols-2 lg:grid-cols-3">

                <a
                    href="{{ route('admin.requests.index') }}"
                    class="group flex min-h-20 items-center gap-4 rounded-2xl border border-slate-200 p-4 transition hover:border-primary-200 hover:bg-primary-50/50"
                >

                    <span class="grid size-11 shrink-0 place-items-center rounded-xl bg-primary-50 text-primary-600">

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
                                d="M9 5h6M9 9h6M9 13h4M5 4h14v16H5z"
                            />
                        </svg>

                    </span>

                    <span>

                        <span class="block text-sm font-black text-slate-900">
                            درخواست‌ها
                        </span>

                        <span class="mt-1 block text-xs text-slate-500">
                            بررسی و مدیریت درخواست‌ها
                        </span>

                    </span>

                </a>


                <a
                    href="{{ route('admin.tariffs.index') }}"
                    class="group flex min-h-20 items-center gap-4 rounded-2xl border border-slate-200 p-4 transition hover:border-primary-200 hover:bg-primary-50/50"
                >

                    <span class="grid size-11 shrink-0 place-items-center rounded-xl bg-primary-50 text-primary-600">

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
                                d="M12 3v18M17 7.5c0-1.7-2.2-3-5-3s-5 1.3-5 3 2.2 3 5 3 5 1.3 5 3-2.2 3-5 3-5-1.3-5-3"
                            />
                        </svg>

                    </span>

                    <span>

                        <span class="block text-sm font-black text-slate-900">
                            تعرفه‌ها
                        </span>

                        <span class="mt-1 block text-xs text-slate-500">
                            مدیریت بسته‌ها و قیمت‌ها
                        </span>

                    </span>

                </a>


                <a
                    href="{{ route('admin.modems.index') }}"
                    class="group flex min-h-20 items-center gap-4 rounded-2xl border border-slate-200 p-4 transition hover:border-primary-200 hover:bg-primary-50/50"
                >

                    <span class="grid size-11 shrink-0 place-items-center rounded-xl bg-primary-50 text-primary-600">

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
                                d="M4 7.5A2.5 2.5 0 0 1 6.5 5h11A2.5 2.5 0 0 1 20 7.5v9a2.5 2.5 0 0 1-2.5 2.5h-11A2.5 2.5 0 0 1 4 16.5z"
                            />

                            <path
                                stroke-linecap="round"
                                d="M8 15h.01M12 15h.01M16 15h.01"
                            />
                        </svg>

                    </span>

                    <span>

                        <span class="block text-sm font-black text-slate-900">
                            مودم‌ها
                        </span>

                        <span class="mt-1 block text-xs text-slate-500">
                            مدیریت مودم‌های قابل فروش
                        </span>

                    </span>

                </a>

            </div>

        </section>

    </div>

</x-layouts.admin>
