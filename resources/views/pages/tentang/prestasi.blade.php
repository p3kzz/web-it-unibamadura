@extends('layouts.app')

@section('title', 'Prestasi - UPT TIK UNIBA Madura')

@section('content')

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
                    Prestasi
                </span>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-fade-in-up stagger-1">
                    Prestasi
                </h1>
                <p class="text-lg text-blue-100 animate-fade-in-up stagger-2">
                    Pencapaian dan pengakuan atas dedikasi UPT TIK dalam transformasi digital kampus
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

    {{-- Penghargaan Institusi Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Prestasi Institusi</h2>
                <div class="w-20 h-1 bg-uniba-yellow mx-auto mb-4"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Pengakuan dan apresiasi atas kontribusi UPT TIK dalam pengembangan teknologi informasi
                </p>
            </div>

            <div class="max-w-6xl mx-auto">
                @php
                    $awards = [
                        [
                            'year' => '2025',
                            'title' => 'Best Digital Transformation Initiative',
                            'organization' => 'Kemendikbudristek',
                            'description' =>
                                'Penghargaan untuk implementasi transformasi digital yang komprehensif dan berdampak signifikan terhadap peningkatan kualitas layanan akademik',
                            'icon' =>
                                'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z',
                            'color' => 'red',
                        ],
                        [
                            'year' => '2024',
                            'title' => 'Excellence in IT Service Management',
                            'organization' => 'Aptikom Jawa Timur',
                            'description' =>
                                'Prestasi dalam pengelolaan layanan TI dengan standar tinggi dan orientasi pada kepuasan pengguna',
                            'icon' =>
                                'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                            'color' => 'blue',
                        ],
                        [
                            'year' => '2024',
                            'title' => 'Innovative E-Learning Platform',
                            'organization' => 'FKPTK Indonesia',
                            'description' =>
                                'Pengembangan platform e-learning yang inovatif dengan fitur AI assistant dan analytics dashboard',
                            'icon' =>
                                'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
                            'color' => 'purple',
                        ],
                        [
                            'year' => '2023',
                            'title' => 'Outstanding Data Management System',
                            'organization' => 'Kopertis Wilayah VII',
                            'description' =>
                                'Implementasi sistem manajemen data terpadu (UNIBA Satu Data) dengan tingkat akurasi dan keandalan tinggi',
                            'icon' =>
                                'M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4',
                            'color' => 'green',
                        ],
                        [
                            'year' => '2023',
                            'title' => 'Cybersecurity Best Practice Award',
                            'organization' => 'BSSN',
                            'description' =>
                                'Penerapan standar keamanan siber yang komprehensif dan proaktif dalam melindungi aset digital institusi',
                            'icon' =>
                                'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z',
                            'color' => 'red',
                        ],
                    ];
                @endphp

                <div class="space-y-6">
                    @foreach ($awards as $index => $award)
                        <div class="scroll-animate stagger-{{ ($index % 4) + 1 }}">
                            <div
                                class="bg-white border-2 border-gray-200 rounded-2xl overflow-hidden hover:border-{{ $award['color'] }}-500 hover:shadow-2xl transition-all duration-300 group">
                                <div class="md:flex">
                                    {{-- Left Side - Year & Icon --}}
                                    <div
                                        class="md:w-1/4 bg-gradient-to-br from-{{ $award['color'] }}-400 to-{{ $award['color'] }}-600 p-8 text-white relative overflow-hidden">
                                        <div
                                            class="absolute top-0 right-0 w-32 h-32 bg-white opacity-10 rounded-full -mr-16 -mt-16">
                                        </div>
                                        <div class="relative z-10 text-center">
                                            <div class="text-6xl text-gray-950 font-bold mb-4">{{ $award['year'] }}</div>
                                            <div
                                                class="w-20 h-20 bg-white bg-opacity-20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto group-hover:scale-110 transition-transform duration-300">
                                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="{{ $award['icon'] }}"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Right Side - Content --}}
                                    <div class="md:w-3/4 p-8">
                                        <div class="flex items-start justify-between mb-4">
                                            <div>
                                                <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $award['title'] }}
                                                </h3>
                                                <span
                                                    class="inline-flex items-center gap-2 text-sm text-{{ $award['color'] }}-600 font-semibold">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                                        </path>
                                                    </svg>
                                                    {{ $award['organization'] }}
                                                </span>
                                            </div>
                                            <div class="flex-shrink-0 ml-4">
                                                <span
                                                    class="inline-block w-12 h-12 bg-{{ $award['color'] }}-100 rounded-full flex items-center justify-center">
                                                    <svg class="w-6 h-6 text-{{ $award['color'] }}-600" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>

                                        <p class="text-gray-600 leading-relaxed">
                                            {{ $award['description'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
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
