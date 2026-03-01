<div class="lg:hidden space-y-3 px-1">

    <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-4 space-y-3">
        <x-table-search-hybrid placeholder="Cari {{ $section }}..." :currentSearch="$search ?? ''" :preserveParams="[
            'section' => $section,
            'periode_id' => $periodeFilter,
        ]" />

        <div x-data="{ open: false }" class="relative">
            <button type="button" @click.stop="open = !open"
                class="w-full inline-flex items-center justify-between gap-2 px-4 py-2.5
                    bg-gray-50 border-2 border-gray-200 rounded-xl
                    hover:border-uniba-blue hover:bg-blue-50
                    transition-all duration-200 group">
                <div class="flex items-center gap-2">
                    <div
                        class="w-7 h-7 bg-uniba-blue bg-opacity-10 rounded-lg flex items-center justify-center group-hover:bg-opacity-20 transition-all">
                        <svg class="w-3.5 h-3.5 text-uniba-blue" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                    </div>
                    <div class="text-left">
                        <p class="text-xs text-gray-400 leading-none mb-0.5">Filter Periode</p>
                        <p class="text-sm font-semibold text-gray-800 leading-none">
                            @if ($periodeFilter)
                                {{ $periodes->firstWhere('id', $periodeFilter)->name ?? 'Semua Periode' }}
                            @else
                                Semua Periode
                            @endif
                        </p>
                    </div>
                </div>
                <svg class="w-4 h-4 text-gray-400 transition-transform duration-200 flex-shrink-0"
                    :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div x-show="open" @click.outside="open = false" x-cloak
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
                class="absolute left-0 right-0 mt-2 bg-white rounded-xl shadow-xl
                    border border-gray-100 py-2 z-50 max-h-72 overflow-y-auto">
                <a href="{{ route('admin.tentang.visi-misi.index', array_filter(['section' => $section, 'search' => $search])) }}"
                    class="flex items-center gap-3 px-4 py-3 hover:bg-blue-50 transition-colors duration-150
                        {{ !$periodeFilter ? 'bg-blue-50' : '' }}">
                    <div
                        class="flex-shrink-0 w-8 h-8 rounded-lg flex items-center justify-center
                                {{ !$periodeFilter ? 'bg-uniba-blue' : 'bg-gray-100' }}">
                        <svg class="w-4 h-4 {{ !$periodeFilter ? 'text-white' : 'text-gray-400' }}" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold {{ !$periodeFilter ? 'text-uniba-blue' : 'text-gray-800' }}">
                            Semua Periode
                        </p>
                        <p class="text-xs text-gray-400">Tampilkan semua data</p>
                    </div>
                    @if (!$periodeFilter)
                        <div class="ml-auto">
                            <div class="w-2 h-2 bg-uniba-blue rounded-full"></div>
                        </div>
                    @endif
                </a>

                <div class="mx-4 border-t border-gray-100 my-1"></div>
                @foreach ($periodes as $periode)
                    <a href="{{ route('admin.tentang.visi-misi.index', array_filter(['section' => $section, 'periode_id' => $periode->id, 'search' => $search])) }}"
                        class="flex items-center gap-3 px-4 py-3 hover:bg-blue-50 transition-colors duration-150
                            {{ $periodeFilter == $periode->id ? 'bg-blue-50' : '' }}">
                        <div
                            class="flex-shrink-0 w-8 h-8 rounded-lg flex items-center justify-center
                                    {{ $periodeFilter == $periode->id ? 'bg-uniba-blue' : 'bg-gray-100' }}">
                            <svg class="w-4 h-4 {{ $periodeFilter == $periode->id ? 'text-white' : 'text-gray-400' }}"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p
                                class="text-sm font-semibold truncate
                                    {{ $periodeFilter == $periode->id ? 'text-uniba-blue' : 'text-gray-800' }}">
                                {{ $periode->name }}
                            </p>
                            <p class="text-xs text-gray-400">
                                {{ $periode->start_year }} – {{ $periode->end_year }}
                            </p>
                        </div>
                        @if ($periodeFilter == $periode->id)
                            <div class="ml-auto flex-shrink-0">
                                <div class="w-2 h-2 bg-uniba-blue rounded-full"></div>
                            </div>
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    @forelse ($items as $index => $item)
        <div x-data="{ expanded: false }"
            class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden
                hover:shadow-lg transition-all duration-200">
            <div class="flex items-center justify-between px-4 py-3 border-b border-gray-100 bg-gray-50">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 bg-uniba-blue rounded-lg flex items-center justify-center flex-shrink-0">
                        <span class="text-white text-xs font-bold">
                            {{ $loop->iteration + ($items->currentPage() - 1) * $items->perPage() }}
                        </span>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">
                            {{ ucfirst($section) }}
                        </p>
                        @if ($item->periode)
                            <p class="text-xs text-gray-500 leading-none mt-0.5">
                                {{ $item->periode->name }}
                                · {{ $item->periode->start_year }}–{{ $item->periode->end_year }}
                            </p>
                        @endif
                    </div>
                </div>

                @if ($item->is_active ?? true)
                    <span
                        class="inline-flex items-center gap-1 px-2.5 py-1
                                bg-green-100 text-green-700 text-xs font-semibold rounded-full flex-shrink-0">
                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                        Aktif
                    </span>
                @else
                    <span
                        class="inline-flex items-center gap-1 px-2.5 py-1
                                bg-gray-100 text-gray-500 text-xs font-semibold rounded-full flex-shrink-0">
                        <span class="w-1.5 h-1.5 bg-gray-400 rounded-full"></span>
                        Nonaktif
                    </span>
                @endif
            </div>

            <div class="p-4 space-y-3">
                @if (in_array($section, ['misi', 'sasaran', 'tujuan']) && $item->title)
                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Judul</p>
                        <p class="text-sm font-semibold text-gray-900 leading-relaxed">
                            <span x-show="!expanded">{{ Str::limit($item->title, 80) }}</span>
                            <span x-show="expanded" x-cloak>{{ $item->title }}</span>
                        </p>
                        @if (strlen($item->title) > 80)
                            <button @click="expanded = !expanded"
                                class="text-xs text-uniba-blue font-semibold mt-1 inline-flex items-center gap-1 hover:underline">
                                <span x-text="expanded ? '↑ Tutup' : '↓ Lihat selengkapnya'"></span>
                            </button>
                        @endif
                    </div>

                    <div class="border-t border-gray-100"></div>
                @endif

                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Konten</p>
                    <div class="text-sm text-gray-700 leading-relaxed">
                        <span x-show="!expanded">{{ Str::limit($item->content, 150) }}</span>
                        <span x-show="expanded" x-cloak>{{ $item->content }}</span>
                    </div>
                    @if (strlen($item->content) > 150)
                        <button @click="expanded = !expanded"
                            class="text-xs text-uniba-blue font-semibold mt-1 inline-flex items-center gap-1 hover:underline">
                            <span x-text="expanded ? '↑ Tutup' : '↓ Lihat selengkapnya'"></span>
                        </button>
                    @endif
                </div>
            </div>

            <div class="grid grid-cols-2 gap-2 px-4 pb-4">
                <button @click="$dispatch('open-edit', {{ $item->toJson() }})"
                    class="inline-flex items-center justify-center gap-2 px-4 py-2.5
                        bg-orange-500 hover:bg-orange-600 active:bg-orange-700
                        text-white text-sm font-semibold rounded-xl
                        shadow-sm hover:shadow-md transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit
                </button>

                <form method="POST" action="{{ route('admin.tentang.visi-misi.destroy', $item) }}"
                    onsubmit="return confirm('Yakin ingin menghapus data ini?\n\nData yang dihapus tidak dapat dikembalikan!')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5
                            bg-red-500 hover:bg-red-600 active:bg-red-700
                            text-white text-sm font-semibold rounded-xl
                            shadow-sm hover:shadow-md transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Hapus
                    </button>
                </form>
            </div>
        </div>

    @empty
        <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-10 text-center">
            <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mb-4 mx-auto">
                @if ($search)
                    <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                @else
                    <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                @endif
            </div>

            <p class="text-gray-700 font-semibold mb-1">
                @if ($search)
                    Tidak ada hasil pencarian
                @else
                    Belum ada data
                @endif
            </p>
            <p class="text-gray-400 text-sm mb-5 leading-relaxed">
                @if ($search)
                    Tidak ditemukan <span class="font-medium text-gray-600">{{ $section }}</span>
                    dengan kata kunci "<span class="font-semibold text-gray-700">{{ $search }}</span>"
                @else
                    Belum ada data <span class="font-medium">{{ $section }}</span> yang ditambahkan
                @endif
            </p>

            <button @click="$dispatch('open-create')"
                class="inline-flex items-center gap-2 px-5 py-2.5
                    bg-uniba-blue hover:bg-blue-800 active:bg-blue-900
                    text-white text-sm font-semibold rounded-xl
                    shadow-sm hover:shadow-md transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Data Pertama
            </button>
        </div>
    @endforelse

    @if ($items->hasPages())
        <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-4">
            {{ $items->links() }}
        </div>
    @endif

</div>
