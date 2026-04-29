<div x-data="{
    open: false,
    form: {
        id: '',
        icon: '',
        nama: '',
        deskripsi: '',
        pengguna_sasaran: '',
        service_owner: '',
        jam_layanan: '',
        sla: '',
        biaya: '',
        cara_akses: '',
        status: 'Aktif',
        dependencies: '',
        kontak: '',
        is_active: true,
    },
    iconPreview: null,
    fileChosen(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = (e) => { this.iconPreview = e.target.result; };
        reader.readAsDataURL(file);
    }
}"
    x-on:open-edit-katalog-layanan.window="
        open = true;
        form = {
            id: $event.detail.id,
            icon: $event.detail.icon,
            nama: $event.detail.nama || '',
            deskripsi: $event.detail.deskripsi || '',
            pengguna_sasaran: $event.detail.pengguna_sasaran || '',
            service_owner: $event.detail.service_owner || '',
            jam_layanan: $event.detail.jam_layanan || '',
            sla: $event.detail.sla || '',
            biaya: $event.detail.biaya || '',
            cara_akses: $event.detail.cara_akses || '',
            status: $event.detail.status || 'Aktif',
            dependencies: $event.detail.dependencies || '',
            kontak: $event.detail.kontak || '',
            is_active: Boolean($event.detail.is_active),
        };
        iconPreview = null;
        $nextTick(() => {
            initSummernote('deskripsi-edit', form.deskripsi);
            initSummernote('sla-edit', form.sla);
            initSummernote('biaya-edit', form.biaya);
            initSummernote('cara-akses-edit', form.cara_akses);
        });
    "
    x-show="open" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div @click.away="open = false" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="bg-white rounded-2xl w-full max-w-5xl shadow-2xl overflow-hidden max-h-[90vh] flex flex-col">

        <div class="bg-uniba-blue px-6 py-4 flex items-center justify-between sticky top-0 z-20">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white leading-tight">Edit Katalog Layanan</h3>
                    <p class="text-blue-100 text-xs">ID Layanan: <span x-text="form.id" class="font-mono"></span></p>
                </div>
            </div>
            <button @click="open = false" class="text-white hover:bg-white/20 rounded-lg p-2 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <form :action="`{{ url('admin_tik/katalog-layanan') }}/${form.id}`" method="POST" enctype="multipart/form-data"
            class="overflow-y-auto p-6 space-y-8">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                <div class="flex items-center pb-2 border-b border-gray-100">
                    <h4 class="font-bold text-gray-800">Informasi Dasar</h4>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                    <div class="md:col-span-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Icon Layanan</label>
                        <div
                            class="relative group border-2 border-dashed border-gray-200 rounded-xl p-4 hover:border-uniba-blue transition-colors text-center bg-gray-50/50">
                            <template x-if="iconPreview">
                                <img :src="iconPreview"
                                    class="mx-auto w-24 h-24 rounded-lg object-cover mb-2 shadow-md border-2 border-uniba-blue">
                            </template>

                            <template x-if="form.icon && !iconPreview">
                                <img :src="'{{ asset('storage') }}/' + form.icon"
                                    class="mx-auto w-24 h-24 rounded-lg object-cover mb-2 shadow-md">
                            </template>

                            <template x-if="!form.icon && !iconPreview">
                                <div
                                    class="mx-auto w-24 h-24 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 mb-2">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </template>

                            <input type="file" name="icon" @change="fileChosen"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                            <p class="text-[10px] text-gray-500">Klik untuk mengganti icon</p>
                        </div>
                    </div>

                    <div class="md:col-span-8 space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Layanan <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="nama" x-model="form.nama"
                                class="w-full border-gray-300 rounded-lg focus:ring-uniba-blue focus:border-uniba-blue shadow-sm"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi Singkat <span
                                    class="text-red-500">*</span></label>
                            <x-form-summernote id="deskripsi-edit" name="deskripsi" height="120" required />
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <div class="flex items-center pb-2 border-b border-gray-100">
                    <h4 class="font-bold text-gray-800">Detail Operasional</h4>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Pengguna Sasaran</label>
                        <input type="text" name="pengguna_sasaran" x-model="form.pengguna_sasaran"
                            class="w-full border-gray-300 rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Service Owner</label>
                        <input type="text" name="service_owner" x-model="form.service_owner"
                            class="w-full border-gray-300 rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Jam Layanan</label>
                        <input type="text" name="jam_layanan" x-model="form.jam_layanan"
                            class="w-full border-gray-300 rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Status Layanan</label>
                        <select name="status" x-model="form.status" class="w-full border-gray-300 rounded-lg">
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                            <option value="Maintenance">Maintenance</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <div class="flex items-center pb-2 border-b border-gray-100">
                    <h4 class="font-bold text-gray-800">Ketentuan & Cara Akses</h4>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">SLA</label>
                        <x-form-summernote id="sla-edit" name="sla" height="120" />
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Rincian Biaya</label>
                        <x-form-summernote id="biaya-edit" name="biaya" height="120" />
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Cara Akses Layanan</label>
                    <x-form-summernote id="cara-akses-edit" name="cara_akses" height="150" />
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Dependencies</label>
                        <input type="text" name="dependencies" x-model="form.dependencies"
                            class="w-full border-gray-300 rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Kontak Person</label>
                        <input type="text" name="kontak" x-model="form.kontak"
                            class="w-full border-gray-300 rounded-lg">
                    </div>
                </div>
            </div>

            <input type="hidden" name="is_active" value="0">
            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_active" value="1" checked
                    class="w-5 h-5 text-orange-500 border-gray-300 rounded focus:ring-uniba-blue">
                <label class="text-sm text-gray-700">Jadikan sebagai data aktif</label>
            </div>
            <div
                class="p-6 bg-gray-50 border-t border-gray-200 flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="text-xs text-gray-500 flex items-center">
                    <svg class="w-4 h-4 text-orange-400" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" />
                    </svg>
                    Perubahan akan langsung berdampak pada tampilan publik.
                </div>
                <div class="flex gap-3 w-full md:w-auto">
                    <button type="button" @click="open = false"
                        class="flex-1 md:flex-none px-6 py-2.5 bg-white border border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition-all">
                        Batal
                    </button>
                    <button type="submit"
                        class="flex-1 md:flex-none px-8 py-2.5 bg-uniba-blue text-white font-bold rounded-xl shadow-lg shadow-blue-200 hover:bg-blue-700 transform hover:-translate-y-0.5 transition-all flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
