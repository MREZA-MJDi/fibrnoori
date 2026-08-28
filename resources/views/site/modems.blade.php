<x-layouts.site
    title="مودم‌ها | فیبره نوری"
    description="مشاهده مودم‌های مناسب اینترنت فیبر نوری."
>

    <section class="section">

        <div class="container-site">

            {{-- Header --}}
            <div class="mx-auto max-w-2xl text-center">

                <p class="text-sm font-black text-primary-600">
                    تجهیزات
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
                    مودم مناسب اتصالت را انتخاب کن.
                </h1>

                <p class="mt-4 text-sm leading-7 text-slate-500">
                    مودم‌های موجود را ببین و در زمان ثبت درخواست،
                    گزینه مناسب خودت را انتخاب کن.
                </p>

            </div>


            {{-- Modems --}}
            @if ($modems->isNotEmpty())

                <div
                    class="
                        mt-12
                        grid gap-5
                        sm:grid-cols-2
                        lg:grid-cols-3
                    "
                >

                    @foreach ($modems as $modem)

                        <article
                            class="
                                flex flex-col
                                overflow-hidden
                                rounded-3xl
                                border border-slate-200
                                bg-white
                                shadow-sm
                                transition
                                hover:-translate-y-1
                                hover:shadow-xl
                                hover:shadow-slate-200/60
                            "
                        >

                            {{-- Image --}}
                            <div
                                class="
                                    flex aspect-[4/3]
                                    items-center justify-center
                                    bg-slate-50
                                    p-6
                                "
                            >

                                @if ($modem->image)

                                    <img
                                        src="{{ asset('storage/' . $modem->image) }}"
                                        alt="{{ $modem->name }}"
                                        class="
                                            h-full w-full
                                            object-contain
                                        "
                                    >

                                @else

                                    <div
                                        class="
                                            grid size-24
                                            place-items-center
                                            rounded-3xl
                                            bg-white
                                            text-3xl
                                            shadow-sm
                                        "
                                        aria-hidden="true"
                                    >
                                        ◫
                                    </div>

                                @endif

                            </div>


                            {{-- Content --}}
                            <div class="flex flex-1 flex-col p-6">

                                <div class="flex items-start justify-between gap-4">

                                    <div>

                                        <h2
                                            class="
                                                text-lg font-black
                                                text-slate-950
                                            "
                                        >
                                            {{ $modem->name }}
                                        </h2>

                                        <p class="mt-1 text-xs text-slate-400">
                                            مودم فیبر نوری
                                        </p>

                                    </div>

                                    @if ($modem->stock > 0)

                                        <span
                                            class="
                                                shrink-0
                                                rounded-full
                                                bg-emerald-50
                                                px-2.5 py-1
                                                text-[10px] font-black
                                                text-emerald-700
                                            "
                                        >
                                            موجود
                                        </span>

                                    @else

                                        <span
                                            class="
                                                shrink-0
                                                rounded-full
                                                bg-slate-100
                                                px-2.5 py-1
                                                text-[10px] font-black
                                                text-slate-500
                                            "
                                        >
                                            ناموجود
                                        </span>

                                    @endif

                                </div>


                                <div class="mt-5">

                                    <strong
                                        class="
                                            text-2xl font-black
                                            text-slate-950
                                        "
                                    >
                                        {{ number_format($modem->price) }}
                                    </strong>

                                    <span class="mr-1 text-xs text-slate-400">
                                        تومان
                                    </span>

                                </div>


                                @if ($modem->description)

                                    <p
                                        class="
                                            mt-4
                                            text-sm leading-7
                                            text-slate-500
                                        "
                                    >
                                        {{ $modem->description }}
                                    </p>

                                @endif


                                @if ($modem->features)

                                    <ul class="mt-5 grid gap-3">

                                        @foreach ($modem->features as $feature)

                                            <li
                                                class="
                                                    flex items-start gap-2
                                                    text-xs
                                                    text-slate-600
                                                "
                                            >
                                                <span class="text-primary-600">
                                                    ✓
                                                </span>

                                                <span>
                                                    {{ $feature }}
                                                </span>

                                            </li>

                                        @endforeach

                                    </ul>

                                @endif


                                <div class="mt-auto pt-7">

                                    <a
                                        href="{{ route('account.requests.create', ['modem' => $modem->slug]) }}"
                                        @class([
                                            'inline-flex min-h-11 w-full items-center justify-center rounded-xl px-5 text-sm font-black transition',
                                            'bg-primary-600 text-white hover:bg-primary-700' => $modem->stock > 0,
                                            'pointer-events-none bg-slate-100 text-slate-400' => $modem->stock <= 0,
                                        ])
                                        @if ($modem->stock <= 0)
                                        aria-disabled="true"
                                        @endif
                                    >
                                        انتخاب مودم
                                    </a>

                                </div>

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
                        در حال حاضر مودمی موجود نیست.
                    </h2>

                    <p class="mt-2 text-sm leading-7 text-slate-500">
                        لطفاً بعداً دوباره بررسی کنید.
                    </p>

                </div>

            @endif

        </div>

    </section>

</x-layouts.site>
