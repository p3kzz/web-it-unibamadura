<tr>
    <td colspan="{{ in_array($section, ['intro', 'timeline', 'vision']) ? '6' : '5' }}" class="px-6 py-12 text-center">
        <div class="flex flex-col items-center justify-center">
            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                @if ($search)
                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                @else
                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Data Pertama
            </button>
        </div>
    </td>
</tr>
