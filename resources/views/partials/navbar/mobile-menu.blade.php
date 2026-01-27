<div x-show="mobileOpen" x-cloak x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
    class="xl:hidden bg-white border-t h-[calc(100vh-80px)] overflow-y-auto pb-20 shadow-inner">

    <div class="px-4 py-4 space-y-1">
        <a href="#" class="block px-3 py-3 font-bold text-uniba-blue bg-blue-50 rounded">Beranda</a>

        {{-- Tentang Kami --}}
        <div x-data="{ open: false }" class="border-b border-gray-100">
            <button @click="open = !open" class="w-full flex justify-between items-center px-3 py-3 text-gray-600 hover:text-uniba-blue transition-colors">
                <span class="font-medium">Tentang Kami</span>
                <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-show="open" class="bg-gray-50 pl-6 pr-2 py-2 space-y-2 rounded-md mb-2">
                <a href="#" class="block text-sm text-gray-600 py-1">Visi & Misi</a>
                <a href="#" class="block text-sm text-gray-600 py-1">Sejarah TIK</a>
                <a href="#" class="block text-sm text-gray-600 py-1">Struktur Organisasi</a>
                <a href="#" class="block text-sm text-gray-600 py-1">Program Kerja</a>
            </div>
        </div>

        {{-- Layanan --}}
        <div x-data="{ open: false }" class="border-b border-gray-100">
            <button @click="open = !open" class="w-full flex justify-between items-center px-3 py-3 text-gray-600 hover:text-uniba-blue transition-colors">
                <span class="font-medium">Layanan</span>
                <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-show="open" class="bg-gray-50 pl-6 pr-2 py-2 space-y-2 rounded-md mb-2">
                <a href="#" class="block text-sm text-gray-600 py-1">Katalog Layanan</a>
                <a href="#" class="block text-sm text-gray-600 py-1">Web Hosting</a>
                <a href="#" class="block text-sm text-gray-600 py-1">Email Kampus</a>
                <a href="#" class="block text-sm text-green-600 font-bold py-1">Network Status</a>
            </div>
        </div>

        {{-- Penjaminan Mutu --}}
        <div x-data="{ open: false }" class="border-b border-gray-100">
            <button @click="open = !open" class="w-full flex justify-between items-center px-3 py-3 text-gray-600 hover:text-uniba-blue transition-colors">
                <span class="font-medium">Penjaminan Mutu</span>
                <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-show="open" class="bg-gray-50 pl-6 pr-2 py-2 space-y-2 rounded-md mb-2">
                <a href="#" class="block text-sm text-gray-600 py-1">SOP</a>
                <a href="#" class="block text-sm text-gray-600 py-1">Audit Internal</a>
            </div>
        </div>

        {{-- Kebijakan --}}
        <div x-data="{ open: false }" class="border-b border-gray-100">
            <button @click="open = !open" class="w-full flex justify-between items-center px-3 py-3 text-gray-600 hover:text-uniba-blue transition-colors">
                <span class="font-medium">Kebijakan</span>
                <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-show="open" class="bg-gray-50 pl-6 pr-2 py-2 space-y-2 rounded-md mb-2">
                <a href="#" class="block text-sm text-gray-600 py-1">Aturan Koneksi</a>
                <a href="#" class="block text-sm text-gray-600 py-1">Hak Cipta</a>
                <a href="#" class="block text-sm text-gray-600 py-1">Kebijakan Privasi</a>
            </div>
        </div>

        <a href="#" class="block px-3 py-3 text-gray-600 border-b border-gray-100">Download</a>
        <a href="#" class="block px-3 py-3 text-gray-600 border-b border-gray-100">Fasilitas</a>

        <a href="#" class="block px-3 py-3 text-white bg-uniba-blue rounded mt-4 text-center font-bold">Kontak Kami</a>
    </div>
</div>
