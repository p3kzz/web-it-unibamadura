<div x-data="{
    open: false
}"
    x-on:open-create-policy.window="
        open = true;
        $nextTick(() => {
            initSummernote('content-create', '');
        });
    "
    x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div @click.away="open = false" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="bg-white rounded-2xl w-full max-w-3xl shadow-2xl overflow-hidden max-h-[90vh] overflow-y-auto">

        <div class="bg-uniba-blue px-6 py-4 flex items-center justify-between sticky top-0 z-10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Tambah Kebijakan</h3>
                    <p class="text-blue-100 text-sm">Buat kebijakan baru</p>
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

        <form method="POST" action="{{ route('admin.penjaminan.policy.store') }}" class="p-6">
            @csrf

            <div class="space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Judul Kebijakan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none"
                            placeholder="Contoh: Kebijakan Keamanan Data" value="{{ old('title') }}" required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <select name="policy_category_id"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none"
                            required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('policy_category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('policy_category_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Slug (opsional)
                    </label>
                    <input type="text" name="slug"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none"
                        placeholder="Otomatis dibuat dari judul jika kosong" value="{{ old('slug') }}">
                    <p class="mt-1 text-xs text-gray-500">Biarkan kosong untuk membuat slug otomatis dari judul</p>
                    @error('slug')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Ringkasan
                    </label>
                    <textarea name="excerpt" rows="2"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none"
                        placeholder="Ringkasan singkat tentang kebijakan ini">{{ old('excerpt') }}</textarea>
                    @error('excerpt')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Konten <span class="text-red-500">*</span>
                    </label>
                    <x-form-summernote id="content-create" name="content" :value="old('content')" height="250" />
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <input type="hidden" name="is_active" value="0">
                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_active" value="1" checked
                        class="w-5 h-5 text-uniba-blue border-gray-300 rounded focus:ring-uniba-blue">
                    <label class="text-sm text-gray-700">Aktifkan kebijakan ini</label>
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
