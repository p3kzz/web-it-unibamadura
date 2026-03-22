<div class="py-12 sm:py-16 text-center px-4">
    <div
        class="w-16 h-16 sm:w-20 sm:h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4">
        <svg class="w-8 h-8 sm:w-10 sm:h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
            </path>
        </svg>
    </div>
    <p class="text-gray-500 font-medium mb-2 text-sm sm:text-base">Belum ada data pegawai</p>
    <p class="text-gray-400 text-xs sm:text-sm mb-4">Tambahkan pegawai untuk struktur organisasi ini</p>
    <button @click="$dispatch('open-create-pegawai')"
        class="inline-flex items-center gap-2 px-4 sm:px-5 py-2 sm:py-2.5 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition-all font-semibold text-sm">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
        Tambah Pegawai Pertama
    </button>
</div>
