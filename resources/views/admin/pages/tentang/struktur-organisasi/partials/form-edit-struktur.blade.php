<div x-data="{
    open: false,
    item: null,
    imagePreview: null,
    initEdit(data) {
        this.item = data;
        this.imagePreview = data.image ? '/storage/' + data.image : null;
    },
    fileChosen(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = (e) => { this.imagePreview = e.target.result; };
        reader.readAsDataURL(file);
    }
}" x-on:open-edit-struktur.window="open = true; initEdit($event.detail);" x-show="open" x-cloak
    @click.self="open = false"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
        @keydown.escape="open = false"
        class="bg-white rounded-2xl w-full max-w-lg shadow-2xl overflow-hidden max-h-[90vh] flex flex-col">

        {{-- Header --}}
        <div class="bg-amber-500 px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Edit Struktur Organisasi</h3>
                    <p class="text-amber-100 text-sm">Perbarui bagan atau periode</p>
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
        <form method="POST" :action="`{{ url('admin_tik/struktur-organisasi-item') }}/${item?.id}`"
            enctype="multipart/form-data" class="flex-1 overflow-y-auto">
            @csrf
            @method('PUT')

            <div class="p-6 space-y-5">
                {{-- Periode --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Periode <span
                            class="text-red-500">*</span></label>
                    <select name="periode_id" x-model="item.periode_id" required
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 outline-none transition-all">
                        <option value="">Pilih Periode</option>
                        @foreach ($periodes as $periode)
                            <option value="{{ $periode->id }}">
                                {{ $periode->name ?? $periode->start_year . ' - ' . $periode->end_year }}
                            </option>
                        @endforeach
                    </select>
                    @error('periode_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Image Upload --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Gambar Bagan</label>
                    <div
                        class="border-2 border-dashed border-gray-300 rounded-xl p-4 hover:border-amber-500 transition-colors">
                        <template x-if="imagePreview">
                            <div class="relative">
                                <img :src="imagePreview" class="w-full h-48 object-contain rounded-lg mb-3">
                            </div>
                        </template>
                        <template x-if="!imagePreview">
                            <div class="text-center py-6">
                                <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <p class="text-gray-500 text-sm">Tidak ada gambar</p>
                            </div>
                        </template>
                        <input type="file" name="image" accept="image/*" @change="fileChosen"
                            class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-amber-50 file:text-amber-600 hover:file:bg-amber-100 transition-all">
                        <p class="text-xs text-gray-400 mt-2">Biarkan kosong jika tidak ingin mengubah gambar</p>
                    </div>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Is Active --}}
                <div class="pt-4 border-t border-gray-100">
                    <input type="hidden" name="is_active" value="0">
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" name="is_active" value="1" :checked="item?.is_active"
                            class="w-5 h-5 text-amber-500 border-gray-300 rounded focus:ring-amber-500/20">
                        <div>
                            <span
                                class="text-sm font-semibold text-gray-700 group-hover:text-amber-600 transition-colors">
                                Aktifkan sebagai struktur utama
                            </span>
                            <p class="text-xs text-gray-500">Struktur ini akan ditampilkan di halaman publik</p>
                        </div>
                    </label>
                </div>
            </div>

            {{-- Footer --}}
            <div class="p-6 bg-gray-50 border-t border-gray-200 flex items-center justify-between">
                <span class="text-xs text-gray-500"><span class="text-red-500">*</span> Wajib diisi</span>
                <div class="flex gap-3">
                    <button type="button" @click="open = false"
                        class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition-all">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-5 py-2.5 bg-amber-500 text-white font-semibold rounded-xl shadow-md shadow-amber-200 hover:bg-amber-600 transform hover:-translate-y-0.5 transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Perbarui
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
