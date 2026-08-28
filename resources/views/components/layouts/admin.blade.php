<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, viewport-fit=cover"
    >

    <meta
        name="theme-color"
        content="#0f172a"
    >

    <title>
        {{ $title ?? 'مدیریت | فیبره نوری' }}
    </title>

    <meta
        name="description"
        content="{{ $description ?? 'پنل مدیریت فیبره نوری' }}"
    >

    @vite([
    'resources/css/app.css',
    'resources/js/app.js',
    ])
</head>

<body
    class="min-h-screen overflow-x-hidden bg-slate-100 text-slate-900 antialiased"
    x-data="{ sidebarOpen: false }"
>

{{-- Mobile Overlay --}}
<div
    x-cloak
    x-show="sidebarOpen"
    x-transition.opacity
    @click="sidebarOpen = false"
    class="fixed inset-0 z-40 bg-slate-950/50 lg:hidden"
    aria-hidden="true"
></div>


{{-- Sidebar --}}
<aside
    class="
        fixed inset-y-0 right-0 z-50
        flex w-72 max-w-[85vw] flex-col
        border-l border-slate-200
        bg-white
        transition-transform duration-300
        lg:translate-x-0
    "
    :class="sidebarOpen
        ? 'translate-x-0'
        : 'translate-x-full lg:translate-x-0'"
>

    {{-- Brand --}}
    <div
        class="flex h-20 shrink-0 items-center justify-between border-b border-slate-200 px-5"
    >

        <x-brand />

        <button
            type="button"
            @click="sidebarOpen = false"
            class="
                grid size-10 place-items-center
                rounded-xl
                border border-slate-200
                text-slate-600
                transition
                hover:bg-slate-50
                lg:hidden
            "
            aria-label="بستن منو"
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
                    d="M6 18 18 6M6 6l12 12"
                />
            </svg>
        </button>

    </div>


    {{-- Navigation --}}
    <nav class="flex-1 overflow-y-auto p-4">

        <p
            class="px-3 pb-3 text-[11px] font-black tracking-wide text-slate-400"
        >
            مدیریت
        </p>

        <div class="grid gap-1">

            {{-- Dashboard --}}
            <a
                href="{{ route('admin.dashboard') }}"
                @class([
                    'flex min-h-11 items-center gap-3 rounded-xl px-3 text-sm font-bold transition',
                    'bg-slate-100 text-slate-950' => request()->routeIs('admin.dashboard'),
                    'text-slate-700 hover:bg-slate-100' => ! request()->routeIs('admin.dashboard'),
                ])
            >

                <span
                    @class([
                        'grid size-9 shrink-0 place-items-center rounded-lg',
                        'bg-slate-900 text-white' => request()->routeIs('admin.dashboard'),
                        'bg-slate-100 text-slate-600' => ! request()->routeIs('admin.dashboard'),
                    ])
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
                            d="M3 12 12 3l9 9M5 10v10h14V10"
                        />
                    </svg>
                </span>

                داشبورد

            </a>


            {{-- Requests --}}
            <a
                href="{{ route('admin.requests.index') }}"
                @class([
                    'flex min-h-11 items-center gap-3 rounded-xl px-3 text-sm font-bold transition',
                    'bg-slate-100 text-slate-950' => request()->routeIs('admin.requests.*'),
                    'text-slate-700 hover:bg-slate-100' => ! request()->routeIs('admin.requests.*'),
                ])
            >

                <span
                    @class([
                        'grid size-9 shrink-0 place-items-center rounded-lg',
                        'bg-slate-900 text-white' => request()->routeIs('admin.requests.*'),
                        'bg-slate-100 text-slate-600' => ! request()->routeIs('admin.requests.*'),
                    ])
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
                            d="M9 5h6M9 9h6M9 13h4M5 4h14v16H5z"
                        />
                    </svg>
                </span>

                <span class="flex-1">
                    درخواست‌ها
                </span>

                @if (($notificationCount ?? 0) > 0)
                    <span
                        class="inline-flex min-w-6 items-center justify-center rounded-full bg-red-500 px-2 py-0.5 text-[10px] font-black text-white"
                    >
                        {{ $notificationCount > 99 ? '99+' : $notificationCount }}
                    </span>
                @endif

            </a>


            {{-- Settings --}}
            <a
                href="{{ route('admin.settings') }}"
                @class([
                    'flex min-h-11 items-center gap-3 rounded-xl px-3 text-sm font-bold transition',
                    'bg-slate-100 text-slate-950' => request()->routeIs('admin.settings'),
                    'text-slate-700 hover:bg-slate-100' => ! request()->routeIs('admin.settings'),
                ])
            >

                <span
                    @class([
                        'grid size-9 shrink-0 place-items-center rounded-lg',
                        'bg-slate-900 text-white' => request()->routeIs('admin.settings'),
                        'bg-slate-100 text-slate-600' => ! request()->routeIs('admin.settings'),
                    ])
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
                            d="M10.5 3h3l.6 2.1a7.9 7.9 0 0 1 1.8.75l1.95-1.05 2.12 2.12-1.05 1.95c.3.57.55 1.17.75 1.8L22 11.3v3l-2.1.6a7.9 7.9 0 0 1-.75 1.8l1.05 1.95-2.12 2.12-1.95-1.05a7.9 7.9 0 0 1-1.8.75L13.5 21h-3l-.6-2.1a7.9 7.9 0 0 1-1.8-.75l-1.95 1.05-2.12-2.12 1.05-1.95a7.9 7.9 0 0 1 .75-1.8l-2.1-.6v-3l2.1-.6c.19-.63.44-1.23.75-1.8L4.03 5.38 6.15 3.26 8.1 4.31a7.9 7.9 0 0 1 1.8-.75z"
                        />

                        <circle
                            cx="12"
                            cy="12"
                            r="3.2"
                        />
                    </svg>
                </span>

                تنظیمات

            </a>

        </div>

    </nav>


    {{-- Admin User --}}
    <div class="shrink-0 border-t border-slate-200 p-4">

        <div
            class="flex items-center gap-3 rounded-2xl bg-slate-50 p-3"
        >

            <div
                class="
                    grid size-10 shrink-0 place-items-center
                    rounded-xl
                    bg-slate-900
                    text-sm font-black text-white
                "
            >
                {{ mb_substr(auth()->user()->name ?? 'ا', 0, 1) }}
            </div>

            <div class="min-w-0">

                <p class="truncate text-sm font-black text-slate-900">
                    {{ auth()->user()->name ?? 'مدیر سیستم' }}
                </p>

                <p class="mt-0.5 truncate text-xs text-slate-500">
                    پنل مدیریت
                </p>

            </div>

        </div>

    </div>

