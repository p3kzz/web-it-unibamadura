<div class="lg:hidden space-y-4">
    @forelse ($items as $item)
        <div
            class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden hover:shadow-xl transition-shadow duration-200">
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-4 py-3 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-uniba-blue rounded-lg flex items-center justify-center">
                            <span class="text-white text-xs font-bold">#{{ $loop->iteration }}</span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Konfigurasi Logo</p>
                        </div>
                    </div>
                    @if ($item->is_active)
                        <span
                            class="inline-flex items-center gap-1
                                    px-2.5 py-1 text-xs font-semibold
                                    bg-green-100 text-green-700 rounded-full">
                            <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                            Aktif
                        </span>
                    @else
                        <span
                            class="inline-flex items-center
                                    px-2.5 py-1 text-xs font-semibold
                                    bg-gray-100 text-gray-600 rounded-full">
                            Nonaktif
                        </span>
                    @endif
                </div>
            </div>

            <div class="p-4 space-y-3">
                <div>
                    <p class="text-xs text-gray-500 mb-1">Logo</p>
                    <div class="flex items-center justify-center">
                        @if ($item->logo_web)
                            <img src="{{ $item->logoWebUrlAttribute }}" alt="Logo"
                                class="h-16 object-contain rounded-lg border border-gray-200">
                        @else
                            <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>

                <div>
                    <p class="text-xs text-gray-500 mb-1">Nama Website</p>
                    <h3 class="font-semibold text-gray-800 text-base">
                        {{ $item->nama_web }}
                    </h3>
                </div>
            </div>

            <div class="bg-gray-50 px-4 py-3 flex items-center gap-2 border-t border-gray-200">
                <button @click="$dispatch('open-edit-konfigurasi-logo', @js($item))"
                    class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-semibold
                            bg-orange-500 text-white rounded-lg
                            hover:bg-orange-600 transition-colors duration-200 shadow-sm hover:shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    Edit
                </button>

                <form method="POST" action="{{ route('admin.setting-logo.destroy', $item) }}"
                    onsubmit="return confirm('Yakin ingin menghapus konfigurasi logo ini?')" class="flex-1">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-semibold rounded-lg transition-colors duration-200 shadow-sm
                                bg-red-500 text-white hover:bg-red-600 hover:shadow-md">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                            </path>
                        </svg>
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    @empty
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-8 text-center">
            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4 mx-auto">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
            </div>
            <p class="text-gray-500 font-medium mb-2">Data Belum Tersedia</p>
            <p class="text-gray-400 text-sm mb-4">Belum ada konfigurasi logo yang ditambahkan</p>
            <button @click="$dispatch('open-create-konfigurasi-logo')"
                class="inline-flex items-center gap-2 px-4 py-2 bg-uniba-blue text-white rounded-lg hover:bg-blue-800 transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                    </path>
                </svg>
                Tambah Data Pertama
            </button>
        </div>
    @endforelse
</div>
