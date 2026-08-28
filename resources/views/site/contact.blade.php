<x-layouts.site
    title="تماس با ما | فیبره نوری"
    description="راه‌های ارتباط با فیبره نوری."
>

    <section class="section">

        <div class="container-site">

            {{-- Header --}}
            <div class="max-w-2xl">

                <p class="text-sm font-black text-primary-600">
                    ارتباط با ما
                </p>

                <h1
                    class="
                        mt-3
                        text-3xl font-black
                        tracking-tight
                        text-slate-950
                        sm:text-4xl
                    "
                >
                    سوالی داری؟ کنارتم.
                </h1>

                <p
                    class="
                        mt-4
                        text-sm leading-8
                        text-slate-500
                        sm:text-base
                    "
                >
                    برای پیگیری درخواست، دریافت راهنمایی یا هر سوالی
                    درباره سرویس فیبر نوری می‌توانی با ما در ارتباط باشی.
                </p>

            </div>


            {{-- Contact Grid --}}
            <div
                class="
                    mt-10
                    grid gap-5
                    lg:grid-cols-[0.9fr_1.1fr]
                "
            >

                {{-- Contact Cards --}}
                <div class="grid gap-4">

                    <div
                        class="
                            rounded-3xl
                            border border-slate-200
                            bg-white
                            p-6
                            shadow-sm
                        "
                    >

                        <div class="flex items-start gap-4">

                            <span
                                class="
                                    grid size-12 shrink-0
                                    place-items-center
                                    rounded-2xl
                                    bg-primary-50
                                    text-primary-700
                                "
                            >
                                ☎
                            </span>

                            <div>

                                <p class="text-xs font-bold text-slate-400">
                                    تلفن تماس
                                </p>

                                <a
                                    href="tel:+982100000000"
                                    class="
                                        mt-2
                                        block
                                        text-lg font-black
                                        text-slate-900
                                        transition
                                        hover:text-primary-600
                                    "
                                >
                                    ۰۲۱-۰۰۰۰۰۰۰۰
                                </a>

                            </div>

                        </div>

                    </div>


                    <div
                        class="
                            rounded-3xl
                            border border-slate-200
                            bg-white
                            p-6
                            shadow-sm
                        "
                    >

                        <div class="flex items-start gap-4">

                            <span
                                class="
                                    grid size-12 shrink-0
                                    place-items-center
                                    rounded-2xl
                                    bg-emerald-50
                                    text-emerald-700
                                "
                            >
                                @
                            </span>

                            <div>

                                <p class="text-xs font-bold text-slate-400">
                                    ایمیل
                                </p>

                                <a
                                    href="mailto:info@example.com"
                                    class="
                                        mt-2
                                        block
                                        break-all
                                        text-sm font-black
                                        text-slate-900
                                        transition
                                        hover:text-primary-600
                                    "
                                >
                                    info@example.com
                                </a>

                            </div>

                        </div>

                    </div>


                    <div
                        class="
                            rounded-3xl
                            border border-slate-200
                            bg-white
                            p-6
                            shadow-sm
                        "
                    >

                        <div class="flex items-start gap-4">

                            <span
                                class="
                                    grid size-12 shrink-0
                                    place-items-center
                                    rounded-2xl
                                    bg-amber-50
                                    text-amber-700
                                "
                            >
                                ◷
                            </span>

                            <div>

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

                    </div>

                </div>


                {{-- Message Card --}}
                <div
                    class="
                        rounded-3xl
                        border border-slate-200
                        bg-white
                        p-5
                        shadow-sm
                        sm:p-7
                    "
                >

                    <div>

                        <h2 class="text-xl font-black text-slate-950">
                            راهنمایی می‌خواهی؟
                        </h2>

                        <p class="mt-2 text-sm leading-7 text-slate-500">
                            اگر درخواست فعال داری، بهترین راه پیگیری،
                            ورود به حساب کاربری و مشاهده وضعیت درخواست است.
                        </p>

                    </div>


                    <div
                        class="
                            mt-7
                            rounded-2xl
                            bg-slate-50
                            p-5
                        "
                    >

                        <div class="flex items-start gap-3">

                            <span
                                class="
                                    grid size-10 shrink-0
                                    place-items-center
                                    rounded-xl
                                    bg-white
                                    text-primary-600
                                    shadow-sm
                                "
                            >
                                ?
                            </span>

                            <div>

                                <p class="text-sm font-black text-slate-900">
                                    پیگیری درخواست
                                </p>

                                <p class="mt-1 text-xs leading-6 text-slate-500">
                                    از پنل کاربری می‌توانی درخواست‌های ثبت‌شده
                                    و آخرین وضعیت آن‌ها را ببینی.
                                </p>

                            </div>

                        </div>

                    </div>


                    <div
                        class="
                            mt-4
                            grid grid-cols-1
                            gap-3
                            sm:grid-cols-2
                        "
                    >

                        <a
                            href="{{ route('auth.login') }}"
                            class="
                                inline-flex min-h-12
                                items-center justify-center
                                rounded-xl
                                border border-slate-200
                                px-5
                                text-sm font-black
                                text-slate-700
                                transition
                                hover:bg-slate-50
                            "
                        >
                            ورود به حساب
                        </a>

                        <a
                            href="{{ route('account.requests.create') }}"
                            class="
                                inline-flex min-h-12
                                items-center justify-center
                                rounded-xl
                                bg-primary-600
                                px-5
                                text-sm font-black
                                text-white
                                transition
                                hover:bg-primary-700
                            "
                        >
                            ثبت درخواست
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

</x-layouts.site>
