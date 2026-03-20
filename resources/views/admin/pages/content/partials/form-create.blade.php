<div x-data="{
    open: false,
    thumbnailPreview: null,
    fileChosen(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = (e) => { this.thumbnailPreview = e.target.result; };
        reader.readAsDataURL(file);
    }
}"
    x-on:open-create-content.window="
        open = true;
        this.thumbnailPreview = null;
        $nextTick(() => {
            if (!window.summernoteInitialized) {
                initSummernote('editor-content')
                window.summernoteInitialized = true
            }
        });
    "
    x-show="open" x-cloak @click.self="open = false"
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
                    <h3 class="text-xl font-bold text-white">Tambah {{ ucfirst($section) }}</h3>
                    <p class="text-blue-100 text-sm">Lengkapi detail informasi di bawah ini</p>
                </div>
            </div>
            <button @click="open = false" class="text-white hover:bg-white/20 rounded-lg p-2 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <form method="POST" action="{{ route('admin.content.store') }}" enctype="multipart/form-data"
            class="flex-1 overflow-y-auto" x-data="{ loading: false }" @submit="loading = true">
            @csrf
            <input type="hidden" name="type" value="{{ $section }}">

            <div class="p-6 space-y-5">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Judul <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue/20 outline-none transition-all"
                        placeholder="Masukkan judul {{ $section }}" required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                @if (in_array($section, ['news', 'announcement']))
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Thumbnail</label>
                        <div class="flex items-center gap-4 p-3 border-2 border-dashed border-gray-200 rounded-xl">
                            <div class="relative w-20 h-20 flex-shrink-0">
                                <template x-if="thumbnailPreview">
                                    <img :src="thumbnailPreview"
                                        class="w-20 h-20 rounded-lg object-cover border-2 border-gray-200">
                                </template>

                                <template x-if="!thumbnailPreview">
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
                                <input type="file" name="thumbnail" accept="image/*" @change="fileChosen"
                                    class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-50 file:text-uniba-blue hover:file:bg-blue-100 transition-all">
                            </div>
                        </div>
                        @error('thumbnail')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Ringkasan <span
                                class="text-red-500">*</span></label>
                        <textarea name="excerpt" rows="2"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue/20 outline-none resize-none"
                            placeholder="Ringkasan singkat untuk tampilan depan..." required>{{ old('excerpt') }}</textarea>
                        @error('excerpt')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                @endif

                @if (in_array($section, ['news', 'announcement', 'agenda']))
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Konten <span
                                class="text-red-500">*</span></label>
                        <x-form-summernote id="editor-content" name="content" :value="old('content')" />
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @if (in_array($section, ['agenda']))
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Event <span
                                    class="text-red-500">*</span></label>
                            <input type="date" name="event_date" value="{{ old('event_date') }}"
                                class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue outline-none"
                                required>
                            @error('event_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Jam Event <span
                                    class="text-red-500">*</span></label>
                            <input type="time" name="event_time" value="{{ old('event_time') }}"
                                class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue outline-none"
                                required>
                            @error('event_time')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Lokasi <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="location" value="{{ old('location') }}"
                                class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue outline-none"
                                placeholder="Gedung/Ruangan" required>
                            @error('location')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif
                </div>

                <div class="pt-4 border-t border-gray-100">
                    <label class="block text-sm font-bold text-gray-700 mb-3">Status Publikasi <span
                            class="text-red-500">*</span></label>
                    <div class="flex gap-4 p-3 bg-gray-50 rounded-xl w-fit border border-gray-200">
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="radio" name="status" value="draft"
                                {{ old('status') != 'published' ? 'checked' : '' }}
                                class="w-4 h-4 text-uniba-blue border-gray-300 focus:ring-uniba-blue/20">
                            <span
                                class="text-sm font-semibold text-gray-600 group-hover:text-uniba-blue transition-colors">Draft</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="radio" name="status" value="published"
                                {{ old('status') == 'published' ? 'checked' : '' }}
                                class="w-4 h-4 text-uniba-blue border-gray-300 focus:ring-uniba-blue/20">
                            <span
                                class="text-sm font-semibold text-gray-600 group-hover:text-uniba-blue transition-colors">Publikasikan
                                Sekarang</span>
                        </label>
                    </div>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4 border-t border-gray-100">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Pengaturan SEO (Opsional)
                    </p>
                    <div class="space-y-4">
                        <input type="text" name="meta_title" placeholder="Meta Title"
                            value="{{ old('meta_title') }}"
                            class="w-full border-2 border-gray-200 rounded-lg px-4 py-2 focus:border-uniba-blue outline-none text-sm">
                        <textarea name="meta_description" rows="2" placeholder="Meta Description"
                            class="w-full border-2 border-gray-200 rounded-lg px-4 py-2 focus:border-uniba-blue outline-none text-sm resize-none">{{ old('meta_description') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-gray-50 border-t border-gray-200 flex items-center justify-between">
                <span class="text-xs text-gray-500"><span class="text-red-500">*</span> Wajib diisi</span>
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
                        Simpan Data
                        <span x-show="!loading">Simpan</span>
                        <span x-show="loading">Menyimpan...</span>

                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    fileChosen(event) {
        const file = event.target.files[0];
        if (!file) return;

        if (file.size > 5 * 1024 * 1024) {
            alert('Ukuran file maksimal 5MB');
            return;
        }

        const reader = new FileReader();
        reader.onload = (e) => {
            this.imagePreview = e.target.result;
        };
        reader.readAsDataURL(file);
    }
</script>
