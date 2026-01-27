<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-12">
            {{-- Berita & Pengumuman --}}
            <div class="lg:w-2/3 scroll-animate" x-data="{ activeTab: 'berita' }">
                <div class="flex justify-between items-center mb-6">
                    <div class="flex space-x-2 bg-white p-1 rounded-lg border shadow-sm">
                        <button @click="activeTab = 'berita'"
                            :class="activeTab === 'berita' ? 'bg-uniba-blue text-white shadow' :
                                'text-gray-500 hover:text-uniba-blue'"
                            class="px-6 py-2 rounded-md font-bold text-sm transition-all duration-300 transform hover:scale-105">
                            <span>Berita</span>
                        </button>
                        <button @click="activeTab = 'pengumuman'"
                            :class="activeTab === 'pengumuman' ? 'bg-uniba-blue text-white shadow' :
                                'text-gray-500 hover:text-uniba-blue'"
                            class="px-6 py-2 rounded-md font-bold text-sm transition-all duration-300 transform hover:scale-105">
                            <span>Pengumuman</span>
                        </button>
                    </div>
                    <a href="#"
                        class="text-uniba-blue text-sm font-semibold hover:underline transform hover:translate-x-1 transition-transform">
                        Arsip &rarr;
                    </a>
                </div>

                {{-- Berita Tab --}}
                <div x-show="activeTab === 'berita'" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
                    @include('partials.home.berita-list')
                </div>

                {{-- Pengumuman Tab --}}
                <div x-show="activeTab === 'pengumuman'" x-cloak x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
                    @include('partials.home.pengumuman-list')
                </div>
            </div>

            {{-- Agenda --}}
            @include('partials.home.agenda')
        </div>
    </div>
</section>
