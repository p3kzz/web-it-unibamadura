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
                @if ($periodeFilter)
                    {{ $periodes->firstWhere('id', $periodeFilter)->name ?? 'Filter Periode' }}
                @else
                    Semua Periode
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

        <a href="{{ route('admin.tentang.visi-misi.index', array_filter(['section' => $section, 'search' => $search])) }}"
            class="flex items-center gap-3 px-4 py-2.5 hover:bg-blue-50 transition-colors duration-150 {{ !$periodeFilter ? 'bg-blue-50' : '' }}">
            <div class="flex-shrink-0">
                @if (!$periodeFilter)
                    <div
                        class="w-5 h-5 bg-blue-700 rounded-full flex items-center justify-center">
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
                <p class="text-sm font-semibold text-gray-800">Semua Periode</p>
                <p class="text-xs text-gray-500">Tampilkan semua data</p>
            </div>
        </a>

        <div class="border-t border-gray-200 my-2"></div>

        @foreach ($periodes as $periode)
            <a href="{{ route('admin.tentang.visi-misi.index', array_filter(['section' => $section, 'periode_id' => $periode->id, 'search' => $search])) }}"
                class="flex items-center gap-3 px-4 py-2.5 hover:bg-blue-50 transition-colors duration-150 {{ $periodeFilter == $periode->id ? 'bg-blue-50' : '' }}">
                <div class="flex-shrink-0">
                    @if ($periodeFilter == $periode->id)
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
                    <p class="text-sm font-semibold text-gray-800">{{ $periode->name }}</p>
                    <p class="text-xs text-gray-500">{{ $periode->start_year }} - {{ $periode->end_year }}
                    </p>
                </div>
            </a>
        @endforeach
    </div>
</div>
