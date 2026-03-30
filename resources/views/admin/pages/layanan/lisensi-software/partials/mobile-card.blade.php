<div class="lg:hidden space-y-4">
    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-4">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-uniba-blue rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800">Daftar Katalog Layanan</h3>
                    <p class="text-xs text-gray-500">Total: {{ $items->count() }} data</p>
                </div>
            </div>
        </div>

        <div class="space-y-3">
            @include('admin.pages.layanan.katalog-layanan.partials.search')
            @include('admin.pages.layanan.katalog-layanan.partials.kategori-filter')
        </div>
    </div>

    @forelse ($items as $item)
        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
            <div class="p-4">
                <div class="flex gap-4">
                    <div class="flex-1 min-w-0">
                        <h4 class="font-semibold text-gray-800 truncate">{{ $item->nama }}</h4>
                        <p class="text-sm text-gray-600 mt-1 line-clamp-2">
                            {{ Str::limit(strip_tags($item->deskripsi), 90) }}</p>
                        <p class="text-xs text-gray-500 mt-2">
                            Kategori: {{ $item->kategori->nama ?? '-' }}
                        </p>
                        <div class="mt-3 flex items-center gap-2">
                            @if ($item->status === 'Aktif')
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                    {{ $item->status }}
                                </span>
                            @elseif ($item->status === 'Maintenance')
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-700">
                                    {{ $item->status }}
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-600">
                                    {{ $item->status }}
                                </span>
                            @endif

                            @if ($item->is_active)
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                    Aktif
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-600">
                                    Nonaktif
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-2 mt-4 pt-4 border-t border-gray-100">
                    <button @click="$dispatch('open-show-katalog-layanan', {{ $item->toJson() }})" title="Lihat detail"
                        class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                    </button>
                    <button @click="$dispatch('open-edit-katalog-layanan', {{ $item->toJson() }})" title="Edit data"
                        class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                    </button>
                    <form action="{{ route('admin.layanan.katalog-layanan.destroy', $item) }}" method="POST"
                        class="inline" onsubmit="return confirm('Yakin ingin menghapus katalog layanan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="bg-white rounded-xl shadow-md border border-gray-200 p-8 text-center">
            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                @if ($search)
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                @else
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                        </path>
                    </svg>
                @endif
            </div>
            <h3 class="font-semibold text-gray-700 mb-1">
                @if ($search)
                    Tidak ada hasil pencarian
                @else
                    Belum ada katalog layanan
                @endif
            </h3>
            <p class="text-gray-500 text-sm">
                @if ($search)
                    Coba kata kunci yang lain
                @else
                    Mulai tambahkan data katalog layanan
                @endif
            </p>
        </div>
    @endforelse

    @if ($items->hasPages())
        <div class="bg-white rounded-xl shadow-md border border-gray-200 p-4">
            {{ $items->links() }}
        </div>
    @endif
</div>
