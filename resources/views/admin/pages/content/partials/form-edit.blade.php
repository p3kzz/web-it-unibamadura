<div x-data="{
    open: false,
    item: {},
    formatDatetime(dateStr) {
        if (!dateStr) return '';
        const date = new Date(dateStr);
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        return `${year}-${month}-${day}T${hours}:${minutes}`;
    }
}"
    x-on:open-edit-content.window="item = $event.detail; item.published_at = formatDatetime(item.published_at); open = true"
    x-show="open" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div @click.away="open = false" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="bg-white rounded-2xl w-full max-w-2xl shadow-2xl overflow-hidden max-h-[90vh] flex flex-col">

        <div class="bg-uniba-blue px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">
                        Edit Content
                    </h3>
                    <p class="text-blue-100 text-sm">Perbarui data di bawah</p>
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

        {{-- <form method="POST" :action="`{{ route('admin.content.update', '') }}/${item.slug}`"
            enctype="multipart/form-data" class="p-6 overflow-y-auto flex-1">
            @csrf
            @method('PUT')
            <div class="space-y-5">
                <!-- Title -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Judul <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title" x-model="item.title"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none"
                        placeholder="Masukkan judul" required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Thumbnail -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Thumbnail
                    </label>
                    <div class="flex gap-4">
                        <div x-show="item.thumbnail" class="flex-shrink-0">
                            <img :src="`{{ asset('storage/') }}/${item.thumbnail}`" :alt="item.title"
                                class="w-20 h-20 rounded-lg object-cover">
                        </div>
                        <input type="file" name="thumbnail" accept="image/*"
                            class="flex-1 border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none text-sm">
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, WebP | Max: 2MB (Kosongkan jika tidak ingin
                        diubah)</p>
                    @error('thumbnail')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Excerpt (untuk News) -->
                <div x-show="item.type === 'news'" class="space-y-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Ringkasan
                    </label>
                    <textarea name="excerpt" x-model="item.excerpt" rows="2"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none resize-none"
                        placeholder="Masukkan ringkasan berita" maxlength="500"></textarea>
                    <p class="mt-1 text-xs text-gray-500">Max: 500 karakter</p>
                    @error('excerpt')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Konten <span class="text-red-500">*</span>
                    </label>
                    <textarea name="content" x-model="item.content" rows="5"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none resize-none"
                        placeholder="Masukkan konten..." required></textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Event Date (untuk Agenda & Announcement) -->
                <div x-show="['agendas', 'announcement'].includes(item.type)" class="space-y-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Tanggal Event
                    </label>
                    <input type="date" name="event_date" x-model="item.event_date"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none">
                    @error('event_date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Location (untuk Agenda) -->
                <div x-show="item.type === 'agendas'" class="space-y-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Lokasi
                    </label>
                    <input type="text" name="location" x-model="item.location"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none"
                        placeholder="Masukkan lokasi agenda">
                    @error('location')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <div class="flex gap-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="status" value="draft"
                                :checked="item.status === 'draft'" class="w-4 h-4 text-uniba-blue border-gray-300">
                            <span class="text-sm text-gray-700">Draft</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="status" value="published"
                                :checked="item.status === 'published'"
                                class="w-4 h-4 text-uniba-blue border-gray-300">
                            <span class="text-sm text-gray-700">Publikasikan</span>
                        </label>
                    </div>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Published At -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Tanggal Publikasi
                    </label>
                    <input type="datetime-local" name="published_at" x-model="item.published_at"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none">
                    <p class="mt-1 text-xs text-gray-500">Opsional - Akan menggunakan tanggal/waktu saat ini jika
                        dikosongkan</p>
                    @error('published_at')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Meta Title -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Meta Title
                    </label>
                    <input type="text" name="meta_title" x-model="item.meta_title"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none"
                        placeholder="Untuk SEO" maxlength="255">
                    <p class="mt-1 text-xs text-gray-500">Max: 255 karakter</p>
                    @error('meta_title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Meta Description -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Meta Description
                    </label>
                    <textarea name="meta_description" x-model="item.meta_description" rows="2"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none resize-none"
                        placeholder="Untuk SEO" maxlength="255"></textarea>
                    <p class="mt-1 text-xs text-gray-500">Max: 255 karakter</p>
                    @error('meta_description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
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
                        Update Data
                    </button>
                </div>
            </div>
        </form> --}}
    </div>
</div>
