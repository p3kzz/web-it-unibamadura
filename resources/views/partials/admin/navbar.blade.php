<nav class="mt-6 flex-1 px-3 space-y-1 overflow-y-auto pb-4">
    <div class="mb-3">
        <p class="px-4 text-sm font-semibold text-blue-300 tracking-wider mb-3 flex items-center gap-2">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M2 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1H3a1 1 0 01-1-1V4zM8 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1H9a1 1 0 01-1-1V4zM15 3a1 1 0 00-1 1v12a1 1 0 001 1h2a1 1 0 001-1V4a1 1 0 00-1-1h-2z">
                </path>
            </svg>
            Menu Utama
        </p>

        <a href="/dashboard"
            class="group flex items-center px-4 py-3 bg-gradient-to-r from-blue-800 to-blue-700 text-white rounded-xl mb-2 shadow-lg transform hover:scale-105 transition-all duration-200">
            <div
                class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-opacity-30 transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                    </path>
                </svg>
            </div>
            <span class="font-semibold">Dashboard</span>
            <div class="ml-auto w-2 h-2 bg-uniba-yellow rounded-full"></div>
        </a>
        <a href="/admin_tik/periode"
            class="w-full flex items-center text-sm font-semibold px-2.5 py-3 rounded-xl transform text-blue-100 hover:text-white hover:bg-blue-800 hover:bg-opacity-50 transition-all duration-200">
            <div
                class="w-8 h-8 bg-white bg-opacity-20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-opacity-30 transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                    </path>
                </svg>
            </div>
            <span>Periode</span>
            <div class="ml-auto w-2 h-2 bg-white rounded-full"></div>
        </a>
    </div>

    {{-- Tentang Kami --}}
    @include('partials.admin.navbar.dropdown-tentang')

    {{-- Layanan --}}
    @include('partials.admin.navbar.dropdown-layanan')

    {{-- Konten Umum --}}
    @include('partials.admin.navbar.dropdown-konten')

    {{-- Kebijakan --}}
    @include('partials.admin.navbar.dropdown-kebijakan')

    {{-- Penjaminan Mutu --}}
    @include('partials.admin.navbar.dropdown-mutu')

</nav>
