{{-- resources/views/components/layouts/account.blade.php --}}

@props([
'title' => 'حساب کاربری | فیبر نوری',
'heading' => 'حساب کاربری',
])

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, viewport-fit=cover"
    >

    <meta
        name="theme-color"
        content="#16a34a"
    >

    <meta
        name="description"
        content="حساب کاربری سامانه فیبر نوری"
    >

    <title>{{ $title }}</title>

    @vite([
    'resources/css/app.css',
    'resources/js/app.js',
    ])

    @stack('head')

</head>


<body class="min-h-screen bg-slate-50 text-slate-950 antialiased">

<div
    x-data="{ sidebarOpen: false }"
    class="min-h-screen"
>

    {{-- ============================================================
         Mobile overlay
    ============================================================= --}}
    <div
        x-cloak
        x-show="sidebarOpen"
        x-transition.opacity
        @click="sidebarOpen = false"
        class="fixed inset-0 z-40 bg-slate-950/40 backdrop-blur-sm lg:hidden"
        aria-hidden="true"
    ></div>


    {{-- ============================================================
         Sidebar
    ============================================================= --}}
    <aside
        class="
            fixed inset-y-0 right-0 z-50
            flex w-[280px] flex-col
            border-l border-slate-200
            bg-white
            shadow-2xl
            transition-transform duration-300
            lg:translate-x-0
        "
        :class="sidebarOpen
            ? 'translate-x-0'
            : 'translate-x-full lg:translate-x-0'"
    >

        {{-- Brand --}}
        <div class="flex min-h-[76px] items-center justify-between border-b border-slate-200 px-4 sm:px-5">

            <a
                href="{{ route('account.dashboard') }}"
                @click="sidebarOpen = false"
                class="flex min-w-0 items-center gap-3"
            >

                <span class="grid size-11 shrink-0 place-items-center rounded-2xl bg-primary-600 text-white shadow-lg shadow-primary-600/20">

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
                            d="M4 8.5A2.5 2.5 0 0 1 6.5 6h11A2.5 2.5 0 0 1 20 8.5v7a2.5 2.5 0 0 1-2.5 2.5h-11A2.5 2.5 0 0 1 4 15.5z"
                        />

                        <path
                            stroke-linecap="round"
                            d="M8 12h.01M12 12h.01M16 12h.01"
                        />

                    </svg>

                </span>


                <span class="min-w-0">

                    <span class="block truncate text-sm font-black text-slate-950">
                        فیبر نوری
                    </span>

                    <span class="mt-0.5 block truncate text-[11px] font-medium text-slate-400">
                        پنل کاربری
                    </span>

                </span>

            </a>


            <button
                type="button"
                @click="sidebarOpen = false"
                class="grid size-10 shrink-0 place-items-center rounded-xl text-slate-500 transition hover:bg-slate-100 hover:text-slate-900 lg:hidden"
                aria-label="بستن منو"
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
                        d="M6 6l12 12M18 6 6 18"
                    />

                </svg>

            </button>

        </div>


        {{-- User mini profile --}}
        <div class="border-b border-slate-100 p-3">

            <div class="flex items-center gap-3 rounded-2xl bg-slate-50 p-3">

                <span class="grid size-11 shrink-0 place-items-center rounded-xl bg-slate-900 text-sm font-black text-white">

                    {{ mb_substr(auth()->user()->name ?: 'ک', 0, 1) }}

                </span>


                <div class="min-w-0 flex-1">

                    <p class="truncate text-xs font-black text-slate-900">
                        {{ auth()->user()->name ?: 'کاربر' }}
                    </p>

                    <p
                        dir="ltr"
                        class="mt-1 truncate text-[11px] text-slate-400"
                    >
                        {{ auth()->user()->mobile }}
                    </p>

                </div>


                <span class="size-2.5 shrink-0 rounded-full bg-emerald-500 ring-4 ring-emerald-100"></span>

            </div>

        </div>


        {{-- Navigation --}}
        <nav class="flex-1 overflow-y-auto px-3 py-4">

            <div class="space-y-6">

                {{-- Main --}}
                <div>

                    <p class="px-3 pb-2 text-[10px] font-black tracking-wide text-slate-400">
                        منوی اصلی
                    </p>


                    <div class="space-y-1">

                        {{-- Dashboard --}}
                        <a
                            href="{{ route('account.dashboard') }}"
                            @click="sidebarOpen = false"
                            @class([
                                'group flex min-h-12 items-center gap-3 rounded-xl px-3 text-sm font-bold transition',
                                'bg-primary-50 text-primary-700' => request()->routeIs('account.dashboard'),
                                'text-slate-600 hover:bg-slate-50 hover:text-slate-950' => !request()->routeIs('account.dashboard'),
                            ])
                        >

                            <span
                                @class([
                                    'grid size-9 shrink-0 place-items-center rounded-lg transition',
                                    'bg-white text-primary-600 shadow-sm' => request()->routeIs('account.dashboard'),
                                    'bg-slate-100 text-slate-500 group-hover:bg-slate-200 group-hover:text-slate-700' => !request()->routeIs('account.dashboard'),
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

                                    <rect
                                        width="7"
                                        height="7"
                                        x="4"
                                        y="4"
                                        rx="1"
                                    />

                                    <rect
                                        width="7"
                                        height="7"
                                        x="13"
                                        y="4"
                                        rx="1"
                                    />

                                    <rect
                                        width="7"
                                        height="7"
                                        x="4"
                                        y="13"
                                        rx="1"
                                    />

                                    <rect
                                        width="7"
                                        height="7"
                                        x="13"
                                        y="13"
                                        rx="1"
                                    />

                                </svg>

                            </span>


                            <span>
                                داشبورد
                            </span>

                        </a>


                        {{-- Requests --}}
                        <a
                            href="{{ route('account.requests.index') }}"
                            @click="sidebarOpen = false"
                            @class([
                                'group flex min-h-12 items-center gap-3 rounded-xl px-3 text-sm font-bold transition',
                                'bg-primary-50 text-primary-700' => request()->routeIs('account.requests.*'),
                                'text-slate-600 hover:bg-slate-50 hover:text-slate-950' => !request()->routeIs('account.requests.*'),
                            ])
                        >

                            <span
                                @class([
                                    'grid size-9 shrink-0 place-items-center rounded-lg transition',
                                    'bg-white text-primary-600 shadow-sm' => request()->routeIs('account.requests.*'),
                                    'bg-slate-100 text-slate-500 group-hover:bg-slate-200 group-hover:text-slate-700' => !request()->routeIs('account.requests.*'),
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
                                درخواست‌های من
                            </span>


                            @php
                                $requestCount = auth()
                                    ->user()
                                    ->fiberRequests()
                                    ->where('status', 'pending')
                                    ->count();
                            @endphp


                            @if ($requestCount > 0)

                                <span class="min-w-6 rounded-full bg-primary-600 px-1.5 py-1 text-center text-[10px] font-black text-white">
                                    {{ number_format($requestCount) }}
                                </span>

                            @endif

                        </a>


                        {{-- New request --}}
                        <a
                            href="{{ route('account.requests.create') }}"
                            @click="sidebarOpen = false"
                            @class([
                                'group flex min-h-12 items-center gap-3 rounded-xl px-3 text-sm font-bold transition',
                                'bg-primary-50 text-primary-700' => request()->routeIs('account.requests.create'),
                                'text-slate-600 hover:bg-slate-50 hover:text-slate-950' => !request()->routeIs('account.requests.create'),
                            ])
                        >

                            <span
                                @class([
                                    'grid size-9 shrink-0 place-items-center rounded-lg transition',
                                    'bg-white text-primary-600 shadow-sm' => request()->routeIs('account.requests.create'),
                                    'bg-slate-100 text-slate-500 group-hover:bg-slate-200 group-hover:text-slate-700' => !request()->routeIs('account.requests.create'),
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
                                        d="M12 5v14M5 12h14"
                                    />

                                </svg>

                            </span>


                            <span>
                                درخواست جدید
                            </span>

                        </a>

                    </div>

                </div>


                {{-- Account --}}
                <div>

                    <p class="px-3 pb-2 text-[10px] font-black tracking-wide text-slate-400">
                        حساب کاربری
                    </p>


                    <div class="space-y-1">

                        {{-- Profile --}}
                        <a
                            href="{{ route('account.profile') }}"
                            @click="sidebarOpen = false"
                            @class([
                                'group flex min-h-12 items-center gap-3 rounded-xl px-3 text-sm font-bold transition',
                                'bg-primary-50 text-primary-700' => request()->routeIs('account.profile'),
                                'text-slate-600 hover:bg-slate-50 hover:text-slate-950' => !request()->routeIs('account.profile'),
                            ])
                        >

                            <span
                                @class([
                                    'grid size-9 shrink-0 place-items-center rounded-lg',
                                    'bg-white text-primary-600 shadow-sm' => request()->routeIs('account.profile'),
                                    'bg-slate-100 text-slate-500 group-hover:bg-slate-200' => !request()->routeIs('account.profile'),
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


                            <span>
                                پروفایل
                            </span>

                        </a>


                        {{-- Website --}}
                        <a
                            href="{{ route('home') }}"
                            @click="sidebarOpen = false"
                            class="group flex min-h-12 items-center gap-3 rounded-xl px-3 text-sm font-bold text-slate-600 transition hover:bg-slate-50 hover:text-slate-950"
                        >

                            <span class="grid size-9 shrink-0 place-items-center rounded-lg bg-slate-100 text-slate-500 transition group-hover:bg-slate-200">

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
                                        r="9"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        d="M3 12h18M12 3c2.2 2.4 3.3 5.4 3.3 9s-1.1 6.6-3.3 9c-2.2-2.4-3.3-5.4-3.3-9S9.8 5.4 12 3z"
                                    />

                                </svg>

                            </span>


                            <span>
                                بازگشت به سایت
                            </span>

                        </a>

                    </div>

                </div>

            </div>

        </nav>


        {{-- Sidebar logout --}}
        <div class="border-t border-slate-200 p-3">

            <form
                method="POST"
                action="{{ route('auth.logout') }}"
            >

                @csrf

                <button
                    type="submit"
                    class="group flex min-h-12 w-full items-center gap-3 rounded-xl px-3 text-sm font-bold text-slate-600 transition hover:bg-red-50 hover:text-red-600"
                >

                    <span class="grid size-9 place-items-center rounded-lg bg-slate-100 text-slate-500 transition group-hover:bg-red-100 group-hover:text-red-600">

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
                                d="M14 8V5.5A1.5 1.5 0 0 0 12.5 4h-6A1.5 1.5 0 0 0 5 5.5v13A1.5 1.5 0 0 0 6.5 20h6a1.5 1.5 0 0 0 1.5-1.5V16"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M10 12h9M16 8l4 4-4 4"
                            />

                        </svg>

                    </span>


                    <span>
                        خروج از حساب
                    </span>

                </button>

            </form>

        </div>

    </aside>


    {{-- ============================================================
         Main application
    ============================================================= --}}
    <div class="min-h-screen lg:pr-[280px]">

        {{-- Topbar --}}
        <header class="sticky top-0 z-30 border-b border-slate-200 bg-white/95 backdrop-blur-xl">

            <div class="mx-auto flex min-h-[72px] w-full max-w-[1600px] items-center gap-3 px-4 sm:px-6 lg:px-8">

                {{-- Mobile menu --}}
                <button
                    type="button"
                    @click="sidebarOpen = true"
                    class="grid size-11 shrink-0 place-items-center rounded-xl border border-slate-200 bg-white text-slate-600 shadow-sm transition hover:bg-slate-50 lg:hidden"
                    aria-label="باز کردن منوی حساب کاربری"
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
                            d="M4 7h16M4 12h16M4 17h16"
                        />

                    </svg>

                </button>


                {{-- Breadcrumb / heading --}}
                <div class="min-w-0 flex-1">

                    <div class="hidden items-center gap-2 text-[11px] text-slate-400 sm:flex">

                        <span>
                            حساب کاربری
                        </span>

                        <span>
                            /
                        </span>

                        <span class="font-bold text-slate-600">
                            {{ $heading }}
                        </span>

                    </div>


                    <h1 class="truncate text-base font-black text-slate-950 sm:mt-1 sm:text-lg">
                        {{ $heading }}
                    </h1>

                </div>


                {{-- Top actions --}}
                <div class="flex shrink-0 items-center gap-2">

                    <a
                        href="{{ route('account.requests.create') }}"
                        class="hidden min-h-10 items-center justify-center gap-2 rounded-xl bg-primary-600 px-4 text-xs font-black text-white shadow-sm transition hover:bg-primary-700 sm:inline-flex"
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
                                d="M12 5v14M5 12h14"
                            />

                        </svg>

                        درخواست جدید

                    </a>


                    {{-- Profile --}}
                    <a
                        href="{{ route('account.profile') }}"
                        class="flex min-h-10 items-center gap-2 rounded-xl border border-slate-200 bg-white px-2.5 transition hover:bg-slate-50 sm:px-3"
                    >

                        <span class="grid size-8 place-items-center rounded-lg bg-slate-900 text-[11px] font-black text-white">

                            {{ mb_substr(auth()->user()->name ?: 'ک', 0, 1) }}

                        </span>


                        <span class="hidden max-w-28 truncate text-xs font-black text-slate-700 md:block">
                            {{ auth()->user()->name ?: 'کاربر' }}
                        </span>

                    </a>


                    {{-- Logout --}}
                    <form
                        method="POST"
                        action="{{ route('auth.logout') }}"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="grid size-10 place-items-center rounded-xl text-slate-500 transition hover:bg-red-50 hover:text-red-600"
                            title="خروج"
                            aria-label="خروج"
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
                                    d="M14 8V5.5A1.5 1.5 0 0 0 12.5 4h-6A1.5 1.5 0 0 0 5 5.5v13A1.5 1.5 0 0 0 6.5 20h6a1.5 1.5 0 0 0 1.5-1.5V16"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M10 12h9M16 8l4 4-4 4"
                                />

                            </svg>

                        </button>

                    </form>

                </div>

            </div>

        </header>


        {{-- Main --}}
        <main class="min-h-[calc(100vh-72px)]">

            <div class="mx-auto w-full max-w-[1600px] px-4 py-5 sm:px-6 sm:py-7 lg:px-8 lg:py-8">

                {{ $slot }}

            </div>

        </main>

    </div>

</div>


<style>
    [x-cloak] {
        display: none !important;
    }
</style>

@stack('scripts')

</body>

</html>
