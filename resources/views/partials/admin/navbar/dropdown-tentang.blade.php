<div class="mb-1" x-data="{ open: false }">
    <button @click="open = !open"
        class="w-full px-3 py-2.5 rounded-xl text-sm font-semibold tracking-wider flex items-center justify-between transition-all duration-200"
        :class="open ? 'bg-blue-800 bg-opacity-50 text-white' :
            'text-blue-300 hover:text-white hover:bg-blue-800 hover:bg-opacity-30'">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors duration-200"
                :class="open ? 'bg-blue-600 bg-opacity-60' : 'bg-white bg-opacity-10'">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z">
                    </path>
                </svg>
            </div>
            <span>Tentang Kami</span>
        </div>
        <svg class="w-4 h-4 transform transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
            </path>
        </svg>
    </button>

    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
        class="space-y-1">

        <a href="/admin/visi-misi"
            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
            <div class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></div>
            <span class="text-sm">Visi & Misi</span>
        </a>

        <a href="#"
            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
            <div class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></div>
            <span class="text-sm">Sejarah TIK</span>
        </a>

        <a href="#"
            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
            <div class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></div>
            <span class="text-sm">Struktur Organisasi</span>
        </a>

        <a href="#"
            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
            <div class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></div>
            <span class="text-sm">Sumber Daya Manusia</span>
        </a>

        <a href="#"
            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
            <div class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></div>
            <span class="text-sm">Program Kerja</span>
        </a>

        <a href="#"
            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
            <div class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></div>
            <span class="text-sm">Prestasi</span>
        </a>

    </div>
</div>
