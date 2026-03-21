<div x-data="{
    open: false,
    imagePreview: null,
    fileChosen(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = (e) => { this.imagePreview = e.target.result; };
        reader.readAsDataURL(file);
    }
}" x-on:open-create-struktur.window="open = true; imagePreview = null;" x-show="open" x-cloak
    @click.self="open = false"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
        @keydown.escape="open = false"
        class="bg-white rounded-2xl w-full max-w-lg shadow-2xl overflow-hidden max-h-[90vh] flex flex-col">

        {{-- Header --}}
        <div class="bg-uniba-blue px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Tambah Struktur Organisasi</h3>
                    <p class="text-blue-100 text-sm">Upload bagan untuk periode tertentu</p>
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
        <form method="POST" action="{{ route('admin.tentang.struktur-organisasi.store') }}"
            enctype="multipart/form-data" class="flex-1 overflow-y-auto">
            @csrf

            <div class="p-6 space-y-5">
                {{-- Periode --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Periode <span
                            class="text-red-500">*</span></label>
                    @if ($availablePeriodes->count() > 0)
                        <select name="periode_id" required
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue/20 outline-none transition-all">
                            <option value="">Pilih Periode</option>
                            @foreach ($availablePeriodes as $periode)
                                <option value="{{ $periode->id }}"
                                    {{ old('periode_id') == $periode->id ? 'selected' : '' }}>
                                    {{ $periode->name ?? $periode->start_year . ' - ' . $periode->end_year }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <div class="bg-amber-50 border border-amber-200 rounded-lg px-4 py-3">
                            <div class="flex items-center gap-2 text-amber-700">
                                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                <p class="text-sm font-medium">Semua periode sudah memiliki struktur organisasi</p>
                            </div>
                            <p class="text-xs text-amber-600 mt-1 ml-7">Silakan buat periode baru terlebih dahulu atau hapus struktur yang sudah ada</p>
                        </div>
                    @endif
                    @error('periode_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Image Upload --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Gambar Bagan <span
                            class="text-red-500">*</span></label>
                    <div
                        class="border-2 border-dashed border-gray-300 rounded-xl p-4 hover:border-uniba-blue transition-colors">
                        <template x-if="imagePreview">
                            <div class="relative">
                                <img :src="imagePreview" class="w-full h-48 object-contain rounded-lg mb-3">
                                <button type="button" @click="imagePreview = null; $refs.imageInput.value = ''"
                                    class="absolute top-2 right-2 w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
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
                                <p class="text-gray-500 text-sm mb-2">Klik atau drag gambar bagan</p>
                                <p class="text-gray-400 text-xs">JPG, PNG, WEBP (Max. 5MB)</p>
                            </div>
                        </template>
                        <input type="file" name="image" accept="image/*" @change="fileChosen" x-ref="imageInput"
                            class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-50 file:text-uniba-blue hover:file:bg-blue-100 transition-all"
                            required>
                    </div>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Is Active --}}
                <div class="pt-4 border-t border-gray-100">
                    <input type="hidden" name="is_active" value="0">
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}
                            class="w-5 h-5 text-uniba-blue border-gray-300 rounded focus:ring-uniba-blue/20">
                        <div>
                            <span
                                class="text-sm font-semibold text-gray-700 group-hover:text-uniba-blue transition-colors">
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
                        class="px-5 py-2.5 bg-uniba-blue text-white font-semibold rounded-xl shadow-md shadow-blue-200 hover:bg-blue-700 transform hover:-translate-y-0.5 transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
