@extends('layouts.app')

@section('title', 'Fasilitas - UPT TIK UNIBA Madura')

@section('content')

    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

        <div
            class="absolute top-20 left-10 w-72 h-72 bg-yellow-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow">
        </div>
        <div class="absolute bottom-20 right-10 w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow"
            style="animation-delay: 1s;"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <span
                    class="inline-block bg-blue-800 text-blue-200 text-xs font-bold px-4 py-2 rounded-full uppercase tracking-wider mb-4 animate-fade-in-up">
                    Tentang Kami
                </span>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-fade-in-up stagger-1">
                    Fasilitas
                </h1>
                <p class="text-lg text-blue-100 animate-fade-in-up stagger-2">
                    Fasilitas pendukung untuk mendukung kegiatan akademik dan operasional TIK
                </p>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg class="relative block w-full h-12" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="fill-gray-50"></path>
            </svg>
        </div>
    </section>

    {{-- Fasilitas Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Fasilitas Kami</h2>
                <div class="w-20 h-1 bg-uniba-yellow mx-auto mb-4"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Berbagai fasilitas modern untuk mendukung layanan teknologi informasi dan komunikasi
                </p>
            </div>

            @if ($fasilitasItems->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
                    @php
                        $colors = ['blue', 'green', 'purple', 'orange', 'teal', 'indigo'];
                    @endphp

                    @foreach ($fasilitasItems as $index => $fasilitas)
                        @php
                            $color = $colors[$index % count($colors)];
                            $allImages = $fasilitas->all_images;
                            $hasMultipleImages = count($allImages) > 1;
                        @endphp
                        <div class="scroll-animate stagger-{{ ($index % 4) + 1 }}">
                            <div
                                class="bg-white rounded-2xl shadow-lg overflow-hidden border-2 border-gray-100 hover:border-{{ $color }}-500 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group h-full flex flex-col">
                                {{-- Image/Gallery Section --}}
                                @if ($hasMultipleImages)
                                    {{-- Splide Slider for Multiple Images --}}
                                    <div class="splide fasilitas-slider"
                                        data-splide='{"type":"loop","perPage":1,"arrows":true,"pagination":true}'>
                                        <div class="splide__track">
                                            <ul class="splide__list">
                                                @foreach ($allImages as $img)
                                                    <li class="splide__slide">
                                                        <a href="{{ $img['url'] }}" class="glightbox"
                                                            data-gallery="gallery-{{ $fasilitas->id }}">
                                                            <div class="relative h-56 overflow-hidden">
                                                                <img src="{{ $img['url'] }}" alt="{{ $fasilitas->nama }}"
                                                                    class="w-full h-full object-cover">
                                                                <div
                                                                    class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent">
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="px-6 pt-4">
                                        <h3 class="text-gray-900 font-bold text-xl">{{ $fasilitas->nama }}</h3>
                                    </div>
                                @elseif ($fasilitas->image)
                                    {{-- Single Image with Lightbox --}}
                                    <a href="{{ $fasilitas->image_url }}" class="glightbox"
                                        data-gallery="single-{{ $fasilitas->id }}">
                                        <div class="relative h-56 overflow-hidden">
                                            <img src="{{ $fasilitas->image_url }}" alt="{{ $fasilitas->nama }}"
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent">
                                            </div>
                                            <div class="absolute bottom-0 left-0 right-0 p-6">
                                                <h3 class="text-white font-bold text-xl">{{ $fasilitas->nama }}</h3>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <div
                                        class="relative h-56 bg-gradient-to-br from-{{ $color }}-500 to-{{ $color }}-700 flex items-center justify-center">
                                        <div
                                            class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
                                        </div>
                                        <svg class="w-20 h-20 text-white/30" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                            </path>
                                        </svg>
                                        <div class="absolute bottom-0 left-0 right-0 p-6">
                                            <h3 class="text-white font-bold text-xl">{{ $fasilitas->nama }}</h3>
                                        </div>
                                    </div>
                                @endif

                                {{-- Content --}}
                                <div class="p-6 flex-grow flex flex-col">
                                    <div class="prose prose-sm max-w-none text-gray-600 flex-grow">
                                        {!! $fasilitas->deskripsi !!}
                                    </div>
                                    @if (count($allImages) > 1)
                                        <div class="mt-4 flex items-center text-sm text-gray-500">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                            {{ count($allImages) }} foto
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                {{-- Empty State --}}
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Belum Ada Data Fasilitas</h3>
                    <p class="text-gray-500 max-w-md mx-auto">
                        Data fasilitas belum tersedia untuk ditampilkan saat ini.
                    </p>
                </div>
            @endif
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-16 bg-gradient-to-r from-uniba-blue to-blue-800 scroll-animate">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-white mb-4">
                    Mari Bergabung dalam Transformasi Digital
                </h2>
                <p class="text-blue-100 mb-8 text-lg">
                    Bersama mewujudkan UNIBA Madura sebagai kampus digital yang unggul dan berdaya saing
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/program-kerja"
                        class="px-8 py-3 bg-uniba-yellow text-uniba-blue font-bold rounded-lg hover:bg-yellow-400 transition shadow-lg transform hover:-translate-y-1">
                        Lihat Program Kerja
                    </a>
                    <a href="#"
                        class="px-8 py-3 bg-white text-uniba-blue font-bold rounded-lg hover:bg-gray-100 transition shadow-lg transform hover:-translate-y-1">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize all Splide sliders
            document.querySelectorAll('.fasilitas-slider').forEach(function(el) {
                new Splide(el, {
                    type: 'loop',
                    perPage: 1,
                    arrows: true,
                    pagination: true,
                }).mount();
            });

            // Initialize GLightbox
            GLightbox({
                touchNavigation: true,
                loop: true,
                autoplayVideos: false
            });
        });
    </script>
@endpush
