@extends('layouts.app')

@section('title', 'Kebijakan & Aturan - UPT TIK UNIBA Madura')

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
                    Regulasi & Panduan
                </span>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-fade-in-up stagger-1">
                    Kebijakan & Aturan
                </h1>
                <p class="text-lg text-blue-100 animate-fade-in-up stagger-2">
                    Panduan dan aturan yang mengatur penggunaan layanan teknologi informasi di lingkungan UNIBA Madura
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
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Keamanan Data</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Menjamin keamanan dan kerahasiaan data institusi serta pengguna
                        </p>
                    </div>

                    {{-- Card 2 --}}
                    <div
                        class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 border border-green-200 hover:shadow-lg transition-shadow">
                        <div class="w-14 h-14 bg-green-500 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Penggunaan Layanan</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Panduan penggunaan layanan TIK yang bertanggung jawab dan efektif
                        </p>
                    </div>

                    {{-- Card 3 --}}
                    <div
                        class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 border border-purple-200 hover:shadow-lg transition-shadow">
                        <div class="w-14 h-14 bg-purple-500 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Kepatuhan Hukum</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Memastikan semua aktivitas sesuai dengan regulasi dan hukum yang berlaku
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Policy Categories Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            @forelse ($policies as $category)
                <div class="mb-12 scroll-animate">
                    

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($policies as $policy)
                            <a href="{{ route('policy.show', $policy->slug) }}"
                                class="group bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-xl hover:border-uniba-blue/30 transition-all duration-300">
                                <div class="flex items-start gap-4">
                                    <div
                                        class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-uniba-blue transition-colors">
                                        <svg class="w-6 h-6 text-uniba-blue group-hover:text-white transition-colors"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4
                                            class="text-lg font-bold text-gray-900 group-hover:text-uniba-blue transition-colors mb-2">
                                            {{ $policy->title }}
                                        </h4>
                                        @if ($policy->excerpt)
                                            <p class="text-gray-600 text-sm line-clamp-2">
                                                {{ $policy->excerpt }}
                                            </p>
                                        @endif
                                        <div class="mt-3 flex items-center text-uniba-blue text-sm font-medium">
                                            <span>Baca Selengkapnya</span>
                                            <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @empty
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-700 mb-2">Belum Ada Kebijakan</h3>
                    <p class="text-gray-500">Kebijakan dan aturan akan segera ditampilkan di sini.</p>
                </div>
            @endforelse
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Ada Pertanyaan Tentang Kebijakan?
                </h2>
                <p class="text-blue-100 text-lg mb-8">
                    Hubungi tim UPT TIK UNIBA Madura untuk mendapatkan informasi lebih lanjut
                </p>
                <a href="mailto:tik@uniba-madura.ac.id"
                    class="inline-flex items-center gap-2 px-8 py-4 bg-white text-uniba-blue font-bold rounded-xl hover:bg-blue-50 transition-colors shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

@endsection
