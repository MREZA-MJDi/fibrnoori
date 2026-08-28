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
        {{ $title ?? 'ورود | فیبره نوری' }}
    </title>

    <meta
        name="description"
        content="{{ $description ?? 'ورود به حساب کاربری فیبره نوری' }}"
    >

    @vite([
    'resources/css/app.css',
    'resources/js/app.js',
    ])
</head>

<body
    class="
        min-h-screen
        overflow-x-hidden
        bg-slate-50
        text-slate-900
        antialiased
    "
>

<div class="flex min-h-screen flex-col">


    {{-- Header --}}
    <header class="border-b border-slate-200 bg-white">

        <div class="container-site">

            <div
                class="
                        flex min-h-16
                        items-center justify-between
                        gap-4
                    "
            >

                {{-- Brand --}}
                <x-brand />


                {{-- Back To Website --}}
                <a
                    href="{{ route('home') }}"
                    class="
                            inline-flex min-h-10 shrink-0
                            items-center justify-center
                            rounded-xl
                            px-3
                            text-xs font-bold
                            text-slate-600
                            transition
                            hover:bg-slate-100
                            hover:text-slate-900
                            sm:px-4 sm:text-sm
                        "
                >
                    بازگشت به سایت
                </a>

            </div>

        </div>

    </header>


    {{-- Main --}}
    <main
        class="
                flex flex-1
                items-center
                py-8
                sm:py-12
                lg:py-16
            "
    >

        <div class="container-site">

            <div class="mx-auto w-full max-w-md">


                {{-- Intro --}}
                <div class="mb-6 text-center">

                    <p
                        class="
                                text-xs font-black
                                text-primary-600
                                sm:text-sm
                            "
                    >
                        فیبره نوری
                    </p>

                    <h1
                        class="
                                mt-2
                                text-2xl font-black
                                tracking-tight
                                text-slate-950
                                sm:text-3xl
                            "
                    >
                        {{ $heading ?? 'ورود به حساب کاربری' }}
                    </h1>

                    @isset($subheading)

                        <p
                            class="
                                    mx-auto mt-3
                                    max-w-sm
                                    text-sm
                                    leading-7
                                    text-slate-500
                                "
                        >
                            {{ $subheading }}
                        </p>

                    @endisset

                </div>


                {{-- Auth Card --}}
                <div
                    class="
                            rounded-3xl
                            border border-slate-200
                            bg-white
                            p-5
                            shadow-sm
                            sm:p-8
                        "
                >

                    <x-flash />

                    {{ $slot }}

                </div>


                {{-- Terms --}}
                <p
                    class="
                            mt-6
                            px-4
                            text-center
                            text-[11px]
                            leading-6
                            text-slate-400
                            sm:text-xs
                        "
                >
                    با ادامه دادن، قوانین و شرایط استفاده از خدمات
                    فیبره نوری را می‌پذیرید.
                </p>

            </div>

        </div>

    </main>


    {{-- Footer --}}
    <footer class="border-t border-slate-200 bg-white">

        <div class="container-site py-5 text-center">

            <p class="text-xs text-slate-400">
                © {{ now()->year }} فیبره نوری
            </p>

        </div>

    </footer>

</div>

</body>

</html>

