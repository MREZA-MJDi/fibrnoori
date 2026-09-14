<x-layouts.auth
    title="ثبت‌نام فیبر نوری | فیبر"
    description="سامانه ثبت‌نام و پیگیری اینترنت فیبر نوری"
>

    <main
        dir="rtl"
        class="
            min-h-screen
            bg-slate-50
        "
    >

        <div
            class="
                mx-auto
                flex
                min-h-screen
                w-full
                max-w-7xl
                items-center
                justify-center

                px-4
                py-8

                sm:px-6
                sm:py-10

                lg:px-8
            "
        >

            <div
                class="
                    grid
                    w-full
                    max-w-6xl
                    items-center

                    gap-8

                    lg:grid-cols-2
                    lg:gap-14

                    xl:gap-20
                "
            >

                {{-- =================================================
                     BRAND / INTRO
                ================================================== --}}

                <section
                    class="
                        hidden
                        text-center

                        lg:block
                        lg:text-right
                    "
                >

                    {{-- Brand --}}
                    <div
                        class="
                            flex
                            items-center
                            justify-center
                            gap-4

                            lg:justify-start
                        "
                    >

                        <div
                            class="
                                grid
                                size-16
                                shrink-0
                                place-items-center

                                overflow-hidden

                                rounded-2xl

                                bg-white

                                ring-1
                                ring-slate-200

                                shadow-sm
                            "
                        >

                            <img
                                src="{{ asset('images/tci-logo.png') }}"
                                alt="فیبر نوری"
                                class="
                                    size-11
                                    object-contain
                                "
                            >

                        </div>


                        <div>

                            <h1
                                class="
                                    text-lg
                                    font-black
                                    tracking-tight
                                    text-slate-950
                                "
                            >
                                فیبر نوری
                            </h1>

                            <p
                                class="
                                    mt-1
                                    text-xs
                                    font-medium
                                    text-slate-500
                                "
                            >
                                سامانه ثبت‌نام اینترنت فیبر نوری
                            </p>

                        </div>

                    </div>


                    {{-- Intro --}}
                    <div class="mt-10 max-w-xl">

                        <span
                            class="
                                inline-flex
                                items-center
                                gap-2

                                rounded-full

                                bg-primary-50

                                px-3
                                py-1.5

                                text-[11px]
                                font-black
                                text-primary-700
                            "
                        >

                            <span
                                class="
                                    size-2
                                    rounded-full
                                    bg-primary-500
                                "
                            ></span>

                            ثبت‌نام اینترنت پرسرعت

                        </span>


                        <h2
                            class="
                                mt-5

                                text-4xl
                                font-black
                                leading-[1.5]
                                tracking-tight
                                text-slate-950

                                xl:text-5xl
                            "
                        >
                            اینترنت فیبر نوری،
                            <span class="block text-primary-600">
                                سریع‌تر و پایدارتر
                            </span>
                        </h2>


                        <p
                            class="
                                mt-5

                                text-sm
                                leading-8
                                text-slate-500

                                xl:text-base
                            "
                        >
                            درخواست اتصال اینترنت فیبر نوری خود را
                            به‌صورت آنلاین ثبت کنید و مراحل درخواست
                            را از طریق حساب کاربری خود پیگیری نمایید.
                        </p>

                    </div>


                    {{-- Features --}}
                    <div
                        class="
                            mt-8
                            grid
                            max-w-xl
                            grid-cols-3
                            gap-3
                        "
                    >

                        {{-- Feature --}}
                        <div
                            class="
                                rounded-2xl

                                border
                                border-slate-200

                                bg-white

                                p-4

                                shadow-sm
                            "
                        >

                            <div
                                class="
                                    grid
                                    size-10
                                    place-items-center

                                    rounded-xl

                                    bg-primary-50
                                    text-primary-600
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
                                    text-slate-900
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
                                اینترنت پرسرعت
                            </p>

                        </div>


                        {{-- Feature --}}
                        <div
                            class="
                                rounded-2xl

                                border
                                border-slate-200

                                bg-white

                                p-4

                                shadow-sm
                            "
                        >

                            <div
                                class="
                                    grid
                                    size-10
                                    place-items-center

                                    rounded-xl

                                    bg-blue-50
                                    text-blue-600
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
                                    text-slate-900
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
                                ارتباط مطمئن
                            </p>

                        </div>


                        {{-- Feature --}}
                        <div
                            class="
                                rounded-2xl

                                border
                                border-slate-200

                                bg-white

                                p-4

                                shadow-sm
                            "
                        >

                            <div
                                class="
                                    grid
                                    size-10
                                    place-items-center

                                    rounded-xl

                                    bg-sky-50
                                    text-sky-600
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
                                        d="M5 12.5 9 16 19 6"
                                    />
                                </svg>

                            </div>

                            <p
                                class="
                                    mt-3
                                    text-xs
                                    font-black
                                    text-slate-900
                                "
                            >
                                ثبت آنلاین
                            </p>

                            <p
                                class="
                                    mt-1
                                    text-[10px]
                                    leading-5
                                    text-slate-500
                                "
                            >
                                سریع و ساده
                            </p>

                        </div>

                    </div>

                </section>


                {{-- =================================================
                     LOGIN CARD
                ================================================== --}}

                <section
                    class="
                        flex
                        w-full
                        items-center
                        justify-center
                    "
                >

                    <div
                        class="
                            w-full
                            max-w-md

                            rounded-[28px]

                            border
                            border-slate-200

                            bg-white

                            p-6

                            shadow-app-lg

                            sm:p-8
                        "
                    >

                        {{-- Logo mobile --}}
                        <div
                            class="
                                mb-7
                                flex
                                items-center
                                gap-3

                                lg:hidden
                            "
                        >

                            <div
                                class="
                                    grid
                                    size-12
                                    shrink-0
                                    place-items-center

                                    overflow-hidden

                                    rounded-2xl

                                    bg-white

                                    ring-1
                                    ring-slate-200

                                    shadow-sm
                                "
                            >

                                <img
                                    src="{{ asset('images/tci-logo.png') }}"
                                    alt="فیبر نوری"
                                    class="
                                        size-8
                                        object-contain
                                    "
                                >

                            </div>


                            <div>

                                <div
                                    class="
                                        text-sm
                                        font-black
                                        text-slate-950
                                    "
                                >
                                    فیبر نوری
                                </div>

                                <div
                                    class="
                                        mt-0.5
                                        text-[10px]
                                        font-medium
                                        text-slate-400
                                    "
                                >
                                    سامانه ثبت‌نام اینترنت فیبر نوری
                                </div>

                            </div>

                        </div>


                        {{-- Heading --}}
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


                        {{-- Form --}}
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


                        {{-- Information --}}
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

                                        <circle
                                            cx="12"
                                            cy="12"
                                            r="9"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            d="M12 10v5"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            d="M12 7.5h.01"
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
