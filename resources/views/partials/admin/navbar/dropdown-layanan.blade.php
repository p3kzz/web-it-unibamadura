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
                        d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z">
                    </path>
                </svg>
            </div>
            <span>Layanan</span>
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

        <a href="#"
            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
            <div class="w-1.5 h-1.5 bg-green-400 rounded-full mr-3"></div>
            <span class="text-sm">Katalog Layanan</span>
        </a>

        <a href="#"
            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
            <div class="w-1.5 h-1.5 bg-green-400 rounded-full mr-3"></div>
            <span class="text-sm">Lisensi Software</span>
        </a>

        <a href="#"
            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
            <div class="w-1.5 h-1.5 bg-green-400 rounded-full mr-3"></div>
            <span class="text-sm">Web Hosting</span>
        </a>

        <a href="#"
            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
            <div class="w-1.5 h-1.5 bg-green-400 rounded-full mr-3"></div>
            <span class="text-sm">Email & Akun Uniba</span>
        </a>

        {{-- Network Status (item khusus dengan styling berbeda) --}}
        <a href="#"
            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
            <div class="w-1.5 h-1.5 bg-green-400 rounded-full mr-3 animate-pulse"></div>
            <span class="text-sm font-semibold text-green-300">Network Service Status</span>
        </a>

    </div>
</div>
