<x-layouts.admin
    title="تنظیمات | فیبر نوری"
    heading="تنظیمات"
>
    <div class="space-y-6">

        {{-- Header --}}
        <section class="relative overflow-hidden rounded-3xl bg-slate-950 p-5 text-white shadow-sm sm:p-7">

            <div class="relative z-10 flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">

                <div class="min-w-0">

                    <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-[11px] font-bold text-slate-300">
                        <span class="size-2 rounded-full bg-emerald-400"></span>
                        مدیریت سیستم
                    </span>

                    <h2 class="mt-4 text-2xl font-black tracking-tight sm:text-3xl">
                        تنظیمات سامانه
                    </h2>

                    <p class="mt-2 max-w-2xl text-sm leading-7 text-slate-400">
                        اطلاعات پایه و وضعیت سرویس‌های اصلی سامانه را از این بخش مشاهده کنید.
                    </p>

                </div>


                <div class="grid size-14 shrink-0 place-items-center rounded-2xl bg-white/10 text-white">

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
                            d="M10.5 3h3l.6 2.1a7.9 7.9 0 0 1 1.8.75l1.95-1.05 2.12 2.12-1.05 1.95c.3.57.55 1.17.75 1.8L22 11.3v3l-2.1.6a7.9 7.9 0 0 1-.75 1.8l1.05 1.95-2.12 2.12-1.95-1.05a7.9 7.9 0 0 1-1.8.75L13.5 21h-3l-.6-2.1a7.9 7.9 0 0 1-1.8-.75l-1.95 1.05-2.12-2.12 1.05-1.95a7.9 7.9 0 0 1 .75-1.8l-2.1-.6v-3l2.1-.6c.19-.63.44-1.23.75-1.8L4.03 5.38 6.15 3.26 8.1 4.31a7.9 7.9 0 0 1 1.8-.75z"
                        />

                        <circle
                            cx="12"
                            cy="12"
                            r="3.2"
                        />
                    </svg>

                </div>

            </div>


            <div class="pointer-events-none absolute -left-24 -top-24 size-72 rounded-full bg-primary-600/20 blur-3xl"></div>

            <div class="pointer-events-none absolute -bottom-32 right-1/3 size-80 rounded-full bg-blue-500/10 blur-3xl"></div>

        </section>


        {{-- General information --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="mb-6">

                <h3 class="text-lg font-black text-slate-950">
                    اطلاعات عمومی
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    اطلاعات پایه‌ای که در ساختار فعلی سامانه استفاده می‌شوند.
                </p>

            </div>


            <div class="grid gap-4 sm:grid-cols-2">

                <div class="rounded-2xl border border-slate-200 bg-slate-50/70 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        نام سایت
                    </p>

                    <p class="mt-2 break-words text-sm font-black text-slate-900">
                        {{ $settings['site_name'] }}
                    </p>

                </div>


                <div class="rounded-2xl border border-slate-200 bg-slate-50/70 p-4">

                    <p class="text-xs font-bold text-slate-400">
                        عنوان سرویس
                    </p>

                    <p class="mt-2 break-words text-sm font-black text-slate-900">
                        {{ $settings['service_name'] }}
                    </p>

                </div>

            </div>

        </section>


        {{-- System status --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <div class="mb-6">

                <h3 class="text-lg font-black text-slate-950">
                    وضعیت سرویس‌ها
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    وضعیت فعلی بخش‌های اصلی سامانه.
                </p>

            </div>


            <div class="grid gap-4 lg:grid-cols-2">

                {{-- System --}}
                <div class="rounded-2xl border border-slate-200 p-5">

                    <div class="flex items-start justify-between gap-4">

                        <div class="flex min-w-0 items-center gap-3">

                            <span class="grid size-11 shrink-0 place-items-center rounded-xl bg-emerald-50 text-emerald-600">

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
                                        d="M12 3v18M3 12h18"
                                    />
                                </svg>

                            </span>

                            <div class="min-w-0">

                                <h4 class="text-sm font-black text-slate-900">
                                    سامانه
                                </h4>

                                <p class="mt-1 text-xs leading-6 text-slate-500">
                                    سرویس اصلی سامانه در دسترس است.
                                </p>

                            </div>

                        </div>


                        <span class="shrink-0 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-black text-emerald-700">
                            فعال
                        </span>

                    </div>

                </div>


                {{-- SMS --}}
                <div class="rounded-2xl border border-slate-200 p-5">

                    <div class="flex items-start justify-between gap-4">

                        <div class="flex min-w-0 items-center gap-3">

                            <span class="grid size-11 shrink-0 place-items-center rounded-xl bg-primary-50 text-primary-600">

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
                                        d="M6 8.5A3.5 3.5 0 0 1 9.5 5h5A3.5 3.5 0 0 1 18 8.5v3A3.5 3.5 0 0 1 14.5 15H12l-4 4v-4.5A3.5 3.5 0 0 1 6 11.5z"
                                    />
                                </svg>

                            </span>

                            <div class="min-w-0">

                                <h4 class="text-sm font-black text-slate-900">
                                    پیامک
                                </h4>

                                <p class="mt-1 text-xs leading-6 text-slate-500">
                                    سرویس ارسال پیامک آماده استفاده است.
                                </p>

                            </div>

                        </div>


                        <span class="shrink-0 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-black text-emerald-700">
                            آماده
                        </span>

                    </div>

                </div>

            </div>

        </section>


        {{-- Future settings --}}
        <section class="rounded-3xl border border-dashed border-slate-300 bg-slate-50 p-5 sm:p-7">

            <div class="flex items-start gap-4">

                <span class="grid size-11 shrink-0 place-items-center rounded-xl bg-white text-slate-500 shadow-sm">

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
                            d="M12 8v4l2.5 1.5"
                        />
                    </svg>

                </span>


                <div class="min-w-0">

                    <h3 class="text-sm font-black text-slate-900">
                        تنظیمات پیشرفته
                    </h3>

                    <p class="mt-1 text-sm leading-7 text-slate-500">
                        تنظیمات مربوط به پیامک، اعلان‌ها و سایر سرویس‌های سامانه در مراحل بعدی به این بخش اضافه می‌شوند.
                    </p>

                </div>

            </div>

        </section>

    </div>
</x-layouts.admin>
