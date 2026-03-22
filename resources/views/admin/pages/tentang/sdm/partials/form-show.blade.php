<div x-data="{
    open: false,
    item: {
        id: '',
        nama: '',
        foto: '',
        jabatan: '',
        sertifikasi: [],
        status: 'aktif',
        penugasan: []
    },
    initShow(data) {
        this.item = {
            id: data.id || '',
            nama: data.nama || '',
            foto: data.foto || '',
            jabatan: data.jabatan || '',
            sertifikasi: data.sertifikasi || [],
            status: data.status || 'aktif',
            penugasan: data.penugasan || []
        };
    },
    getCurrentUnit() {
        const primary = this.item.penugasan.find(p => p.is_primary && !p.tanggal_selesai);
        return primary?.unit_organisasi || null;
    }
}" x-on:open-show-pegawai.window="open = true; initShow($event.detail);" x-show="open" x-cloak
    @click.self="open = false"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
        class="bg-white rounded-2xl w-full max-w-lg shadow-2xl overflow-hidden max-h-[90vh] flex flex-col">

        {{-- Header --}}
        <div class="bg-uniba-blue px-6 py-4 flex items-center justify-between flex-shrink-0">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Detail Pegawai</h3>
                    <p class="text-blue-100 text-sm">ID: <span x-text="item.id"></span></p>
                </div>
            </div>
            <button @click="open = false" class="text-white hover:bg-white/20 rounded-lg p-2 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        {{-- Content --}}
        <div class="flex-1 overflow-y-auto p-6 space-y-6">
            {{-- Profile Header --}}
            <div class="flex items-center gap-4">
                <img :src="item.foto ? '/storage/' + item.foto : '{{ asset('images/default-avatar.png') }}'"
                    :alt="item.nama" class="w-20 h-20 rounded-xl object-cover border-2 border-gray-200 shadow-sm">
                <div>
                    <h4 class="text-lg font-bold text-gray-800" x-text="item.nama"></h4>
                    <p class="text-gray-500" x-text="item.jabatan"></p>
                    <span
                        :class="item.status === 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'"
                        class="inline-flex items-center px-2.5 py-0.5 mt-1 rounded-full text-xs font-semibold"
                        x-text="item.status === 'aktif' ? 'Aktif' : 'Nonaktif'">
                    </span>
                </div>
            </div>

            {{-- Unit --}}
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Unit Organisasi</p>
                <template x-if="getCurrentUnit()">
                    <div class="bg-blue-50 rounded-xl p-4 border border-blue-100">
                        <p class="font-semibold text-gray-800" x-text="getCurrentUnit()?.name"></p>
                        <span
                            :class="getCurrentUnit()?.type === 'directorate' ? 'bg-blue-100 text-blue-800' :
                                'bg-purple-100 text-purple-800'"
                            class="inline-flex items-center px-2 py-0.5 mt-1 rounded-full text-xs font-medium"
                            x-text="getCurrentUnit()?.type === 'directorate' ? 'Direktorat' : 'Subdirektorat'">
                        </span>
                    </div>
                </template>
                <template x-if="!getCurrentUnit()">
                    <p class="text-gray-400 italic text-sm">Belum ditugaskan ke unit</p>
                </template>
            </div>

            {{-- Sertifikasi --}}
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Sertifikasi / Kompetensi</p>
                <template x-if="item.sertifikasi && item.sertifikasi.length > 0">
                    <div class="flex flex-wrap gap-2">
                        <template x-for="sertif in item.sertifikasi" :key="sertif">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800"
                                x-text="sertif">
                            </span>
                        </template>
                    </div>
                </template>
                <template x-if="!item.sertifikasi || item.sertifikasi.length === 0">
                    <p class="text-gray-400 italic text-sm">Tidak ada sertifikasi</p>
                </template>
            </div>
        </div>

        {{-- Footer --}}
        <div class="p-6 bg-gray-50 border-t border-gray-200 flex justify-end gap-3 flex-shrink-0">
            <button type="button" @click="$dispatch('open-edit-pegawai', item); open = false;"
                class="px-5 py-2.5 bg-amber-500 text-white font-semibold rounded-xl hover:bg-amber-600 transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
                Edit
            </button>
            <button type="button" @click="open = false"
                class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition-all">
                Tutup
            </button>
        </div>
    </div>
</div>
