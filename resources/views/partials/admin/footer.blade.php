<div class="border-t border-blue-800 bg-gradient-to-r from-blue-900 to-uniba-dark" x-data="{ settingsOpen: false }">

    {{-- Pengaturan Toggle --}}
    <button @click="settingsOpen = !settingsOpen"
        class="w-full flex items-center justify-between px-4 py-3 text-blue-200 hover:text-white hover:bg-blue-800 hover:bg-opacity-40 transition-all duration-200">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-white bg-opacity-10 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <span class="text-sm font-semibold">Pengaturan</span>
        </div>
        <svg class="w-4 h-4 transform transition-transform duration-200" :class="settingsOpen ? 'rotate-180' : ''"
            fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
            </path>
        </svg>
    </button>

    {{-- Sub-menu Pengaturan --}}
    <div x-show="settingsOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
        class="px-3 pb-2 space-y-1">

        <a href="# route('admin.manajemen-user') }}"
            class="flex items-center px-4 py-2 text-blue-200 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
            <div class="w-1.5 h-1.5 bg-red-400 rounded-full mr-3"></div>
            <span class="text-sm">Manajemen User</span>
        </a>

        {{-- <a href="# route('admin.konfigurasi-website') }}"
            class="flex items-center px-4 py-2 text-blue-200 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
            <div class="w-1.5 h-1.5 bg-red-400 rounded-full mr-3"></div>
            <span class="text-sm">Konfigurasi Website</span>
        </a> --}}

    </div>

    {{-- Divider --}}
    <div class="mx-4 border-t border-blue-800"></div>

    {{-- Logout Button --}}
    <div class="p-3">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full flex items-center px-4 py-2.5 text-sm text-white bg-red-600 hover:bg-red-700 rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                </svg>
                <span class="font-semibold">Keluar / Logout</span>
            </button>
        </form>
    </div>
</div>
