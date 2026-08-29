<x-layouts.account
    title="پروفایل | فیبر نوری"
    heading="پروفایل"
>

    <div class="space-y-6">

        {{-- =========================================================
             Profile header
        ========================================================== --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                <div class="flex min-w-0 items-center gap-4">

                    <div class="grid size-16 shrink-0 place-items-center rounded-2xl bg-primary-600 text-xl font-black text-white shadow-lg shadow-primary-600/20">
                        {{ mb_substr(auth()->user()->name ?: 'ک', 0, 1) }}
                    </div>

                    <div class="min-w-0">

                        <p class="text-xs font-bold text-slate-400">
                            حساب کاربری
                        </p>

                        <h2 class="mt-1 truncate text-xl font-black text-slate-950">
                            {{ auth()->user()->name ?: 'کاربر' }}
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            اطلاعات حساب و مشخصات شما
                        </p>

                    </div>

                </div>


                <div class="inline-flex w-fit items-center gap-2 rounded-xl bg-emerald-50 px-3 py-2 text-xs font-black text-emerald-700">

                    <span class="size-2 rounded-full bg-emerald-500"></span>

                    حساب فعال

                </div>

            </div>

        </section>


        {{-- =========================================================
             Personal information
        ========================================================== --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="mb-6">

                <h2 class="text-lg font-black text-slate-950">
                    اطلاعات شخصی
                </h2>

                <p class="mt-1 text-sm leading-7 text-slate-500">
                    اطلاعات فعلی حساب کاربری شما.
                </p>

            </div>


            <div class="grid gap-4 sm:grid-cols-2">

                {{-- Name --}}
                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        نام و نام خانوادگی
                    </p>

                    <p class="mt-2 break-words text-sm font-black text-slate-900">
                        {{ auth()->user()->name ?: 'ثبت نشده' }}
                    </p>

                </div>


                {{-- Mobile --}}
                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        شماره موبایل
                    </p>

                    <p
                        dir="ltr"
                        class="mt-2 text-sm font-black text-slate-900"
                    >
                        {{ auth()->user()->mobile ?: 'ثبت نشده' }}
                    </p>

                </div>

            </div>

        </section>


        {{-- =========================================================
             Account information
        ========================================================== --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="mb-6">

                <h2 class="text-lg font-black text-slate-950">
                    اطلاعات حساب
                </h2>

                <p class="mt-1 text-sm leading-7 text-slate-500">
                    اطلاعات پایه حساب کاربری شما.
                </p>

            </div>


            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

                {{-- Role --}}
                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        نوع حساب
                    </p>

                    <p class="mt-2 text-sm font-black text-slate-900">
                        کاربر مشتری
                    </p>

                </div>


                {{-- Verification --}}
                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        تأیید شماره موبایل
                    </p>

                    @if (auth()->user()->mobile_verified_at)

                        <div class="mt-2 inline-flex items-center gap-2 rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-black text-emerald-700">

                            <span class="size-1.5 rounded-full bg-emerald-500"></span>

                            تأیید شده

                        </div>

                    @else

                        <div class="mt-2 inline-flex items-center gap-2 rounded-full bg-amber-50 px-2.5 py-1 text-xs font-black text-amber-700">

                            <span class="size-1.5 rounded-full bg-amber-500"></span>

                            تأیید نشده

                        </div>

                    @endif

                </div>


                {{-- Created at --}}
                <div class="rounded-2xl bg-slate-50 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        تاریخ عضویت
                    </p>

                    <p class="mt-2 text-sm font-black text-slate-900">
                        {{ auth()->user()->created_at?->format('Y/m/d') ?? '---' }}
                    </p>

                </div>

            </div>

        </section>


        {{-- =========================================================
             Security / logout
        ========================================================== --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                <div class="min-w-0">

                    <h2 class="text-lg font-black text-slate-950">
                        امنیت حساب
                    </h2>

                    <p class="mt-1 max-w-2xl text-sm leading-7 text-slate-500">
                        ورود این حساب با شماره موبایل و کد تأیید انجام می‌شود.
                    </p>

                </div>


                <form
                    method="POST"
                    action="{{ route('auth.logout') }}"
                    class="shrink-0"
                >
                    @csrf

                    <button
                        type="submit"
                        class="inline-flex min-h-11 w-full items-center justify-center gap-2 rounded-xl border border-red-200 bg-red-50 px-5 text-sm font-black text-red-700 transition hover:bg-red-100 sm:w-auto"
                    >
                        خروج از حساب

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

        </section>


        {{-- Back --}}
        <div class="flex justify-start">

            <a
                href="{{ route('account.dashboard') }}"
                class="inline-flex min-h-11 items-center justify-center rounded-xl border border-slate-200 px-5 text-sm font-black text-slate-700 transition hover:bg-slate-50"
            >
                بازگشت به داشبورد
            </a>

        </div>

    </div>

</x-layouts.account>
