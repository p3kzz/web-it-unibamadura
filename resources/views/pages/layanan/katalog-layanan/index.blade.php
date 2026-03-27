@extends('layouts.app')

@section('title', 'Katalog Layanan - UPT TIK UNIBA Madura')

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
                    UPT TIK UNIBA Madura
                </span>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-fade-in-up stagger-1">
                    Katalog Layanan
                </h1>
                <p class="text-lg text-blue-100 animate-fade-in-up stagger-2">
                    Temukan berbagai layanan teknologi informasi dan komunikasi yang tersedia untuk civitas akademika
                    UNIBA Madura
                </p>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg class="relative block w-full h-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="fill-gray-50"></path>
            </svg>
        </div>
    </section>

    @php
        $iconColors = [
            ['bg' => 'bg-blue-100', 'text' => 'text-blue-600', 'border' => 'hover:border-blue-400', 'badge' => 'bg-blue-600'],
            ['bg' => 'bg-green-100', 'text' => 'text-green-600', 'border' => 'hover:border-green-400', 'badge' => 'bg-green-600'],
            ['bg' => 'bg-purple-100', 'text' => 'text-purple-600', 'border' => 'hover:border-purple-400', 'badge' => 'bg-purple-600'],
            ['bg' => 'bg-orange-100', 'text' => 'text-orange-600', 'border' => 'hover:border-orange-400', 'badge' => 'bg-orange-600'],
            ['bg' => 'bg-teal-100', 'text' => 'text-teal-600', 'border' => 'hover:border-teal-400', 'badge' => 'bg-teal-600'],
            ['bg' => 'bg-rose-100', 'text' => 'text-rose-600', 'border' => 'hover:border-rose-400', 'badge' => 'bg-rose-600'],
        ];
    @endphp

    {{-- Layanan Berdasarkan Kategori --}}
    @forelse ($grouped as $catIndex => $kategori)
        @if ($kategori->katalogLayanan->count() > 0)
            @php $color = $iconColors[$catIndex % count($iconColors)]; @endphp
            <section class="py-16 {{ $catIndex % 2 === 0 ? 'bg-gray-50' : 'bg-white' }}">
                <div class="container mx-auto px-4">
                    <div class="mb-10 scroll-animate">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-1 h-8 {{ $color['badge'] }} rounded-full"></div>
                            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">{{ $kategori->nama }}</h2>
                        </div>
                        @if ($kategori->deskripsi)
                            <p class="text-gray-600 ml-4 mt-1">{{ $kategori->deskripsi }}</p>
                        @endif
                        <div class="w-20 h-1 {{ $color['badge'] }} ml-4 mt-3 rounded-full"></div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach ($kategori->katalogLayanan as $index => $layanan)
                            <div class="scroll-animate stagger-{{ ($index % 4) + 1 }}">
                                <div
                                    class="bg-white rounded-2xl shadow-sm border-2 border-gray-100 {{ $color['border'] }} hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 group h-full flex flex-col p-6">
                                    {{-- Icon --}}
                                    <div class="mb-4">
                                        @if ($layanan->icon)
                                            <img src="{{ $layanan->icon_url }}" alt="{{ $layanan->nama }}"
                                                class="w-14 h-14 object-cover rounded-xl border border-gray-200 group-hover:scale-110 transition-transform duration-300">
                                        @else
                                            <div
                                                class="w-14 h-14 {{ $color['bg'] }} {{ $color['text'] }} rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                                <svg class="w-7 h-7" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                                    </path>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Content --}}
                                    <h3
                                        class="text-lg font-bold text-gray-900 mb-2 group-hover:{{ $color['text'] }} transition-colors">
                                        {{ $layanan->nama }}
                                    </h3>

                                    @if ($layanan->deskripsi)
                                        <p class="text-sm text-gray-500 leading-relaxed flex-grow mb-4 line-clamp-3">
                                            {{ strip_tags($layanan->deskripsi) }}
                                        </p>
                                    @else
                                        <div class="flex-grow"></div>
                                    @endif

                                    {{-- CTA --}}
                                    @if ($layanan->link)
                                        <a href="{{ $layanan->link }}" target="_blank"
                                            class="inline-flex items-center gap-2 text-sm font-semibold {{ $color['text'] }} hover:underline mt-auto">
                                            Akses Layanan
                                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    @empty
    @endforelse

    {{-- Layanan Tanpa Kategori --}}
    @if ($layananTanpaKategori->count() > 0)
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="mb-10 scroll-animate">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Layanan Lainnya</h2>
                    <div class="w-20 h-1 bg-uniba-blue rounded-full mt-3"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($layananTanpaKategori as $index => $layanan)
                        @php $color = $iconColors[$index % count($iconColors)]; @endphp
                        <div class="scroll-animate stagger-{{ ($index % 4) + 1 }}">
                            <div
                                class="bg-white rounded-2xl shadow-sm border-2 border-gray-100 {{ $color['border'] }} hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 group h-full flex flex-col p-6">
                                <div class="mb-4">
                                    @if ($layanan->icon)
                                        <img src="{{ $layanan->icon_url }}" alt="{{ $layanan->nama }}"
                                            class="w-14 h-14 object-cover rounded-xl border border-gray-200 group-hover:scale-110 transition-transform duration-300">
                                    @else
                                        <div
                                            class="w-14 h-14 {{ $color['bg'] }} {{ $color['text'] }} rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                                </path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <h3
                                    class="text-lg font-bold text-gray-900 mb-2 group-hover:{{ $color['text'] }} transition-colors">
                                    {{ $layanan->nama }}
                                </h3>
                                @if ($layanan->deskripsi)
                                    <p class="text-sm text-gray-500 leading-relaxed flex-grow mb-4 line-clamp-3">
                                        {{ strip_tags($layanan->deskripsi) }}
                                    </p>
                                @else
                                    <div class="flex-grow"></div>
                                @endif
                                @if ($layanan->link)
                                    <a href="{{ $layanan->link }}" target="_blank"
                                        class="inline-flex items-center gap-2 text-sm font-semibold {{ $color['text'] }} hover:underline mt-auto">
                                        Akses Layanan
                                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Empty State --}}
    @if ($grouped->sum(fn($k) => $k->katalogLayanan->count()) === 0 && $layananTanpaKategori->count() === 0)
        <section class="py-32 bg-gray-50">
            <div class="container mx-auto px-4 text-center max-w-lg">
                <div
                    class="w-32 h-32 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto mb-8 shadow-inner">
                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">Katalog Layanan Segera Hadir</h3>
                <p class="text-gray-500 text-lg leading-relaxed">
                    Layanan TIK sedang dalam proses pendataan dan akan segera tersedia untuk Anda.
                </p>
            </div>
        </section>
    @endif

    {{-- CTA Section --}}
    <section
        class="py-20 bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark relative overflow-hidden scroll-animate">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div
            class="absolute top-10 left-10 w-64 h-64 bg-yellow-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20">
        </div>
        <div
            class="absolute bottom-10 right-10 w-64 h-64 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20">
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6 leading-tight">
                    Butuh Bantuan Teknis?
                </h2>
                <p class="text-blue-100 mb-10 text-lg max-w-2xl mx-auto leading-relaxed">
                    Tim UPT TIK UNIBA Madura siap membantu Anda menemukan dan mengakses layanan yang tepat
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/sop"
                        class="group inline-flex items-center justify-center gap-2 px-8 py-4 bg-uniba-yellow text-uniba-blue font-bold rounded-xl hover:bg-yellow-400 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        Lihat SOP
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </a>
                    <a href="/fasilitas"
                        class="group inline-flex items-center justify-center gap-2 px-8 py-4 bg-white/10 backdrop-blur-sm text-white font-bold rounded-xl border-2 border-white/30 hover:bg-white hover:text-uniba-blue transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                        Fasilitas Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection