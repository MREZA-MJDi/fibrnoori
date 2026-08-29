<x-layouts.auth
    title="تأیید شماره موبایل | فیبر نوری"
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
                    lg:flex
                    lg:items-center
                    lg:justify-center
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
                                تأیید شماره موبایل
                            </span>
                        </span>
                    </a>


                    {{-- OTP visual --}}
                    <div class="mt-8 sm:mt-10 lg:mt-16">

                        <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-[11px] font-bold text-slate-300">
                            <span class="size-2 rounded-full bg-primary-400"></span>
                            مرحله دوم ورود
                        </span>

                        <h2 class="mt-4 text-2xl font-black leading-[1.4] tracking-tight sm:text-3xl lg:text-4xl xl:text-5xl">
                            فقط یک قدم تا
                            <span class="text-primary-400">
                                ورود
                            </span>
                        </h2>

                        <p class="mt-4 max-w-xl text-xs leading-7 text-slate-400 sm:text-sm sm:leading-8 lg:text-base">
                            کدی که برای شماره موبایل شما ارسال شده را وارد کنید
                            تا ورود به حساب کاربری کامل شود.
                        </p>


                        {{-- OTP visual --}}
                        <div class="mt-8 max-w-md sm:mt-10 lg:mt-12">

                            <div class="rounded-3xl border border-white/10 bg-white/5 p-4 backdrop-blur sm:p-5">

                                <div class="flex items-center justify-between gap-3">

                                    <div class="flex gap-2">

                                        <span class="size-3 rounded-full bg-primary-400"></span>
                                        <span class="size-3 rounded-full bg-primary-400/50"></span>
                                        <span class="size-3 rounded-full bg-white/15"></span>

                                    </div>

                                    <span class="text-[10px] font-bold text-slate-500 sm:text-xs">
                                        کد ۶ رقمی
                                    </span>

                                </div>


                                <div class="mt-5 grid grid-cols-6 gap-2 sm:gap-3">

                                    @for ($i = 0; $i < 6; $i++)

                                        <span class="grid aspect-square place-items-center rounded-xl border border-white/10 bg-white/5 text-base font-black text-slate-500 sm:text-lg">
                                            •
                                        </span>

                                    @endfor

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
                                        d="M4 8.5A2.5 2.5 0 0 1 6.5 6h11A3.5 3.5 0 0 1 20 8.5v7a2.5 2.5 0 0 1-2.5 2.5h-11A2.5 2.5 0 0 1 4 15.5z"
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
                                    تأیید شماره موبایل
                                </span>
                            </span>

                        </a>

                    </div>


                    {{-- Heading --}}
                    <div>

                        <span class="inline-flex rounded-full bg-primary-50 px-3 py-1.5 text-[11px] font-black text-primary-700">
                            تأیید شماره
                        </span>

                        <h1 class="mt-4 text-2xl font-black tracking-tight text-slate-950 sm:text-3xl">
                            کد تأیید را وارد کنید
                        </h1>

                        <p class="mt-3 text-sm leading-7 text-slate-500">
                            کد شش رقمی ارسال‌شده به شماره زیر را وارد کنید.
                        </p>


                        <div class="mt-4 flex items-center justify-between gap-3 rounded-2xl bg-slate-50 p-4">

                            <span
                                dir="ltr"
                                class="font-mono text-sm font-black text-slate-900"
                            >
                                {{ $mobile }}
                            </span>

                            <a
                                href="{{ route('auth.login') }}"
                                class="shrink-0 text-xs font-black text-primary-600 transition hover:text-primary-700"
                            >
                                تغییر شماره
                            </a>

                        </div>

                    </div>


                    <div class="mt-6">
                        <x-flash />
                    </div>


                    <form
                        method="POST"
                        action="{{ route('auth.verify-otp') }}"
                        class="mt-6 space-y-5"
                    >

                        @csrf

                        {{-- Temporary compatibility field --}}
                        <input
                            type="hidden"
                            name="mobile"
                            value="{{ $mobile }}"
                        />


                        <div class="space-y-2">

                            <label
                                for="code"
                                class="block text-sm font-bold text-slate-800"
                            >
                                کد تأیید
                            </label>

                            <input
                                id="code"
                                name="code"
                                type="text"
                                inputmode="numeric"
                                autocomplete="one-time-code"
                                maxlength="6"
                                minlength="6"
                                pattern="[0-9]{6}"
                                required
                                autofocus
                                dir="ltr"
                                class="
                                    block min-h-14 w-full
                                    rounded-2xl
                                    border border-slate-200
                                    bg-white
                                    px-4
                                    text-center
                                    font-mono text-2xl
                                    font-black
                                    tracking-[0.45em]
                                    text-slate-950
                                    shadow-sm
                                    outline-none
                                    transition
                                    placeholder:text-slate-300
                                    focus:border-primary-500
                                    focus:ring-4
                                    focus:ring-primary-100
                                "
                                placeholder="••••••"
                            />

                            @error('code')
                            <p class="text-xs font-medium leading-5 text-red-600">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>


                        <button
                            type="submit"
                            class="
                                inline-flex min-h-12 w-full
                                items-center justify-center gap-2
                                rounded-xl
                                bg-primary-600
                                px-5
                                text-sm font-black text-white
                                shadow-sm
                                transition
                                hover:bg-primary-700
                                focus-visible:ring-4
                                focus-visible:ring-primary-100
                                active:scale-[0.99]
                            "
                        >
                            تأیید و ورود

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
                                    d="m5 12 7 4 7-4-7-4z"
                                />
                            </svg>
                        </button>

                    </form>


                    <div class="mt-7 border-t border-slate-100 pt-5 text-center">

                        <a
                            href="{{ route('auth.login') }}"
                            class="text-xs font-bold text-slate-500 transition hover:text-primary-600"
                        >
                            ارسال کد برای شماره دیگر
                        </a>

                    </div>

                </div>

            </section>

        </div>

    </main>
</x-layouts.auth>
