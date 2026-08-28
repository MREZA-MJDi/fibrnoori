@php
    $messages = [
        'success' => [
            'container' => 'border-emerald-200 bg-emerald-50 text-emerald-800',
            'button' => 'text-emerald-700 hover:bg-emerald-100',
        ],

        'error' => [
            'container' => 'border-red-200 bg-red-50 text-red-800',
            'button' => 'text-red-700 hover:bg-red-100',
        ],

        'warning' => [
            'container' => 'border-amber-200 bg-amber-50 text-amber-800',
            'button' => 'text-amber-700 hover:bg-amber-100',
        ],

        'info' => [
            'container' => 'border-blue-200 bg-blue-50 text-blue-800',
            'button' => 'text-blue-700 hover:bg-blue-100',
        ],
    ];
@endphp

@foreach ($messages as $type => $styles)
    @if (session()->has($type))
        <div
            x-data="{ show: true }"
            x-show="show"
            x-transition.opacity.duration.200ms
            role="alert"
            class="mb-6 flex items-start gap-3 rounded-2xl border p-4 {{ $styles['container'] }}"
        >
            <div class="min-w-0 flex-1">
                <p class="text-sm font-bold leading-6">
                    {{ session($type) }}
                </p>
            </div>

            <button
                type="button"
                @click="show = false"
                class="grid size-8 shrink-0 place-items-center rounded-lg transition {{ $styles['button'] }}"
                aria-label="بستن پیام"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    class="size-4"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12"
                    />
                </svg>
            </button>
        </div>
    @endif
@endforeach

