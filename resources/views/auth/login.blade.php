<x-layouts.auth
    title="ورود | فیبره نوری"
    heading="ورود به حساب کاربری"
    subheading="شماره موبایل خود را وارد کنید تا کد تایید برای شما ارسال شود."
>

    <form
        method="POST"
        action="{{ route('auth.send-otp') }}"
        class="space-y-5"
    >
        @csrf

        <div>
            <label
                for="mobile"
                class="mb-2 block text-sm font-black text-slate-800"
            >
                شماره موبایل
            </label>

            <input
                id="mobile"
                name="mobile"
                type="tel"
                inputmode="numeric"
                autocomplete="tel"
                dir="ltr"
                value="{{ old('mobile') }}"
                placeholder="09123456789"
                maxlength="11"
                required
                autofocus
                class="
                    block
                    w-full
                    rounded-xl
                    border border-slate-200
                    bg-white
                    px-4
                    py-3.5
                    text-left
                    text-base
                    font-bold
                    tracking-wider
                    text-slate-900
                    outline-none
                    transition
                    placeholder:text-slate-300
                    focus:border-primary-500
                    focus:ring-4
                    focus:ring-primary-600/10
                "
            >

            @error('mobile')
            <p class="mt-2 text-xs font-bold text-red-600">
                {{ $message }}
            </p>
            @enderror
        </div>


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
                shadow-lg
                shadow-primary-600/20
                transition
                hover:-translate-y-0.5
                hover:bg-primary-700
                active:translate-y-0
                active:bg-primary-800
                focus:outline-none
                focus:ring-4
                focus:ring-primary-600/15
            "
        >
            دریافت کد تایید

            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                class="size-5"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M13 5l7 7-7 7M20 12H4"
                />
            </svg>
        </button>
    </form>


    <div class="mt-6 rounded-2xl border border-slate-100 bg-slate-50 p-4">

        <div class="flex items-start gap-3">

            <div class="grid size-9 shrink-0 place-items-center rounded-xl bg-white text-primary-600 shadow-sm">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.8"
                    stroke="currentColor"
                    class="size-4"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 8v4l2.5 2.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"
                    />
                </svg>
            </div>

            <div>
                <p class="text-xs font-black text-slate-800">
                    ورود سریع و ساده
                </p>

                <p class="mt-1 text-xs leading-6 text-slate-500">
                    کد تایید به شماره موبایل شما ارسال می‌شود و
                    نیازی به حفظ رمز عبور ندارید.
                </p>
            </div>

        </div>

    </div>

</x-layouts.auth>
