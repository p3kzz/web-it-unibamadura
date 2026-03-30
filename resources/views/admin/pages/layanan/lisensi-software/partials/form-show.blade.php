<div x-data="{
    open: false,
    item: {
        id: '',
        kategori_layanan_id: '',
        nama: '',
        deskripsi: '',
        pengguna_sasaran: '',
        service_owner: '',
        jam_layanan: '',
        sla: '',
        biaya: '',
        cara_akses: '',
        status: '',
        dependencies: '',
        kontak: '',
        is_active: false,
    }
}"
    x-on:open-show-katalog-layanan.window="
        open = true;
        item = {
            id: $event.detail.id,
            kategori_layanan_id: $event.detail.kategori_layanan_id || '',
            nama: $event.detail.nama || '',
            deskripsi: $event.detail.deskripsi || '',
            pengguna_sasaran: $event.detail.pengguna_sasaran || '',
            service_owner: $event.detail.service_owner || '',
            jam_layanan: $event.detail.jam_layanan || '',
            sla: $event.detail.sla || '',
            biaya: $event.detail.biaya || '',
            cara_akses: $event.detail.cara_akses || '',
            status: $event.detail.status || '-',
            dependencies: $event.detail.dependencies || '-',
            kontak: $event.detail.kontak || '-',
            is_active: Boolean($event.detail.is_active),
        };
    "
    x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div @click.away="open = false" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="bg-white rounded-2xl w-full max-w-4xl shadow-2xl overflow-hidden max-h-[90vh] overflow-y-auto">

        <div class="bg-uniba-blue px-6 py-4 flex items-center justify-between sticky top-0 z-10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Detail Katalog Layanan</h3>
                    <p class="text-blue-100 text-sm">Informasi lengkap katalog layanan</p>
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
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Nama Layanan</label>
                <p class="text-lg font-semibold text-gray-800" x-text="item.nama"></p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Kategori</label>
                    <p class="text-sm text-gray-800" x-text="item.kategori?.nama ?? '-' "></p>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Status
                        Layanan</label>
                    <p class="text-sm text-gray-800" x-text="item.status"></p>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Pengguna
                        Sasaran</label>
                    <p class="text-sm text-gray-800" x-text="item.pengguna_sasaran || '-' "></p>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Service
                        Owner</label>
                    <p class="text-sm text-gray-800" x-text="item.service_owner || '-' "></p>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Jam
                        Layanan</label>
                    <p class="text-sm text-gray-800" x-text="item.jam_layanan || '-' "></p>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">SLA</label>
                    <p class="text-sm text-gray-800" x-text="item.sla || '-' "></p>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Biaya</label>
                    <p class="text-sm text-gray-800" x-text="item.biaya || '-' "></p>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Kontak</label>
                    <p class="text-sm text-gray-800" x-text="item.kontak || '-' "></p>
                </div>
                <div class="md:col-span-2">
                    <label
                        class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Dependencies</label>
                    <p class="text-sm text-gray-800" x-text="item.dependencies || '-' "></p>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Deskripsi</label>
                <div class="prose prose-sm max-w-none bg-gray-50 rounded-xl p-4 border border-gray-200"
                    x-html="item.deskripsi"></div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">SLA</label>
                <div class="prose prose-sm max-w-none bg-gray-50 rounded-xl p-4 border border-gray-200"
                    x-html="item.sla || '-' "></div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Biaya</label>
                <div class="prose prose-sm max-w-none bg-gray-50 rounded-xl p-4 border border-gray-200"
                    x-html="item.biaya || '-' "></div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Cara Akses</label>
                <div class="prose prose-sm max-w-none bg-gray-50 rounded-xl p-4 border border-gray-200"
                    x-html="item.cara_akses || '-' "></div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Status Data</label>
                <template x-if="item.is_active">
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-700">
                        <span class="w-2 h-2 rounded-full bg-green-500 mr-2"></span>
                        Aktif
                    </span>
                </template>
                <template x-if="!item.is_active">
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-gray-100 text-gray-600">
                        <span class="w-2 h-2 rounded-full bg-gray-400 mr-2"></span>
                        Nonaktif
                    </span>
                </template>
            </div>

            <div class="flex justify-end gap-3 pt-6 border-t border-gray-200">
                <button type="button" @click="open = false"
                    class="px-6 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-lg transition-all duration-200">
                    Tutup
                </button>
                <button type="button" @click="open = false; $dispatch('open-edit', item)"
                    class="px-6 py-2.5 bg-uniba-blue hover:bg-blue-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 flex items-center gap-2">
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
