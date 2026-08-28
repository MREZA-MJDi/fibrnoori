<x-layouts.site
    title="فیبره نوری | اینترنت فیبر نوری"
    description="اینترنت فیبر نوری سریع، پایدار و حرفه‌ای با تعرفه‌های متنوع و مودم‌های مناسب."
>

    {{-- Hero --}}
    <section class="relative isolate overflow-hidden bg-slate-950">

        <div class="absolute inset-0 -z-20">
            <img
                src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=2200&q=85"
                alt="فناوری شبکه و اینترنت فیبر نوری"
                class="h-full min-h-[680px] w-full object-cover"
            >
        </div>

        <div class="absolute inset-0 -z-10 bg-slate-950/65"></div>

        <div class="absolute inset-0 -z-10 bg-gradient-to-l from-slate-950 via-slate-950/75 to-slate-950/30"></div>

        <div class="container-site">

            <div class="flex min-h-[680px] items-center">

                <div class="max-w-3xl py-20 text-white sm:py-24 lg:py-28">

                    <p class="text-sm font-black text-primary-300 sm:text-base">
                        اینترنت فیبر نوری
                    </p>

                    <h1
                        class="
                            mt-4
                            text-4xl font-black
                            leading-[1.25]
                            tracking-tight
                            sm:text-5xl
                            lg:text-7xl
                        "
                    >
                        سرعتی که برای
                        <span class="text-primary-400">
                            زندگی امروز
                        </span>
                        ساخته شده.
                    </h1>

                    <p
                        class="
                            mt-6
                            max-w-2xl
                            text-base
                            leading-8
                            text-slate-200
                            sm:text-lg
                        "
                    >
                        اینترنتی سریع، پایدار و قابل اعتماد برای خانه،
                        کار، بازی، استریم و تمام دستگاه‌های شما.
                    </p>

                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">

                        <a
                            href="{{ route('account.requests.create') }}"
                            class="
                                inline-flex min-h-13
                                items-center justify-center
                                rounded-xl
                                bg-primary-600
                                px-7
                                text-sm font-black
                                text-white
                                shadow-xl
                                shadow-black/20
                                transition
                                hover:-translate-y-0.5
                                hover:bg-primary-500
                            "
                        >
                            ثبت درخواست فیبر نوری
                        </a>

                        <a
                            href="{{ route('tariffs.index') }}"
                            class="
                                inline-flex min-h-13
                                items-center justify-center
                                rounded-xl
                                border border-white/20
                                bg-white/10
                                px-7
                                text-sm font-black
                                text-white
                                backdrop-blur
                                transition
                                hover:bg-white/20
                            "
                        >
                            مشاهده تعرفه‌ها
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- Benefits --}}
    <section class="bg-white py-16 sm:py-20 lg:py-24">

        <div class="container-site">

            <div class="max-w-2xl">

                <p class="text-sm font-black text-primary-600">
                    چرا فیبره نوری؟
                </p>

                <h2
                    class="
                        mt-3
                        text-2xl font-black
                        tracking-tight
                        text-slate-950
                        sm:text-3xl
                    "
                >
                    اینترنت خوب فقط سرعت بالا نیست.
                </h2>

                <p class="mt-4 text-sm leading-7 text-slate-500 sm:text-base">
                    یک اتصال خوب باید سریع، پایدار و مناسب استفاده روزمره باشد.
                    ما همه این موارد را در یک تجربه ساده جمع کرده‌ایم.
                </p>

            </div>

            <div class="mt-10 grid gap-4 md:grid-cols-3">

                <article
                    class="
                        rounded-3xl
                        border border-slate-200
                        bg-slate-50
                        p-6
                        transition
                        hover:-translate-y-1
                        hover:bg-white
                        hover:shadow-xl
                        hover:shadow-slate-900/5
                    "
                >

                    <div class="grid size-12 place-items-center rounded-2xl bg-primary-100 text-primary-700">

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
                                d="M13 2 4 14h7l-1 8 9-12h-7l1-8z"
                            />
                        </svg>

                    </div>

                    <h3 class="mt-5 text-lg font-black text-slate-950">
                        سرعت بالا
                    </h3>

                    <p class="mt-3 text-sm leading-7 text-slate-500">
                        مناسب برای دانلود، استریم، بازی آنلاین و استفاده
                        همزمان چندین دستگاه.
                    </p>

                </article>


                <article
                    class="
                        rounded-3xl
                        border border-slate-200
                        bg-slate-50
                        p-6
                        transition
                        hover:-translate-y-1
                        hover:bg-white
                        hover:shadow-xl
                        hover:shadow-slate-900/5
                    "
                >

                    <div class="grid size-12 place-items-center rounded-2xl bg-emerald-100 text-emerald-700">

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
                                d="M12 3v4M12 17v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M3 12h4M17 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"
                            />
                        </svg>

                    </div>

                    <h3 class="mt-5 text-lg font-black text-slate-950">
                        اتصال پایدار
                    </h3>

                    <p class="mt-3 text-sm leading-7 text-slate-500">
                        اتصال پایدار برای کار، آموزش، سرگرمی و استفاده
                        روزانه بدون دردسر.
                    </p>

                </article>


                <article
                    class="
                        rounded-3xl
                        border border-slate-200
                        bg-slate-50
                        p-6
                        transition
                        hover:-translate-y-1
                        hover:bg-white
                        hover:shadow-xl
                        hover:shadow-slate-900/5
                    "
                >

                    <div class="grid size-12 place-items-center rounded-2xl bg-violet-100 text-violet-700">

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
                                d="M9 12.75 11.25 15 15 9.75M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z"
                            />
                        </svg>

                    </div>

                    <h3 class="mt-5 text-lg font-black text-slate-950">
                        تجربه ساده
                    </h3>

                    <p class="mt-3 text-sm leading-7 text-slate-500">
                        تعرفه را انتخاب کنید، مودم مناسب را ببینید و
                        درخواست خود را ساده ثبت کنید.
                    </p>

                </article>

            </div>

        </div>

    </section>


    {{-- How it works --}}
    <section class="bg-slate-50 py-16 sm:py-20 lg:py-24">

        <div class="container-site">

            <div class="mx-auto max-w-2xl text-center">

                <p class="text-sm font-black text-primary-600">
                    شروع کار
                </p>

                <h2 class="mt-3 text-2xl font-black tracking-tight text-slate-950 sm:text-3xl">
                    راه‌اندازی ساده و سریع
                </h2>

                <p class="mt-4 text-sm leading-7 text-slate-500 sm:text-base">
                    برای شروع استفاده از اینترنت فیبر نوری فقط چند مرحله ساده
                    پیش رو دارید.
                </p>

            </div>


            <div class="mt-12 grid gap-5 md:grid-cols-3">

                <div class="rounded-3xl border border-slate-200 bg-white p-6">

                    <span class="grid size-10 place-items-center rounded-xl bg-primary-600 text-sm font-black text-white">
                        ۱
                    </span>

                    <h3 class="mt-5 text-base font-black text-slate-950">
                        تعرفه خود را انتخاب کنید
                    </h3>

                    <p class="mt-3 text-sm leading-7 text-slate-500">
                        از بین بسته‌های موجود، سرعت و مدت مناسب خود را انتخاب کنید.
                    </p>

                </div>


                <div class="rounded-3xl border border-slate-200 bg-white p-6">

                    <span class="grid size-10 place-items-center rounded-xl bg-primary-600 text-sm font-black text-white">
                        ۲
                    </span>

                    <h3 class="mt-5 text-base font-black text-slate-950">
                        درخواست خود را ثبت کنید
                    </h3>

                    <p class="mt-3 text-sm leading-7 text-slate-500">
                        اطلاعات لازم را وارد کنید تا درخواست شما ثبت و بررسی شود.
                    </p>

                </div>


                <div class="rounded-3xl border border-slate-200 bg-white p-6">

                    <span class="grid size-10 place-items-center rounded-xl bg-primary-600 text-sm font-black text-white">
                        ۳
                    </span>

                    <h3 class="mt-5 text-base font-black text-slate-950">
                        وضعیت را پیگیری کنید
                    </h3>

                    <p class="mt-3 text-sm leading-7 text-slate-500">
                        از داخل حساب کاربری، وضعیت درخواست و جزئیات آن را مشاهده کنید.
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- CTA --}}
    <section class="bg-white py-16 sm:py-20">

        <div class="container-site">

            <div
                class="
                    relative
                    overflow-hidden
                    rounded-[2rem]
                    bg-primary-600
                    px-6 py-10
                    text-white
                    shadow-xl
                    shadow-primary-600/20
                    sm:px-10
                    sm:py-12
                    lg:px-14
                "
            >

                <div class="absolute -left-20 -top-20 size-64 rounded-full bg-white/10 blur-3xl"></div>

                <div class="relative flex flex-col gap-8 lg:flex-row lg:items-center lg:justify-between">

                    <div class="max-w-2xl">

                        <p class="text-sm font-black text-primary-100">
                            آماده شروع هستید؟
                        </p>

                        <h2 class="mt-2 text-2xl font-black sm:text-3xl">
                            اینترنت فیبر نوری را همین حالا شروع کنید.
                        </h2>

                        <p class="mt-4 text-sm leading-7 text-primary-100 sm:text-base">
                            تعرفه مناسب خود را انتخاب کنید و درخواست اتصال
                            فیبر نوری را ثبت کنید.
                        </p>

                    </div>

                    <div class="flex shrink-0 flex-col gap-3 sm:flex-row">

                        <a
                            href="{{ route('account.requests.create') }}"
                            class="
                                inline-flex min-h-12
                                items-center justify-center
                                rounded-xl
                                bg-white
                                px-6
                                text-sm font-black
                                text-primary-700
                                transition
                                hover:-translate-y-0.5
                                hover:bg-primary-50
                            "
                        >
                            ثبت درخواست
                        </a>

                        <a
                            href="{{ route('tariffs.index') }}"
                            class="
                                inline-flex min-h-12
                                items-center justify-center
                                rounded-xl
                                border border-white/30
                                px-6
                                text-sm font-black
                                text-white
                                transition
                                hover:bg-white/10
                            "
                        >
                            تعرفه‌ها
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

</x-layouts.site>
