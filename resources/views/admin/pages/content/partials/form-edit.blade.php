<div x-data="{
    open: false,
    item: {},
    thumbnailPreview: null,

    fileChosen(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = (e) => { this.thumbnailPreview = e.target.result; };
        reader.readAsDataURL(file);
    },

    initEdit(data) {
        this.item = data;
        this.thumbnailPreview = null;
        this.open = true;
    }
}"
    x-on:open-edit-content.window="
initEdit($event.detail);

$nextTick(() => {

    setTimeout(() => {
        initSummernote('editor-edit-content', $event.detail.content)
    },100)

});
"
    x-show="open" x-cloak @click.self="open = false" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95" @keydown.escape="open = false"
        class="bg-white rounded-2xl w-full max-w-2xl shadow-2xl overflow-hidden max-h-[90vh] flex flex-col">

        <div class="bg-uniba-blue px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Edit {{ ucfirst($section) }}</h3>
                    <p class="text-blue-100 text-sm">ID Data: <span x-text="item.id"></span></p>
                </div>
            </div>
            <button @click="open = false" class="text-white hover:bg-white/20 rounded-lg p-2 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <form method="POST" :action="`/admin_tik/content/${item.slug}`" enctype="multipart/form-data"
            class="flex-1 overflow-y-auto">
            @csrf
            @method('PUT')
            <input type="hidden" name="type" value="{{ $section }}">

            <div class="p-6 space-y-5">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Judul <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="title" x-model="item.title"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue outline-none transition-all"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Thumbnail</label>
                    <div class="flex items-center gap-4 p-3 border-2 border-dashed border-gray-200 rounded-xl">
                        <div class="relative w-20 h-20 flex-shrink-0">
                            <template x-if="thumbnailPreview">
                                <img :src="thumbnailPreview"
                                    class="w-20 h-20 rounded-lg object-cover border border-uniba-blue">
                            </template>
                            <template x-if="!thumbnailPreview && item.thumbnail">
                                <img :src="`{{ asset('storage/') }}/${item.thumbnail}`"
                                    class="w-20 h-20 rounded-lg object-cover">
                            </template>
                            <template x-if="!thumbnailPreview && !item.thumbnail">
                                <div
                                    class="w-20 h-20 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                                    <i class="fas fa-image"></i>
                                </div>
                            </template>
                        </div>
                        <div class="flex-1">
                            <input type="file" name="thumbnail" accept="image/*" @change="fileChosen"
                                class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-50 file:text-uniba-blue hover:file:bg-blue-100 transition-all">
                        </div>
                    </div>
                </div>

                <div x-show="item.type === 'news'">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Ringkasan</label>
                    <textarea name="excerpt" x-model="item.excerpt" rows="2"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue outline-none resize-none"
                        maxlength="500"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Konten <span
                            class="text-red-500">*</span></label>
                    <textarea id="editor-edit-content" name="content"
                        class="summernote w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue outline-none"
                        required></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div x-show="['agenda', 'announcement'].includes(item.type)">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Event</label>
                        <input type="date" name="event_date" x-model="item.event_date"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue outline-none">
                    </div>

                    <div x-show="item.type === 'agenda'">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Lokasi</label>
                        <input type="text" name="location" x-model="item.location"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-3">Status Publikasi</label>
                    <div class="flex gap-4 p-3 bg-gray-50 rounded-xl w-fit border border-gray-100">
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="radio" name="status" value="draft" :checked="item.status === 'draft'"
                                class="w-4 h-4 text-uniba-blue">
                            <span class="text-sm font-semibold text-gray-600">Draft</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="radio" name="status" value="published"
                                :checked="item.status === 'published'" class="w-4 h-4 text-uniba-blue">
                            <span class="text-sm font-semibold text-gray-600">Terbitkan</span>
                        </label>
                    </div>
                    <p class="mt-2 text-[10px] text-gray-400 font-medium uppercase tracking-wider"
                        x-show="item.published_at">
                        Pertama kali terbit: <span x-text="new Date(item.published_at).toLocaleString('id-ID')"></span>
                    </p>
                </div>

                <div class="pt-4 border-t border-gray-100">
                    <p class="text-xs font-bold text-gray-400 uppercase mb-3">SEO Meta Data</p>
                    <div class="space-y-4">
                        <input type="text" name="meta_title" x-model="item.meta_title" placeholder="Meta Title"
                            class="w-full border-2 border-gray-200 rounded-lg px-4 py-2 focus:border-uniba-blue outline-none text-sm">
                        <textarea name="meta_description" x-model="item.meta_description" rows="2" placeholder="Meta Description"
                            class="w-full border-2 border-gray-200 rounded-lg px-4 py-2 focus:border-uniba-blue outline-none text-sm resize-none"></textarea>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">
                <button type="button" @click="open = false"
                    class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition-all">
                    Batal
                </button>
                <button type="submit"
                    class="px-5 py-2.5 bg-uniba-blue text-white font-semibold rounded-xl shadow-lg hover:bg-blue-700 transform hover:-translate-y-0.5 transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
