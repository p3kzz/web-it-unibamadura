<div x-data="{
    open: false,
    item: {
        title: '',
        subtitle: '',
        description: '',
        key_components: [],
        is_active: false,
        periode: null
    }
}" x-on:open-show-pilar.window="
        open = true;
        item = $event.detail
    "
    x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div @click.away="open = false" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="bg-white rounded-2xl w-full max-w-2xl shadow-2xl overflow-hidden max-h-[90vh] overflow-y-auto">

        <div class="bg-uniba-blue px-6 py-4 flex items-center justify-between sticky top-0">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Detail Pilar Transformasi</h3>
                    <p class="text-blue-100 text-sm">Informasi lengkap pilar transformasi</p>
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
            <div class="flex items-center justify-between">
                <div>
                    <h4 class="text-xl font-bold text-gray-900" x-text="item.title"></h4>
                    <template x-if="item.subtitle">
                        <p class="text-gray-500 mt-1" x-text="item.subtitle"></p>
                    </template>
                </div>
                <template x-if="item.is_active">
                    <span
                        class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-green-100 text-green-700 text-xs font-semibold rounded-full">
                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                        Aktif
                    </span>
                </template>
                <template x-if="!item.is_active">
                    <span
                        class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gray-100 text-gray-600 text-xs font-semibold rounded-full">
                        <span class="w-1.5 h-1.5 bg-gray-400 rounded-full"></span>
                        Nonaktif
                    </span>
                </template>
            </div>

            <div class="bg-gray-50 rounded-xl p-4">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-2">Periode</p>
                <template x-if="item.periode">
                    <div>
                        <p class="font-semibold text-gray-900" x-text="item.periode.name"></p>
                        <p class="text-sm text-gray-500"
                            x-text="item.periode.start_year + ' - ' + item.periode.end_year"></p>
                    </div>
                </template>
                <template x-if="!item.periode">
                    <p class="text-gray-500">-</p>
                </template>
            </div>

            <template x-if="item.description">
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-2">Deskripsi</p>
                    <p class="text-gray-700 leading-relaxed whitespace-pre-line" x-text="item.description"></p>
                </div>
            </template>

            <template x-if="item.key_components && item.key_components.length > 0">
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-2">Komponen Utama</p>
                    <ul class="space-y-2">
                        <template x-for="(component, index) in item.key_components" :key="index">
                            <li class="flex items-start gap-2">
                                <span
                                    class="inline-flex items-center justify-center w-6 h-6 bg-uniba-blue text-white text-xs font-semibold rounded-full flex-shrink-0"
                                    x-text="index + 1"></span>
                                <span class="text-gray-700" x-text="component"></span>
                            </li>
                        </template>
                    </ul>
                </div>
            </template>
        </div>

        <div class="px-6 pb-6">
            <button @click="open = false"
                class="w-full px-6 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-lg transition-all duration-200 flex items-center justify-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
                Tutup
            </button>
        </div>
    </div>
</div>
