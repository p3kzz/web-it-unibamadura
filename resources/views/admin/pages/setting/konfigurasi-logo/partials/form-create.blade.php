<div x-data="{
    open: false,
    logoPreview: null,
    fileChosen(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = (e) => { this.logoPreview = e.target.result; };
        reader.readAsDataURL(file);
    }
}"
    x-on:open-create-konfigurasi-logo.window="
        open = true;
        this.logoPreview = null;
    " x-show="open"
    x-cloak @click.self="open = false"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
        @keydown.escape="open = false"
        class="bg-white rounded-2xl w-full max-w-2xl shadow-2xl overflow-hidden max-h-[90vh] flex flex-col">

        <div class="bg-uniba-blue px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Tambah</h3>
                    <p class="text-blue-100 text-sm">Lengkapi detail website</p>
                </div>
            </div>
            <button @click="open = false" class="text-white hover:bg-white/20 rounded-lg p-2 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <form method="POST" action="{{ route('admin.setting-logo.store') }}" enctype="multipart/form-data"
            class="flex-1 overflow-y-auto" x-data="{ loading: false }" @submit="loading = true">
            @csrf

            <div class="p-6 space-y-5">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Website <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="nama_web" value="{{ old('nama_web') }}"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue/20 outline-none transition-all"
                        placeholder="Masukkan Nama Website">
                    @error('nama_web')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">logo</label>
                    <div class="flex items-center gap-4 p-3 border-2 border-dashed border-gray-200 rounded-xl">
                        <div class="relative w-20 h-20 flex-shrink-0">
                            <template x-if="logoPreview">
                                <img :src="logoPreview"
                                    class="w-20 h-20 rounded-lg object-cover border-2 border-gray-200">
                            </template>

                            <template x-if="!logoPreview">
                                <div
                                    class="w-20 h-20 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16" />
                                    </svg>
                                </div>
                            </template>
                        </div>

                        <div class="flex-1">
                            <input type="file" name="logo_web" accept="image/*" @change="fileChosen"
                                class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-50 file:text-uniba-blue hover:file:bg-blue-100 transition-all">
                        </div>
                    </div>
                    @error('logo_web')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <input type="hidden" name="is_active" value="0">
                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_active" value="1" checked
                        class="w-5 h-5 text-orange-500 border-gray-300 rounded">
                    <label class="text-sm text-gray-700">Jadikan sebagai logo aktif</label>
                </div>
            </div>

            <div class="p-6 bg-gray-50 border-t border-gray-200 flex items-center justify-between">
                <div class="flex gap-3">
                    <button type="button" @click="open = false"
                        class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition-all ">
                        Batal
                    </button>
                    <button type="submit" :disabled="loading"
                        class="px-5 py-2.5 bg-uniba-blue text-white font-semibold rounded-xl shadow-md shadow-blue-200 hover:bg-blue-700 transform hover:-translate-y-0.5 transition-all flex items-center gap-2 disabled:opacity-50">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span x-show="!loading">Simpan Data</span>
                        <span x-show="loading">Menyimpan...</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
