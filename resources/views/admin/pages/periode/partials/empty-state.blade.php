<tr>
    <td colspan="5" class="px-6 py-12 text-center">
        <div class="flex flex-col items-center justify-center">
            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
            </div>
            <p class="text-gray-500 font-medium mb-2">Data Belum Tersedia</p>
            <p class="text-gray-400 text-sm mb-4">Belum ada periode yang ditambahkan</p>
            <button @click="$dispatch('open-create-periode')"
                class="inline-flex items-center gap-2 px-4 py-2 bg-uniba-blue text-white rounded-lg hover:bg-blue-800 transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Data Pertama
            </button>
        </div>
    </td>
</tr>
