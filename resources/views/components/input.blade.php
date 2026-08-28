@props([
'label' => null,
'name' => null,
'type' => 'text',
'hint' => null,
'required' => false,
])

@php
    $hasError = $name && $errors->has($name);

    $inputClasses = implode(' ', [
        'block',
        'min-h-12',
        'w-full',
        'rounded-xl',
        'border',
        'bg-white',
        'px-4',
        'text-sm',
        'text-slate-900',
        'shadow-sm',
        'outline-none',
        'transition-all',
        'duration-200',
        'placeholder:text-slate-400',
        'hover:border-slate-300',
        'disabled:cursor-not-allowed',
        'disabled:bg-slate-100',
        'disabled:text-slate-500',

        $hasError
            ? 'border-red-400 focus:border-red-500 focus:ring-4 focus:ring-red-100'
            : 'border-slate-200 focus:border-primary-500 focus:ring-4 focus:ring-primary-100',
    ]);
@endphp

<div class="w-full space-y-2">

    @if ($label)
        <label
            for="{{ $name }}"
            class="block text-sm font-bold text-slate-800"
        >
            {{ $label }}

            @if ($required)
                <span
                    class="text-red-500"
                    aria-hidden="true"
                >*</span>
            @endif
        </label>
    @endif

    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ old($name, $attributes->get('value')) }}"
        @if ($required) required @endif
        {{ $attributes->except('value')->merge([
            'class' => $inputClasses,
        ]) }}
    >

    @if ($hasError)
        <p
            class="text-xs font-medium leading-5 text-red-600"
            role="alert"
        >
            {{ $errors->first($name) }}
        </p>
    @elseif ($hint)
        <p class="text-xs leading-5 text-slate-400">
            {{ $hint }}
        </p>
    @endif

</div>
