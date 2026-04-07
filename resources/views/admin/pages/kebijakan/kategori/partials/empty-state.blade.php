<tr>
    <td colspan="5" class="px-6 py-16 text-center">
        <div class="flex flex-col items-center justify-center">
            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                    </path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-700 mb-1">Belum ada data Kategori</h3>
            <p class="text-sm text-gray-500 mb-4">Mulai tambahkan kategori pertama Anda</p>
            <button @click="$dispatch('open-create-category')"
                class="inline-flex items-center gap-2 px-4 py-2 bg-uniba-blue text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Kategori
            </button>
        </div>
    </td>
</tr>
