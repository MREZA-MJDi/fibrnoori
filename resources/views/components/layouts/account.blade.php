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
        content="#2563eb"
    >

    <title>
        {{ $title ?? 'حساب کاربری | فیبره نوری' }}
    </title>

    <meta
        name="description"
        content="{{ $description ?? 'پنل کاربری فیبره نوری' }}"
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
                    rounded-xl border border-slate-200
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
            حساب کاربری
        </p>

        <div class="grid gap-1">

            {{-- Dashboard --}}
            <a
                href="{{ route('account.dashboard') }}"
                @class([
                    'flex min-h-11 items-center gap-3 rounded-xl px-3 text-sm font-bold transition',
                    'bg-primary-50 text-primary-700' => request()->routeIs('account.dashboard'),
                    'text-slate-700 hover:bg-slate-100' => ! request()->routeIs('account.dashboard'),
                ])
            >

                    <span
                        @class([
                            'grid size-9 shrink-0 place-items-center rounded-lg',
                            'bg-primary-100 text-primary-700' => request()->routeIs('account.dashboard'),
                            'bg-slate-100 text-slate-600' => ! request()->routeIs('account.dashboard'),
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
                href="{{ route('account.requests.index') }}"
                @class([
                    'flex min-h-11 items-center gap-3 rounded-xl px-3 text-sm font-bold transition',
                    'bg-primary-50 text-primary-700' => request()->routeIs('account.requests.*'),
                    'text-slate-700 hover:bg-slate-100' => ! request()->routeIs('account.requests.*'),
                ])
            >

                    <span
                        @class([
                            'grid size-9 shrink-0 place-items-center rounded-lg',
                            'bg-primary-100 text-primary-700' => request()->routeIs('account.requests.*'),
                            'bg-slate-100 text-slate-600' => ! request()->routeIs('account.requests.*'),
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

                درخواست‌های من

            </a>


            {{-- Profile --}}
            <a
                href="{{ route('account.profile') }}"
                @class([
                    'flex min-h-11 items-center gap-3 rounded-xl px-3 text-sm font-bold transition',
                    'bg-primary-50 text-primary-700' => request()->routeIs('account.profile'),
                    'text-slate-700 hover:bg-slate-100' => ! request()->routeIs('account.profile'),
                ])
            >

                    <span
                        @class([
                            'grid size-9 shrink-0 place-items-center rounded-lg',
                            'bg-primary-100 text-primary-700' => request()->routeIs('account.profile'),
                            'bg-slate-100 text-slate-600' => ! request()->routeIs('account.profile'),
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
                            <circle
                                cx="12"
                                cy="8"
                                r="3"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M5 20a7 7 0 0 1 14 0"
                            />
                        </svg>
                    </span>

                پروفایل

            </a>

        </div>

    </nav>


    {{-- User --}}
    <div class="shrink-0 border-t border-slate-200 p-4">

        <div
            class="flex items-center gap-3 rounded-2xl bg-slate-50 p-3"
        >

            <div
                class="
                        grid size-10 shrink-0 place-items-center
                        rounded-xl
                        bg-primary-600
                        text-sm font-black text-white
                    "
            >
                {{ mb_substr(auth()->user()->name ?? 'ک', 0, 1) }}
            </div>

            <div class="min-w-0">

                <p class="truncate text-sm font-black text-slate-900">
                    {{ auth()->user()->name ?? 'حساب کاربری' }}
                </p>

                <p class="mt-0.5 truncate text-xs text-slate-500">
                    مشترک فیبره نوری
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
                    gap-3
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
                        حساب کاربری
                    </p>

                    <h1
                        class="
                                mt-1 truncate
                                text-base font-black text-slate-950
                                sm:text-lg
                            "
                    >
                        {{ $heading ?? 'خوش آمدید' }}
                    </h1>

                </div>

            </div>


            {{-- Back to Site --}}
            <a
                href="{{ route('home') }}"
                class="
                        inline-flex min-h-10 shrink-0
                        items-center justify-center
                        rounded-xl
                        border border-slate-200
                        px-3
                        text-xs font-bold text-slate-700
                        transition
                        hover:bg-slate-50
                        sm:px-4 sm:text-sm
                    "
            >
                سایت اصلی
            </a>

        </div>

    </header>


    {{-- Content --}}
    <main class="p-4 sm:p-6 lg:p-8">

        <div class="mx-auto w-full max-w-7xl">

            <x-flash />

            {{ $slot }}

        </div>

    </main>

</div>

</body>

</html>
