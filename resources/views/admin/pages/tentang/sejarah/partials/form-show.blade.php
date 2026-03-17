<div x-data="{
    open: false,
    item: {},
}"
    x-on:open-show-histories.window="
        item = $event.detail;
        open = true;
        console.log('Show histories modal opened:', item);
    "
    x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

    <div @click.away="open = false" x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95" @keydown.escape.window="open = false"
        class="bg-white rounded-2xl w-full max-w-3xl shadow-2xl overflow-hidden max-h-[90vh] flex flex-col">

        <div class="bg-blue-700 px-6 py-5 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Detail {{ ucfirst($section) }}</h3>
                    <p class="text-blue-100 text-sm">
                        ID: <span x-text="item.id || '-'"></span>
                    </p>
                </div>
            </div>
            <button @click="open = false"
                class="text-white hover:bg-white/20 rounded-lg p-2 transition-all duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <div class="flex-1 overflow-y-auto">
            <div class="p-6 space-y-6">

                <div class="bg-gradient-to-br from-gray-50 to-slate-50 rounded-xl p-5 border border-blue-100">
                    <div class="flex items-start gap-3">
                        <div
                            class="w-10 h-10 bg-slate-600 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                </path>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs font-bold text-gray-600 uppercase tracking-wider mb-2">Judul</p>
                            <h4 class="text-gray-900 font-bold text-lg leading-relaxed break-words"
                                x-text="item.title || '-'"></h4>
                        </div>
                    </div>
                </div>

                <template x-if="item.sub_title">
                    <div class="bg-gradient-to-br from-gray-50 to-slate-50 rounded-xl p-5 border border-purple-100">
                        <div class="flex items-start gap-3">
                            <div
                                class="w-10 h-10 bg-slate-600 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-bold text-gray-600 uppercase tracking-wider mb-2">Timeline /
                                    Periode</p>
                                <p class="text-gray-900 font-bold text-base" x-text="item.sub_title"></p>
                            </div>
                        </div>
                    </div>
                </template>

                <div class="bg-gradient-to-br from-gray-50 to-slate-50 rounded-xl p-5 border border-gray-200">
                    <div class="flex items-start gap-3">
                        <div
                            class="w-10 h-10 bg-slate-600 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs font-bold text-slate-600 uppercase tracking-wider mb-3">Konten</p>
                            <div class="bg-white rounded-lg p-4 border border-gray-200 shadow-sm">
                                <p class="text-sm text-gray-700 leading-relaxed whitespace-pre-line break-words"
                                    x-text="item.content || 'Tidak ada konten'"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <template x-if="item.extras && (Array.isArray(item.extras) ? item.extras.length > 0 : item.extras)">
                    <div class="bg-gradient-to-br from-gray-50 to-slate-50 rounded-xl p-5 border border-amber-100">
                        <div class="flex items-start gap-3">
                            <div
                                class="w-10 h-10 bg-slate-600 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                    </path>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-bold text-gray-600 uppercase tracking-wider mb-3">Highlight /
                                    Pencapaian</p>
                                <div class="flex flex-wrap gap-2">
                                    <template
                                        x-for="extra in (Array.isArray(item.extras) ? item.extras : [item.extras])"
                                        :key="extra">
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white text-gray-700 text-sm font-semibold rounded-lg border border-amber-200 shadow-sm">
                                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span x-text="extra"></span>
                                        </span>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

                <div class="bg-gradient-to-br from-gray-50 to-slate-50 rounded-xl p-5 border border-green-100">
                    <div class="flex items-start gap-3">
                        <div
                            class="w-10 h-10 bg-slate-600 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs font-bold text-gray-600 uppercase tracking-wider mb-3">Status</p>
                            <template x-if="item.is_active">
                                <span
                                    class="inline-flex items-center gap-2 px-4 py-2 bg-green-100 text-green-700 text-sm font-bold rounded-lg">
                                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                                    Aktif
                                </span>
                            </template>
                            <template x-if="!item.is_active">
                                <span
                                    class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-600 text-sm font-bold rounded-lg">
                                    <span class="w-2 h-2 bg-gray-400 rounded-full"></span>
                                    Nonaktif
                                </span>
                            </template>
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-gray-200">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Informasi Tambahan</p>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gray-50 rounded-lg p-3 border border-gray-100">
                            <p class="text-xs text-gray-500 mb-1">Dibuat</p>
                            <p class="text-sm font-medium text-gray-700"
                                x-text="item.created_at ? new Date(item.created_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' }) : '-'">
                            </p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-3 border border-gray-100">
                            <p class="text-xs text-gray-500 mb-1">Terakhir Diupdate</p>
                            <p class="text-sm font-medium text-gray-700"
                                x-text="item.updated_at ? new Date(item.updated_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' }) : '-'">
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div
            class="p-6 bg-gradient-to-r from-gray-50 to-gray-100 border-t border-gray-200 flex items-center justify-between">
            <div class="text-xs text-gray-500">
                <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Data Sejarah UPT TIK
            </div>
            <div class="flex gap-3">
                <button type="button" @click="open = false"
                    class="px-5 py-2.5 bg-white border-2 border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 hover:border-gray-400 transition-all duration-200">
                    Tutup
                </button>
                <button type="button" @click="$dispatch('open-edit-histories', item); open = false;"
                    class="px-5 py-2.5 bg-orange-600 hover:bg-orange-700 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    Edit Data
                </button>
            </div>
        </div>
    </div>
</div>
