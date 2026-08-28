<x-layouts.site
    title="تعرفه‌ها | فیبره نوری"
    description="مشاهده و انتخاب تعرفه‌های اینترنت فیبر نوری."
>

    <section class="section">

        <div class="container-site">

            {{-- Header --}}
            <div class="mx-auto max-w-2xl text-center">

                <p class="text-sm font-black text-primary-600">
                    تعرفه‌های اینترنت
                </p>

                <h1
                    class="
                        mt-3
                        text-3xl font-black
                        tracking-tight
                        text-slate-950
                        sm:text-4xl
                    "
                >
                    تعرفه مناسب خودت را انتخاب کن.
                </h1>

                <p class="mt-4 text-sm leading-7 text-slate-500">
                    سرعت و مدت موردنظرت را انتخاب کن و در ادامه
                    درخواست نصب فیبر را ثبت کن.
                </p>

            </div>


            {{-- Tariffs --}}
            @if ($tariffs->isNotEmpty())

                <div
                    class="
                        mx-auto mt-12
                        grid max-w-6xl
                        gap-5
                        md:grid-cols-2
                        lg:grid-cols-3
                    "
                >

                    @foreach ($tariffs as $tariff)

                        <article
                            class="
                                relative
                                flex flex-col
                                rounded-3xl
                                border border-slate-200
                                bg-white
                                p-6
                                shadow-sm
                                transition
                                hover:-translate-y-1
                                hover:shadow-xl
                                hover:shadow-slate-200/60
                            "
                        >

                            @if ($loop->first)

                                <span
                                    class="
                                        absolute -top-3 right-5
                                        rounded-full
                                        bg-primary-600
                                        px-3 py-1
                                        text-[11px] font-black
                                        text-white
                                        shadow-lg
                                        shadow-primary-600/20
                                    "
                                >
                                    پیشنهاد ویژه
                                </span>

                            @endif


                            <div>

                                <p class="text-xs font-bold text-slate-400">
                                    {{ $tariff->name }}
                                </p>

                                <div class="mt-4 flex items-end gap-2">

                                    <strong
                                        class="
                                            text-3xl font-black
                                            tracking-tight
                                            text-slate-950
                                        "
                                    >
                                        {{ number_format($tariff->price) }}
                                    </strong>

                                    <span class="pb-1 text-xs text-slate-400">
                                        تومان
                                    </span>

                                </div>

                            </div>


                            <div
                                class="
                                    mt-6
                                    grid grid-cols-2
                                    gap-3
                                "
                            >

                                <div class="rounded-2xl bg-slate-50 p-4">

                                    <p class="text-[11px] text-slate-400">
                                        سرعت
                                    </p>

                                    <p class="mt-2 font-black text-slate-900">
                                        {{ number_format($tariff->speed_mbps) }}
                                        Mbps
                                    </p>

                                </div>


                                <div class="rounded-2xl bg-slate-50 p-4">

                                    <p class="text-[11px] text-slate-400">
                                        مدت
                                    </p>

                                    <p class="mt-2 font-black text-slate-900">
                                        {{ $tariff->duration_days }}
                                        روز
                                    </p>

                                </div>

                            </div>


                            @if ($tariff->description)

                                <p
                                    class="
                                        mt-5
                                        text-sm leading-7
                                        text-slate-500
                                    "
                                >
                                    {{ $tariff->description }}
                                </p>

                            @endif


                            @if ($tariff->features)

                                <ul class="mt-5 grid gap-3">

                                    @foreach ($tariff->features as $feature)

                                        <li
                                            class="
                                                flex items-start gap-2
                                                text-xs
                                                text-slate-600
                                            "
                                        >
                                            <span
                                                class="
                                                    mt-0.5
                                                    text-emerald-500
                                                "
                                            >
                                                ✓
                                            </span>

                                            <span>
                                                {{ $feature }}
                                            </span>
                                        </li>

                                    @endforeach

                                </ul>

                            @endif


                            <div class="mt-7 pt-1">

                                <a
                                    href="{{ route('account.requests.create', ['tariff' => $tariff->slug]) }}"
                                    class="
                                        inline-flex min-h-11 w-full
                                        items-center justify-center
                                        rounded-xl
                                        bg-primary-600
                                        px-5
                                        text-sm font-black
                                        text-white
                                        transition
                                        hover:bg-primary-700
                                    "
                                >
                                    انتخاب این تعرفه
                                </a>

                            </div>

                        </article>

                    @endforeach

                </div>

            @else

                <div
                    class="
                        mx-auto mt-12 max-w-xl
                        rounded-3xl
                        border border-slate-200
                        bg-white
                        p-8
                        text-center
                    "
                >

                    <div
                        class="
                            mx-auto grid size-14
                            place-items-center
                            rounded-2xl
                            bg-slate-100
                            text-xl
                        "
                    >
                        —
                    </div>

                    <h2 class="mt-5 text-lg font-black text-slate-900">
                        در حال حاضر تعرفه‌ای موجود نیست.
                    </h2>

                    <p class="mt-2 text-sm leading-7 text-slate-500">
                        لطفاً کمی بعد دوباره بررسی کنید.
                    </p>

                </div>

            @endif

        </div>

    </section>

</x-layouts.site>
