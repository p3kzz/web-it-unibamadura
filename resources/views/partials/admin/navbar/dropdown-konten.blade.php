<div class="mb-1" x-data="{ open: false }">
    <button @click="open = !open"
        class="w-full px-3 py-2.5 rounded-xl text-sm font-semibold tracking-wider flex items-center justify-between transition-all duration-200"
        :class="open ? 'bg-blue-800 bg-opacity-50 text-white' :
            'text-blue-300 hover:text-white hover:bg-blue-800 hover:bg-opacity-30'">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors duration-200"
                :class="open ? 'bg-blue-600 bg-opacity-60' : 'bg-white bg-opacity-10'">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                    <path fill-rule="evenodd"
                        d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <span>Konten Umum</span>
        </div>
        <svg class="w-4 h-4 transform transition-transform duration-200" :class="open ? 'rotate-180' : ''"
            fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
            </path>
        </svg>
    </button>

    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
        class="space-y-1">

        <a href="#"
            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
            <div class="w-1.5 h-1.5 bg-yellow-400 rounded-full mr-3"></div>
            <span class="text-sm">Berita & Pengumuman</span>
            <span class="ml-auto bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">3</span>
        </a>

        <a href="#"
            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
            <div class="w-1.5 h-1.5 bg-yellow-400 rounded-full mr-3"></div>
            <span class="text-sm">Agenda Kegiatan</span>
        </a>

    </div>
</div>
