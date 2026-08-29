<x-layouts.account
    title="داشبورد | فیبر نوری"
    heading="داشبورد"
>

    <div class="space-y-6">

        {{-- =========================================================
             Welcome
        ========================================================== --}}
        <section class="relative overflow-hidden rounded-3xl bg-slate-950 p-5 text-white shadow-sm sm:p-7">

            <div class="relative z-10">

                <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">

                    <div class="min-w-0 max-w-3xl">

                        <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-[11px] font-black text-slate-300">
                            <span class="size-2 rounded-full bg-emerald-400"></span>
                            حساب کاربری
                        </span>

                        <h2 class="mt-4 break-words text-2xl font-black tracking-tight sm:text-3xl">
                            سلام
                            {{ auth()->user()->name ?: 'کاربر' }}
                            👋
                        </h2>

                        <p class="mt-3 max-w-2xl text-sm leading-8 text-slate-400">
                            از این بخش می‌توانید درخواست‌های فیبر نوری خود را ثبت و وضعیت درخواست‌های قبلی را پیگیری کنید.
                        </p>

                    </div>


                    <a
                        href="{{ route('account.requests.create') }}"
                        class="inline-flex min-h-12 w-full shrink-0 items-center justify-center gap-2 rounded-xl bg-white px-5 text-sm font-black text-slate-950 transition hover:-translate-y-0.5 hover:bg-slate-100 sm:w-auto"
                    >
                        ثبت درخواست جدید

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
                                d="M12 5v14M5 12h14"
                            />
                        </svg>

                    </a>

                </div>

            </div>


            <div class="pointer-events-none absolute -left-20 -top-20 size-64 rounded-full bg-primary-600/20 blur-3xl"></div>

            <div class="pointer-events-none absolute -bottom-32 right-1/3 size-72 rounded-full bg-blue-500/10 blur-3xl"></div>

        </section>


        {{-- =========================================================
             Quick actions
        ========================================================== --}}
        <section class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

            <a
                href="{{ route('account.requests.index') }}"
                class="group rounded-3xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-primary-200 hover:shadow-md"
            >

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-xs font-bold text-slate-400">
                            درخواست‌های من
                        </p>

                        <p class="mt-3 text-lg font-black text-slate-950">
                            مشاهده و پیگیری
                        </p>

                        <p class="mt-2 text-xs leading-6 text-slate-500">
                            درخواست‌های قبلی خود را مشاهده کنید.
                        </p>

                    </div>


                    <div class="grid size-11 shrink-0 place-items-center rounded-2xl bg-primary-50 text-primary-600">

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

                    </div>

                </div>

            </a>


            <a
                href="{{ route('account.requests.create') }}"
                class="group rounded-3xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-primary-200 hover:shadow-md"
            >

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-xs font-bold text-slate-400">
                            درخواست جدید
                        </p>

                        <p class="mt-3 text-lg font-black text-slate-950">
                            ثبت درخواست اتصال
                        </p>

                        <p class="mt-2 text-xs leading-6 text-slate-500">
                            سرویس و مودم موردنظر خود را انتخاب کنید.
                        </p>

                    </div>


                    <div class="grid size-11 shrink-0 place-items-center rounded-2xl bg-primary-50 text-primary-600">

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
                                d="M12 5v14M5 12h14"
                            />
                        </svg>

                    </div>

                </div>

            </a>


            <a
                href="{{ route('account.profile') }}"
                class="group rounded-3xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-primary-200 hover:shadow-md"
            >

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-xs font-bold text-slate-400">
                            پروفایل
                        </p>

                        <p class="mt-3 text-lg font-black text-slate-950">
                            اطلاعات حساب
                        </p>

                        <p class="mt-2 text-xs leading-6 text-slate-500">
                            اطلاعات کاربری خود را مشاهده کنید.
                        </p>

                    </div>


                    <div class="grid size-11 shrink-0 place-items-center rounded-2xl bg-slate-100 text-slate-600">

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

                    </div>

                </div>

            </a>

        </section>


        {{-- =========================================================
             Account summary
        ========================================================== --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <h3 class="text-lg font-black text-slate-950">
                        خلاصه حساب
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        اطلاعات پایه حساب کاربری
                    </p>

                </div>


                <a
                    href="{{ route('account.profile') }}"
                    class="inline-flex min-h-10 items-center justify-center rounded-xl border border-slate-200 px-4 text-xs font-black text-slate-700 transition hover:bg-slate-50"
                >
                    مشاهده پروفایل
                </a>

            </div>


            <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        نام
                    </p>

                    <p class="mt-2 break-words text-sm font-black text-slate-900">
                        {{ auth()->user()->name ?: 'ثبت نشده' }}
                    </p>

                </div>


                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        شماره موبایل
                    </p>

                    <p
                        dir="ltr"
                        class="mt-2 text-sm font-black text-slate-900"
                    >
                        {{ auth()->user()->mobile }}
                    </p>

                </div>


                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        وضعیت حساب
                    </p>

                    <div class="mt-2 inline-flex items-center gap-2 rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-black text-emerald-700">

                        <span class="size-1.5 rounded-full bg-emerald-500"></span>

                        فعال

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
             Getting started
        ========================================================== --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="max-w-2xl">

                <span class="inline-flex rounded-full bg-primary-50 px-3 py-1.5 text-xs font-black text-primary-700">
                    شروع سریع
                </span>

                <h3 class="mt-4 text-xl font-black tracking-tight text-slate-950">
                    برای اتصال آماده‌ای؟
                </h3>

                <p class="mt-2 text-sm leading-8 text-slate-500">
                    تعرفه موردنظر خود را انتخاب کنید، در صورت نیاز مودم اضافه کنید و درخواست اتصال را ثبت نمایید.
                </p>

                <div class="mt-6 flex flex-col gap-3 sm:flex-row">

                    <a
                        href="{{ route('tariffs.index') }}"
                        class="inline-flex min-h-11 items-center justify-center rounded-xl border border-slate-200 px-5 text-sm font-black text-slate-700 transition hover:bg-slate-50"
                    >
                        مشاهده تعرفه‌ها
                    </a>

                    <a
                        href="{{ route('modems.index') }}"
                        class="inline-flex min-h-11 items-center justify-center rounded-xl border border-slate-200 px-5 text-sm font-black text-slate-700 transition hover:bg-slate-50"
                    >
                        مشاهده مودم‌ها
                    </a>

                    <a
                        href="{{ route('account.requests.create') }}"
                        class="inline-flex min-h-11 items-center justify-center rounded-xl bg-primary-600 px-5 text-sm font-black text-white transition hover:bg-primary-700"
                    >
                        شروع درخواست
                    </a>

                </div>

            </div>

        </section>

    </div>

</x-layouts.account>
