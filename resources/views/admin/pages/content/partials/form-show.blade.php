<div x-data="{
    open: false,
    item: {},
}" x-on:open-show-content.window="
        item = $event.detail;
        open = true;
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Detail {{ ucfirst($section) }}</h3>
                    <p class="text-blue-100 text-sm">ID: <span x-text="item.id"></span></p>
                </div>
            </div>
            <button @click="open = false" class="text-white hover:bg-white/20 rounded-lg p-2 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <div class="flex-1 overflow-y-auto p-6 space-y-5">

            <template x-if="['news', 'announcement'].includes(item.type) && item.thumbnail">
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Thumbnail</p>
                    <img :src="`{{ asset('storage/') }}/${item.thumbnail}`" :alt="item.title"
                        class="w-full max-h-48 object-cover rounded-xl border border-gray-200">
                </div>
            </template>

            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Judul</p>
                <p class="text-gray-900 font-semibold text-lg leading-relaxed" x-text="item.title"></p>
            </div>

            <template x-if="item.type === 'news' && item.excerpt">
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Ringkasan</p>
                    <p class="text-gray-700 leading-relaxed" x-text="item.excerpt"></p>
                </div>
            </template>

            <template x-if="item.type === 'agenda'">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Tanggal Event</p>
                        <p class="text-gray-700 font-medium"
                            x-text="item.event_date ? new Date(item.event_date).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }) : '-'">
                        </p>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Lokasi</p>
                        <p class="text-gray-700 font-medium" x-text="item.location || '-'"></p>
                    </div>
                </div>
            </template>

            <template x-if="['news', 'announcement', 'agenda'].includes(item.type)">
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Konten</p>
                    <div class="prose prose-sm max-w-none text-gray-700 leading-relaxed border border-gray-100 rounded-xl p-4 bg-gray-50"
                        x-html="item.content"></div>
                </div>
            </template>

            <div class="grid grid-cols-2 gap-4 pt-4 border-t border-gray-100">
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Status</p>
                    <template x-if="item.status === 'published'">
                        <span
                            class="inline-flex items-center gap-1 px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">
                            <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                            Dipublikasikan
                        </span>
                    </template>
                    <template x-if="item.status === 'draft'">
                        <span
                            class="inline-flex items-center gap-1 px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-semibold rounded-full">
                            <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full"></span>
                            Draft
                        </span>
                    </template>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Diterbitkan</p>
                    <p class="text-gray-700 text-sm"
                        x-text="item.published_at ? new Date(item.published_at).toLocaleString('id-ID') : 'Belum diterbitkan'">
                    </p>
                </div>
            </div>

            <template x-if="item.meta_title || item.meta_description">
                <div class="pt-4 border-t border-gray-100">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">SEO Meta Data</p>
                    <div class="space-y-3">
                        <template x-if="item.meta_title">
                            <div>
                                <p class="text-xs text-gray-500 mb-1">Meta Title</p>
                                <p class="text-sm text-gray-700" x-text="item.meta_title"></p>
                            </div>
                        </template>
                        <template x-if="item.meta_description">
                            <div>
                                <p class="text-xs text-gray-500 mb-1">Meta Description</p>
                                <p class="text-sm text-gray-700" x-text="item.meta_description"></p>
                            </div>
                        </template>
                    </div>
                </div>
            </template>
        </div>

        <div class="p-6 bg-gray-50 border-t border-gray-200 flex justify-end">
            <button type="button" @click="open = false"
                class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition-all">
                Tutup
            </button>
        </div>
    </div>
</div>
