@props([
'title' => 'پنل مدیریت | فیبر نوری',
'heading' => 'پنل مدیریت',
])

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, viewport-fit=cover"
    >

    <title>{{ $title }}</title>

    <meta
        name="description"
        content="پنل مدیریت سامانه فیبر نوری"
    >

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
    {{-- ==========================================================
         Mobile overlay
    =========================================================== --}}
    <div
        x-cloak
        x-show="sidebarOpen"
        x-transition.opacity
        @click="sidebarOpen = false"
        class="fixed inset-0 z-40 bg-slate-950/50 backdrop-blur-sm lg:hidden"
        aria-hidden="true"
    ></div>


    {{-- ==========================================================
         Sidebar
    =========================================================== --}}
    <aside
        class="
            fixed inset-y-0 right-0 z-50
            flex w-[280px] flex-col
            border-l border-slate-200
            bg-white
            shadow-xl
            transition-transform duration-200 ease-out

            lg:translate-x-0
        "
        :class="sidebarOpen ? 'translate-x-0' : 'translate-x-full lg:translate-x-0'"
        aria-label="منوی مدیریت"
    >

        {{-- Sidebar header --}}
        <div class="flex min-h-[76px] items-center justify-between border-b border-slate-200 px-5">

            <a
                href="{{ route('admin.dashboard') }}"
                class="flex min-w-0 items-center gap-3"
                @click="sidebarOpen = false"
            >

                <span
                    class="
                        grid size-11 shrink-0 place-items-center
                        rounded-2xl
                        bg-primary-600
                        text-white
                        shadow-sm
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
                        پنل مدیریت
                    </span>
                </span>

            </a>


            {{-- Mobile close --}}
            <button
                type="button"
                @click="sidebarOpen = false"
                class="
                    grid size-10 shrink-0 place-items-center
                    rounded-xl
                    text-slate-500
                    transition
                    hover:bg-slate-100
                    hover:text-slate-900
                    lg:hidden
                "
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


        {{-- Sidebar navigation --}}
        <nav class="app-scrollbar flex-1 overflow-y-auto px-3 py-4">

            <div class="space-y-6">

                {{-- Main --}}
                <div>

                    <p class="px-3 pb-2 text-[10px] font-black tracking-wide text-slate-400">
                        اصلی
                    </p>


                    <div class="space-y-1">

                        {{-- Dashboard --}}
                        <a
                            href="{{ route('admin.dashboard') }}"
                            @click="sidebarOpen = false"
                            @class([
                                'group flex min-h-11 items-center gap-3 rounded-xl px-3 text-sm font-bold transition',
                                'bg-primary-50 text-primary-700' => request()->routeIs('admin.dashboard'),
                                'text-slate-600 hover:bg-slate-50 hover:text-slate-950' => !request()->routeIs('admin.dashboard'),
                            ])
                        >
                            <span
                                @class([
                                    'grid size-9 shrink-0 place-items-center rounded-lg transition',
                                    'bg-white text-primary-600 shadow-sm' => request()->routeIs('admin.dashboard'),
                                    'bg-slate-100 text-slate-500 group-hover:bg-slate-200 group-hover:text-slate-700' => !request()->routeIs('admin.dashboard'),
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

                            <span>داشبورد</span>
                        </a>


                        {{-- Requests --}}
                        <a
                            href="{{ route('admin.requests.index') }}"
                            @click="sidebarOpen = false"
                            @class([
                                'group flex min-h-11 items-center gap-3 rounded-xl px-3 text-sm font-bold transition',
                                'bg-primary-50 text-primary-700' => request()->routeIs('admin.requests.*'),
                                'text-slate-600 hover:bg-slate-50 hover:text-slate-950' => !request()->routeIs('admin.requests.*'),
                            ])
                        >
                            <span
                                @class([
                                    'grid size-9 shrink-0 place-items-center rounded-lg transition',
                                    'bg-white text-primary-600 shadow-sm' => request()->routeIs('admin.requests.*'),
                                    'bg-slate-100 text-slate-500 group-hover:bg-slate-200 group-hover:text-slate-700' => !request()->routeIs('admin.requests.*'),
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

                            <span class="min-w-0 flex-1 truncate">
                                درخواست‌ها
                            </span>

                            @php
                                $pendingCount = \App\Models\FiberRequest::query()
                                    ->where('status', 'pending')
                                    ->count();
                            @endphp

                            @if ($pendingCount > 0)
                                <span
                                    class="
                                        min-w-6 rounded-full
                                        bg-red-50 px-1.5 py-0.5
                                        text-center text-[10px] font-black
                                        text-red-600
                                    "
                                >
                                    {{ $pendingCount > 99 ? '99+' : number_format($pendingCount) }}
                                </span>
                            @endif
                        </a>

                    </div>

                </div>


                {{-- Catalog --}}
                <div>

                    <p class="px-3 pb-2 text-[10px] font-black tracking-wide text-slate-400">
                        مدیریت خدمات
                    </p>


                    <div class="space-y-1">

                        {{-- Tariffs --}}
                        <a
                            href="{{ route('admin.tariffs.index') }}"
                            @click="sidebarOpen = false"
                            @class([
                                'group flex min-h-11 items-center gap-3 rounded-xl px-3 text-sm font-bold transition',
                                'bg-primary-50 text-primary-700' => request()->routeIs('admin.tariffs.*'),
                                'text-slate-600 hover:bg-slate-50 hover:text-slate-950' => !request()->routeIs('admin.tariffs.*'),
                            ])
                        >
                            <span
                                @class([
                                    'grid size-9 shrink-0 place-items-center rounded-lg transition',
                                    'bg-white text-primary-600 shadow-sm' => request()->routeIs('admin.tariffs.*'),
                                    'bg-slate-100 text-slate-500 group-hover:bg-slate-200 group-hover:text-slate-700' => !request()->routeIs('admin.tariffs.*'),
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
                                        d="M12 3v18M17 7.5c0-1.7-2.2-3-5-3s-5 1.3-5 3 2.2 3 5 3 5 1.3 5 3-2.2 3-5 3-5-1.3-5-3"
                                    />
                                </svg>
                            </span>

                            <span>تعرفه‌ها</span>
                        </a>


                        {{-- Modems --}}
                        <a
                            href="{{ route('admin.modems.index') }}"
                            @click="sidebarOpen = false"
                            @class([
                                'group flex min-h-11 items-center gap-3 rounded-xl px-3 text-sm font-bold transition',
                                'bg-primary-50 text-primary-700' => request()->routeIs('admin.modems.*'),
                                'text-slate-600 hover:bg-slate-50 hover:text-slate-950' => !request()->routeIs('admin.modems.*'),
                            ])
                        >
                            <span
                                @class([
                                    'grid size-9 shrink-0 place-items-center rounded-lg transition',
                                    'bg-white text-primary-600 shadow-sm' => request()->routeIs('admin.modems.*'),
                                    'bg-slate-100 text-slate-500 group-hover:bg-slate-200 group-hover:text-slate-700' => !request()->routeIs('admin.modems.*'),
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
                                        width="16"
                                        height="12"
                                        x="4"
                                        y="6"
                                        rx="2"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        d="M8 15h.01M12 15h.01M16 15h.01"
                                    />
                                </svg>
                            </span>

                            <span>مودم‌ها</span>
                        </a>

                    </div>

                </div>


                {{-- System --}}
                <div>

                    <p class="px-3 pb-2 text-[10px] font-black tracking-wide text-slate-400">
                        سیستم
                    </p>


                    <div class="space-y-1">

                        {{-- Settings --}}
                        <a
                            href="{{ route('admin.settings') }}"
                            @click="sidebarOpen = false"
                            @class([
                                'group flex min-h-11 items-center gap-3 rounded-xl px-3 text-sm font-bold transition',
                                'bg-primary-50 text-primary-700' => request()->routeIs('admin.settings'),
                                'text-slate-600 hover:bg-slate-50 hover:text-slate-950' => !request()->routeIs('admin.settings'),
                            ])
                        >
                            <span
                                @class([
                                    'grid size-9 shrink-0 place-items-center rounded-lg transition',
                                    'bg-white text-primary-600 shadow-sm' => request()->routeIs('admin.settings'),
                                    'bg-slate-100 text-slate-500 group-hover:bg-slate-200 group-hover:text-slate-700' => !request()->routeIs('admin.settings'),
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
                                        d="M10.5 3h3l.6 2.1a7.9 7.9 0 0 1 1.8.75l1.95-1.05 2.12 2.12-1.05 1.95c.3.57.55 1.17.75 1.8L22 11.3v3l-2.1.6a7.9 7.9 0 0 1-.75 1.8l1.05 1.95-2.12 2.12-1.95-1.05a7.9 7.9 0 0 1-1.8.75L13.5 21h-3l-.6-2.1a7.9 7.9 0 0 1-1.8-.75l-1.95 1.05-2.12-2.12 1.05-1.95a7.9 7.9 0 0 1-.75-1.8l-2.1-.6v-3l2.1-.6c.19-.63.44-1.23.75-1.8L4.03 5.38 6.15 3.26 8.1 4.31a7.9 7.9 0 0 1 1.8-.75z"
                                    />

                                    <circle
                                        cx="12"
                                        cy="12"
                                        r="3.2"
                                    />
                                </svg>
                            </span>

                            <span>تنظیمات</span>
                        </a>

                    </div>

                </div>

            </div>

        </nav>


        {{-- Sidebar footer --}}
        <div class="border-t border-slate-200 p-3">

            <div class="rounded-2xl bg-slate-50 p-3">

                <div class="flex items-center gap-3">

                    <span class="grid size-10 shrink-0 place-items-center rounded-xl bg-slate-900 text-sm font-black text-white">
                        {{ mb_substr(auth()->user()->name ?? 'م', 0, 1) }}
                    </span>

                    <div class="min-w-0 flex-1">

                        <p class="truncate text-xs font-black text-slate-900">
                            {{ auth()->user()->name ?? 'مدیر سیستم' }}
                        </p>

                        <p
                            dir="ltr"
                            class="mt-0.5 truncate text-[11px] font-medium text-slate-400"
                        >
                            {{ auth()->user()->mobile ?? '' }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </aside>


    {{-- ==========================================================
         Main shell
    =========================================================== --}}
    <div class="min-h-screen lg:pr-[280px]">

        {{-- ======================================================
             Top header
        ======================================================= --}}
        <header
            class="
                sticky top-0 z-30
                border-b border-slate-200
                bg-white/95
                backdrop-blur
            "
        >

            <div class="flex min-h-[76px] items-center gap-3 px-4 sm:px-6 lg:px-8">

                {{-- Mobile menu button --}}
                <button
                    type="button"
                    @click="sidebarOpen = true"
                    class="
                        grid size-11 shrink-0 place-items-center
                        rounded-xl
                        border border-slate-200
                        bg-white
                        text-slate-600
                        transition
                        hover:bg-slate-50
                        hover:text-slate-950
                        lg:hidden
                    "
                    aria-label="باز کردن منوی مدیریت"
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


                {{-- Page title --}}
                <div class="min-w-0 flex-1">

                    <p class="hidden text-[11px] font-bold text-slate-400 sm:block">
                        پنل مدیریت
                    </p>

                    <h1 class="truncate text-sm font-black text-slate-950 sm:text-base">
                        {{ $heading }}
                    </h1>

                </div>


                {{-- Header actions --}}
                <div class="flex shrink-0 items-center gap-2">

                    {{-- Website --}}
                    <a
                        href="{{ route('home') }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="
                            hidden min-h-10 items-center gap-2
                            rounded-xl
                            border border-slate-200
                            px-3
                            text-xs font-bold text-slate-600
                            transition
                            hover:bg-slate-50
                            hover:text-slate-950
                            sm:inline-flex
                        "
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.8"
                            stroke="currentColor"
                            class="size-4"
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

                        سایت
                    </a>


                    {{-- User --}}
                    <div class="hidden items-center gap-3 border-r border-slate-200 pr-3 md:flex">

                        <span class="grid size-10 place-items-center rounded-xl bg-primary-50 text-sm font-black text-primary-700">
                            {{ mb_substr(auth()->user()->name ?? 'م', 0, 1) }}
                        </span>

                        <div class="min-w-0">

                            <p class="max-w-28 truncate text-xs font-black text-slate-900">
                                {{ auth()->user()->name ?? 'مدیر سیستم' }}
                            </p>

                            <p class="mt-0.5 text-[10px] font-medium text-slate-400">
                                مدیر
                            </p>

                        </div>

                    </div>


                    {{-- Logout --}}
                    <form
                        method="POST"
                        action="{{ route('auth.logout') }}"
                    >
                        @csrf

                        <button
                            type="submit"
                            class="
                                grid size-10 place-items-center
                                rounded-xl
                                text-slate-500
                                transition
                                hover:bg-red-50
                                hover:text-red-600
                            "
                            aria-label="خروج"
                            title="خروج"
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


        {{-- ======================================================
             Main content
        ======================================================= --}}
        <main class="min-h-[calc(100vh-76px)]">

            <div class="mx-auto w-full max-w-[1600px] p-4 sm:p-6 lg:p-8">

                {{ $slot }}

            </div>

        </main>

    </div>

</div>


{{-- ==============================================================
     Alpine x-cloak
================================================================ --}}
<style>
    [x-cloak] {
        display: none !important;
    }
</style>

@stack('scripts')

</body>
</html>
