<x-layouts.site
    title="تماس با ما | فیبر نوری"
>
    <section class="site-section bg-slate-50">

        <div class="site-container">

            {{-- Header --}}
            <div class="max-w-2xl">

                <span class="inline-flex rounded-full bg-primary-50 px-3 py-1.5 text-xs font-black text-primary-700">
                    ارتباط با ما
                </span>

                <h1 class="mt-4 text-3xl font-black tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    سوالی داری؟ کنارتم.
                </h1>

                <p class="mt-4 text-sm leading-8 text-slate-500 sm:text-base">
                    برای پیگیری درخواست، دریافت راهنمایی یا هر سوالی درباره سرویس
                    فیبر نوری می‌توانی با ما در ارتباط باشی.
                </p>

            </div>


            {{-- Contact grid --}}
            <div class="mt-10 grid gap-5 lg:grid-cols-[0.9fr_1.1fr]">

                {{-- Contact cards --}}
                <div class="grid gap-4">

                    {{-- Phone --}}
                    <article class="site-card p-5 sm:p-6">

                        <div class="flex items-start gap-4">

                            <span class="grid size-12 shrink-0 place-items-center rounded-2xl bg-primary-50 text-primary-700">

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
                                        d="M5.5 4.5h3l1.5 4-2 1.5a13 13 0 0 0 6 6l1.5-2 4 1.5v3a1.5 1.5 0 0 1-1.5 1.5A13.5 13.5 0 0 1 4 6a1.5 1.5 0 0 1 1.5-1.5z"
                                    />
                                </svg>

                            </span>


                            <div class="min-w-0">

                                <p class="text-xs font-bold text-slate-400">
                                    تلفن تماس
                                </p>

                                <a
                                    href="tel:+982100000000"
                                    dir="ltr"
                                    class="mt-2 block text-lg font-black text-slate-900 transition hover:text-primary-600"
                                >
                                    ۰۲۱-۰۰۰۰۰۰۰۰
                                </a>

                                <p class="mt-1 text-xs text-slate-400">
                                    پاسخگویی تلفنی در ساعات کاری
                                </p>

                            </div>

                        </div>

                    </article>


                    {{-- Email --}}
                    <article class="site-card p-5 sm:p-6">

                        <div class="flex items-start gap-4">

                            <span class="grid size-12 shrink-0 place-items-center rounded-2xl bg-blue-50 text-blue-700">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.8"
                                    stroke="currentColor"
                                    class="size-5"
                                >
                                    <rect
                                        width="18"
                                        height="14"
                                        x="3"
                                        y="5"
                                        rx="2"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m4 7 8 6 8-6"
                                    />
                                </svg>

                            </span>


                            <div class="min-w-0">

                                <p class="text-xs font-bold text-slate-400">
                                    ایمیل
                                </p>

                                <a
                                    href="mailto:info@example.com"
                                    dir="ltr"
                                    class="mt-2 block break-all text-sm font-black text-slate-900 transition hover:text-primary-600"
                                >
                                    info@example.com
                                </a>

                                <p class="mt-1 text-xs text-slate-400">
                                    برای ارتباط و دریافت اطلاعات
                                </p>

                            </div>

                        </div>

                    </article>


                    {{-- Working hours --}}
                    <article class="site-card p-5 sm:p-6">

                        <div class="flex items-start gap-4">

                            <span class="grid size-12 shrink-0 place-items-center rounded-2xl bg-amber-50 text-amber-700">

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

                            </span>


                            <div class="min-w-0">

                                <p class="text-xs font-bold text-slate-400">
                                    ساعات پاسخگویی
                                </p>

                                <p class="mt-2 text-sm font-black text-slate-900">
                                    شنبه تا پنجشنبه
                                </p>

                                <p class="mt-1 text-xs text-slate-500">
                                    ۹ صبح تا ۱۸ عصر
                                </p>

                            </div>

                        </div>

                    </article>

                </div>


                {{-- Support card --}}
                <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

                    <div>

                        <span class="inline-flex rounded-full bg-slate-100 px-3 py-1.5 text-xs font-black text-slate-600">
                            راهنمای پیگیری
                        </span>

                        <h2 class="mt-4 text-xl font-black tracking-tight text-slate-950 sm:text-2xl">
                            راهنمایی می‌خواهی؟
                        </h2>

                        <p class="mt-3 text-sm leading-8 text-slate-500">
                            اگر درخواست فعالی داری، بهترین راه پیگیری، ورود به حساب کاربری
                            و مشاهده آخرین وضعیت درخواست است.
                        </p>

                    </div>


                    {{-- Tracking box --}}
                    <div class="mt-7 rounded-2xl bg-slate-50 p-5">

                        <div class="flex items-start gap-3">

                            <span class="grid size-10 shrink-0 place-items-center rounded-xl bg-white text-primary-600 shadow-sm">

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
                                        d="M12 10v6M12 7.25h.01"
                                    />
                                </svg>

                            </span>


                            <div class="min-w-0">

                                <p class="text-sm font-black text-slate-900">
                                    پیگیری درخواست
                                </p>

                                <p class="mt-1 text-xs leading-6 text-slate-500">
                                    از پنل کاربری می‌توانی درخواست‌های ثبت‌شده،
                                    جزئیات و آخرین وضعیت آن‌ها را مشاهده کنی.
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- Actions --}}
                    <div class="mt-5 grid gap-3 sm:grid-cols-2">

                        <a
                            href="{{ route('auth.login') }}"
                            class="inline-flex min-h-12 items-center justify-center rounded-xl border border-slate-200 px-5 text-sm font-black text-slate-700 transition hover:border-primary-200 hover:bg-primary-50 hover:text-primary-700"
                        >
                            ورود به حساب
                        </a>

                        <a
                            href="{{ route('auth.login') }}"
                            class="inline-flex min-h-12 items-center justify-center rounded-xl bg-primary-600 px-5 text-sm font-black text-white shadow-sm transition hover:bg-primary-700"
                        >
                            ثبت درخواست
                        </a>

                    </div>

                </section>

            </div>


            {{-- Bottom CTA --}}
            <section class="mt-6 overflow-hidden rounded-3xl bg-slate-950 p-5 text-white shadow-sm sm:p-7">

                <div class="flex flex-col gap-5 md:flex-row md:items-center md:justify-between">

                    <div class="min-w-0">

                        <p class="text-xs font-black text-primary-400">
                            هنوز مطمئن نیستی؟
                        </p>

                        <h2 class="mt-2 text-lg font-black sm:text-xl">
                            تعرفه‌ها و مودم‌های موجود را بررسی کن.
                        </h2>

                        <p class="mt-2 text-sm leading-7 text-slate-400">
                            قبل از ثبت درخواست، سرویس و تجهیزات مناسب خودت را انتخاب کن.
                        </p>

                    </div>


                    <div class="flex flex-col gap-2 sm:flex-row">

                        <a
                            href="{{ route('tariffs.index') }}"
                            class="inline-flex min-h-11 items-center justify-center rounded-xl bg-white px-5 text-sm font-black text-slate-950 transition hover:bg-slate-100"
                        >
                            مشاهده تعرفه‌ها
                        </a>

                        <a
                            href="{{ route('modems.index') }}"
                            class="inline-flex min-h-11 items-center justify-center rounded-xl border border-white/15 px-5 text-sm font-black text-white transition hover:bg-white/10"
                        >
                            مشاهده مودم‌ها
                        </a>

                    </div>

                </div>

            </section>

        </div>

    </section>
</x-layouts.site>
