<div x-data="{
    open: false,
    item: {
        id: '',
        title: '',
        slug: '',
        excerpt: '',
        content: '',
        category_id: '',
        category_name: '',
        is_active: false
    }
}"
    x-on:open-show-policy.window="
        open = true;
        item = {
            id: $event.detail.id,
            title: $event.detail.title,
            slug: $event.detail.slug || '',
            excerpt: $event.detail.excerpt || '',
            content: $event.detail.content || '',
            category_id: $event.detail.category_id,
            category_name: $event.detail.category_name || '',
            is_active: Boolean($event.detail.is_active)
        };
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Detail Kebijakan</h3>
                    <p class="text-blue-100 text-sm">Informasi lengkap kebijakan</p>
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

        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Judul</label>
                    <p class="text-lg font-semibold text-gray-800" x-text="item.title"></p>
                </div>

                <div>
                    <label
                        class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Kategori</label>
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-700"
                        x-text="item.category_name"></span>
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Slug</label>
                <p class="text-sm text-gray-600 font-mono bg-gray-50 px-3 py-2 rounded-lg" x-text="item.slug"></p>
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Status</label>
                <template x-if="item.is_active">
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-700">
                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                        Aktif
                    </span>
                </template>
                <template x-if="!item.is_active">
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-gray-100 text-gray-600">
                        <span class="w-2 h-2 bg-gray-400 rounded-full mr-2"></span>
                        Nonaktif
                    </span>
                </template>
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Ringkasan</label>
                <template x-if="item.excerpt">
                    <p class="text-gray-700" x-text="item.excerpt"></p>
                </template>
                <template x-if="!item.excerpt">
                    <p class="text-gray-400 italic">Tidak ada ringkasan</p>
                </template>
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Konten</label>
                <template x-if="item.content">
                    <div class="prose prose-sm max-w-none text-gray-700 bg-gray-50 p-4 rounded-lg max-h-64 overflow-y-auto"
                        x-html="item.content"></div>
                </template>
                <template x-if="!item.content">
                    <p class="text-gray-400 italic">Tidak ada konten</p>
                </template>
            </div>

            <div class="flex justify-end gap-3 pt-6 border-t border-gray-200">
                <button @click="open = false"
                    class="px-6 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-lg transition-all duration-200">
                    Tutup
                </button>
                <button @click="open = false; $dispatch('open-edit-policy', item)"
                    class="px-6 py-2.5 bg-uniba-blue hover:bg-blue-700 text-white font-semibold rounded-lg transition-all duration-200 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    Edit
                </button>
            </div>
        </div>
    </div>
</div>
