<div class="lg:hidden space-y-3 px-1">

    <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-4 space-y-3">
        <x-table-search-hybrid placeholder="Cari {{ $type }}..." :currentSearch="$search ?? ''" :preserveParams="[
            'type' => $type,
        ]" />
    </div>

    @forelse ($items as $index => $item)
        <div
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
                            {{ ucfirst($type) }}
                        </p>
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
                @if (in_array($type, ['tautan cepat', 'sosial media']) && $item->nama)
                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Nama</p>
                        <p class="text-sm font-semibold text-gray-900 leading-relaxed line-clamp-2">
                            {{ $item->nama }}
                        </p>
                    </div>
                    <div class="border-t border-gray-100"></div>
                @endif
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Url</p>
                    <p class="text-sm text-gray-700 leading-relaxed line-clamp-2">
                        {{$item->url}}
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-2 px-4 pb-4">
                <button @click="$dispatch('open-edit-konfigurasi-footer', {{ $item->toJson() }})"
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

                <form method="POST" action="{{ route('admin.setting-footer.destroy', $item) }}"
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
                    Tidak ditemukan <span class="font-medium text-gray-600">{{ $type }}</span>
                    dengan kata kunci "<span class="font-semibold text-gray-700">{{ $search }}</span>"
                @else
                    Belum ada data <span class="font-medium">{{ $type }}</span> yang ditambahkan
                @endif
            </p>

            <button @click="$dispatch('open-create-konfigurasi-footer')"
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
