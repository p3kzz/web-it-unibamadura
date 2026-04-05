<div x-data="{
    open: false,
    item: {
        id: '',
        judul: '',
        deskripsi: '',
        file: '',
        is_active: false
    }
}"
    x-on:open-show-renstra-dti.window="
        open = true;
        item = {
            id: $event.detail.id,
            judul: $event.detail.judul,
            deskripsi: $event.detail.deskripsi || '',
            file: $event.detail.file || '',
            is_active: Boolean($event.detail.is_active)
        };
    "
    x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div @click.away="open = false" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="bg-white rounded-2xl w-full max-w-2xl shadow-2xl overflow-hidden max-h-[90vh] overflow-y-auto">

        <div class="bg-uniba-blue px-6 py-4 flex items-center justify-between sticky top-0 z-10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Detail Renstra DTI</h3>
                    <p class="text-blue-100 text-sm">Informasi lengkap Renstra DTI</p>
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

        <div class="p-6 space-y-6">
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Judul Renstra DTI</label>
                <p class="text-lg font-semibold text-gray-800" x-text="item.judul"></p>
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Status</label>
                <template x-if="item.is_active">
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-700">
                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                        Aktif
                    </span>
                </template>
                <template x-if="!item.is_active">
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-gray-100 text-gray-600">
                        <span class="w-2 h-2 bg-gray-400 rounded-full mr-2"></span>
                        Nonaktif
                    </span>
                </template>
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Deskripsi</label>
                <template x-if="item.deskripsi">
                    <div class="prose prose-sm max-w-none text-gray-700" x-html="item.deskripsi"></div>
                </template>
                <template x-if="!item.deskripsi">
                    <p class="text-gray-400 italic">Tidak ada deskripsi</p>
                </template>
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">File
                    Dokumen</label>
                <template x-if="item.file">
                    <a :href="`/storage/${item.file}`" target="_blank"
                        class="inline-flex items-center gap-3 p-4 bg-red-50 rounded-xl hover:bg-red-100 transition-colors duration-200">
                        <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm-1 2l5 5h-5V4zm-3 9v6h-2v-4H7v-2h6zm3 0v6h-2v-6h2zm3 0v6h-2v-6h2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">Dokumen Renstra DTI</p>
                            <p class="text-sm text-red-600">Klik untuk membuka PDF</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 ml-auto" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                    </a>
                </template>
            </div>

            <div class="flex justify-end gap-3 pt-6 border-t border-gray-200">
                <button @click="open = false"
                    class="px-6 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-lg transition-all duration-200">
                    Tutup
                </button>
                <button @click="open = false; $dispatch('open-edit-renstra-dti', item)"
                    class="px-6 py-2.5 bg-uniba-blue hover:bg-blue-700 text-white font-semibold rounded-lg transition-all duration-200 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    Edit
                </button>
            </div>
        </div>
    </div>
</div>
