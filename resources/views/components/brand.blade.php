@props([
'href' => null,
])

<a
    href="{{ $href ?? url('/') }}"
    {{ $attributes->merge([
        'class' => 'group inline-flex min-w-0 items-center gap-3',
    ]) }}
    aria-label="شرکت مخابرات ایران"
>

    {{-- =====================================================
         TCI Logo
    ====================================================== --}}

    <span
        class="
            grid
            size-11
            shrink-0
            place-items-center

            overflow-hidden
            rounded-2xl

            bg-white

            shadow-sm
            ring-1
            ring-slate-200/80

            transition-all
            duration-200

            group-hover:-translate-y-0.5
            group-hover:shadow-md
            group-hover:ring-primary-200
        "
    >

        <img
            src="{{ asset('images/tci-logo.png') }}"
            alt="شرکت مخابرات ایران"
            class="
                block
                size-8
                object-contain

                transition-transform
                duration-200

                group-hover:scale-105
            "
        >

    </span>


    {{-- =====================================================
         Brand Text
    ====================================================== --}}

    <span class="min-w-0 leading-none">

        <span
            class="
                block
                truncate

                text-base
                font-black
                tracking-tight
                text-slate-950
            "
        >
            شرکت مخابرات ایران
        </span>

        <span
            class="
                mt-1
                block
                truncate

                text-[11px]
                font-medium
                text-slate-500
            "
        >
            اینترنت فیبر نوری
        </span>

    </span>

</a>

