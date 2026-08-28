<x-layouts.admin
    title="داشبورد مدیریت | فیبره نوری"
    heading="داشبورد مدیریت"
>

    <div class="space-y-6">

        {{-- Welcome --}}
        <section class="relative overflow-hidden rounded-3xl bg-slate-900 p-6 text-white shadow-sm sm:p-8">

            <div class="relative z-10">

                <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                    <div class="min-w-0">

                        <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1.5 text-xs font-bold text-slate-200">
                            پنل مدیریت
                        </span>

                        <h2 class="mt-4 text-2xl font-black tracking-tight sm:text-3xl">
                            خوش آمدید 👋
                        </h2>

                        <p class="mt-3 max-w-2xl text-sm leading-7 text-slate-300">
                            از این بخش می‌توانید درخواست‌های فیبر نوری را بررسی،
                            وضعیت آن‌ها را مدیریت و روند درخواست‌های مشتریان را پیگیری کنید.
                        </p>

                    </div>

                    <a
                        href="{{ route('admin.requests.index') }}"
                        class="inline-flex min-h-12 shrink-0 items-center justify-center gap-2 rounded-xl bg-white px-5 text-sm font-black text-slate-900 transition hover:bg-slate-100"
                    >
                        مشاهده درخواست‌ها

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
                                d="M13 5l7 7-7 7M4 12h16"
                            />
                        </svg>
                    </a>

                </div>

            </div>

            <div
                class="pointer-events-none absolute -left-16 -top-16 size-48 rounded-full bg-primary-600/20 blur-3xl"
            ></div>

            <div
                class="pointer-events-none absolute -bottom-20 right-1/3 size-56 rounded-full bg-primary-500/10 blur-3xl"
            ></div>

        </section>


        {{-- New Requests Alert --}}
        @if ($stats['pending_requests'] > 0)

            <a
                href="{{ route('admin.requests.index', ['status' => 'pending']) }}"
                class="group flex flex-col gap-4 rounded-3xl border border-amber-200 bg-amber-50 p-5 transition hover:border-amber-300 hover:bg-amber-100 sm:flex-row sm:items-center sm:justify-between"
            >

                <div class="flex items-start gap-4">

                    <div class="grid size-12 shrink-0 place-items-center rounded-2xl bg-amber-100 text-amber-700">

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
                                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9a6 6 0 1 0-12 0v.75a8.967 8.967 0 0 1-2.31 6.022 23.848 23.848 0 0 0 5.454 1.31m5.713 0a24.255 24.255 0 0 1-5.713 0m5.713 0a3 3 0 1 1-5.713 0"
                            />
                        </svg>

                    </div>

                    <div>

                        <p class="text-sm font-black text-amber-900">
                            {{ number_format($stats['pending_requests']) }}
                            درخواست جدید دارید
                        </p>

                        <p class="mt-1 text-xs leading-6 text-amber-700">
                            درخواست‌های جدید منتظر بررسی شما هستند.
                        </p>

                    </div>

                </div>

                <span class="inline-flex min-h-10 items-center justify-center rounded-xl bg-amber-600 px-4 text-xs font-black text-white transition group-hover:bg-amber-700">
                    بررسی درخواست‌ها
                </span>

            </a>

        @endif


        {{-- Statistics --}}
        <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">

            {{-- Total --}}
            <a
                href="{{ route('admin.requests.index') }}"
                class="group rounded-3xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-primary-200 hover:shadow-md"
            >

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-xs font-bold text-slate-400">
                            کل درخواست‌ها
                        </p>

                        <p class="mt-3 text-3xl font-black tracking-tight text-slate-950">
                            {{ number_format($stats['total_requests']) }}
                        </p>

                        <p class="mt-2 text-xs font-bold text-primary-600">
                            مشاهده همه
                        </p>

                    </div>

                    <div class="grid size-11 shrink-0 place-items-center rounded-2xl bg-primary-50 text-primary-600 transition group-hover:bg-primary-100">

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

            </a>


            {{-- Pending --}}
            <a
                href="{{ route('admin.requests.index', ['status' => 'pending']) }}"
                class="group rounded-3xl border border-amber-200 bg-amber-50/60 p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-amber-300 hover:shadow-md"
            >

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-xs font-bold text-amber-700">
                            در انتظار بررسی
                        </p>

                        <p class="mt-3 text-3xl font-black tracking-tight text-slate-950">
                            {{ number_format($stats['pending_requests']) }}
                        </p>

                        <p class="mt-2 text-xs font-bold text-amber-700">
                            نیازمند اقدام
                        </p>

                    </div>

                    <div class="grid size-11 shrink-0 place-items-center rounded-2xl bg-amber-100 text-amber-600">

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

                    </div>

                </div>

            </a>


            {{-- Reviewing --}}
            <a
                href="{{ route('admin.requests.index', ['status' => 'reviewing']) }}"
                class="group rounded-3xl border border-blue-200 bg-blue-50/60 p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-blue-300 hover:shadow-md"
            >

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-xs font-bold text-blue-700">
                            در حال بررسی
                        </p>

                        <p class="mt-3 text-3xl font-black tracking-tight text-slate-950">
                            {{ number_format($stats['reviewing_requests']) }}
                        </p>

                        <p class="mt-2 text-xs font-bold text-blue-700">
                            در حال پیگیری
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

                    </div>

                </div>

            </a>


            {{-- Approved --}}
            <a
                href="{{ route('admin.requests.index', ['status' => 'approved']) }}"
                class="group rounded-3xl border border-indigo-200 bg-indigo-50/60 p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-indigo-300 hover:shadow-md"
            >

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-xs font-bold text-indigo-700">
                            تأیید شده
                        </p>

                        <p class="mt-3 text-3xl font-black tracking-tight text-slate-950">
                            {{ number_format($stats['approved_requests']) }}
                        </p>

                        <p class="mt-2 text-xs font-bold text-indigo-700">
                            درخواست‌های تأییدشده
                        </p>

                    </div>

                    <div class="grid size-11 shrink-0 place-items-center rounded-2xl bg-indigo-100 text-indigo-600">

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

            </a>


            {{-- Completed --}}
            <a
                href="{{ route('admin.requests.index', ['status' => 'completed']) }}"
                class="group rounded-3xl border border-emerald-200 bg-emerald-50/60 p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-emerald-300 hover:shadow-md"
            >

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-xs font-bold text-emerald-700">
                            تکمیل شده
                        </p>

                        <p class="mt-3 text-3xl font-black tracking-tight text-slate-950">
                            {{ number_format($stats['completed_requests']) }}
                        </p>

                        <p class="mt-2 text-xs font-bold text-emerald-700">
                            درخواست‌های تکمیل‌شده
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

            </a>


            {{-- Rejected --}}
            <a
                href="{{ route('admin.requests.index', ['status' => 'rejected']) }}"
                class="group rounded-3xl border border-red-200 bg-red-50/60 p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-red-300 hover:shadow-md"
            >

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-xs font-bold text-red-700">
                            رد شده
                        </p>

                        <p class="mt-3 text-3xl font-black tracking-tight text-slate-950">
                            {{ number_format($stats['rejected_requests']) }}
                        </p>

                        <p class="mt-2 text-xs font-bold text-red-700">
                            درخواست‌های ردشده
                        </p>

                    </div>

                    <div class="grid size-11 shrink-0 place-items-center rounded-2xl bg-red-100 text-red-600">

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
                                d="m8 8 8 8M16 8l-8 8"
                            />

                            <circle
                                cx="12"
                                cy="12"
                                r="9"
                            />
                        </svg>

                    </div>

                </div>

            </a>

        </section>


        {{-- Management --}}
        <section class="grid gap-6 lg:grid-cols-2">

            {{-- Requests --}}
            <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <h3 class="text-lg font-black text-slate-950">
                            مدیریت درخواست‌ها
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            دسترسی سریع به درخواست‌های مشتریان
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


                <div class="mt-5 grid gap-3 sm:grid-cols-2">

                    <a
                        href="{{ route('admin.requests.index', ['status' => 'pending']) }}"
                        class="flex min-h-16 items-center justify-between rounded-2xl border border-amber-200 bg-amber-50 px-4 transition hover:bg-amber-100"
                    >

                        <span class="text-sm font-bold text-amber-900">
                            در انتظار بررسی
                        </span>

                        <span class="rounded-full bg-amber-200 px-2.5 py-1 text-xs font-black text-amber-800">
                            {{ number_format($stats['pending_requests']) }}
                        </span>

                    </a>


                    <a
                        href="{{ route('admin.requests.index', ['status' => 'reviewing']) }}"
                        class="flex min-h-16 items-center justify-between rounded-2xl border border-blue-200 bg-blue-50 px-4 transition hover:bg-blue-100"
                    >

                        <span class="text-sm font-bold text-blue-900">
                            در حال بررسی
                        </span>

                        <span class="rounded-full bg-blue-200 px-2.5 py-1 text-xs font-black text-blue-800">
                            {{ number_format($stats['reviewing_requests']) }}
                        </span>

                    </a>


                    <a
                        href="{{ route('admin.requests.index', ['status' => 'approved']) }}"
                        class="flex min-h-16 items-center justify-between rounded-2xl border border-indigo-200 bg-indigo-50 px-4 transition hover:bg-indigo-100"
                    >

                        <span class="text-sm font-bold text-indigo-900">
                            تأیید شده
                        </span>

                        <span class="rounded-full bg-indigo-200 px-2.5 py-1 text-xs font-black text-indigo-800">
                            {{ number_format($stats['approved_requests']) }}
                        </span>

                    </a>


                    <a
                        href="{{ route('admin.requests.index', ['status' => 'completed']) }}"
                        class="flex min-h-16 items-center justify-between rounded-2xl border border-emerald-200 bg-emerald-50 px-4 transition hover:bg-emerald-100"
                    >

                        <span class="text-sm font-bold text-emerald-900">
                            تکمیل شده
                        </span>

                        <span class="rounded-full bg-emerald-200 px-2.5 py-1 text-xs font-black text-emerald-800">
                            {{ number_format($stats['completed_requests']) }}
                        </span>

                    </a>

                </div>


                <a
                    href="{{ route('admin.requests.index') }}"
                    class="mt-4 inline-flex min-h-11 w-full items-center justify-center rounded-xl bg-slate-900 px-5 text-sm font-black text-white transition hover:bg-slate-800"
                >
                    مشاهده تمام درخواست‌ها
                </a>

            </div>


            {{-- Quick Actions --}}
            <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <h3 class="text-lg font-black text-slate-950">
                            دسترسی سریع
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            مدیریت بخش‌های اصلی پنل
                        </p>

                    </div>

                    <div class="grid size-11 shrink-0 place-items-center rounded-2xl bg-slate-100 text-slate-600">

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
                                d="M10.5 3h3l.6 2.1a7.9 7.9 0 0 1 1.8.75l1.95-1.05 2.12 2.12-1.05 1.95c.3.57.55 1.17.75 1.8L22 11.3v3l-2.1.6a7.9 7.9 0 0 1-.75 1.8l1.05 1.95-2.12 2.12-1.95-1.05a7.9 7.9 0 0 1-1.8.75L13.5 21h-3l-.6-2.1a7.9 7.9 0 0 1-1.8-.75l-1.95 1.05-2.12-2.12 1.05-1.95a7.9 7.9 0 0 1-.75-1.8z"
                            />

                            <circle
                                cx="12"
                                cy="12"
                                r="3.2"
                            />
                        </svg>

                    </div>

                </div>


                <div class="mt-5 grid gap-3">

                    <a
                        href="{{ route('admin.requests.index') }}"
                        class="group flex min-h-16 items-center gap-4 rounded-2xl border border-slate-200 p-4 transition hover:border-primary-200 hover:bg-primary-50/50"
                    >

                        <span class="grid size-10 shrink-0 place-items-center rounded-xl bg-primary-50 text-primary-600">

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

                        <span class="min-w-0">

                            <span class="block text-sm font-black text-slate-900">
                                درخواست‌ها
                            </span>

                            <span class="mt-1 block text-xs text-slate-500">
                                مشاهده و مدیریت درخواست‌های مشتریان
                            </span>

                        </span>

                    </a>


                    <a
                        href="{{ route('admin.tariffs.index') }}"
                        class="group flex min-h-16 items-center gap-4 rounded-2xl border border-slate-200 p-4 transition hover:border-primary-200 hover:bg-primary-50/50"
                    >

                        <span class="grid size-10 shrink-0 place-items-center rounded-xl bg-primary-50 text-primary-600">

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
                                    d="M6 4h12v16H6z"
                                />

                                <path
                                    stroke-linecap="round"
                                    d="M9 8h6M9 12h6M9 16h3"
                                />
                            </svg>

                        </span>

                        <span class="min-w-0">

                            <span class="block text-sm font-black text-slate-900">
                                تعرفه‌ها
                            </span>

                            <span class="mt-1 block text-xs text-slate-500">
                                مدیریت تعرفه‌های اینترنت
                            </span>

                        </span>

                    </a>


                    <a
                        href="{{ route('admin.modems.index') }}"
                        class="group flex min-h-16 items-center gap-4 rounded-2xl border border-slate-200 p-4 transition hover:border-primary-200 hover:bg-primary-50/50"
                    >

                        <span class="grid size-10 shrink-0 place-items-center rounded-xl bg-primary-50 text-primary-600">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.8"
                                stroke="currentColor"
                                class="size-5"
                            >
                                <rect
                                    x="4"
                                    y="6"
                                    width="16"
                                    height="12"
                                    rx="2"
                                />

                                <path
                                    stroke-linecap="round"
                                    d="M8 18v2M16 18v2M8 10h.01M12 10h.01M16 10h.01"
                                />
                            </svg>

                        </span>

                        <span class="min-w-0">

                            <span class="block text-sm font-black text-slate-900">
                                مودم‌ها
                            </span>

                            <span class="mt-1 block text-xs text-slate-500">
                                مدیریت مودم‌های قابل فروش
                            </span>

                        </span>

                    </a>


                    <a
                        href="{{ route('admin.settings') }}"
                        class="group flex min-h-16 items-center gap-4 rounded-2xl border border-slate-200 p-4 transition hover:border-slate-300 hover:bg-slate-50"
                    >

                        <span class="grid size-10 shrink-0 place-items-center rounded-xl bg-slate-100 text-slate-600">

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
                                    d="M10.5 3h3l.6 2.1a7.9 7.9 0 0 1 1.8.75l1.95-1.05 2.12 2.12-1.05 1.95c.3.57.55 1.17.75 1.8L22 11.3v3l-2.1.6a7.9 7.9 0 0 1-.75 1.8l1.05 1.95-2.12 2.12-1.95-1.05a7.9 7.9 0 0 1-1.8.75L13.5 21h-3l-.6-2.1a7.9 7.9 0 0 1-1.8-.75l-1.95 1.05-2.12-2.12 1.05-1.95a7.9 7.9 0 0 1 .75-1.8z"
                                />

                                <circle
                                    cx="12"
                                    cy="12"
                                    r="3.2"
                                />
                            </svg>

                        </span>

                        <span class="min-w-0">

                            <span class="block text-sm font-black text-slate-900">
                                تنظیمات
                            </span>

                            <span class="mt-1 block text-xs text-slate-500">
                                مدیریت تنظیمات سیستم
                            </span>

                        </span>

                    </a>

                </div>

            </div>

        </section>


        {{-- Summary --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">

            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <h3 class="text-lg font-black text-slate-950">
                        خلاصه وضعیت
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        وضعیت فعلی درخواست‌های ثبت‌شده در سیستم
                    </p>

                </div>

                <a
                    href="{{ route('admin.requests.index') }}"
                    class="inline-flex min-h-10 items-center justify-center rounded-xl border border-slate-200 px-4 text-xs font-black text-slate-700 transition hover:bg-slate-50"
                >
                    مشاهده جزئیات
                </a>

            </div>


            @php
                $total = max((int) $stats['total_requests'], 1);

                $pendingPercent = round(($stats['pending_requests'] / $total) * 100);
                $reviewingPercent = round(($stats['reviewing_requests'] / $total) * 100);
                $approvedPercent = round(($stats['approved_requests'] / $total) * 100);
                $completedPercent = round(($stats['completed_requests'] / $total) * 100);
                $rejectedPercent = round(($stats['rejected_requests'] / $total) * 100);
            @endphp


            <div class="mt-6 space-y-5">

                {{-- Pending --}}
                <div>

                    <div class="mb-2 flex items-center justify-between gap-4">

                        <span class="text-xs font-bold text-slate-600">
                            در انتظار بررسی
                        </span>

                        <span class="text-xs font-black text-slate-900">
                            {{ number_format($stats['pending_requests']) }}
                            <span class="font-medium text-slate-400">
                                ({{ $pendingPercent }}٪)
                            </span>
                        </span>

                    </div>

                    <div class="h-2 overflow-hidden rounded-full bg-slate-100">

                        <div
                            class="h-full rounded-full bg-amber-500"
                            style="width: {{ $pendingPercent }}%"
                        ></div>

                    </div>

                </div>


                {{-- Reviewing --}}
                <div>

                    <div class="mb-2 flex items-center justify-between gap-4">

                        <span class="text-xs font-bold text-slate-600">
                            در حال بررسی
                        </span>

                        <span class="text-xs font-black text-slate-900">
                            {{ number_format($stats['reviewing_requests']) }}
                            <span class="font-medium text-slate-400">
                                ({{ $reviewingPercent }}٪)
                            </span>
                        </span>

                    </div>

                    <div class="h-2 overflow-hidden rounded-full bg-slate-100">

                        <div
                            class="h-full rounded-full bg-blue-500"
                            style="width: {{ $reviewingPercent }}%"
                        ></div>

                    </div>

                </div>


                {{-- Approved --}}
                <div>

                    <div class="mb-2 flex items-center justify-between gap-4">

                        <span class="text-xs font-bold text-slate-600">
                            تأیید شده
                        </span>

                        <span class="text-xs font-black text-slate-900">
                            {{ number_format($stats['approved_requests']) }}
                            <span class="font-medium text-slate-400">
                                ({{ $approvedPercent }}٪)
                            </span>
                        </span>

                    </div>

                    <div class="h-2 overflow-hidden rounded-full bg-slate-100">

                        <div
                            class="h-full rounded-full bg-indigo-500"
                            style="width: {{ $approvedPercent }}%"
                        ></div>

                    </div>

                </div>


                {{-- Completed --}}
                <div>

                    <div class="mb-2 flex items-center justify-between gap-4">

                        <span class="text-xs font-bold text-slate-600">
                            تکمیل شده
                        </span>

                        <span class="text-xs font-black text-slate-900">
                            {{ number_format($stats['completed_requests']) }}
                            <span class="font-medium text-slate-400">
                                ({{ $completedPercent }}٪)
                            </span>
                        </span>

                    </div>

                    <div class="h-2 overflow-hidden rounded-full bg-slate-100">

                        <div
                            class="h-full rounded-full bg-emerald-500"
                            style="width: {{ $completedPercent }}%"
                        ></div>

                    </div>

                </div>


                {{-- Rejected --}}
                <div>

                    <div class="mb-2 flex items-center justify-between gap-4">

                        <span class="text-xs font-bold text-slate-600">
                            رد شده
                        </span>

                        <span class="text-xs font-black text-slate-900">
                            {{ number_format($stats['rejected_requests']) }}
                            <span class="font-medium text-slate-400">
                                ({{ $rejectedPercent }}٪)
                            </span>

                        </span>

                    </div>

                    <div class="h-2 overflow-hidden rounded-full bg-slate-100">

                        <div
                            class="h-full rounded-full bg-red-500"
                            style="width: {{ $rejectedPercent }}%"
                        ></div>

                    </div>

                </div>

            </div>

        </section>

    </div>

</x-layouts.admin>
