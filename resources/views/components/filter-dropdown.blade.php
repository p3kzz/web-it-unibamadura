@props([
    'route',
    'param' => 'status',
    'current' => null,
    'options' => [],
    'query' => [],
    'placeholder' => 'Semua Status',
])

@php
    $cleanQuery = fn($q) => array_filter($q, fn($v) => $v !== '' && $v !== null);

    $baseUrl = route($route, $cleanQuery($query));

    $isActive = fn($value) => (string) $current === (string) $value;
@endphp

<div x-data="{ open: false }" class="relative min-w-[220px]">

    <button @click="open = !open" @click.away="open = false"
        class="w-full inline-flex items-center justify-between gap-2 px-4 py-2 bg-white border-2 border-gray-300 rounded-lg hover:border-uniba-blue transition shadow-sm hover:shadow-md">

        <span class="text-sm font-semibold text-gray-700">
            {{ $options[$current]['label'] ?? $placeholder }}
        </span>

        <svg class="w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>

    </button>

    <div x-show="open" x-cloak
        class="absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-xl border border-gray-200 py-2 z-[100]">

        <a href="{{ $baseUrl }}"
            class="flex items-center gap-3 px-4 py-2.5 hover:bg-blue-50 {{ $current === null ? 'bg-blue-50' : '' }}">

            <x-filter-radio :active="$current === null" />

            <span class="text-sm font-semibold">
                {{ $placeholder }}
            </span>

        </a>

        <div class="border-t my-2"></div>

        @foreach ($options as $value => $meta)
            @php
                $active = $isActive($value);
                $url = route($route, $cleanQuery(array_merge($query, [$param => $value])));
            @endphp

            <a href="{{ $url }}"
                class="flex items-center gap-3 px-4 py-2.5 hover:bg-blue-50 {{ $active ? 'bg-blue-50' : '' }}">

                <x-filter-radio :active="$active" />

                <div>
                    <p class="text-sm font-semibold">
                        {{ $meta['label'] }}
                    </p>

                    @isset($meta['description'])
                        <p class="text-xs text-gray-500">
                            {{ $meta['description'] }}
                        </p>
                    @endisset
                </div>

            </a>
        @endforeach

    </div>

</div>
