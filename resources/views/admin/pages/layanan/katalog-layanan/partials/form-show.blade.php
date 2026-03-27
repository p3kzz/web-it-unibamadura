<div x-data="{ open: false, nama: '', deskripsi: '', icon: '', link: '', kategori: '', is_active: true }"
    x-on:open-show-layanan.window="open = true; nama = $event.detail.nama; deskripsi = $event.detail.deskripsi; icon = $event.detail.icon; link = $event.detail.link; kategori = $event.detail.kategori; is_active = $event.detail.is_active"
    x-show="open" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4"
    style="display:none">
    <div @click.outside="open = false"
        class="bg-white rounded-2xl shadow-2xl w-full max-w-lg max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-bold text-gray-800">Detail Layanan</h2>
            <button @click="open = false" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <div class="px-6 py-5 space-y-4">
            <template x-if="icon">
                <div class="flex justify-center">
                    <img :src="`{{ asset('storage') }}/${icon}`" alt="icon layanan"
                        class="w-20 h-20 object-cover rounded-2xl border border-gray-200 shadow">
                </div>
            </template>

            <div>
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Nama Layanan</p>
                <p class="text-sm font-semibold text-gray-800" x-text="nama"></p>
            </div>

            <div>
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Kategori</p>
                <p class="text-sm text-gray-700" x-text="kategori || 'Tanpa kategori'"></p>
            </div>

            <div x-show="deskripsi">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Deskripsi</p>
                <p class="text-sm text-gray-700 leading-relaxed" x-text="deskripsi"></p>
            </div>

            <div x-show="link">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Link</p>
                <a :href="link" target="_blank" x-text="link"
                    class="text-sm text-blue-600 hover:underline break-all"></a>
            </div>

            <div>
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Status</p>
                <template x-if="is_active">
                    <span
                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5"></span>
                        Aktif
                    </span>
                </template>
                <template x-if="!is_active">
                    <span
                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-600">
                        <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-1.5"></span>
                        Nonaktif
                    </span>
                </template>
            </div>

            <div class="pt-2">
                <button type="button" @click="open = false"
                    class="w-full bg-gray-100 text-gray-700 py-2.5 rounded-lg font-semibold hover:bg-gray-200 transition-colors">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>