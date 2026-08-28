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

    <title>{{ $title ?? 'فیبره نوری' }}</title>

    <meta
        name="description"
        content="{{ $description ?? 'اینترنت فیبر نوری، تعرفه و مودم' }}"
    >

    @vite([
    'resources/css/app.css',
    'resources/js/app.js',
    ])
</head>

<body class="min-h-screen bg-slate-50 text-slate-900 antialiased">

<div class="flex min-h-screen flex-col">

    <header
        x-data="{ open: false }"
        class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/95 backdrop-blur"
    >
        <div class="container-site">

            <div class="flex min-h-16 items-center justify-between gap-4">

                <x-brand />

                <nav class="hidden items-center gap-1 md:flex">

                    <a
                        href="{{ route('home') }}"
                        class="rounded-xl px-4 py-2 text-sm font-bold transition {{ request()->routeIs('home') ? 'bg-primary-50 text-primary-700' : 'text-slate-700 hover:bg-slate-100' }}"
                    >
                        خانه
                    </a>

                    <a
                        href="{{ route('tariffs.index') }}"
                        class="rounded-xl px-4 py-2 text-sm font-bold transition {{ request()->routeIs('tariffs.*') ? 'bg-primary-50 text-primary-700' : 'text-slate-700 hover:bg-slate-100' }}"
                    >
                        تعرفه‌ها
                    </a>

                    <a
                        href="{{ route('modems.index') }}"
                        class="rounded-xl px-4 py-2 text-sm font-bold transition {{ request()->routeIs('modems.*') ? 'bg-primary-50 text-primary-700' : 'text-slate-700 hover:bg-slate-100' }}"
                    >
                        مودم‌ها
                    </a>

                    <a
                        href="{{ route('contact') }}"
                        class="rounded-xl px-4 py-2 text-sm font-bold transition {{ request()->routeIs('contact') ? 'bg-primary-50 text-primary-700' : 'text-slate-700 hover:bg-slate-100' }}"
                    >
                        تماس با ما
                    </a>

                </nav>

                <div class="hidden items-center gap-2 md:flex">

                    @auth

                        @if(auth()->user()->role === 'admin')

                            <a
                                href="{{ route('admin.dashboard') }}"
                                class="rounded-xl px-4 py-2 text-sm font-bold text-slate-700 transition hover:bg-slate-100"
                            >
                                پنل مدیریت
                            </a>

                        @else

                            <a
                                href="{{ route('account.dashboard') }}"
                                class="rounded-xl px-4 py-2 text-sm font-bold text-slate-700 transition hover:bg-slate-100"
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
                                class="inline-flex min-h-11 items-center justify-center rounded-xl border border-slate-200 bg-white px-5 text-sm font-bold text-slate-700 transition hover:bg-slate-50"
                            >
                                خروج
                            </button>
                        </form>

                    @else

                        <a
                            href="{{ route('auth.login') }}"
                            class="rounded-xl px-4 py-2 text-sm font-bold text-slate-700 transition hover:bg-slate-100"
                        >
                            ورود
                        </a>

                        <a
                            href="{{ route('auth.login') }}"
                            class="inline-flex min-h-11 items-center justify-center rounded-xl bg-primary-600 px-5 text-sm font-bold text-white shadow-sm shadow-primary-600/20 transition hover:bg-primary-700"
                        >
                            ثبت درخواست
                        </a>

                    @endauth

                </div>

                <button
                    type="button"
                    class="grid size-11 place-items-center rounded-xl border border-slate-200 text-slate-700 transition hover:bg-slate-50 md:hidden"
                    @click="open = !open"
                    :aria-expanded="open"
                    aria-controls="mobile-menu"
                    aria-label="منوی سایت"
                >

                    <svg
                        x-show="!open"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        class="size-5"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>

                    <svg
                        x-cloak
                        x-show="open"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        class="size-5"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 6l12 12M18 6L6 18"
                        />
                    </svg>

                </button>

            </div>

            <div
                id="mobile-menu"
                x-cloak
                x-show="open"
                x-transition
                @click.outside="open = false"
                class="border-t border-slate-100 py-3 md:hidden"
            >

                <nav class="grid gap-1">

                    <a
                        href="{{ route('home') }}"
                        @click="open = false"
                        class="rounded-xl px-4 py-3 text-sm font-bold text-slate-700 transition hover:bg-slate-100"
                    >
                        خانه
                    </a>

                    <a
                        href="{{ route('tariffs.index') }}"
                        @click="open = false"
                        class="rounded-xl px-4 py-3 text-sm font-bold text-slate-700 transition hover:bg-slate-100"
                    >
                        تعرفه‌ها
                    </a>

                    <a
                        href="{{ route('modems.index') }}"
                        @click="open = false"
                        class="rounded-xl px-4 py-3 text-sm font-bold text-slate-700 transition hover:bg-slate-100"
                    >
                        مودم‌ها
                    </a>

                    <a
                        href="{{ route('contact') }}"
                        @click="open = false"
                        class="rounded-xl px-4 py-3 text-sm font-bold text-slate-700 transition hover:bg-slate-100"
                    >
                        تماس با ما
                    </a>

                    <div class="mt-2 grid gap-2 border-t border-slate-100 pt-3">

                        @auth

                            @if(auth()->user()->role === 'admin')

                                <a
                                    href="{{ route('admin.dashboard') }}"
                                    class="inline-flex min-h-12 items-center justify-center rounded-xl border border-slate-200 px-4 text-sm font-bold text-slate-700 transition hover:bg-slate-50"
                                >
                                    پنل مدیریت
                                </a>

                            @else

                                <a
                                    href="{{ route('account.dashboard') }}"
                                    class="inline-flex min-h-12 items-center justify-center rounded-xl border border-slate-200 px-4 text-sm font-bold text-slate-700 transition hover:bg-slate-50"
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
                                    class="inline-flex min-h-12 w-full items-center justify-center rounded-xl bg-slate-100 px-4 text-sm font-bold text-slate-700 transition hover:bg-slate-200"
                                >
                                    خروج
                                </button>
                            </form>

                        @else

                            <a
                                href="{{ route('auth.login') }}"
                                class="inline-flex min-h-12 items-center justify-center rounded-xl border border-slate-200 px-4 text-sm font-bold text-slate-700 transition hover:bg-slate-50"
                            >
                                ورود
                            </a>

                            <a
                                href="{{ route('auth.login') }}"
                                class="inline-flex min-h-12 items-center justify-center rounded-xl bg-primary-600 px-4 text-sm font-bold text-white transition hover:bg-primary-700"
                            >
                                ثبت درخواست
                            </a>

                        @endauth

                    </div>

                </nav>

            </div>

        </div>
    </header>


    <main class="flex-1">
        {{ $slot }}
    </main>


    <footer class="border-t border-slate-200 bg-slate-950 text-white">

        <div class="container-site">

            <div class="grid gap-10 py-12 sm:grid-cols-2 lg:grid-cols-4 lg:py-14">

                <div class="sm:col-span-2 lg:col-span-1">

                    <x-brand />

                    <p class="mt-5 max-w-sm text-sm leading-7 text-slate-400">
                        اینترنت فیبر نوری سریع، پایدار و حرفه‌ای
                        برای خانه، کار و زندگی دیجیتال.
                    </p>

                    <div class="mt-5 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-2 text-xs font-bold text-slate-300">
                        <span class="size-2 rounded-full bg-emerald-400"></span>
                        شبکه پایدار و سریع
                    </div>

                </div>


                <div>

                    <h3 class="text-sm font-black text-white">
                        دسترسی سریع
                    </h3>

                    <nav class="mt-4 grid gap-3">

                        <a
                            href="{{ route('home') }}"
                            class="w-fit text-sm text-slate-400 transition hover:text-white"
                        >
                            خانه
                        </a>

                        <a
                            href="{{ route('tariffs.index') }}"
                            class="w-fit text-sm text-slate-400 transition hover:text-white"
                        >
                            تعرفه‌ها
                        </a>

                        <a
                            href="{{ route('modems.index') }}"
                            class="w-fit text-sm text-slate-400 transition hover:text-white"
                        >
                            مودم‌ها
                        </a>

                        <a
                            href="{{ route('contact') }}"
                            class="w-fit text-sm text-slate-400 transition hover:text-white"
                        >
                            تماس با ما
                        </a>

                    </nav>

                </div>


                <div>

                    <h3 class="text-sm font-black text-white">
                        حساب کاربری
                    </h3>

                    <nav class="mt-4 grid gap-3">

                        @auth

                            <a
                                href="{{ route('account.dashboard') }}"
                                class="w-fit text-sm text-slate-400 transition hover:text-white"
                            >
                                داشبورد
                            </a>

                            <a
                                href="{{ route('account.requests.index') }}"
                                class="w-fit text-sm text-slate-400 transition hover:text-white"
                            >
                                درخواست‌های من
                            </a>

                            <a
                                href="{{ route('account.profile') }}"
                                class="w-fit text-sm text-slate-400 transition hover:text-white"
                            >
                                پروفایل
                            </a>

                        @else

                            <a
                                href="{{ route('auth.login') }}"
                                class="w-fit text-sm text-slate-400 transition hover:text-white"
                            >
                                ورود به حساب
                            </a>

                        @endauth

                    </nav>

                </div>


                <div>

                    <h3 class="text-sm font-black text-white">
                        پشتیبانی
                    </h3>

                    <div class="mt-4 grid gap-4">

                        <div class="flex items-start gap-3">

                            <span class="grid size-9 shrink-0 place-items-center rounded-xl bg-white/5 text-slate-300">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.8"
                                    stroke="currentColor"
                                    class="size-4"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3 5.5A2.5 2.5 0 0 1 5.5 3h1.2a1.5 1.5 0 0 1 1.45 1.12l.75 3a1.5 1.5 0 0 1-.43 1.43L7 10a14.8 14.8 0 0 0 7 7l1.45-1.47a1.5 1.5 0 0 1 1.43-.43l3 .75A1.5 1.5 0 0 1 21 17.3v1.2a2.5 2.5 0 0 1-2.5 2.5C10.49 21 3 13.51 3 5.5z"
                                    />
                                </svg>

                            </span>

                            <div>

                                <p class="text-xs text-slate-500">
                                    پشتیبانی
                                </p>

                                <p class="mt-1 text-sm font-bold text-slate-200">
                                    پاسخ‌گویی به درخواست‌ها
                                </p>

                            </div>

                        </div>


                        <div class="flex items-start gap-3">

                            <span class="grid size-9 shrink-0 place-items-center rounded-xl bg-white/5 text-slate-300">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.8"
                                    stroke="currentColor"
                                    class="size-4"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3 8l9 6 9-6M5 5h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2z"
                                    />
                                </svg>

                            </span>

                            <div>

                                <p class="text-xs text-slate-500">
                                    ارتباط
                                </p>

                                <a
                                    href="{{ route('contact') }}"
                                    class="mt-1 block text-sm font-bold text-slate-200 transition hover:text-white"
                                >
                                    صفحه تماس با ما
                                </a>

                            </div>

                        </div>


                        <a
                            href="{{ route('auth.login') }}"
                            class="mt-1 inline-flex min-h-11 items-center justify-center rounded-xl bg-primary-600 px-5 text-sm font-black text-white transition hover:-translate-y-0.5 hover:bg-primary-500"
                        >
                            ثبت درخواست فیبر
                        </a>

                    </div>

                </div>

            </div>


            <div class="flex flex-col gap-3 border-t border-white/10 py-5 text-center sm:flex-row sm:items-center sm:justify-between sm:text-right">

                <p class="text-xs text-slate-500">
                    © {{ now()->year }} فیبره نوری. تمامی حقوق محفوظ است.
                </p>

                <div class="flex
