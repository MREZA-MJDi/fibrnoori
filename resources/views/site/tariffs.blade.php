<x-layouts.site
    title="تعرفه‌ها | فیبر نوری"
>
    <section class="site-section bg-slate-50">

        <div class="site-container">

            {{-- Header --}}
            <div class="mx-auto max-w-2xl text-center">

                <span class="inline-flex rounded-full bg-primary-50 px-3 py-1.5 text-xs font-black text-primary-700">
                    تعرفه‌های اینترنت
                </span>

                <h1 class="mt-4 text-3xl font-black tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    تعرفه مناسب خودت را انتخاب کن.
                </h1>

                <p class="mt-4 text-sm leading-8 text-slate-500 sm:text-base">
                    سرعت و مدت موردنظرت را انتخاب کن و در ادامه درخواست نصب فیبر نوری را ثبت کن.
                </p>

            </div>


            {{-- Tariffs --}}
            @if ($tariffs->isNotEmpty())

                <div class="mx-auto mt-10 grid max-w-7xl gap-5 sm:mt-12 md:grid-cols-2 xl:grid-cols-3">

                    @foreach ($tariffs as $tariff)

                        <article
                            class="
                                relative flex h-full min-w-0 flex-col
                                overflow-hidden
                                rounded-3xl
                                border border-slate-200
                                bg-white
                                p-5
                                shadow-sm
                                transition
                                duration-200
                                hover:-translate-y-1
                                hover:border-primary-200
                                hover:shadow-lg
                                sm:p-6
                            "
                        >

                            {{-- Recommended --}}
                            @if ($loop->first)

                                <div class="absolute right-5 top-5">

                                    <span class="inline-flex rounded-full bg-primary-600 px-3 py-1.5 text-[10px] font-black text-white shadow-sm">
                                        پیشنهاد ویژه
                                    </span>

                                </div>

                            @endif


                            {{-- Top --}}
                            <div class="{{ $loop->first ? 'pt-8' : '' }}">

                                <p class="text-xs font-bold text-slate-400">
                                    {{ $tariff->name }}
                                </p>

                                <div class="mt-4 flex flex-wrap items-end gap-x-2 gap-y-1">

                                    <strong class="text-3xl font-black tracking-tight text-slate-950 sm:text-4xl">
                                        {{ number_format($tariff->price) }}
                                    </strong>

                                    <span class="pb-1 text-xs font-medium text-slate-400">
                                        تومان
                                    </span>

                                </div>

                            </div>


                            {{-- Specs --}}
                            <div class="mt-6 grid grid-cols-2 gap-3">

                                <div class="min-w-0 rounded-2xl bg-slate-50 p-4">

                                    <p class="text-[11px] font-bold text-slate-400">
                                        سرعت
                                    </p>

                                    <p class="mt-2 truncate text-sm font-black text-slate-900 sm:text-base">
                                        {{ number_format($tariff->speed_mbps) }}
                                        <span class="text-xs font-bold text-slate-500">
                                            Mbps
                                        </span>
                                    </p>

                                </div>


                                <div class="min-w-0 rounded-2xl bg-slate-50 p-4">

                                    <p class="text-[11px] font-bold text-slate-400">
                                        مدت
                                    </p>

                                    <p class="mt-2 truncate text-sm font-black text-slate-900 sm:text-base">
                                        {{ number_format($tariff->duration_days) }}
                                        <span class="text-xs font-bold text-slate-500">
                                            روز
                                        </span>
                                    </p>

                                </div>

                            </div>


                            {{-- Description --}}
                            @if (filled($tariff->description))

                                <p class="mt-5 break-words text-sm leading-8 text-slate-500">
                                    {{ $tariff->description }}
                                </p>

                            @endif


                            {{-- Features --}}
                            @if (is_array($tariff->features) && count($tariff->features))

                                <ul class="mt-5 space-y-3">

                                    @foreach ($tariff->features as $feature)

                                        @if (filled($feature))

                                            <li class="flex items-start gap-2.5 text-sm leading-6 text-slate-600">

                                                <span class="mt-0.5 grid size-5 shrink-0 place-items-center rounded-full bg-primary-50 text-primary-600">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="2"
                                                        stroke="currentColor"
                                                        class="size-3"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="m5 12 4 4L19 6"
                                                        />
                                                    </svg>
                                                </span>

                                                <span class="min-w-0 break-words">
                                                    {{ $feature }}
                                                </span>

                                            </li>

                                        @endif

                                    @endforeach

                                </ul>

                            @endif


                            {{-- Action --}}
                            <div class="mt-auto pt-7">

                                <a
                                    href="{{ route('account.requests.create', ['tariff' => $tariff->slug]) }}"
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
                                    انتخاب این تعرفه

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

                                </a>

                            </div>

                        </article>

                    @endforeach

                </div>

            @else

                {{-- Empty --}}
                <div class="mx-auto mt-10 max-w-xl sm:mt-12">

                    <div class="rounded-3xl border border-dashed border-slate-300 bg-white p-8 text-center shadow-sm sm:p-10">

                        <div class="mx-auto grid size-16 place-items-center rounded-2xl bg-slate-100 text-slate-400">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.8"
                                stroke="currentColor"
                                class="size-7"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 6v6l4 2"
                                />

                                <circle
                                    cx="12"
                                    cy="12"
                                    r="9"
                                />
                            </svg>

                        </div>

                        <h2 class="mt-5 text-lg font-black text-slate-900">
                            در حال حاضر تعرفه‌ای موجود نیست.
                        </h2>

                        <p class="mx-auto mt-2 max-w-md text-sm leading-7 text-slate-500">
                            در حال حاضر هیچ تعرفه فعالی برای نمایش وجود ندارد. لطفاً بعداً دوباره بررسی کنید.
                        </p>

                        <div class="mt-6">

                            <a
                                href="{{ route('home') }}"
                                class="inline-flex min-h-11 items-center justify-center rounded-xl border border-slate-200 px-5 text-sm font-black text-slate-700 transition hover:bg-slate-50"
                            >
                                بازگشت به صفحه اصلی
                            </a>

                        </div>

                    </div>

                </div>

            @endif

        </div>

    </section>
</x-layouts.site>
