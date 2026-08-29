<x-layouts.site
    title="مودم‌ها | فیبر نوری"
>
    <section class="site-section bg-slate-50">

        <div class="site-container">

            {{-- Header --}}
            <div class="mx-auto max-w-2xl text-center">

                <span class="inline-flex rounded-full bg-primary-50 px-3 py-1.5 text-xs font-black text-primary-700">
                    تجهیزات
                </span>

                <h1 class="mt-4 text-3xl font-black tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    مودم مناسب اتصالت را انتخاب کن.
                </h1>

                <p class="mt-4 text-sm leading-8 text-slate-500 sm:text-base">
                    مودم‌های موجود را ببین و در زمان ثبت درخواست، گزینه مناسب خودت را انتخاب کن.
                </p>

            </div>


            {{-- Modems --}}
            @if ($modems->isNotEmpty())

                <div class="mx-auto mt-10 grid max-w-7xl gap-5 sm:mt-12 md:grid-cols-2 xl:grid-cols-3">

                    @foreach ($modems as $modem)

                        <article
                            class="
                                flex h-full min-w-0 flex-col overflow-hidden
                                rounded-3xl
                                border border-slate-200
                                bg-white
                                shadow-sm
                                transition duration-200
                                hover:-translate-y-1
                                hover:border-primary-200
                                hover:shadow-lg
                            "
                        >

                            {{-- Image --}}
                            <div
                                class="
                                    flex aspect-[4/3]
                                    items-center justify-center
                                    overflow-hidden
                                    bg-slate-50
                                    p-6
                                "
                            >

                                @if (filled($modem->image))

                                    <img
                                        src="{{ asset('storage/' . ltrim($modem->image, '/')) }}"
                                        alt="{{ $modem->name }}"
                                        loading="lazy"
                                        class="h-full w-full object-contain"
                                    >

                                @else

                                    <div
                                        class="
                                            grid size-24
                                            place-items-center
                                            rounded-3xl
                                            bg-white
                                            text-slate-300
                                            shadow-sm
                                        "
                                        aria-hidden="true"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="size-12"
                                        >
                                            <rect
                                                width="16"
                                                height="12"
                                                x="4"
                                                y="6"
                                                rx="2"
                                            />

                                            <path
                                                stroke-linecap="round"
                                                d="M8 15h.01M12 15h.01M16 15h.01"
                                            />
                                        </svg>
                                    </div>

                                @endif

                            </div>


                            {{-- Content --}}
                            <div class="flex flex-1 flex-col p-5 sm:p-6">

                                <div class="flex items-start justify-between gap-4">

                                    <div class="min-w-0">

                                        <h2 class="break-words text-lg font-black text-slate-950">
                                            {{ $modem->name }}
                                        </h2>

                                        <p class="mt-1 text-xs font-medium text-slate-400">
                                            مودم فیبر نوری
                                        </p>

                                    </div>


                                    <span
                                        class="
                                            shrink-0
                                            rounded-full
                                            bg-emerald-50
                                            px-2.5 py-1.5
                                            text-[10px] font-black
                                            text-emerald-700
                                        "
                                    >
                                        موجود
                                    </span>

                                </div>


                                {{-- Price --}}
                                <div class="mt-5">

                                    <span class="text-2xl font-black tracking-tight text-slate-950 sm:text-3xl">
                                        {{ number_format($modem->price) }}
                                    </span>

                                    <span class="mr-1 text-xs font-medium text-slate-400">
                                        تومان
                                    </span>

                                </div>


                                {{-- Description --}}
                                @if (filled($modem->description))

                                    <p class="mt-4 break-words text-sm leading-8 text-slate-500">
                                        {{ $modem->description }}
                                    </p>

                                @endif


                                {{-- Features --}}
                                @if (is_array($modem->features) && count($modem->features))

                                    <ul class="mt-5 space-y-3">

                                        @foreach ($modem->features as $feature)

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
                                        href="{{ route('account.requests.create', ['modem' => $modem->slug]) }}"
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
                                        انتخاب این مودم

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
                                <rect
                                    width="16"
                                    height="12"
                                    x="4"
                                    y="6"
                                    rx="2"
                                />

                                <path
                                    stroke-linecap="round"
                                    d="M8 15h.01M12 15h.01M16 15h.01"
                                />
                            </svg>

                        </div>

                        <h2 class="mt-5 text-lg font-black text-slate-900">
                            در حال حاضر مودمی موجود نیست.
                        </h2>

                        <p class="mx-auto mt-2 max-w-md text-sm leading-7 text-slate-500">
                            در حال حاضر هیچ مودم فعالی برای نمایش وجود ندارد. لطفاً بعداً دوباره بررسی کنید.
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
