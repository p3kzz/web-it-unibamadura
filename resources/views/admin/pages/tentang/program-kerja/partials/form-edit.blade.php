<div x-data="{
    open: false,
    pilars: @js($pilars ?? []),
    form: {
        id: '',
        periode_id: '',
        pilar_id: '',
        kode: '',
        nama: '',
        tujuan: '',
        sasaran: '',
        deskripsi: '',
        target_waktu: '',
        status: 'planning',
        is_active: false
    }
}"
    x-on:open-edit.window="
        open = true;
        form = {
            id: $event.detail.id,
            periode_id: $event.detail.periode_id,
            pilar_id: $event.detail.pilar_id || '',
            kode: $event.detail.kode,
            nama: $event.detail.nama,
            tujuan: $event.detail.tujuan || '',
            sasaran: $event.detail.sasaran || '',
            deskripsi: $event.detail.deskripsi || '',
            target_waktu: $event.detail.target_waktu || '',
            status: $event.detail.status || 'planning',
            is_active: Boolean($event.detail.is_active)
        };
        fetch('/admin_tik/program-kerja/pilars?periode_id=' + $event.detail.periode_id)
            .then(res => res.json())
            .then(data => pilars = data)
    "
    x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div @click.away="open = false" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="bg-white rounded-2xl w-full max-w-2xl shadow-2xl overflow-hidden max-h-[90vh] overflow-y-auto">

        <div class="bg-uniba-blue px-6 py-4 flex items-center justify-between sticky top-0">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Edit Program Kerja</h3>
                    <p class="text-orange-100 text-sm">Perbarui data yang sudah ada</p>
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

        <form :action="`/admin_tik/program-kerja/${form.id}`" method="POST" class="p-6">
            @csrf
            @method('PUT')

            <div class="space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Periode <span class="text-red-500">*</span>
                        </label>
                        <select name="periode_id" x-model="form.periode_id"
                            x-on:change="
                            fetch('/admin_tik/program-kerja/pilars?periode_id=' + $event.target.value)
                                .then(res => res.json())
                                .then(data => pilars = data)
                        "
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-20 transition-all duration-200 outline-none"
                            required>
                            <option value="">-- Pilih Periode --</option>
                            @foreach ($periodes as $periode)
                                <option value="{{ $periode->id }}">
                                    {{ $periode->name }} ({{ $periode->start_year }} - {{ $periode->end_year }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Pilar Transformasi</label>
                        <select name="pilar_id" x-model="form.pilar_id"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-20 transition-all duration-200 outline-none">
                            <option value="">-- Pilih Pilar (opsional) --</option>
                            <template x-for="pilar in pilars" :key="pilar.id">
                                <option :value="pilar.id" x-text="pilar.title"></option>
                            </template>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Kode <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="kode" x-model="form.kode"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-20 transition-all duration-200 outline-none"
                            placeholder="Contoh: PK-001" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Nama Program <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama" x-model="form.nama"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-20 transition-all duration-200 outline-none"
                            placeholder="Masukkan nama program kerja" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tujuan</label>
                    <textarea name="tujuan" rows="3" x-model="form.tujuan"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-20 transition-all duration-200 outline-none resize-none"
                        placeholder="Masukkan tujuan program kerja..."></textarea>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Sasaran</label>
                    <textarea name="sasaran" rows="3" x-model="form.sasaran"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-20 transition-all duration-200 outline-none resize-none"
                        placeholder="Masukkan sasaran program kerja..."></textarea>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" x-model="form.deskripsi"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-20 transition-all duration-200 outline-none resize-none"
                        placeholder="Masukkan deskripsi program kerja..."></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Target Waktu Pelaksanaan</label>
                        <input type="text" name="target_waktu" x-model="form.target_waktu"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-20 transition-all duration-200 outline-none"
                            placeholder="Contoh: Januari - Maret 2026">
                        <p class="mt-1 text-xs text-gray-500">Masukkan rentang waktu pelaksanaan program</p>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Status</label>
                        <select name="status" x-model="form.status"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-20 transition-all duration-200 outline-none">
                            <option value="planning">Perencanaan</option>
                            <option value="in_progress">Berjalan</option>
                            <option value="completed">Selesai</option>
                            <option value="cancelled">Dibatalkan</option>
                        </select>
                    </div>
                </div>

                <input type="hidden" name="is_active" value="0">
                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_active" value="1" x-model="form.is_active"
                        class="w-5 h-5 text-orange-500 border-gray-300 rounded">
                    <label class="text-sm text-gray-700">Jadikan sebagai program aktif</label>
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
                        class="px-6 py-2.5 bg-uniba-blue  hover:bg-blue-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Update Data
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
