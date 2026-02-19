{{-- Desktop Table --}}
<div class="hidden lg:block bg-white rounded-2xl shadow-lg overflow-visible border border-gray-200">
    {{-- Table Header with Search & Filter --}}
    <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between gap-4 mb-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-uniba-blue rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800">Daftar {{ ucfirst($section) }}</h3>
                    <p class="text-xs text-gray-500">
                        @if ($search)
                            Hasil pencarian: {{ $items->count() }} data
                        @else
                            Total: {{ $items->count() }} data
                        @endif
                    </p>
                </div>
            </div>

            <div class="text-sm text-gray-500 hidden xl:block">
                <span class="inline-flex items-center gap-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Terakhir diupdate: {{ now()->format('d M Y') }}
                </span>
            </div>
        </div>

        {{-- Search & Filter Row --}}
        <div class="flex flex-col md:flex-row gap-3">
            {{-- Search Box --}}
            <div class="flex-1">
                <x-table-search-hybrid placeholder="Cari {{ $section }}..." :currentSearch="$search ?? ''" :preserveParams="[
                    'section' => $section,
                    'periode_id' => $periodeFilter,
                ]" />
            </div>

            {{-- Periode Filter Dropdown --}}
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
                    <svg class="w-4 h-4 text-gray-600 transition-transform duration-200"
                        :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-xl border border-gray-200 py-2 z-[100] max-h-[400px] overflow-y-auto">

                    <a href="{{ route('admin.tentang.visi-misi.index', array_filter(['section' => $section, 'search' => $search])) }}"
                        class="flex items-center gap-3 px-4 py-2.5 hover:bg-blue-50 transition-colors duration-150 {{ !$periodeFilter ? 'bg-blue-50' : '' }}">
                        <div class="flex-shrink-0">
                            @if (!$periodeFilter)
                                <div
                                    class="w-5 h-5 bg-gradient-to-r from-uniba-blue to-blue-700 rounded-full flex items-center justify-center">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
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
                                    <div
                                        class="w-5 h-5 bg-gradient-to-r from-uniba-blue to-blue-700 rounded-full flex items-center justify-center">
                                        <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
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
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-gradient-to-r from-uniba-blue to-blue-700 text-white">
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider w-24">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path>
                            </svg>
                            No
                        </div>
                    </th>
                    @if (in_array($section, ['misi', 'sasaran', 'tujuan']))
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                    </path>
                                </svg>
                                Judul
                            </div>
                        </th>
                    @endif
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            Periode
                        </div>
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            Konten
                        </div>
                    </th>
                    <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider w-24">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Status
                        </div>
                    </th>
                    <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider w-32">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                </path>
                            </svg>
                            Aksi
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($items as $index => $item)
                    @include('admin.pages.tentang.visi-misi.partials.table-row')
                @empty
                    <tr>
                        <td colspan="{{ in_array($section, ['misi', 'sasaran', 'tujuan']) ? '6' : '5' }}"
                            class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                    @if ($search)
                                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    @else
                                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                            </path>
                                        </svg>
                                    @endif
                                </div>
                                <p class="text-gray-500 font-medium mb-2">
                                    @if ($search)
                                        Tidak ada hasil pencarian
                                    @else
                                        Data Belum Tersedia
                                    @endif
                                </p>
                                <p class="text-gray-400 text-sm mb-4">
                                    @if ($search)
                                        Tidak ditemukan {{ $section }} dengan kata kunci "<span
                                            class="font-semibold">{{ $search }}</span>"
                                    @else
                                        Belum ada data {{ $section }} yang ditambahkan
                                    @endif
                                </p>
                                <button @click="$dispatch('open-create')"
                                    class="inline-flex items-center gap-2 px-4 py-2 bg-uniba-blue text-white rounded-lg hover:bg-blue-800 transition-colors duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Tambah Data Pertama
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if ($items->hasPages())
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 border-t border-gray-200">
            <div class="p-4">
                {{ $items->links() }}
            </div>
        </div>
    @endif
</div>

{{-- Mobile Card View --}}
@include('admin.pages.tentang.visi-misi.partials.mobile-card')
