<x-layouts.auth
    title="ثبت نام فیبر نوری | مخابرات"
>

    <main
        dir="rtl"
        class="
            relative
            min-h-screen
            overflow-hidden
            bg-slate-950
        "
    >

        {{-- =====================================================
             BACKGROUND
        ====================================================== --}}

        <div class="pointer-events-none absolute inset-0">

            {{-- Base --}}
            <div class="absolute inset-0 bg-slate-950"></div>


            {{-- Telecom logo watermark --}}
            <div
                class="
                    absolute
                    left-1/2
                    top-1/2
                    -translate-x-1/2
                    -translate-y-1/2

                    w-[380px]
                    sm:w-[500px]
                    md:w-[650px]
                    lg:w-[780px]
                    xl:w-[900px]

                    opacity-[0.045]
                    select-none
                "
            >
                <img
                    src="{{ asset('images/tci-logo.png') }}"
                    alt=""
                    class="
                        block
                        h-auto
                        w-full
                        object-contain
                    "
                >
            </div>


            {{-- Dark overlay --}}
            <div
                class="
                    absolute
                    inset-0
                    bg-slate-950/60
                "
            ></div>


            {{-- Primary glow --}}
            <div
                class="
                    absolute
                    -right-40
                    -top-40
                    size-[520px]
                    rounded-full
                    bg-primary-600/20
                    blur-[120px]
                "
            ></div>


            {{-- Blue glow --}}
            <div
                class="
                    absolute
                    -bottom-48
                    -left-48
                    size-[600px]
                    rounded-full
                    bg-blue-500/10
                    blur-[140px]
                "
            ></div>


            {{-- Grid --}}
            <div
                class="
                    absolute
                    inset-0
                    opacity-[0.025]
                "
                style="
                    background-image:
                        linear-gradient(
                            rgba(255,255,255,.8) 1px,
                            transparent 1px
                        ),
                        linear-gradient(
                            90deg,
                            rgba(255,255,255,.8) 1px,
                            transparent 1px
                        );
                    background-size: 48px 48px;
                "
            ></div>

        </div>


        {{-- =====================================================
             MAIN CONTENT
        ====================================================== --}}

        <div
            class="
                relative
                z-10
                mx-auto
                flex
                min-h-screen
                w-full
                max-w-7xl
                items-center
                px-4
                py-8

                sm:px-6
                sm:py-10

                lg:px-8
                lg:py-12
            "
        >

            <div
                class="
                    grid
                    w-full
                    grid-cols-1
                    items-center
                    gap-8

                    lg:grid-cols-[1.08fr_.92fr]
                    lg:gap-14

                    xl:gap-20
                "
            >

                {{-- =================================================
                     HERO
                ================================================== --}}

                <section
                    class="
                        flex
                        flex-col
                        justify-center
                        text-white

                        lg:min-h-[640px]
                    "
                >

                    {{-- =================================================
                         BRAND
                    ================================================== --}}

                    <div
                        class="
                            flex
                            items-center
                            gap-4
                        "
                    >

                        <div
                            class="
                                grid
                                size-14
                                shrink-0
                                place-items-center

                                rounded-2xl

                                border
                                border-white/10

                                bg-white/5

                                shadow-2xl
                                shadow-black/20

                                backdrop-blur-xl

                                sm:size-16
                            "
                        >

                            <img
                                src="{{ asset('images/tci-logo.png') }}"
                                alt="شرکت مخابرات ایران"
                                class="
                                    size-9
                                    object-contain

                                    sm:size-10
                                "
                            >

                        </div>


                        <div>

                            <div
                                class="
                                    text-sm
                                    font-black
                                    text-white

                                    sm:text-base
                                "
                            >
                             فیبر نوری مخابرات ایران
                            </div>

                            <div
                                class="
                                    mt-1
                                    text-[11px]
                                    text-slate-400

                                    sm:text-xs
                                "
                            >
                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         BADGE
                    ================================================== --}}

                    <div class="mt-9 sm:mt-10">

                        <span
                            class="
                                inline-flex
                                items-center
                                gap-3

                                rounded-full

                                border
                                border-primary-400/20

                                bg-primary-400/10

                                px-3.5
                                py-2

                                text-[11px]
                                font-black
                                text-primary-300

                                backdrop-blur-md
                            "
                        >

                            <span
                                class="
                                    size-3
                                    rounded-full
                                    bg-primary-400
                                    shadow-[0_0_12px_rgba(74,222,128,.75)]
                                "
                            ></span>

                            ثبت‌نام اینترنت پرسرعت

                        </span>

                    </div>


                    {{-- =================================================
                         TITLE
                    ================================================== --}}

                    <h1
                        class="
                            mt-5
                            max-w-2xl

                            text-4xl
                            font-black
                            leading-[1.45]
                            tracking-tight

                            sm:text-5xl

                            lg:text-[3.6rem]
                            lg:leading-[1.4]

                            xl:text-6xl
                        "
                    >

                        ثبت نام

                        <span
                            class="
                                block
                                text-primary-400
                            "
                        >
                            فیبر نوری مخابرات
                        </span>

                    </h1>


                    {{-- =================================================
                         DESCRIPTION
                    ================================================== --}}

                    <p
                        class="
                            mt-5
                            max-w-xl

                            text-sm
                            leading-8
                            text-slate-400

                            sm:text-base
                            sm:leading-9
                        "
                    >
                        برای دریافت اینترنت فیبر نوری، درخواست خود را
                        به‌صورت آنلاین ثبت کنید، وضعیت پوشش را بررسی کنید
                        و مراحل درخواست خود را به‌سادگی پیگیری نمایید.
                    </p>


                    {{-- =================================================
                         FEATURES
                    ================================================== --}}

                    <div
                        class="
                            mt-8
                            grid
                            max-w-2xl
                            grid-cols-1
                            gap-3

                            sm:grid-cols-3
                        "
                    >

                        {{-- Feature 1 --}}
                        <div
                            class="
                                rounded-2xl

                                border
                                border-white/10

                                bg-white/5

                                p-4

                                backdrop-blur-xl

                                transition
                                duration-200

                                hover:border-white/15
                                hover:bg-white/[0.07]
                            "
                        >

                            <div
                                class="
                                    grid
                                    size-10
                                    place-items-center

                                    rounded-xl

                                    bg-primary-400/10
                                    text-primary-300
                                "
                            >

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
                                        d="m13 3-9 11h7l-1 7 9-11h-7z"
                                    />
                                </svg>

                            </div>

                            <p
                                class="
                                    mt-3
                                    text-xs
                                    font-black
                                    text-white
                                "
                            >
                                سرعت بالا
                            </p>

                            <p
                                class="
                                    mt-1
                                    text-[10px]
                                    leading-5
                                    text-slate-500
                                "
                            >
                                اینترنت پرسرعت فیبر نوری
                            </p>

                        </div>


                        {{-- Feature 2 --}}
                        <div
                            class="
                                rounded-2xl

                                border
                                border-white/10

                                bg-white/5

                                p-4

                                backdrop-blur-xl

                                transition
                                duration-200

                                hover:border-white/15
                                hover:bg-white/[0.07]
                            "
                        >

                            <div
                                class="
                                    grid
                                    size-10
                                    place-items-center

                                    rounded-xl

                                    bg-white/5
                                    text-slate-300
                                "
                            >

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
                                        d="
                                            M3.5 12h17
                                            M12 3.5
                                            c2.2 2.4 3.2 5.2 3.2 8.5
                                            S14.2 18.1 12 20.5
                                            c-2.2-2.4-3.2-5.2-3.2-8.5
                                            S9.8 5.9 12 3.5z
                                        "
                                    />
                                </svg>

                            </div>

                            <p
                                class="
                                    mt-3
                                    text-xs
                                    font-black
                                    text-white
                                "
                            >
                                اتصال پایدار
                            </p>

                            <p
                                class="
                                    mt-1
                                    text-[10px]
                                    leading-5
                                    text-slate-500
                                "
                            >
                                ارتباط سریع و مطمئن
                            </p>

                        </div>


                        {{-- Feature 3 --}}
                        <div
                            class="
                                rounded-2xl

                                border
                                border-primary-400/20

                                bg-primary-400/10

                                p-4

                                transition
                                duration-200

                                hover:bg-primary-400/[0.14]
                            "
                        >

                            <div
                                class="
                                    grid
                                    size-10
                                    place-items-center

                                    rounded-xl

                                    bg-primary-400/10
                                    text-primary-300
                                "
                            >

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
                                        d="M5 12.5 9 16l10-10"
                                    />
                                </svg>

                            </div>

                            <p
                                class="
                                    mt-3
                                    text-xs
                                    font-black
                                    text-white
                                "
                            >
                                ثبت آنلاین
                            </p>

                            <p
                                class="
                                    mt-1
                                    text-[10px]
                                    leading-5
                                    text-slate-400
                                "
                            >
                                ثبت و پیگیری ساده درخواست
                            </p>

                        </div>

                    </div>


                    {{-- Footer --}}
                    <p
                        class="
                            mt-8
                            text-[10px]
                            text-slate-600

                            sm:mt-10
                            sm:text-[11px]
                        "
                    >
                        © {{ now()->year }} شرکت مخابرات ایران
                    </p>

                </section>


                {{-- =================================================
                     LOGIN / OTP
                ================================================== --}}

                <section
                    class="
                        flex
                        items-center
                        justify-center

                        lg:min-h-[640px]
                    "
                >

                    <div
                        class="
                            w-full
                            max-w-md

                            rounded-[28px]

                            border
                            border-white/10

                            bg-white

                            p-5

                            shadow-2xl
                            shadow-black/30

                            sm:p-7
                            lg:p-8
                        "
                    >

                        {{-- Card heading --}}
                        <div>

                            <span
                                class="
                                    inline-flex

                                    rounded-full

                                    bg-primary-50

                                    px-3
                                    py-1.5

                                    text-[11px]
                                    font-black
                                    text-primary-700
                                "
                            >
                                شروع ثبت‌نام
                            </span>


                            <h2
                                class="
                                    mt-4

                                    text-2xl
                                    font-black
                                    tracking-tight
                                    text-slate-950

                                    sm:text-3xl
                                "
                            >
                                ثبت درخواست فیبر نوری
                            </h2>


                            <p
                                class="
                                    mt-3

                                    text-sm
                                    leading-7
                                    text-slate-500
                                "
                            >
                                شماره موبایل خود را وارد کنید تا
                                کد تأیید برای شما ارسال شود.
                            </p>

                        </div>


                        {{-- Flash --}}
                        <div class="mt-6">
                            <x-flash />
                        </div>


                        {{-- OTP form --}}
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


                            <p
                                class="
                                    -mt-2

                                    text-xs
                                    leading-6
                                    text-slate-400
                                "
                            >
                                شماره موبایل را بدون فاصله و با فرمت ۰۹ وارد کنید.
                            </p>


                            <button
                                type="submit"
                                class="
                                    inline-flex
                                    min-h-12
                                    w-full
                                    items-center
                                    justify-center
                                    gap-2

                                    rounded-xl

                                    bg-primary-600

                                    px-5

                                    text-sm
                                    font-black
                                    text-white

                                    shadow-sm

                                    transition

                                    hover:bg-primary-700

                                    focus-visible:ring-4
                                    focus-visible:ring-primary-100

                                    active:scale-[0.99]
                                "
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


                        {{-- Info --}}
                        <div
                            class="
                                mt-6

                                rounded-2xl

                                border
                                border-slate-100

                                bg-slate-50

                                p-4
                            "
                        >

                            <div
                                class="
                                    flex
                                    items-start
                                    gap-3
                                "
                            >

                                <div
                                    class="
                                        grid
                                        size-9
                                        shrink-0
                                        place-items-center

                                        rounded-xl

                                        bg-primary-100
                                        text-primary-700
                                    "
                                >

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
                                            d="
                                                M12 11v5
                                                m0-9.25v.1
                                            "
                                        />

                                        <circle
                                            cx="12"
                                            cy="12"
                                            r="9"
                                        />
                                    </svg>

                                </div>


                                <div>

                                    <p
                                        class="
                                            text-xs
                                            font-black
                                            text-slate-800
                                        "
                                    >
                                        ثبت‌نام کاملاً آنلاین
                                    </p>

                                    <p
                                        class="
                                            mt-1
                                            text-[11px]
                                            leading-6
                                            text-slate-500
                                        "
                                    >
                                        پس از ورود می‌توانید درخواست،
                                        وضعیت پوشش و مراحل پیگیری
                                        سرویس خود را مشاهده کنید.
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- Trust --}}
                        <div
                            class="
                                mt-6

                                flex
                                items-center
                                justify-center
                                gap-2

                                text-[10px]
                                font-bold
                                text-slate-400
                            "
                        >

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
                                    d="M12 3 5 6v5c0 4.6 2.8 8.1 7 10 4.2-1.9 7-5.4 7-10V6z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="m9 12 2 2 4-4"
                                />
                            </svg>

                            سامانه ثبت درخواست فیبر نوری

                        </div>

                    </div>

                </section>

            </div>

        </div>

    </main>

</x-layouts.auth>

