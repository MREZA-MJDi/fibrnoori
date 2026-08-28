@props([
'href' => null,
])

<a
    href="{{ $href ?? url('/') }}"
    {{ $attributes->merge([
        'class' => 'group inline-flex min-w-0 items-center gap-3'
    ]) }}
    aria-label="فیبره نوری"
>
    <span
        class="
            grid size-11 shrink-0 place-items-center
            rounded-2xl
            bg-gradient-to-br from-primary-600 to-cyan-500
            text-white
            shadow-sm
            transition-all duration-200
            group-hover:-translate-y-0.5
            group-hover:shadow-md
        "
    >
        <span class="text-sm font-black tracking-tight">
            FO
        </span>
    </span>

    <span class="min-w-0 leading-none">

        <span
            class="block truncate text-base font-black tracking-tight text-slate-950"
        >
            فیبره نوری
        </span>

        <span
            class="mt-1 block truncate text-[11px] font-medium text-slate-500"
        >
            اینترنت فیبر نوری
        </span>

    </span>
</a>
