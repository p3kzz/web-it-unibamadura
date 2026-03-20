<div x-data="{
    open: false,
    item: {},
}"
    x-on:open-show-unit.window="
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

        {{-- Header --}}
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
                    <h3 class="text-xl font-bold text-white">Detail Unit Organisasi</h3>
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

        {{-- Content --}}
        <div class="flex-1 overflow-y-auto p-6 space-y-5">
            {{-- Nama Unit --}}
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Nama Unit</p>
                <p class="text-gray-900 font-semibold text-lg leading-relaxed" x-text="item.name"></p>
            </div>

            {{-- Info Grid --}}
            <div class="grid grid-cols-2 gap-4">
                {{-- Tipe Unit --}}
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-uniba-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                        <p class="text-xs font-semibold text-gray-500 uppercase">Tipe Unit</p>
                    </div>
                    <template x-if="item.type === 'directorate'">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                            <span class="w-1.5 h-1.5 bg-blue-500 rounded-full mr-1.5"></span>
                            Direktorat
                        </span>
                    </template>
                    <template x-if="item.type === 'subdirectorate'">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-purple-100 text-purple-800">
                            <span class="w-1.5 h-1.5 bg-purple-500 rounded-full mr-1.5"></span>
                            Subdirektorat
                        </span>
                    </template>
                </div>

                {{-- Urutan --}}
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-8 h-8 bg-emerald-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4">
                                </path>
                            </svg>
                        </div>
                        <p class="text-xs font-semibold text-gray-500 uppercase">Urutan</p>
                    </div>
                    <p class="text-sm font-bold text-gray-800" x-text="item.order ?? 0"></p>
                </div>
            </div>

            {{-- Parent Direktorat --}}
            <template x-if="item.parent">
                <div class="bg-gradient-to-r from-purple-50 to-blue-50 rounded-xl p-4 border border-purple-100">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 10l7-7m0 0l7 7m-7-7v18">
                                </path>
                            </svg>
                        </div>
                        <p class="text-xs font-semibold text-gray-500 uppercase">Parent Direktorat</p>
                    </div>
                    <p class="text-sm font-bold text-gray-800" x-text="item.parent?.name"></p>
                </div>
            </template>

            {{-- Deskripsi --}}
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Deskripsi</p>
                <template x-if="item.description">
                    <div class="prose prose-sm max-w-none text-gray-700 leading-relaxed border border-gray-100 rounded-xl p-4 bg-gray-50"
                        x-html="item.description"></div>
                </template>
                <template x-if="!item.description">
                    <p class="text-gray-400 italic text-sm">Tidak ada deskripsi</p>
                </template>
            </div>

            {{-- Subdirektorat (jika ada) --}}
            <template x-if="item.children && item.children.length > 0">
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Subdirektorat</p>
                    <div class="space-y-2">
                        <template x-for="child in item.children" :key="child.id">
                            <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100">
                                <span class="text-gray-300">└</span>
                                <div class="flex-1">
                                    <p class="font-medium text-gray-800 text-sm" x-text="child.name"></p>
                                </div>
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-700">
                                    Sub
                                </span>
                            </div>
                        </template>
                    </div>
                </div>
            </template>

            {{-- Timestamps --}}
            <div class="grid grid-cols-2 gap-4 pt-4 border-t border-gray-100">
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Dibuat</p>
                    <p class="text-gray-700 text-sm"
                        x-text="item.created_at ? new Date(item.created_at).toLocaleString('id-ID') : '-'">
                    </p>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Diperbarui</p>
                    <p class="text-gray-700 text-sm"
                        x-text="item.updated_at ? new Date(item.updated_at).toLocaleString('id-ID') : '-'">
                    </p>
                </div>
            </div>
        </div>

        {{-- Footer --}}
        <div class="p-6 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">
            <button type="button" @click="$dispatch('open-edit-unit', item); open = false;"
                class="px-5 py-2.5 bg-amber-500 text-white font-semibold rounded-xl hover:bg-amber-600 transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
                Edit
            </button>
            <button type="button" @click="open = false"
                class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition-all">
                Tutup
            </button>
        </div>
    </div>
</div>
