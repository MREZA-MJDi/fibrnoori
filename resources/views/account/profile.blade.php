<x-layouts.account
    title="پروفایل | فیبره نوری"
    heading="پروفایل"
>

    <div class="space-y-6">

        {{-- Profile header --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                <div class="flex min-w-0 items-center gap-4">

                    <div class="grid size-16 shrink-0 place-items-center rounded-2xl bg-primary-600 text-xl font-black text-white shadow-lg shadow-primary-600/20">
                        {{ mb_substr(auth()->user()->name ?? 'ک', 0, 1) }}
                    </div>

                    <div class="min-w-0">
                        <p class="text-xs font-bold text-slate-400">
                            حساب کاربری
                        </p>

                        <h2 class="mt-1 truncate text-xl font-black text-slate-950">
                            {{ auth()->user()->name ?? 'کاربر' }}
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            اطلاعات حساب و مشخصات شما
                        </p>
                    </div>

                </div>

                <div class="inline-flex w-fit items-center gap-2 rounded-xl bg-emerald-50 px-3 py-2 text-xs font-bold text-emerald-700">
                    <span class="size-2 rounded-full bg-emerald-500"></span>
                    حساب فعال
                </div>

            </div>

        </section>

        {{-- Personal information --}}
        <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-100 px-5 py-5 sm:px-7">

                <h2 class="text-base font-black text-slate-950">
                    اطلاعات شخصی
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    اطلاعات حساب کاربری خود را مدیریت کنید.
                </p>

            </div>

            <form
                method="POST"
                action="{{ url('/account/profile') }}"
                class="space-y-6 p-5 sm:p-7"
            >

                @csrf
                @method('PUT')

                <div class="grid gap-5 sm:grid-cols-2">

                    <x-input
                        name="name"
                        label="نام و نام خانوادگی"
                        :value="old('name', auth()->user()->name)"
                        required
                        autocomplete="name"
                    />

                    <x-input
                        name="mobile"
                        label="شماره موبایل"
                        type="tel"
                        :value="auth()->user()->mobile"
                        disabled
                    />

                </div>

                <div class="flex flex-col gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-end">

                    <x-button
                        href="{{ url('/account') }}"
                        variant="secondary"
                    >
                        انصراف
                    </x-button>

                    <x-button type="submit">
                        ذخیره تغییرات

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
                                d="M5 13l4 4L19 7"
                            />
                        </svg>
                    </x-button>

                </div>

            </form>

        </section>

        {{-- Account information --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="mb-5">

                <h2 class="text-base font-black text-slate-950">
                    اطلاعات حساب
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    اطلاعات پایه حساب شما
                </p>

            </div>

            <div class="grid gap-3 sm:grid-cols-2">

                <div class="rounded-2xl bg-slate-50 p-4">
                    <p class="text-xs font-bold text-slate-400">
                        شماره موبایل
                    </p>

                    <p class="mt-2 text-sm font-black text-slate-900">
                        {{ auth()->user()->mobile ?? 'ثبت نشده' }}
                    </p>
                </div>

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

    </div>

</x-layouts.account>
