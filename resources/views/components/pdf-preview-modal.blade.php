{{-- PDF Preview Modal Component --}}
{{-- Usage: Include this component inside a parent with Alpine.js x-data containing showPreview, previewUrl, previewTitle --}}
{{-- Example: x-data="{ showPreview: false, previewUrl: '', previewTitle: '' }" --}}

<div x-show="showPreview" x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm p-4"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    <div @click.away="showPreview = false; previewUrl = ''"
        class="bg-white rounded-2xl w-full max-w-5xl h-[90vh] shadow-2xl overflow-hidden flex flex-col"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

        {{-- Modal Header --}}
        <div class="bg-blue-700 px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm-1 2l5 5h-5V4zm-3 9v6h-2v-4H7v-2h6zm3 0v6h-2v-6h2zm3 0v6h-2v-6h2z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-white line-clamp-1" x-text="previewTitle"></h3>
                    <p class="text-blue-100 text-sm">Preview Dokumen</p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <button @click="showPreview = false; previewUrl = ''"
                    class="text-white hover:bg-white/20 rounded-lg p-2 transition-all duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>

        {{-- PDF Iframe --}}
        <div class="flex-1 bg-gray-100">
            <iframe :src="previewUrl" class="w-full h-full border-0"></iframe>
        </div>
    </div>
</div>
