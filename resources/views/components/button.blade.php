@props([
'href' => null,
'variant' => 'primary',
'type' => 'button',
'size' => 'md',
])

@php
    $base = '
        inline-flex
        items-center
        justify-center
        gap-2
        rounded-xl
        font-bold
        whitespace-nowrap
        select-none
        outline-none
        transition
        duration-200
        ease-out
        disabled:pointer-events-none
        disabled:cursor-not-allowed
        disabled:opacity-50
        focus-visible:outline-none
        focus-visible:ring-4
    ';

    $sizes = match ($size) {
        'sm' => '
            min-h-10
            px-4
            text-xs
        ',

        'lg' => '
            min-h-13
            px-6
            text-sm
        ',

        default => '
            min-h-11
            px-5
            text-sm
        ',
    };

    $variants = match ($variant) {
        'secondary' => '
            border
            border-slate-200
            bg-white
            text-slate-800
            shadow-sm
            hover:-translate-y-0.5
            hover:border-slate-300
            hover:bg-slate-50
            hover:shadow-md
            active:translate-y-0
            active:bg-slate-100
            focus-visible:ring-slate-400/20
        ',

        'ghost' => '
            bg-transparent
            text-slate-700
            hover:-translate-y-0.5
            hover:bg-slate-100
            hover:text-slate-950
            active:translate-y-0
            active:bg-slate-200
            focus-visible:ring-slate-400/20
        ',

        'danger' => '
            bg-red-600
            text-white
            shadow-sm
            shadow-red-600/20
            hover:-translate-y-0.5
            hover:bg-red-700
            hover:shadow-md
            hover:shadow-red-600/20
            active:translate-y-0
            active:bg-red-800
            focus-visible:ring-red-600/20
        ',

        'success' => '
            bg-emerald-600
            text-white
            shadow-sm
            shadow-emerald-600/20
            hover:-translate-y-0.5
            hover:bg-emerald-700
            hover:shadow-md
            hover:shadow-emerald-600/20
            active:translate-y-0
            active:bg-emerald-800
            focus-visible:ring-emerald-600/20
        ',

        default => '
            bg-primary-600
            text-white
            shadow-sm
            shadow-primary-600/20
            hover:-translate-y-0.5
            hover:bg-primary-700
            hover:shadow-md
            hover:shadow-primary-600/20
            active:translate-y-0
            active:bg-primary-800
            focus-visible:ring-primary-600/20
        ',
    };

    $classes = trim("
        {$base}
        {$sizes}
        {$variants}
    ");
@endphp

@if ($href)
    <a
        href="{{ $href }}"
        {{ $attributes->merge(['class' => $classes]) }}
    >
        {{ $slot }}
    </a>
@else
    <button
        type="{{ $type }}"
        {{ $attributes->merge(['class' => $classes]) }}
    >
        {{ $slot }}
    </button>
@endif
