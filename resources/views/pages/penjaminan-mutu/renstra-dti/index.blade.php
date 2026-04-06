@extends('layouts.app')

@section('title', 'Renstra DTI - UPT TIK UNIBA Madura')

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
                    Penjaminan Mutu
                </span>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-fade-in-up stagger-1">
                    Rencana Strategis DTI
                </h1>
                <p class="text-lg text-blue-100 animate-fade-in-up stagger-2">
                    Dokumen rencana strategis Divisi Teknologi Informasi UPT TIK UNIBA Madura
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

    {{-- Info Section --}}
    <section class="py-16 bg-gray-50 scroll-animate">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">
                <div class="grid md:grid-cols-3 gap-6">
                    {{-- Card 1 --}}
                    <div
                        class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 border border-blue-200 hover:shadow-lg transition-shadow">
                        <div class="w-14 h-14 bg-blue-500 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Visi & Misi</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Arah pengembangan teknologi informasi yang selaras dengan visi universitas
                        </p>
                    </div>

                    {{-- Card 2 --}}
                    <div
                        class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 border border-green-200 hover:shadow-lg transition-shadow">
                        <div class="w-14 h-14 bg-green-500 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Target Strategis</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Sasaran terukur untuk pengembangan infrastruktur dan layanan TIK
                        </p>
                    </div>

                    {{-- Card 3 --}}
                    <div
                        class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 border border-purple-200 hover:shadow-lg transition-shadow">
                        <div class="w-14 h-14 bg-purple-500 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Program Kerja</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Rencana aksi dan program prioritas untuk mencapai tujuan strategis
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Renstra Documents Section --}}
    <section class="py-20 bg-white" x-data="{ showPreview: false, previewUrl: '', previewTitle: '' }">
        <div class="container mx-auto px-4">
            <div class="text-center mb-14 scroll-animate">
                <span
                    class="inline-block bg-red-100 text-red-600 text-xs font-bold px-4 py-2 rounded-full uppercase tracking-wider mb-4">
                    Download Dokumen
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Dokumen Renstra DTI</h2>
                <div class="w-24 h-1.5 bg-gradient-to-r from-red-500 to-red-600 mx-auto rounded-full mb-4"></div>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    Akses dan unduh dokumen Rencana Strategis Divisi Teknologi Informasi
                </p>
            </div>

            @if ($restraItems->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
                    @php
                        $colors = [
                            [
                                'from' => 'from-red-500',
                                'to' => 'to-red-700',
                                'bg' => 'bg-red-50',
                                'text' => 'text-red-600',
                                'hover' => 'hover:bg-red-100',
                                'border' => 'hover:border-red-500',
                            ],
                            [
                                'from' => 'from-blue-500',
                                'to' => 'to-blue-700',
                                'bg' => 'bg-blue-50',
                                'text' => 'text-blue-600',
                                'hover' => 'hover:bg-blue-100',
                                'border' => 'hover:border-blue-500',
                            ],
                            [
                                'from' => 'from-green-500',
                                'to' => 'to-green-700',
                                'bg' => 'bg-green-50',
                                'text' => 'text-green-600',
                                'hover' => 'hover:bg-green-100',
                                'border' => 'hover:border-green-500',
                            ],
                            [
                                'from' => 'from-purple-500',
                                'to' => 'to-purple-700',
                                'bg' => 'bg-purple-50',
                                'text' => 'text-purple-600',
                                'hover' => 'hover:bg-purple-100',
                                'border' => 'hover:border-purple-500',
                            ],
                            [
                                'from' => 'from-orange-500',
                                'to' => 'to-orange-700',
                                'bg' => 'bg-orange-50',
                                'text' => 'text-orange-600',
                                'hover' => 'hover:bg-orange-100',
                                'border' => 'hover:border-orange-500',
                            ],
                            [
                                'from' => 'from-teal-500',
                                'to' => 'to-teal-700',
                                'bg' => 'bg-teal-50',
                                'text' => 'text-teal-600',
                                'hover' => 'hover:bg-teal-100',
                                'border' => 'hover:border-teal-500',
                            ],
                        ];
                    @endphp

                    @foreach ($restraItems as $index => $renstra)
                        @php
                            $color = $colors[$index % count($colors)];
                        @endphp
                        <div class="scroll-animate stagger-{{ ($index % 4) + 1 }}">
                            <div
                                class="bg-white rounded-2xl shadow-lg overflow-hidden border-2 border-gray-100 {{ $color['border'] }} hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group h-full flex flex-col">
                                {{-- Header --}}
                                <div
                                    class="relative h-36 bg-gradient-to-br {{ $color['from'] }} {{ $color['to'] }} flex items-center justify-center overflow-hidden">
                                    <div
                                        class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
                                    </div>

                                    {{-- Decorative Circles --}}
                                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-white/10 rounded-full"></div>
                                    <div class="absolute -bottom-10 -left-10 w-24 h-24 bg-white/10 rounded-full"></div>

                                    <div class="relative z-10 text-center">
                                        <div
                                            class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-lg">
                                            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm-1 2l5 5h-5V4zm-3 9v6h-2v-4H7v-2h6zm3 0v6h-2v-6h2zm3 0v6h-2v-6h2z" />
                                            </svg>
                                        </div>
                                    </div>

                                    {{-- PDF Badge --}}
                                    <div
                                        class="absolute top-3 right-3 bg-white/20 backdrop-blur-sm text-white text-xs font-bold px-3 py-1 rounded-full">
                                        PDF
                                    </div>
                                </div>

                                {{-- Content --}}
                                <div class="p-6 flex-grow flex flex-col">
                                    <h3
                                        class="text-xl font-bold text-gray-900 mb-3 group-hover:{{ $color['text'] }} transition-colors line-clamp-2">
                                        {{ $renstra->judul }}
                                    </h3>

                                    @if ($renstra->deskripsi)
                                        <div class="text-gray-600 flex-grow mb-5 line-clamp-3 leading-relaxed">
                                            {!! Str::limit(strip_tags($renstra->deskripsi), 120) !!}
                                        </div>
                                    @else
                                        <p class="text-gray-400 italic text-sm flex-grow mb-5">Tidak ada deskripsi tersedia
                                        </p>
                                    @endif

                                    {{-- Action Buttons --}}
                                    <div class="flex gap-3">
                                        <a href="{{ asset('storage/' . $renstra->file) }}" download
                                            class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 {{ $color['bg'] }} {{ $color['text'] }} font-semibold rounded-xl {{ $color['hover'] }} transition-all duration-200 group/btn">
                                            <svg class="w-5 h-5 group-hover/btn:-translate-y-1 transition-transform"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
                                                </path>
                                            </svg>
                                            Download
                                        </a>
                                        <button type="button"
                                            @click="showPreview = true; previewUrl = '{{ asset('storage/' . $renstra->file) }}'; previewTitle = '{{ $renstra->judul }}'"
                                            class="inline-flex items-center justify-center px-4 py-3 bg-gray-100 text-gray-600 font-semibold rounded-xl hover:bg-gray-200 transition-colors duration-200 cursor-pointer"
                                            title="Lihat Dokumen">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- PDF Preview Modal --}}
                <x-pdf-preview-modal />
            @else
                {{-- Empty State --}}
                <div class="text-center py-20 max-w-lg mx-auto">
                    <div
                        class="w-32 h-32 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto mb-8 shadow-inner">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">Belum Ada Dokumen Renstra DTI</h3>
                    <p class="text-gray-500 text-lg leading-relaxed">
                        Dokumen Rencana Strategis DTI sedang dalam proses penyusunan dan akan segera tersedia.
                    </p>
                </div>
            @endif
        </div>
    </section>

    {{-- CTA Section --}}
    <section
        class="py-20 bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark relative overflow-hidden scroll-animate">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

        {{-- Decorative Elements --}}
        <div
            class="absolute top-10 left-10 w-64 h-64 bg-yellow-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20">
        </div>
        <div
            class="absolute bottom-10 right-10 w-64 h-64 bg-red-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20">
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <div
                    class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm text-white text-sm font-medium px-4 py-2 rounded-full mb-6">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    Ada Pertanyaan?
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6 leading-tight">
                    Butuh Informasi Lebih Lanjut?
                </h2>
                <p class="text-blue-100 mb-10 text-lg max-w-2xl mx-auto leading-relaxed">
                    Jika Anda memiliki pertanyaan terkait Rencana Strategis DTI atau membutuhkan informasi lebih detail, tim
                    kami siap membantu Anda
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/fasilitas"
                        class="group inline-flex items-center justify-center gap-2 px-8 py-4 bg-uniba-yellow text-uniba-blue font-bold rounded-xl hover:bg-yellow-400 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                        Lihat Fasilitas
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </a>
                    <a href="#"
                        class="group inline-flex items-center justify-center gap-2 px-8 py-4 bg-white/10 backdrop-blur-sm text-white font-bold rounded-xl border-2 border-white/30 hover:bg-white hover:text-uniba-blue transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
