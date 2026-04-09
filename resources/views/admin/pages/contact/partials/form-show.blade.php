<div x-data="{
    open: false,
    item: { label: '', value: '', type: '' }
}" x-on:open-show-contact.window="
        open = true;
        item = $event.detail
    "
    x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div @click.away="open = false" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="bg-white rounded-2xl w-full max-w-2xl shadow-2xl overflow-hidden max-h-[90vh] flex flex-col">

        <div class="bg-uniba-blue px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Detail Kontak</h3>
                    <p class="text-blue-100 text-sm">Lihat informasi lengkap kontak</p>
                </div>
            </div>
            <button @click="open = false"
                class="text-white hover:bg-white hover:bg-opacity-20 rounded-lg p-2 transition-all duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <div class="p-6 overflow-y-auto flex-1 space-y-5">

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Label</label>
                <div class="px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-lg">
                    <p class="text-gray-900 font-medium" x-text="item.label"></p>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Nilai/Isi Kontak</label>
                <div class="px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-lg">
                    <p class="text-gray-900 font-medium whitespace-pre-wrap" x-text="item.value"></p>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Tipe Kontak</label>
                <div class="px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-lg">
                    <span x-show="item.type"
                        class="inline-flex items-center gap-1.5 px-3 py-1 bg-blue-100 text-uniba-blue text-xs font-semibold rounded-full">
                        <span class="w-1.5 h-1.5 bg-uniba-blue rounded-full"></span>
                        <span x-text="item.type ? item.type.charAt(0).toUpperCase() + item.type.slice(1) : '-'"></span>
                    </span>
                    <span x-show="!item.type" class="text-gray-400 text-sm">-</span>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Status</label>
                <div class="px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-lg">
                    <span x-show="item.is_active"
                        class="inline-flex items-center gap-1.5 px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">
                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                        Aktif
                    </span>
                    <span x-show="!item.is_active"
                        class="inline-flex items-center gap-1.5 px-3 py-1 bg-gray-100 text-gray-600 text-xs font-semibold rounded-full">
                        <span class="w-1.5 h-1.5 bg-gray-400 rounded-full"></span>
                        Nonaktif
                    </span>
                </div>
            </div>

        </div>

        <div class="flex items-center justify-end gap-3 p-6 border-t border-gray-200">
            <button type="button" @click="open = false"
                class="px-6 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-lg transition-all duration-200">
                Tutup
            </button>
        </div>
    </div>
</div>
