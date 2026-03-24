<tr>
    <td colspan="6" class="px-6 py-16 text-center">
        <div class="flex flex-col items-center">
            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                    </path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-700 mb-1">Belum Ada Fasilitas</h3>
            <p class="text-gray-500 text-sm mb-4">Mulai tambahkan data fasilitas baru</p>
            <button @click="$dispatch('open-create-fasilitas')"
                class="inline-flex items-center gap-2 px-4 py-2 bg-uniba-blue text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Fasilitas
            </button>
        </div>
    </td>
</tr>
