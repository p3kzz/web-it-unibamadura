@php
    $kategoriLayananOptions = \App\Models\KategoriLayanan::query()->orderBy('nama')->get();
@endphp

<div x-data="{
    open: false,
    kategoriMap: @js($kategoriLayananOptions->pluck('nama', 'id')),
    form: {
        kategori_layanan_id: @js(old('kategori_layanan_id')) || '',
        nama: @js(old('nama')) || '',
    },
    syncNamaFromKategori() {
        this.form.nama = this.kategoriMap[this.form.kategori_layanan_id] || '';
    }
}"
    x-on:open-create.window="
        open = true;
        syncNamaFromKategori();
        $nextTick(() => {
            initSummernote('deskripsi-create', '');
            initSummernote('sla-create', '');
            initSummernote('biaya-create', '');
            initSummernote('cara-akses-create', '');
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
        class="bg-white rounded-2xl w-full max-w-4xl shadow-2xl overflow-hidden max-h-[90vh] overflow-y-auto">

        <div class="bg-uniba-blue px-6 py-4 flex items-center justify-between sticky top-0 z-10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Tambah Katalog Layanan</h3>
                    <p class="text-blue-100 text-sm">Isi form di bawah untuk menambah data baru</p>
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

        <form method="POST" action="{{ route('admin.layanan.katalog-layanan.store') }}" class="p-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Kategori Layanan <span class="text-red-500">*</span>
                    </label>
                    <select name="kategori_layanan_id" x-model="form.kategori_layanan_id"
                        @change="syncNamaFromKategori()"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none"
                        required>
                        <option value="">Pilih kategori layanan</option>
                        @foreach ($kategoriLayananOptions as $kategori)
                            <option value="{{ $kategori->id }}" @selected(old('kategori_layanan_id') == $kategori->id)>
                                {{ $kategori->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_layanan_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Nama Layanan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama" x-model="form.nama" readonly
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none"
                        placeholder="Nama layanan otomatis dari kategori" required>
                    @error('nama')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Deskripsi <span class="text-red-500">*</span>
                    </label>
                    <x-form-summernote id="deskripsi-create" name="deskripsi" :value="old('deskripsi')" height="180"
                        placeholder="Deskripsi singkat layanan" required />
                    @error('deskripsi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Pengguna Sasaran</label>
                    <input type="text" name="pengguna_sasaran"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none"
                        value="{{ old('pengguna_sasaran') }}" placeholder="Mahasiswa, Dosen, Tenaga Kependidikan">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Service Owner</label>
                    <input type="text" name="service_owner"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none"
                        value="{{ old('service_owner') }}" placeholder="Unit/Bagian penanggung jawab">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Jam Layanan</label>
                    <input type="text" name="jam_layanan"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none"
                        value="{{ old('jam_layanan') }}" placeholder="Senin - Jumat, 08:00 - 16:00">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">SLA</label>
                    <x-form-summernote id="sla-create" name="sla" :value="old('sla')" height="140"
                        placeholder="Contoh: 2 hari kerja" required />
                    @error('sla')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Biaya</label>
                    <x-form-summernote id="biaya-create" name="biaya" :value="old('biaya')" height="140"
                        placeholder="Gratis / nominal tertentu" required />
                    @error('biaya')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Status Layanan</label>
                    <select name="status"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none">
                        @foreach (['Aktif', 'Tidak Aktif', 'Maintenance'] as $status)
                            <option value="{{ $status }}" @selected(old('status', 'Aktif') === $status)>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Cara Akses</label>
                    <x-form-summernote id="cara-akses-create" name="cara_akses" :value="old('cara_akses')" height="160"
                        placeholder="Langkah akses layanan" required />
                    @error('cara_akses')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Dependencies</label>
                    <input type="text" name="dependencies"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none"
                        value="{{ old('dependencies') }}" placeholder="Syarat atau ketergantungan layanan">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Kontak</label>
                    <input type="text" name="kontak"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none"
                        value="{{ old('kontak') }}" placeholder="Email/WhatsApp/Telepon">
                </div>

                <div class="md:col-span-2">
                    <input type="hidden" name="is_active" value="0">
                    <div class="flex items-center gap-3">
                        <input type="checkbox" name="is_active" value="1" checked
                            class="w-5 h-5 text-uniba-blue border-gray-300 rounded focus:ring-uniba-blue">
                        <label class="text-sm text-gray-700">Tandai sebagai data aktif</label>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between gap-3 mt-8 pt-6 border-t border-gray-200">
                <div class="text-sm text-gray-500 flex items-center gap-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-red-500">*</span> Field wajib diisi
                </div>
                <div class="flex gap-3">
                    <button type="button" @click="open = false"
                        class="px-6 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-lg transition-all duration-200 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Batal
                    </button>
                    <button type="submit"
                        class="px-6 py-2.5 bg-uniba-blue hover:bg-blue-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Simpan Data
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
