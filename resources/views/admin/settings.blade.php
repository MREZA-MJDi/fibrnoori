<x-layouts.admin
    title="تنظیمات | فیبره نوری"
    heading="تنظیمات"
>

    <div class="space-y-6">

        {{-- Header --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                <div>
                    <p class="text-xs font-black text-primary-600">
                        مدیریت سیستم
                    </p>

                    <h2 class="mt-2 text-xl font-black tracking-tight text-slate-950 sm:text-2xl">
                        تنظیمات پنل
                    </h2>

                    <p class="mt-2 max-w-2xl text-sm leading-7 text-slate-500">
                        تنظیمات عمومی سیستم و اطلاعات پایه پنل مدیریت را از این بخش مدیریت کنید.
                    </p>
                </div>

                <div class="grid size-14 shrink-0 place-items-center rounded-2xl bg-slate-900 text-white shadow-sm">
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
                            d="M10.5 3h3l.6 2.1a7.9 7.9 0 0 1 1.8.75l1.95-1.05 2.12 2.12-1.05 1.95c.3.57.55 1.17.75 1.8L22 11.3v3l-2.1.6a7.9 7.9 0 0 1-.75 1.8l1.05 1.95-2.12 2.12-1.95-1.05a7.9 7.9 0 0 1-1.8.75L13.5 21h-3l-.6-2.1a7.9 7.9 0 0 1-1.8-.75l-1.95 1.05-2.12-2.12 1.05-1.95a7.9 7.9 0 0 1-.75-1.8l-2.1-.6v-3l2.1-.6c.19-.63.44-1.23.75-1.8L4.03 5.38 6.15 3.26 8.1 4.31a7.9 7.9 0 0 1 1.8-.75z"
                        />

                        <circle
                            cx="12"
                            cy="12"
                            r="3.2"
                        />
                    </svg>
                </div>

            </div>

        </section>


        {{-- General settings --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

            <div class="mb-6">
                <h3 class="text-lg font-black text-slate-950">
                    اطلاعات عمومی
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    اطلاعات عمومی نمایش داده‌شده در سیستم.
                </p>
            </div>

            <div class="grid gap-5 sm:grid-cols-2">

                <x-input
                    name="site_name"
                    label="نام سایت"
                    value="فیبره نوری"
                    disabled
                />

                <x-input
                    name="service_name"
                    label="عنوان سرویس"
                    value="اینترنت فیبر نوری"
                    disabled
                />

            </div>

        </section>


        {{-- System status --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

            <div class="mb-6">
                <h3 class="text-lg font-black text-slate-950">
                    وضعیت سیستم
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    وضعیت سرویس‌های اصلی سیستم.
                </p>
            </div>

            <div class="grid gap-3 sm:grid-cols-2">

                <div class="flex items-center justify-between gap-4 rounded-2xl border border-slate-200 p-4">

                    <div class="flex min-w-0 items-center gap-3">

                        <span class="size-2.5 shrink-0 rounded-full bg-emerald-500"></span>

                        <div class="min-w-0">
                            <p class="text-sm font-black text-slate-900">
                                سیستم
                            </p>

                            <p class="mt-1 text-xs text-slate-500">
                                سرویس اصلی فعال است
                            </p>
                        </div>

                    </div>

                    <span class="shrink-0 rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold text-emerald-700">
                        فعال
                    </span>

                </div>


                <div class="flex items-center justify-between gap-4 rounded-2xl border border-slate-200 p-4">

                    <div class="flex min-w-0 items-center gap-3">

                        <span class="size-2.5 shrink-0 rounded-full bg-emerald-500"></span>

                        <div class="min-w-0">
                            <p class="text-sm font-black text-slate-900">
                                پیامک
                            </p>

                            <p class="mt-1 text-xs text-slate-500">
                                سرویس ارسال پیامک
                            </p>
                        </div>

                    </div>

                    <span class="shrink-0 rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold text-emerald-700">
                        آماده
                    </span>

                </div>

            </div>

        </section>


        {{-- Coming later --}}
        <section class="rounded-3xl border border-dashed border-slate-300 bg-slate-50 p-6 sm:p-8">

            <div class="flex items-start gap-4">

                <div class="grid size-11 shrink-0 place-items-center rounded-xl bg-white text-slate-500 shadow-sm">
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
                            d="M12 8v4l2.5 1.5"
                        />

                        <circle
                            cx="12"
                            cy="12"
                            r="8.5"
                        />
                    </svg>
                </div>

                <div class="min-w-0">
                    <h3 class="text-sm font-black text-slate-900">
                        تنظیمات پیشرفته
                    </h3>

                    <p class="mt-1 text-sm leading-6 text-slate-500">
                        تنظیمات مربوط به پیامک، اعلان‌ها و سایر سرویس‌های سیستم در مراحل بعدی اضافه می‌شوند.
                    </p>
                </div>

            </div>

        </section>

    </div>

</x-layouts.admin>
