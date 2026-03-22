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
    imagePreview: null,
    sertifikasiTags: [],
    newTag: '',
    initEdit(data) {
        this.item = {
            id: data.id || '',
            nama: data.nama || '',
            foto: data.foto || '',
            jabatan: data.jabatan || '',
            sertifikasi: data.sertifikasi || [],
            status: data.status || 'aktif',
            penugasan: data.penugasan || []
        };
        this.imagePreview = data.foto ? '/storage/' + data.foto : null;
        this.sertifikasiTags = Array.isArray(data.sertifikasi) ? [...data.sertifikasi] : [];
    },
    addTag() {
        if (this.newTag.trim() && !this.sertifikasiTags.includes(this.newTag.trim())) {
            this.sertifikasiTags.push(this.newTag.trim());
            this.newTag = '';
        }
    },
    removeTag(index) {
        this.sertifikasiTags.splice(index, 1);
    },
    fileChosen(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = (e) => { this.imagePreview = e.target.result; };
        reader.readAsDataURL(file);
    },
    getCurrentUnitId() {
        const primary = this.item.penugasan.find(p => p.is_primary && !p.tanggal_selesai);
        return primary ? primary.unit_organisasi_id : '';
    }
}" x-on:open-edit-pegawai.window="open = true; initEdit($event.detail);" x-show="open" x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div @click.away="open = false" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="bg-white rounded-2xl w-full max-w-2xl shadow-2xl overflow-hidden max-h-[90vh] flex flex-col">

        {{-- Header --}}
        <div class="bg-uniba-blue px-6 py-4 flex items-center justify-between flex-shrink-0">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Edit Pegawai</h3>
                    <p class="text-blue-100 text-sm">Perbarui data pegawai</p>
                </div>
            </div>
            <button @click="open = false" class="text-white hover:bg-white/20 rounded-lg p-2 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        {{-- Form --}}
        <form :action="`{{ url('admin_tik/pegawai') }}/${item.id}`" method="POST" enctype="multipart/form-data"
            class="flex-1 overflow-y-auto p-6">
            @csrf
            @method('PUT')

            <div class="space-y-5">
                {{-- Foto --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Foto Pegawai</label>
                    <div class="flex items-center gap-4">
                        <div
                            class="w-20 h-20 rounded-xl bg-gray-100 border-2 border-dashed border-gray-300 flex items-center justify-center overflow-hidden">
                            <template x-if="imagePreview">
                                <img :src="imagePreview" class="w-full h-full object-cover">
                            </template>
                            <template x-if="!imagePreview">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </template>
                        </div>
                        <div class="flex-1">
                            <input type="file" name="foto" accept="image/*" @change="fileChosen"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="mt-1 text-xs text-gray-500">JPG, PNG, WEBP. Maks 2MB. Kosongkan jika tidak ingin
                                mengubah foto.</p>
                        </div>
                    </div>
                </div>

                {{-- Nama --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Nama Pegawai <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama" x-model="item.nama" required
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all outline-none"
                        placeholder="Masukkan nama lengkap">
                </div>

                {{-- Jabatan --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Jabatan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="jabatan" x-model="item.jabatan" required
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all outline-none"
                        placeholder="Contoh: Staff IT, Kepala Subdirektorat">
                </div>

                {{-- Unit Organisasi --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Unit Organisasi <span class="text-red-500">*</span>
                    </label>
                    <select name="unit_organisasi_id" x-model="item.unit_organisasi_id" :value="getCurrentUnitId()"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all outline-none"
                        x-init="$watch('item', () => { $el.value = getCurrentUnitId(); })">
                        <option value="">Pilih Unit</option>
                        @foreach ($units as $unit)
                            <option value="{{ $unit->id }}">
                                {{ $unit->type === 'subdirectorate' ? '— ' : '' }}{{ $unit->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Sertifikasi --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Sertifikasi / Kompetensi</label>
                    <div class="flex flex-wrap gap-2 mb-2">
                        <template x-for="(tag, index) in sertifikasiTags" :key="index">
                            <span
                                class="inline-flex items-center gap-1 px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                                <span x-text="tag"></span>
                                <button type="button" @click="removeTag(index)" class="hover:text-green-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </span>
                        </template>
                    </div>
                    <div class="flex gap-2">
                        <input type="text" x-model="newTag" @keydown.enter.prevent="addTag()"
                            class="flex-1 border-2 border-gray-300 rounded-lg px-4 py-2 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all outline-none"
                            placeholder="Ketik sertifikasi, tekan Enter">
                        <button type="button" @click="addTag()"
                            class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-all">
                            Tambah
                        </button>
                    </div>
                    <input type="hidden" name="sertifikasi" :value="sertifikasiTags.join(',')">
                </div>

                {{-- Status --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Status</label>
                    <select name="status" x-model="item.status"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all outline-none">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </div>
            </div>

            {{-- Footer --}}
            <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                <button type="button" @click="open = false"
                    class="px-6 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-lg transition-all">
                    Batal
                </button>
                <button type="submit"
                    class="px-6 py-2.5 bg-uniba-blue hover:bg-blue-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                        </path>
                    </svg>
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
