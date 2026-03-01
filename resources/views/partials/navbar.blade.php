<nav class="bg-white shadow-md sticky top-0 z-50 animate-fade-in-down">
    <div class="container mx-auto px-6 ">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <a href="/" class="flex items-center gap-3 group">
                    <img src="{{ asset('images/logo/logo.webp') }}" alt="UNIBA Madura"
                        class="w-10 h-10 bg-uniba-blue rounded-full flex items-center justify-center text-white font-bold text-xl transform group-hover:rotate-12 transition-transform duration-300">
                    <div class="leading-tight">
                        <h1 class="text-xl font-bold text-uniba-blue group-hover:text-blue-700 transition-colors">IT
                            UNIBA</h1>
                        <span class="text-xs text-gray-500 tracking-widest">MADURA</span>
                    </div>
                </a>
            </div>

            <div class="hidden xl:flex items-center space-x-6 text-sm font-medium">
                <a href="/" class="text-uniba-blue font-bold hover:scale-105 transition-transform">Beranda</a>

                @include('partials.navbar.dropdown-tentang')
                @include('partials.navbar.dropdown-layanan')
                @include('partials.navbar.dropdown-mutu')
                @include('partials.navbar.dropdown-kebijakan')
                @include('partials.navbar.dropdown-content')
                {{-- <a href="#"
                    class="text-gray-600 hover:text-uniba-blue hover:scale-105 transition-all">Download</a> --}}
                <a href="#"
                    class="text-gray-600 hover:text-uniba-blue hover:scale-105 transition-all">Fasilitas</a>

                <a href="#"
                    class="px-5 py-2.5 bg-uniba-blue text-white rounded-lg hover:bg-blue-800 transition shadow-lg flex items-center gap-2 hover:shadow-xl hover:scale-105 transform">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                        </path>
                    </svg>
                    Kontak Kami
                </a>
            </div>

            <div class="xl:hidden flex items-center">
                <button @click="mobileOpen = !mobileOpen"
                    class="text-gray-600 focus:outline-none p-2 border rounded hover:bg-gray-100 transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    @include('partials.navbar.mobile-menu')
</nav>
