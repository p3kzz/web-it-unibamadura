<div x-data="{ open: false }" class="relative min-w-[250px]">
    <button @click="open = !open" @click.away="open = false"
        class="w-full inline-flex items-center justify-between gap-2 px-4 py-2 bg-white border-2 border-gray-300 rounded-lg hover:border-uniba-blue transition-all duration-200 shadow-sm hover:shadow-md">
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                </path>
            </svg>
            <span class="text-sm font-semibold text-gray-700">
                @if ($statusFilter === 'published')
                    Dipublikasikan
                @elseif ($statusFilter === 'draft')
                    Draft
                @else
                    Semua Status
                @endif
            </span>
        </div>
        <svg class="w-4 h-4 text-gray-600 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
            fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>

    <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-xl border border-gray-200 py-2 z-[100] max-h-[400px] overflow-y-auto">

        <a href="{{ route('admin.content.index', array_filter(['type' => $section, 'search' => $search])) }}"
            class="flex items-center gap-3 px-4 py-2.5 hover:bg-blue-50 transition-colors duration-150 {{ !$statusFilter ? 'bg-blue-50' : '' }}">
            <div class="flex-shrink-0">
                @if (!$statusFilter)
                    <div class="w-5 h-5 bg-blue-700 rounded-full flex items-center justify-center">
                        <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                @else
                    <div class="w-5 h-5 border-2 border-gray-300 rounded-full"></div>
                @endif
            </div>
            <div class="flex-1">
                <p class="text-sm font-semibold text-gray-800">Semua Status</p>
                <p class="text-xs text-gray-500">Tampilkan semua status</p>
            </div>
        </a>

        <div class="border-t border-gray-200 my-2"></div>

        @php
            $statuses = [
                'published' => ['label' => 'Dipublikasikan', 'description' => 'Hanya yang sudah dipublikasikan'],
                'draft' => ['label' => 'Draft', 'description' => 'Hanya yang belum dipublikasikan'],
            ];
        @endphp

        @foreach ($statuses as $status => $meta)
            <a href="{{ route('admin.content.index', array_filter(['type' => $section, 'status' => $status, 'search' => $search])) }}"
                class="flex items-center gap-3 px-4 py-2.5 hover:bg-blue-50 transition-colors duration-150 {{ $statusFilter === $status ? 'bg-blue-50' : '' }}">
                <div class="flex-shrink-0">
                    @if ($statusFilter === $status)
                        <div class="w-5 h-5 bg-blue-700 rounded-full flex items-center justify-center">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                    @else
                        <div class="w-5 h-5 border-2 border-gray-300 rounded-full"></div>
                    @endif
                </div>
                <div class="flex-1">
                    <p class="text-sm font-semibold text-gray-800">{{ $meta['label'] }}</p>
                    <p class="text-xs text-gray-500">{{ $meta['description'] }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>
