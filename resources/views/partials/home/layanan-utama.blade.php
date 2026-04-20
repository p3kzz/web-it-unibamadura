<section id="layanan" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 scroll-animate">
            <h2 class="text-3xl font-bold text-gray-900">Layanan Utama</h2>
            <div class="w-20 h-1 bg-uniba-yellow mx-auto mt-3"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse ($katalogLayanan as $index => $katalog)
                <a href="{{ route('katalog-layanan.show', $katalog->id) }}"
                    class="bg-white p-6 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 border-t-4 border-transparent hover:border-uniba-yellow group scroll-animate stagger-{{ min($index + 1, 4) }} transform hover:-translate-y-2 flex flex-col items-center text-center">

                    <div
                        class="w-16 h-16 flex items-center justify-center mb-4 bg-blue-100 text-uniba-blue rounded-xl group-hover:bg-uniba-blue group-hover:text-white transition-all duration-300 group-hover:scale-110">
                        @if ($katalog->icon)
                            <img src="{{ asset('storage/' . $katalog->icon) }}" alt="{{ $katalog->nama }}"
                                class="w-8 h-8 object-contain">
                        @else
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        @endif
                    </div>

                    <span
                        class="bg-uniba-blue text-white text-sm font-semibold px-4 py-2 rounded-md group-hover:bg-blue-700 transition-all duration-300">
                        {{ $katalog->nama }}
                    </span>

                </a>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500">Belum ada layanan yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
