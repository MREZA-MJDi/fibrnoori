<x-layouts.auth
    title="ورود | فیبر نوری"
>
    <main class="min-h-screen bg-slate-50">

        <div class="mx-auto flex min-h-screen w-full max-w-[1440px] flex-col lg:flex-row">

            {{-- =====================================================
                 Visual
            ====================================================== --}}
            <section
                class="
                    relative overflow-hidden
                    bg-slate-950 text-white

                    min-h-[260px]
                    w-full

                    sm:min-h-[320px]

                    lg:min-h-screen
                    lg:w-1/2
                    lg:items-center
                    lg:justify-center
                    lg:flex
                "
            >
                <div class="pointer-events-none absolute -left-24 -top-24 size-72 rounded-full bg-primary-600/20 blur-3xl sm:size-96"></div>

                <div class="pointer-events-none absolute -bottom-32 right-1/4 size-80 rounded-full bg-blue-500/10 blur-3xl sm:size-[28rem]"></div>


                <div
                    class="
                        relative z-10 mx-auto w-full max-w-xl
                        px-5 py-8
                        sm:px-8 sm:py-10
                        lg:px-12 lg:py-16
                        xl:px-16
                    "
                >

                    {{-- Brand --}}
                    <a
                        href="{{ route('home') }}"
                        class="inline-flex items-center gap-3"
                    >
                        <span class="grid size-11 shrink-0 place-items-center rounded-2xl bg-primary-600 text-white shadow-lg shadow-primary-950/30 sm:size-12">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.8"
                                stroke="currentColor"
                                class="size-5 sm:size-6"
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
                                اینترنت پرسرعت
                            </span>
                        </span>
                    </a>


                    {{-- Visual content --}}
                    <div class="mt-8 sm:mt-10 lg:mt-16">

                        <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-[11px] font-bold text-slate-300">
                            <span class="size-2 rounded-full bg-primary-400"></span>
                            اتصال سریع و پایدار
                        </span>

                        <h2 class="mt-4 max-w-xl text-2xl font-black leading-[1.4] tracking-tight sm:text-3xl lg:text-4xl xl:text-5xl">
                            اینترنت فیبر نوری،
                            <span class="text-primary-400">
                                ساده‌تر از همیشه
                            </span>
                        </h2>

                        <p class="mt-4 max-w-xl text-xs leading-7 text-slate-400 sm:text-sm sm:leading-8 lg:text-base">
                            تعرفه مناسب خود را انتخاب کنید، درخواست اتصال را ثبت کنید و
                            وضعیت درخواست خود را از پنل کاربری پیگیری کنید.
                        </p>


                        {{-- Desktop / Tablet visual --}}
                        <div class="mt-8 sm:mt-10 lg:mt-12">

                            <div class="grid grid-cols-3 gap-2 sm:gap-3">

                                <div class="rounded-2xl border border-white/10 bg-white/5 p-3 sm:p-4">
                                    <span class="grid size-9 place-items-center rounded-xl bg-primary-500/10 text-primary-300 sm:size-10">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.8"
                                            stroke="currentColor"
                                            class="size-4 sm:size-5"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="m13 3-9 11h7l-1 7 9-11h-7z"
                                            />
                                        </svg>
                                    </span>

                                    <p class="mt-3 text-[11px] font-black text-white sm:text-xs">
                                        سرعت بالا
                                    </p>

                                    <p class="mt-1 text-[10px] leading-5 text-slate-500 sm:text-[11px]">
                                        سرویس پرسرعت
                                    </p>
                                </div>


                                <div class="rounded-2xl border border-white/10 bg-white/5 p-3 sm:p-4">
                                    <span class="grid size-9 place-items-center rounded-xl bg-white/5 text-slate-300 sm:size-10">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.8"
                                            stroke="currentColor"
                                            class="size-4 sm:size-5"
                                        >
                                            <circle
                                                cx="12"
                                                cy="12"
                                                r="8.5"
                                            />

                                            <path
                                                stroke-linecap="round"
                                                d="M3.5 12h17M12 3.5c2.2 2.4 3.2 5.2 3.2 8.5S14.2 18.1 12 20.5c-2.2-2.4-3.2-5.2-3.2-8.5S9.8 5.9 12 3.5z"
                                            />
                                        </svg>
                                    </span>

                                    <p class="mt-3 text-[11px] font-black text-white sm:text-xs">
                                        اتصال پایدار
                                    </p>

                                    <p class="mt-1 text-[10px] leading-5 text-slate-500 sm:text-[11px]">
                                        کیفیت مطمئن
                                    </p>
                                </div>


                                <div class="rounded-2xl border border-primary-400/20 bg-primary-500/10 p-3 sm:p-4">
                                    <span class="grid size-9 place-items-center rounded-xl bg-primary-400/10 text-primary-300 sm:size-10">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.8"
                                            stroke="currentColor"
                                            class="size-4 sm:size-5"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="m5 12 4 4L19 6"
                                            />
                                        </svg>
                                    </span>

                                    <p class="mt-3 text-[11px] font-black text-white sm:text-xs">
                                        ثبت آنلاین
                                    </p>

                                    <p class="mt-1 text-[10px] leading-5 text-slate-500 sm:text-[11px]">
                                        سریع و ساده
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>


                    <p class="mt-8 hidden text-xs text-slate-500 lg:block">
                        © {{ now()->year }} فیبر نوری
                    </p>

                </div>
            </section>


            {{-- =====================================================
                 Form
            ====================================================== --}}
            <section
                class="
                    flex w-full flex-1 items-center justify-center
                    bg-white
                    px-4 py-8
                    sm:px-8 sm:py-10
                    lg:w-1/2
                    lg:px-12 lg:py-16
                    xl:px-16
                "
            >
                <div class="w-full max-w-md">

                    {{-- Mobile brand --}}
                    <div class="mb-8 lg:hidden">

                        <a
                            href="{{ route('home') }}"
                            class="inline-flex items-center gap-3"
                        >
                            <span class="grid size-11 place-items-center rounded-2xl bg-primary-600 text-white shadow-sm">
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
                                <span class="block text-sm font-black text-slate-950">
                                    فیبر نوری
                                </span>

                                <span class="mt-0.5 block text-[11px] text-slate-400">
                                    اینترنت پرسرعت
                                </span>
                            </span>
                        </a>

                    </div>


                    {{-- Form heading --}}
                    <div>

                        <span class="inline-flex rounded-full bg-primary-50 px-3 py-1.5 text-[11px] font-black text-primary-700">
                            ورود به سامانه
                        </span>

                        <h1 class="mt-4 text-2xl font-black tracking-tight text-slate-950 sm:text-3xl">
                            خوش آمدید
                        </h1>

                        <p class="mt-3 text-sm leading-7 text-slate-500">
                            برای ورود، شماره موبایل خود را وارد کنید تا کد تأیید برای شما ارسال شود.
                        </p>

                    </div>


                    <div class="mt-6">
                        <x-flash />
                    </div>


                    <form
                        method="POST"
                        action="{{ route('auth.send-otp') }}"
                        class="mt-6 space-y-5"
                    >
                        @csrf

                        <x-input
                            name="mobile"
                            label="شماره موبایل"
                            type="tel"
                            :value="old('mobile')"
                            placeholder="09123456789"
                            inputmode="numeric"
                            autocomplete="tel"
                            maxlength="11"
                            required
                        />

                        <p class="-mt-2 text-xs leading-6 text-slate-400">
                            شماره موبایل را بدون فاصله و با فرمت ۰۹ وارد کنید.
                        </p>

                        <button
                            type="submit"
                            class="inline-flex min-h-12 w-full items-center justify-center gap-2 rounded-xl bg-primary-600 px-5 text-sm font-black text-white shadow-sm transition hover:bg-primary-700 focus-visible:ring-4 focus-visible:ring-primary-100 active:scale-[0.99]"
                        >
                            دریافت کد تأیید

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
                        </button>

                    </form>


                    <div class="mt-7 border-t border-slate-100 pt-5 text-center">

                        <a
                            href="{{ route('home') }}"
                            class="text-xs font-bold text-slate-500 transition hover:text-primary-600"
                        >
                            بازگشت به سایت
                        </a>

                    </div>

                </div>
            </section>

        </div>

    </main>
</x-layouts.auth>