</aside>


{{-- Main --}}
<div class="min-h-screen lg:pr-72">

    {{-- Topbar --}}
    <header
        class="
            sticky top-0 z-30
            border-b border-slate-200
            bg-white/95
            backdrop-blur
        "
    >

        <div
            class="
                flex min-h-16 items-center justify-between
                gap-4
                px-4 sm:px-6 lg:px-8
            "
        >

            <div class="flex min-w-0 items-center gap-3">

                {{-- Mobile Menu --}}
                <button
                    type="button"
                    @click="sidebarOpen = true"
                    class="
                        grid size-11 shrink-0 place-items-center
                        rounded-xl
                        border border-slate-200
                        bg-white
                        text-slate-700
                        transition
                        hover:bg-slate-50
                        lg:hidden
                    "
                    aria-label="باز کردن منو"
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
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>

                </button>


                <div class="min-w-0">

                    <p class="text-xs font-bold text-slate-400">
                        پنل مدیریت
                    </p>

                    <h1
                        class="
                            mt-1 truncate
                            text-base font-black text-slate-950
                            sm:text-lg
                        "
                    >
                        {{ $heading ?? 'مدیریت فیبره نوری' }}
                    </h1>

                </div>

            </div>


            {{-- Topbar Actions --}}
            <div class="flex items-center gap-2">

                {{-- Notifications --}}
                <div
                    class="relative"
                    x-data="{ notificationOpen: false }"
                    @keydown.escape.window="notificationOpen = false"
                >

                    <button
                        type="button"
                        @click="notificationOpen = !notificationOpen"
                        class="
                            relative
                            grid size-11 place-items-center
                            rounded-xl
                            border border-slate-200
                            bg-white
                            text-slate-600
                            transition
                            hover:bg-slate-50
                        "
                        :aria-expanded="notificationOpen"
                        aria-label="اعلان‌ها"
                        aria-controls="admin-notifications"
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
                                d="M14.5 18h-5a3 3 0 0 1-3-3v-4a5.5 5.5 0 1 1 11 0v4a3 3 0 0 1-3 3ZM9 18a3 3 0 0 0 6 0M12 3v1"
                            />
                        </svg>


                        @if (($notificationCount ?? 0) > 0)

                            <span
                                class="
                                    absolute -right-1 -top-1
                                    inline-flex min-w-5 h-5
                                    items-center justify-center
                                    rounded-full
                                    bg-red-500
                                    px-1
                                    text-[9px]
                                    font-black
                                    text-white
                                    ring-2 ring-white
                                "
                            >
                                {{ $notificationCount > 99 ? '99+' : $notificationCount }}
                            </span>

                        @endif

                    </button>


                    {{-- Notification Dropdown --}}
                    <div
                        id="admin-notifications"
                        x-cloak
                        x-show="notificationOpen"
                        x-transition.origin.top.left
                        @click.outside="notificationOpen = false"
                        class="
                            absolute left-0 top-full mt-3
                            z-50
                            w-[min(24rem,calc(100vw-2rem))]
                            overflow-hidden
                            rounded-2xl
                            border border-slate-200
                            bg-white
                            shadow-xl
                        "
                    >

                        {{-- Dropdown Header --}}
                        <div
                            class="
                                flex items-center justify-between
                                border-b border-slate-100
                                px-4 py-4
                            "
                        >

                            <div>

                                <p class="text-sm font-black text-slate-900">
                                    اعلان‌ها
                                </p>

                                <p class="mt-1 text-xs text-slate-400">
                                    درخواست‌های جدید مشتریان
                                </p>

                            </div>

                            @if (($notificationCount ?? 0) > 0)

                                <span
                                    class="rounded-full bg-red-50 px-2.5 py-1 text-[10px] font-black text-red-600"
                                >
                                    {{ $notificationCount }} جدید
                                </span>

                            @endif

                        </div>


                        {{-- New Requests --}}
                        <div class="max-h-[26rem] overflow-y-auto">

                            @forelse (($newRequests ?? collect()) as $newRequest)

                                <a
                                    href="{{ route('admin.requests.show', $newRequest) }}"
                                    @click="notificationOpen = false"
                                    class="
                                        block
                                        border-b border-slate-100
                                        px-4 py-4
                                        transition
                                        hover:bg-slate-50
                                    "
                                >

                                    <div class="flex items-start gap-3">

                                        <span
                                            class="
                                                grid size-10 shrink-0
                                                place-items-center
                                                rounded-xl
                                                bg-amber-50
                                                text-amber-600
                                            "
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
                                                    d="M9 5h6M9 9h6M9 13h4M5 4h14v16H5z"
                                                />
                                            </svg>

                                        </span>


                                        <span class="min-w-0 flex-1">

                                            <span
                                                class="flex items-center justify-between gap-2"
                                            >

                                                <span
                                                    class="truncate text-sm font-black text-slate-900"
                                                >
                                                    درخواست جدید
                                                </span>

                                                <span
                                                    class="shrink-0 text-[10px] text-slate-400"
                                                >
                                                    {{ verta($newRequest->created_at)->format('Y/m/d') }}
                                                </span>

                                            </span>


                                            <span
                                                class="mt-1 block truncate text-xs font-bold text-slate-600"
                                            >
                                                {{ $newRequest->full_name }}
                                            </span>


                                            <span
                                                class="mt-1 block truncate text-[11px] text-slate-400"
                                                dir="ltr"
                                            >
                                                {{ $newRequest->mobile }}
                                            </span>


                                            <span
                                                class="mt-2 inline-flex rounded-full bg-amber-50 px-2 py-1 text-[10px] font-bold text-amber-700"
                                            >
                                                {{ $newRequest->tracking_code }}
                                            </span>

                                        </span>

                                    </div>

                                </a>

                            @empty

                                <div class="px-5 py-10 text-center">

                                    <div
                                        class="mx-auto grid size-12 place-items-center rounded-2xl bg-slate-100 text-slate-400"
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
                                                d="M14.5 18h-5a3 3 0 0 1-3-3v-4a5.5 5.5 0 1 1 11 0v4a3 3 0 0 1-3 3ZM9 18a3 3 0 0 0 6 0"
                                            />
                                        </svg>

                                    </div>

                                    <p class="mt-4 text-sm font-black text-slate-700">
                                        اعلان جدیدی ندارید
                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">
                                        همه درخواست‌ها بررسی شده‌اند.
                                    </p>

                                </div>

                            @endforelse

                        </div>


                        {{-- Dropdown Footer --}}
                        <div
                            class="border-t border-slate-100 bg-slate-50 p-3"
                        >

                            <a
                                href="{{ route('admin.requests.index') }}"
                                @click="notificationOpen = false"
                                class="
                                    flex min-h-10
                                    items-center justify-center
                                    rounded-xl
                                    bg-white
                                    border border-slate-200
                                    px-4
                                    text-xs
                                    font-black
                                    text-slate-700
                                    transition
                                    hover:bg-slate-100
                                "
                            >
                                مشاهده همه درخواست‌ها
                            </a>

                        </div>

                    </div>

                </div>


                {{-- View Website --}}
                <a
                    href="{{ route('home') }}"
                    class="
                        hidden
                        min-h-10 shrink-0
                        items-center justify-center
                        rounded-xl
                        border border-slate-200
                        px-3
                        text-xs font-bold text-slate-700
                        transition
                        hover:bg-slate-50
                        sm:inline-flex sm:px-4 sm:text-sm
                    "
                >
                    مشاهده سایت
                </a>

            </div>

        </div>

    </header>


    {{-- Page Content --}}
    <main class="p-4 sm:p-6 lg:p-8">

        <div class="mx-auto w-full max-w-7xl">

            <x-flash />

            {{ $slot }}

        </div>

    </main>

</div>

</body>

</html>
