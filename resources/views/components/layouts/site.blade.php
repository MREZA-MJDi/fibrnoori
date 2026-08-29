@props([
'title' => 'فیبر نوری | اینترنت پرسرعت',
'description' => 'سامانه فیبر نوری؛ مشاهده تعرفه‌ها، تجهیزات و ثبت درخواست اتصال اینترنت فیبر نوری.',
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
        name="description"
        content="{{ $description }}"
    >

    <meta
        name="theme-color"
        content="#16a34a"
    >

    <meta
        name="color-scheme"
        content="light"
    >

    <title>{{ $title }}</title>

    {{-- Font --}}
    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet"
    >

    @vite([
    'resources/css/app.css',
    'resources/js/app.js',
    ])

    @stack('head')

</head>


<body class="min-h-screen overflow-x-hidden bg-slate-50 text-slate-950 antialiased">

<div
    x-data="{ mobileMenuOpen: false }"
    @keydown.escape.window="mobileMenuOpen = false"
    class="min-h-screen"
>

    {{-- ==========================================================
         Mobile Overlay
    =========================================================== --}}
    <div
        x-cloak
        x-show="mobileMenuOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="mobileMenuOpen = false"
        class="fixed inset-0 z-40 bg-slate-950/40 backdrop-blur-sm lg:hidden"
        aria-hidden="true"
    ></div>


    {{-- ==========================================================
         Header
    =========================================================== --}}
    <header
        class="
                sticky top-0 z-50
                border-b border-slate-200/80
                bg-white/95
                backdrop-blur-xl
            "
    >

        <div class="mx-auto w-full max-w-7xl px-3 sm:px-5 lg:px-8">

            <div class="flex min-h-[68px] items-center gap-3 sm:min-h-[76px]">

                {{-- Brand --}}
                <a
                    href="{{ route('home') }}"
                    class="group flex min-w-0 shrink-0 items-center gap-3"
                    aria-label="صفحه اصلی فیبر نوری"
                >

                        <span
                            class="
                                grid size-10 shrink-0 place-items-center
                                rounded-2xl
                                bg-primary-600
                                text-white
                                shadow-sm
                                transition
                                group-hover:bg-primary-700
                                sm:size-11
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

                            <span class="block truncate text-sm font-black leading-5 text-slate-950 sm:text-base">
                                فیبر نوری
                            </span>

                            <span class="mt-0.5 block truncate text-[10px] font-medium leading-4 text-slate-400 sm:text-[11px]">
                                اینترنت پرسرعت
                            </span>

                        </span>

                </a>


                {{-- Desktop Navigation --}}
                <nav
                    class="mr-6 hidden items-center gap-1 lg:flex"
                    aria-label="ناوبری اصلی"
                >

                    <a
                        href="{{ route('home') }}"
                        @class([
                            'rounded-xl px-3.5 py-2.5 text-sm font-bold transition',
                            'bg-primary-50 text-primary-700' => request()->routeIs('home'),
                            'text-slate-600 hover:bg-slate-50 hover:text-slate-950' => !request()->routeIs('home'),
                        ])
                    >
                        خانه
                    </a>


                    <a
                        href="{{ route('tariffs.index') }}"
                        @class([
                            'rounded-xl px-3.5 py-2.5 text-sm font-bold transition',
                            'bg-primary-50 text-primary-700' => request()->routeIs('tariffs.*'),
                            'text-slate-600 hover:bg-slate-50 hover:text-slate-950' => !request()->routeIs('tariffs.*'),
                        ])
                    >
                        تعرفه‌ها
                    </a>


                    <a
                        href="{{ route('modems.index') }}"
                        @class([
                            'rounded-xl px-3.5 py-2.5 text-sm font-bold transition',
                            'bg-primary-50 text-primary-700' => request()->routeIs('modems.*'),
                            'text-slate-600 hover:bg-slate-50 hover:text-slate-950' => !request()->routeIs('modems.*'),
                        ])
                    >
                        مودم‌ها
                    </a>


                    <a
                        href="{{ route('contact') }}"
                        @class([
                            'rounded-xl px-3.5 py-2.5 text-sm font-bold transition',
                            'bg-primary-50 text-primary-700' => request()->routeIs('contact'),
                            'text-slate-600 hover:bg-slate-50 hover:text-slate-950' => !request()->routeIs('contact'),
                        ])
                    >
                        تماس با ما
                    </a>

                </nav>


                {{-- Desktop Actions --}}
                <div class="mr-auto hidden items-center gap-2 lg:flex">

                    @auth

                        @if (auth()->user()->isAdmin())

                            <a
                                href="{{ route('admin.dashboard') }}"
                                class="
                                        inline-flex min-h-10 items-center justify-center
                                        rounded-xl
                                        border border-slate-200
                                        bg-white
                                        px-4
                                        text-xs font-black
                                        text-slate-700
                                        transition
                                        hover:border-primary-200
                                        hover:bg-primary-50
                                        hover:text-primary-700
                                    "
                            >
                                پنل مدیریت
                            </a>

                        @else

                            <a
                                href="{{ route('account.dashboard') }}"
                                class="
                                        inline-flex min-h-10 items-center justify-center
                                        rounded-xl
                                        border border-slate-200
                                        bg-white
                                        px-4
                                        text-xs font-black
                                        text-slate-700
                                        transition
                                        hover:border-primary-200
                                        hover:bg-primary-50
                                        hover:text-primary-700
                                    "
                            >
                                حساب کاربری
                            </a>

                        @endif


                        <form
                            method="POST"
                            action="{{ route('auth.logout') }}"
                        >
                            @csrf

                            <button
                                type="submit"
                                class="
                                        inline-flex min-h-10 items-center justify-center
                                        rounded-xl
                                        px-3
                                        text-xs font-bold
                                        text-slate-500
                                        transition
                                        hover:bg-red-50
                                        hover:text-red-600
                                    "
                            >
                                خروج
                            </button>

                        </form>

                    @else

                        <a
                            href="{{ route('auth.login') }}"
                            class="
                                    inline-flex min-h-10 items-center justify-center
                                    rounded-xl
                                    border border-slate-200
                                    bg-white
                                    px-4
                                    text-xs font-black
                                    text-slate-700
                                    transition
                                    hover:border-primary-200
                                    hover:bg-primary-50
                                    hover:text-primary-700
                                "
                        >
                            ورود
                        </a>

                        <a
                            href="{{ route('auth.login') }}"
                            class="
                                    inline-flex min-h-10 items-center justify-center
                                    rounded-xl
                                    bg-primary-600
                                    px-4
                                    text-xs font-black
                                    text-white
                                    shadow-sm
                                    transition
                                    hover:bg-primary-700
                                "
                        >
                            ثبت درخواست
                        </a>

                    @endauth

                </div>


                {{-- Mobile Actions --}}
                <div class="mr-auto flex items-center gap-2 lg:hidden">

                    @auth

                        <a
                            href="{{ auth()->user()->isAdmin()
                                    ? route('admin.dashboard')
                                    : route('account.dashboard') }}"
                            class="
                                    hidden min-h-10 items-center justify-center
                                    rounded-xl
                                    bg-primary-50
                                    px-3
                                    text-xs font-black
                                    text-primary-700
                                    sm:inline-flex
                                "
                        >
                            {{ auth()->user()->isAdmin() ? 'مدیریت' : 'حساب من' }}
                        </a>

                    @else

                        <a
                            href="{{ route('auth.login') }}"
                            class="
                                    hidden min-h-10 items-center justify-center
                                    rounded-xl
                                    bg-primary-600
                                    px-3
                                    text-xs font-black
                                    text-white
                                    sm:inline-flex
                                "
                        >
                            ورود
                        </a>

                    @endauth


                    <button
                        type="button"
                        @click="mobileMenuOpen = !mobileMenuOpen"
                        :aria-expanded="mobileMenuOpen.toString()"
                        aria-controls="mobile-site-navigation"
                        class="
                                grid size-10 place-items-center
                                rounded-xl
                                border border-slate-200
                                bg-white
                                text-slate-600
                                shadow-sm
                                transition
                                hover:bg-slate-50
                                hover:text-slate-950
                                sm:size-11
                            "
                        aria-label="منوی سایت"
                    >

                        <svg
                            x-show="!mobileMenuOpen"
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


                        <svg
                            x-cloak
                            x-show="mobileMenuOpen"
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

            </div>


            {{-- Mobile Navigation --}}
            <div
                id="mobile-site-navigation"
                x-cloak
                x-show="mobileMenuOpen"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-2"
                class="border-t border-slate-100 py-3 lg:hidden"
            >

                <nav
                    class="grid gap-1"
                    aria-label="منوی موبایل"
                >

                    <a
                        href="{{ route('home') }}"
                        @click="mobileMenuOpen = false"
                        @class([
                            'flex min-h-12 items-center rounded-xl px-3 text-sm font-bold transition',
                            'bg-primary-50 text-primary-700' => request()->routeIs('home'),
                            'text-slate-600 hover:bg-slate-50 hover:text-slate-950' => !request()->routeIs('home'),
                        ])
                    >
                        خانه
                    </a>


                    <a
                        href="{{ route('tariffs.index') }}"
                        @click="mobileMenuOpen = false"
                        @class([
                            'flex min-h-12 items-center rounded-xl px-3 text-sm font-bold transition',
                            'bg-primary-50 text-primary-700' => request()->routeIs('tariffs.*'),
                            'text-slate-600 hover:bg-slate-50 hover:text-slate-950' => !request()->routeIs('tariffs.*'),
                        ])
                    >
                        تعرفه‌ها
                    </a>


                    <a
                        href="{{ route('modems.index') }}"
                        @click="mobileMenuOpen = false"
                        @class([
                            'flex min-h-12 items-center rounded-xl px-3 text-sm font-bold transition',
                            'bg-primary-50 text-primary-700' => request()->routeIs('modems.*'),
                            'text-slate-600 hover:bg-slate-50 hover:text-slate-950' => !request()->routeIs('modems.*'),
                        ])
                    >
                        مودم‌ها
                    </a>


                    <a
                        href="{{ route('contact') }}"
                        @click="mobileMenuOpen = false"
                        @class([
                            'flex min-h-12 items-center rounded-xl px-3 text-sm font-bold transition',
                            'bg-primary-50 text-primary-700' => request()->routeIs('contact'),
                            'text-slate-600 hover:bg-slate-50 hover:text-slate-950' => !request()->routeIs('contact'),
                        ])
                    >
                        تماس با ما
                    </a>


                    <div class="my-2 border-t border-slate-100"></div>


                    @auth

                        <a
                            href="{{ auth()->user()->isAdmin()
                                    ? route('admin.dashboard')
                                    : route('account.dashboard') }}"
                            @click="mobileMenuOpen = false"
                            class="
                                    flex min-h-12 items-center justify-center
                                    rounded-xl
                                    bg-primary-600
                                    px-4
                                    text-sm font-black
                                    text-white
                                    transition
                                    hover:bg-primary-700
                                "
                        >
                            {{ auth()->user()->isAdmin()
                                ? 'ورود به پنل مدیریت'
                                : 'ورود به حساب کاربری' }}
                        </a>


                        <form
                            method="POST"
                            action="{{ route('auth.logout') }}"
                        >
                            @csrf

                            <button
                                type="submit"
                                class="
                                        flex min-h-12 w-full
                                        items-center justify-center
                                        rounded-xl
                                        border border-red-100
                                        bg-red-50
                                        px-4
                                        text-sm font-black
                                        text-red-600
                                        transition
                                        hover:bg-red-100
                                    "
                            >
                                خروج از حساب
                            </button>

                        </form>

                    @else

                        <a
                            href="{{ route('auth.login') }}"
                            @click="mobileMenuOpen = false"
                            class="
                                    flex min-h-12 items-center justify-center
                                    rounded-xl
                                    bg-primary-600
                                    px-4
                                    text-sm font-black
                                    text-white
                                    transition
                                    hover:bg-primary-700
                                "
                        >
                            ورود به سامانه
                        </a>

                        <a
                            href="{{ route('auth.login') }}"
                            @click="mobileMenuOpen = false"
                            class="
                                    flex min-h-12 items-center justify-center
                                    rounded-xl
                                    border border-slate-200
                                    bg-white
                                    px-4
                                    text-sm font-black
                                    text-slate-700
                                    transition
                                    hover:bg-slate-50
                                "
                        >
                            ثبت درخواست اتصال
                        </a>

                    @endauth

                </nav>

            </div>

        </div>

    </header>


    {{-- ==========================================================
         Main
    =========================================================== --}}
    <main class="min-h-[calc(100vh-68px)] sm:min-h-[calc(100vh-76px)]">

        {{ $slot }}

    </main>


    {{-- ==========================================================
         Footer
    =========================================================== --}}
    <footer class="border-t border-slate-800 bg-slate-950 text-white">

        <div class="mx-auto w-full max-w-7xl px-3 sm:px-5 lg:px-8">

            {{-- Footer Main --}}
            <div
                class="
                        grid gap-10
                        py-10
                        sm:grid-cols-2
                        sm:py-12
                        lg:grid-cols-4
                        lg:gap-12
                        lg:py-14
                    "
            >

                {{-- Brand --}}
                <div class="sm:col-span-2 lg:col-span-2">

                    <a
                        href="{{ route('home') }}"
                        class="inline-flex items-center gap-3"
                    >

                            <span
                                class="
                                    grid size-11 place-items-center
                                    rounded-2xl
                                    bg-primary-600
                                    text-white
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


                        <span>

                                <span class="block text-sm font-black sm:text-base">
                                    فیبر نوری
                                </span>

                                <span class="mt-0.5 block text-[11px] text-slate-400">
                                    اینترنت پرسرعت و پایدار
                                </span>

                            </span>

                    </a>


                    <p class="mt-5 max-w-xl text-sm leading-8 text-slate-400">
                        درخواست اتصال اینترنت فیبر نوری را به‌صورت آنلاین ثبت کنید،
                        تعرفه‌ها و تجهیزات را بررسی کنید و وضعیت درخواست خود را پیگیری کنید.
                    </p>

                </div>


                {{-- Quick Links --}}
                <div>

                    <h3 class="text-sm font-black text-white">
                        دسترسی سریع
                    </h3>

                    <nav class="mt-4 grid gap-2">

                        <a
                            href="{{ route('home') }}"
                            class="w-fit py-1 text-xs font-medium text-slate-400 transition hover:text-white"
                        >
                            خانه
                        </a>

                        <a
                            href="{{ route('tariffs.index') }}"
                            class="w-fit py-1 text-xs font-medium text-slate-400 transition hover:text-white"
                        >
                            تعرفه‌ها
                        </a>

                        <a
                            href="{{ route('modems.index') }}"
                            class="w-fit py-1 text-xs font-medium text-slate-400 transition hover:text-white"
                        >
                            مودم‌ها
                        </a>

                        <a
                            href="{{ route('contact') }}"
                            class="w-fit py-1 text-xs font-medium text-slate-400 transition hover:text-white"
                        >
                            تماس با ما
                        </a>

                    </nav>

                </div>


                {{-- Account --}}
                <div>

                    <h3 class="text-sm font-black text-white">
                        حساب کاربری
                    </h3>

                    <nav class="mt-4 grid gap-2">

                        @auth

                            <a
                                href="{{ auth()->user()->isAdmin()
                                        ? route('admin.dashboard')
                                        : route('account.dashboard') }}"
                                class="w-fit py-1 text-xs font-medium text-slate-400 transition hover:text-white"
                            >
                                {{ auth()->user()->isAdmin()
                                    ? 'پنل مدیریت'
                                    : 'حساب کاربری' }}
                            </a>

                        @else

                            <a
                                href="{{ route('auth.login') }}"
                                class="w-fit py-1 text-xs font-medium text-slate-400 transition hover:text-white"
                            >
                                ورود
                            </a>

                        @endauth


                        <a
                            href="{{ route('contact') }}"
                            class="w-fit py-1 text-xs font-medium text-slate-400 transition hover:text-white"
                        >
                            پشتیبانی
                        </a>

                    </nav>

                </div>

            </div>


            {{-- Footer Bottom --}}
            <div
                class="
                        flex flex-col gap-2
                        border-t border-white/10
                        py-5
                        text-[11px] text-slate-500
                        sm:flex-row
                        sm:items-center
                        sm:justify-between
                    "
            >

                <p>
                    © {{ now()->year }} فیبر نوری. تمامی حقوق محفوظ است.
                </p>

                <p>
                    طراحی و توسعه با Laravel
                </p>

            </div>

        </div>

    </footer>

</div>


{{-- Alpine cloak --}}
<style>
    [x-cloak] {
        display: none !important;
    }
</style>


@stack('scripts')

</body>

</html>
