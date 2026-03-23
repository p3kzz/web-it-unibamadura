<div class="lg:hidden space-y-3 px-1">

    <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-4 space-y-3">
        <x-table-search-hybrid placeholder="Cari program kerja..." :currentSearch="$search ?? ''" :preserveParams="[
            'periode_id' => $periodeFilter,
            'status' => $statusFilter ?? null,
        ]" />

        <div class="grid grid-cols-2 gap-3">
            <div x-data="{ open: false }" class="relative">
                <button type="button" @click="open = !open" @click.away="open = false"
                    class="w-full inline-flex items-center justify-between gap-2 px-3 py-2.5
                        bg-gray-50 border-2 border-gray-200 rounded-xl
                        hover:border-uniba-blue hover:bg-blue-50
                        transition-all duration-200 group">
                    <div class="flex items-center gap-2 min-w-0">
                        <div
                            class="w-6 h-6 bg-uniba-blue bg-opacity-10 rounded-lg flex items-center justify-center group-hover:bg-opacity-20 transition-all flex-shrink-0">
                            <svg class="w-3 h-3 text-uniba-blue" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="text-left min-w-0">
                            <p class="text-xs text-gray-400 leading-none mb-0.5">Periode</p>
                            <p class="text-xs font-semibold text-gray-800 leading-none truncate">
                                @if ($periodeFilter)
                                    {{ $periodes->firstWhere('id', $periodeFilter)->name ?? 'Semua' }}
                                @else
                                    Semua
                                @endif
                            </p>
                        </div>
                    </div>
                    <svg class="w-3 h-3 text-gray-400 transition-transform duration-200 flex-shrink-0"
                        :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="open" @click.outside="open = false" x-cloak
                    class="absolute left-0 right-0 mt-2 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-50 max-h-60 overflow-y-auto">
                    <a href="{{ route('admin.tentang.program-kerja.index', array_filter(['search' => $search, 'status' => $statusFilter ?? null])) }}"
                        class="block px-4 py-2 text-sm hover:bg-blue-50 {{ !$periodeFilter ? 'bg-blue-50 text-uniba-blue font-semibold' : 'text-gray-700' }}">
                        Semua Periode
                    </a>
                    @foreach ($periodes as $periode)
                        <a href="{{ route('admin.tentang.program-kerja.index', array_filter(['periode_id' => $periode->id, 'search' => $search, 'status' => $statusFilter ?? null])) }}"
                            class="block px-4 py-2 text-sm hover:bg-blue-50 {{ $periodeFilter == $periode->id ? 'bg-blue-50 text-uniba-blue font-semibold' : 'text-gray-700' }}">
                            {{ $periode->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <div x-data="{ open: false }" class="relative">
                <button type="button" @click="open = !open" @click.away="open = false"
                    class="w-full inline-flex items-center justify-between gap-2 px-3 py-2.5
                        bg-gray-50 border-2 border-gray-200 rounded-xl
                        hover:border-uniba-blue hover:bg-blue-50
                        transition-all duration-200 group">
                    <div class="flex items-center gap-2 min-w-0">
                        <div
                            class="w-6 h-6 bg-uniba-blue bg-opacity-10 rounded-lg flex items-center justify-center group-hover:bg-opacity-20 transition-all flex-shrink-0">
                            <svg class="w-3 h-3 text-uniba-blue" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="text-left min-w-0">
                            <p class="text-xs text-gray-400 leading-none mb-0.5">Status</p>
                            <p class="text-xs font-semibold text-gray-800 leading-none truncate">
                                @php
                                    $statusLabels = [
                                        'planning' => 'Perencanaan',
                                        'in_progress' => 'Berjalan',
                                        'completed' => 'Selesai',
                                        'cancelled' => 'Dibatalkan',
                                    ];
                                @endphp
                                {{ $statusLabels[$statusFilter ?? ''] ?? 'Semua' }}
                            </p>
                        </div>
                    </div>
                    <svg class="w-3 h-3 text-gray-400 transition-transform duration-200 flex-shrink-0"
                        :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="open" @click.outside="open = false" x-cloak
                    class="absolute left-0 right-0 mt-2 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-50">
                    <a href="{{ route('admin.tentang.program-kerja.index', array_filter(['search' => $search, 'periode_id' => $periodeFilter])) }}"
                        class="block px-4 py-2 text-sm hover:bg-blue-50 {{ !($statusFilter ?? null) ? 'bg-blue-50 text-uniba-blue font-semibold' : 'text-gray-700' }}">
                        Semua Status
                    </a>
                    @foreach (['planning' => 'Perencanaan', 'in_progress' => 'Berjalan', 'completed' => 'Selesai', 'cancelled' => 'Dibatalkan'] as $key => $label)
                        <a href="{{ route('admin.tentang.program-kerja.index', array_filter(['status' => $key, 'search' => $search, 'periode_id' => $periodeFilter])) }}"
                            class="block px-4 py-2 text-sm hover:bg-blue-50 {{ ($statusFilter ?? null) == $key ? 'bg-blue-50 text-uniba-blue font-semibold' : 'text-gray-700' }}">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @forelse ($items as $index => $item)
        @php
            $statusColors = [
                'planning' => 'bg-yellow-100 text-yellow-700',
                'in_progress' => 'bg-blue-100 text-blue-700',
                'completed' => 'bg-green-100 text-green-700',
                'cancelled' => 'bg-red-100 text-red-700',
            ];
            $statusLabels = [
                'planning' => 'Perencanaan',
                'in_progress' => 'Berjalan',
                'completed' => 'Selesai',
                'cancelled' => 'Dibatalkan',
            ];
        @endphp
        <div
            class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-200">
            <div class="flex items-center justify-between px-4 py-3 border-b border-gray-100 bg-gray-50">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 bg-uniba-blue rounded-lg flex items-center justify-center flex-shrink-0">
                        <span class="text-white text-xs font-bold">
                            {{ $loop->iteration + ($items->currentPage() - 1) * $items->perPage() }}
                        </span>
                    </div>
                    <span
                        class="inline-flex items-center px-2 py-0.5 bg-gray-200 text-gray-700 text-xs font-mono font-semibold rounded">
                        {{ $item->kode }}
                    </span>
                </div>

                <div class="flex items-center gap-2">
                    <span
                        class="inline-flex items-center px-2 py-0.5 {{ $statusColors[$item->status] ?? 'bg-gray-100 text-gray-700' }} text-xs font-semibold rounded-full">
                        {{ $statusLabels[$item->status] ?? $item->status }}
                    </span>
                    @if ($item->is_active)
                        <span
                            class="inline-flex items-center gap-1 px-2 py-0.5 bg-green-100 text-green-700 text-xs font-semibold rounded-full">
                            <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                            Aktif
                        </span>
                    @endif
                </div>
            </div>

            <div class="p-4 space-y-3">
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Nama Program</p>
                    <p class="text-sm font-semibold text-gray-900 leading-relaxed line-clamp-2">{{ $item->nama }}</p>
                </div>
                @if ($item->pilar)
                    <div class="border-t border-gray-100 pt-3">
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Pilar</p>
                        <span
                            class="inline-flex items-center px-2 py-0.5 bg-purple-100 text-purple-700 text-xs font-semibold rounded">
                            {{ $item->pilar->kode ?? $item->pilar->title }}
                        </span>
                    </div>
                @endif
                @if ($item->tujuan)
                    <div class="border-t border-gray-100 pt-3">
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Tujuan</p>
                        <p class="text-sm text-gray-700 leading-relaxed line-clamp-2">
                            {{ Str::limit($item->tujuan, 100) }}</p>
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-3 gap-2 px-4 pb-4">
                <button @click="$dispatch('open-show-proker', {{ $item->toJson() }})"
                    class="inline-flex items-center justify-center gap-2 px-4 py-2.5
                        bg-uniba-blue hover:bg-blue-700 active:bg-blue-800
                        text-white text-sm font-semibold rounded-xl
                        shadow-sm hover:shadow-md transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    Detail
                </button>

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

                <form method="POST" action="{{ route('admin.tentang.program-kerja.destroy', $item) }}"
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
                    Tidak ditemukan program kerja dengan kata kunci "<span
                        class="font-semibold text-gray-700">{{ $search }}</span>"
                @else
                    Belum ada data program kerja yang ditambahkan
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
