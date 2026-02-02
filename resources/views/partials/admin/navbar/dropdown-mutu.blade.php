<div class="mb-1" x-data="{ open: false }">
        <button @click="open = !open"
            class="w-full px-3 py-2.5 rounded-xl text-sm font-semibold tracking-wider flex items-center justify-between transition-all duration-200"
            :class="open ? 'bg-blue-800 bg-opacity-50 text-white' :
                'text-blue-300 hover:text-white hover:bg-blue-800 hover:bg-opacity-30'">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors duration-200"
                    :class="open ? 'bg-blue-600 bg-opacity-60' : 'bg-white bg-opacity-10'">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <span>
                    Penjaminan Mutu
                </span>
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
                <div class="w-1.5 h-1.5 bg-orange-400 rounded-full mr-3"></div>
                <span class="text-sm">SOP (Standar Operasional)</span>
            </a>

            <a href="#"
                class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                <div class="w-1.5 h-1.5 bg-orange-400 rounded-full mr-3"></div>
                <span class="text-sm">Sistem Dokumentasi</span>
            </a>

            <a href="#"
                class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                <div class="w-1.5 h-1.5 bg-orange-400 rounded-full mr-3"></div>
                <span class="text-sm">Audit Internal</span>
            </a>

            <a href="#"
                class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                <div class="w-1.5 h-1.5 bg-orange-400 rounded-full mr-3"></div>
                <span class="text-sm">Tinjauan Manajemen</span>
            </a>

        </div>
    </div>
