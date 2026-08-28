<x-layouts.auth
    title="تایید شماره | فیبره نوری"
    heading="تایید شماره موبایل"
    subheading="کد تاییدی که برای شماره موبایل شما ارسال شده است را وارد کنید."
>

    @php
        $mobile = session('mobile', old('mobile'));
    @endphp

    <form
        method="POST"
        action="{{ route('auth.verify-otp') }}"
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
                value="{{ $mobile }}"
                placeholder="0912xxxxxxx"
                maxlength="11"
                dir="ltr"
                required
                class="block min-h-12 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 text-left text-sm font-bold text-slate-700 outline-none transition focus:border-primary-500 focus:ring-4 focus:ring-primary-500/10"
            >

            @error('mobile')
            <p class="mt-2 text-xs font-bold text-red-600">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div>
            <label
                for="code"
                class="mb-2 block text-sm font-black text-slate-800"
            >
                کد تایید
            </label>

            <input
                id="code"
                name="code"
                type="text"
                inputmode="numeric"
                autocomplete="one-time-code"
                maxlength="6"
                pattern="[0-9]*"
                placeholder="------"
                dir="ltr"
                required
                autofocus
                class="block min-h-14 w-full rounded-xl border border-slate-200 bg-white px-4 text-center text-xl font-black tracking-[0.5em] text-slate-900 outline-none transition placeholder:tracking-[0.3em] placeholder:text-slate-300 focus:border-primary-500 focus:ring-4 focus:ring-primary-500/10"
            >

            @error('code')
            <p class="mt-2 text-xs font-bold text-red-600">
                {{ $message }}
            </p>
            @enderror
        </div>

        <button
            type="submit"
            class="inline-flex min-h-12 w-full items-center justify-center rounded-xl bg-primary-600 px-5 text-sm font-black text-white shadow-lg shadow-primary-600/20 transition hover:bg-primary-700 focus:outline-none focus:ring-4 focus:ring-primary-600/15 active:bg-primary-800"
        >
            تایید و ورود
        </button>

        <div class="flex items-center justify-between gap-3 border-t border-slate-100 pt-4">

            <a
                href="{{ route('auth.login') }}"
                class="text-xs font-bold text-slate-500 transition hover:text-primary-600"
            >
                تغییر شماره
            </a>

            <span class="text-xs text-slate-400">
                کد برای شما ارسال شده است
            </span>

        </div>

    </form>

</x-layouts.auth>
