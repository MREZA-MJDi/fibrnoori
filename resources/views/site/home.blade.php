<x-layouts.site
    title="فیبر نوری | اینترنت پرسرعت"
>
    {{-- ==========================================================
         Hero
    =========================================================== --}}
    <section class="relative overflow-hidden bg-slate-950 text-white">

        <div class="site-container relative z-10">

            <div class="grid min-h-[620px] items-center gap-12 py-16 sm:py-20 lg:grid-cols-[1.1fr_.9fr] lg:py-24">

                {{-- Content --}}
                <div class="max-w-3xl">

                    <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3.5 py-2 text-xs font-bold text-slate-300">
                        <span class="size-2 rounded-full bg-primary-400"></span>
                        اینترنت فیبر نوری
                    </span>

                    <h1 class="mt-6 text-4xl font-black tracking-tight text-white sm:text-5xl lg:text-6xl lg:leading-[1.25]">
                        اینترنتی
                        <span class="text-primary-400">سریع‌تر</span>
                        برای زندگی بهتر
                    </h1>

                    <p class="mt-6 max-w-2xl text-sm leading-8 text-slate-300 sm:text-base">
                        با اینترنت فیبر نوری، اتصال سریع و پایدار را تجربه کنید.
                        تعرفه مناسب خود را انتخاب کنید و درخواست اتصال را آنلاین ثبت کنید.
                    </p>


                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">

                        <a
                            href="{{ route('auth.login') }}"
                            class="inline-flex min-h-12 items-center justify-center gap-2 rounded-xl bg-primary-600 px-6 text-sm font-black text-white shadow-lg shadow-primary-950/20 transition hover:-translate-y-0.5 hover:bg-primary-500"
                        >
                            ثبت درخواست اتصال

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
                                    d="m9 5 7 7-7 7"
                                />
                            </svg>
                        </a>

                        <a
                            href="{{ route('tariffs.index') }}"
                            class="inline-flex min-h-12 items-center justify-center rounded-xl border border-white/15 bg-white/5 px-6 text-sm font-black text-white transition hover:bg-white/10"
                        >
                            مشاهده تعرفه‌ها
                        </a>

                    </div>


                    {{-- Highlights --}}
                    <div class="mt-10 grid max-w-2xl grid-cols-1 gap-3 sm:grid-cols-3">

                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                            <p class="text-xl font-black text-white">
                                ۱Gbps+
                            </p>

                            <p class="mt-1 text-xs text-slate-400">
                                سرعت بالا
                            </p>
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                            <p class="text-xl font-black text-white">
                                ۲۴/۷
                            </p>

                            <p class="mt-1 text-xs text-slate-400">
                                اتصال پایدار
                            </p>
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                            <p class="text-xl font-black text-white">
                                آنلاین
                            </p>

                            <p class="mt-1 text-xs text-slate-400">
                                ثبت درخواست
                            </p>
                        </div>

                    </div>

                </div>


                {{-- Visual --}}
                <div class="relative">

                    <div class="relative mx-auto max-w-md">

                        <div class="absolute -inset-8 rounded-[3rem] bg-primary-500/10 blur-3xl"></div>

                        <div class="relative overflow-hidden rounded-[2rem] border border-white/10 bg-white/5 p-5 shadow-2xl backdrop-blur">

                            <div class="rounded-[1.5rem] bg-white p-5 text-slate-950 shadow-xl">

                                <div class="flex items-center justify-between gap-4">

                                    <div>
                                        <p class="text-xs font-bold text-slate-400">
                                            وضعیت اتصال
                                        </p>

                                        <p class="mt-1 text-lg font-black">
                                            اتصال پایدار
                                        </p>
                                    </div>

                                    <span class="grid size-11 place-items-center rounded-xl bg-primary-50 text-primary-600">
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
                                                d="M3 12.5a9 9 0 0 1 18 0M6 12.5a6 6 0 0 1 12 0M9 12.5a3 3 0 0 1 6 0"
                                            />
                                        </svg>
                                    </span>

                                </div>


                                <div class="mt-6 rounded-2xl bg-slate-950 p-5 text-white">

                                    <div class="flex items-end justify-between gap-4">

                                        <div>
                                            <p class="text-xs text-slate-400">
                                                سرعت سرویس
                                            </p>

                                            <p class="mt-1 text-3xl font-black">
                                                300
                                                <span class="text-sm text-slate-400">
                                                    Mbps
                                                </span>
                                            </p>
                                        </div>

                                        <span class="rounded-full bg-primary-400/10 px-3 py-1.5 text-[11px] font-black text-primary-300">
                                            فعال
                                        </span>

                                    </div>

                                    <div class="mt-5 h-2 overflow-hidden rounded-full bg-white/10">
                                        <div class="h-full w-[82%] rounded-full bg-primary-500"></div>
                                    </div>

                                </div>


                                <div class="mt-4 grid grid-cols-2 gap-3">

                                    <div class="rounded-2xl bg-slate-50 p-4">
                                        <p class="text-[11px] font-bold text-slate-400">
                                            تأخیر
                                        </p>

                                        <p class="mt-1 text-sm font-black text-slate-900">
                                            کم
                                        </p>
                                    </div>

                                    <div class="rounded-2xl bg-slate-50 p-4">
                                        <p class="text-[11px] font-bold text-slate-400">
                                            پایداری
                                        </p>

                                        <p class="mt-1 text-sm font-black text-slate-900">
                                            بالا
                                        </p>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Background decoration --}}
        <div class="pointer-events-none absolute -left-32 -top-32 size-96 rounded-full bg-primary-600/15 blur-3xl"></div>

        <div class="pointer-events-none absolute -bottom-40 right-1/3 size-[30rem] rounded-full bg-blue-500/10 blur-3xl"></div>

    </section>


    {{-- ==========================================================
         Features
    =========================================================== --}}
    <section class="site-section bg-white">

        <div class="site-container">

            <div class="mx-auto max-w-2xl text-center">

                <span class="text-xs font-black text-primary-600">
                    چرا فیبر نوری؟
                </span>

                <h2 class="mt-3 text-2xl font-black tracking-tight text-slate-950 sm:text-3xl">
                    تجربه‌ای متفاوت از اینترنت
                </h2>

                <p class="mt-3 text-sm leading-8 text-slate-500 sm:text-base">
                    سرعت، پایداری و کیفیت اتصال را در کنار یک فرآیند ساده برای ثبت درخواست تجربه کنید.
                </p>

            </div>


            <div class="mt-10 grid gap-4 md:grid-cols-3">

                <article class="site-card site-card-hover p-6">

                    <span class="grid size-12 place-items-center rounded-2xl bg-primary-50 text-primary-600">

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
                                d="M13 3 4 14h7l-1 7 9-11h-7z"
                            />
                        </svg>

                    </span>

                    <h3 class="mt-5 text-base font-black text-slate-950">
                        سرعت بالا
                    </h3>

                    <p class="mt-2 text-sm leading-7 text-slate-500">
                        دسترسی به سرویس‌های پرسرعت برای استفاده روزمره، استریم، بازی و دانلود.
                    </p>

                </article>


                <article class="site-card site-card-hover p-6">

                    <span class="grid size-12 place-items-center rounded-2xl bg-blue-50 text-blue-600">

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
                                d="M12 3v18M3 12h18"
                            />
                        </svg>

                    </span>

                    <h3 class="mt-5 text-base font-black text-slate-950">
                        اتصال پایدار
                    </h3>

                    <p class="mt-2 text-sm leading-7 text-slate-500">
                        زیرساخت فیبر نوری برای تجربه اتصال پایدارتر و مطمئن‌تر طراحی شده است.
                    </p>

                </article>


                <article class="site-card site-card-hover p-6">

                    <span class="grid size-12 place-items-center rounded-2xl bg-amber-50 text-amber-600">

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
                                d="M12 6v6l4 2"
                            />

                            <circle
                                cx="12"
                                cy="12"
                                r="9"
                            />
                        </svg>

                    </span>

                    <h3 class="mt-5 text-base font-black text-slate-950">
                        ثبت درخواست ساده
                    </h3>

                    <p class="mt-2 text-sm leading-7 text-slate-500">
                        بدون فرآیندهای پیچیده، درخواست خود را آنلاین ثبت و وضعیت آن را پیگیری کنید.
                    </p>

                </article>

            </div>

        </div>

    </section>


    {{-- ==========================================================
         Process
    =========================================================== --}}
    <section class="site-section bg-slate-50">

        <div class="site-container">

            <div class="grid gap-12 lg:grid-cols-[.8fr_1.2fr] lg:items-center">

                <div>

                    <span class="text-xs font-black text-primary-600">
                        فرآیند ثبت درخواست
                    </span>

                    <h2 class="mt-3 text-2xl font-black tracking-tight text-slate-950 sm:text-3xl">
                        در چند مرحله ساده متصل شوید
                    </h2>

                    <p class="mt-4 text-sm leading-8 text-slate-500">
                        تمام مراحل ثبت درخواست آنلاین طراحی شده‌اند تا سریع و بدون سردرگمی انجام شوند.
                    </p>

                    <a
                        href="{{ route('auth.login') }}"
                        class="mt-6 inline-flex min-h-11 items-center justify-center rounded-xl bg-primary-600 px-5 text-sm font-black text-white transition hover:bg-primary-700"
                    >
                        شروع ثبت درخواست
                    </a>

                </div>


                <div class="grid gap-4 sm:grid-cols-3">

                    <article class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">

                        <span class="grid size-10 place-items-center rounded-xl bg-primary-50 text-sm font-black text-primary-700">
                            ۱
                        </span>

                        <h3 class="mt-5 text-sm font-black text-slate-900">
                            ورود
                        </h3>

                        <p class="mt-2 text-xs leading-6 text-slate-500">
                            شماره موبایل خود را وارد کنید و با کد تأیید وارد شوید.
                        </p>

                    </article>


                    <article class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">

                        <span class="grid size-10 place-items-center rounded-xl bg-primary-50 text-sm font-black text-primary-700">
                            ۲
                        </span>

                        <h3 class="mt-5 text-sm font-black text-slate-900">
                            انتخاب سرویس
                        </h3>

                        <p class="mt-2 text-xs leading-6 text-slate-500">
                            تعرفه و در صورت نیاز مودم موردنظر خود را انتخاب کنید.
                        </p>

                    </article>


                    <article class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">

                        <span class="grid size-10 place-items-center rounded-xl bg-primary-50 text-sm font-black text-primary-700">
                            ۳
                        </span>

                        <h3 class="mt-5 text-sm font-black text-slate-900">
                            ثبت درخواست
                        </h3>

                        <p class="mt-2 text-xs leading-6 text-slate-500">
                            مشخصات و آدرس را وارد کنید و درخواست را ثبت نمایید.
                        </p>

                    </article>

                </div>

            </div>

        </div>

    </section>


    {{-- ==========================================================
         CTA
    =========================================================== --}}
    <section class="site-section bg-white">

        <div class="site-container">

            <div class="relative overflow-hidden rounded-[2rem] bg-primary-600 px-5 py-10 text-white sm:px-8 lg:px-12 lg:py-14">

                <div class="relative z-10 max-w-3xl">

                    <span class="inline-flex rounded-full bg-white/10 px-3 py-1.5 text-xs font-black text-primary-50">
                        آماده شروع هستید؟
                    </span>

                    <h2 class="mt-4 text-2xl font-black tracking-tight sm:text-3xl">
                        اینترنت فیبر نوری خود را همین حالا درخواست کنید.
                    </h2>

                    <p class="mt-3 max-w-2xl text-sm leading-8 text-primary-50 sm:text-base">
                        تعرفه مناسب را انتخاب کنید و درخواست اتصال خود را آنلاین ثبت نمایید.
                    </p>


                    <div class="mt-6 flex flex-col gap-3 sm:flex-row">

                        <a
                            href="{{ route('auth.login') }}"
                            class="inline-flex min-h-12 items-center justify-center rounded-xl bg-white px-6 text-sm font-black text-primary-700 transition hover:bg-primary-50"
                        >
                            ثبت درخواست
                        </a>

                        <a
                            href="{{ route('tariffs.index') }}"
                            class="inline-flex min-h-12 items-center justify-center rounded-xl border border-white/20 px-6 text-sm font-black text-white transition hover:bg-white/10"
                        >
                            مشاهده تعرفه‌ها
                        </a>

                    </div>

                </div>


                <div class="pointer-events-none absolute -left-20 -bottom-40 size-96 rounded-full bg-white/10 blur-3xl"></div>

                <div class="pointer-events-none absolute -right-20 -top-40 size-96 rounded-full bg-white/10 blur-3xl"></div>

            </div>

        </div>

    </section>

</x-layouts.site>
