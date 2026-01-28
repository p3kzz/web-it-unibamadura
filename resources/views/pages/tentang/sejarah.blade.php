@extends('layouts.app')

@section('title', 'Sejarah - UPT TIK UNIBA Madura')

@section('content')

    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

        {{-- Animated Background Elements --}}
        <div
            class="absolute top-20 left-10 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow">
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
                    Sejarah UPT TIK
                </h1>
                <p class="text-lg text-blue-100 animate-fade-in-up stagger-2">
                    Perjalanan transformasi digital UNIBA Madura dari masa ke masa
                </p>
            </div>
        </div>

        {{-- Decorative Wave --}}
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg class="relative block w-full h-12" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="fill-gray-50"></path>
            </svg>
        </div>
    </section>

    {{-- Introduction Section --}}
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="scroll-animate bg-white rounded-2xl shadow-xl p-8 md:p-12 border-t-4 border-uniba-yellow">
                    <div class="flex items-start gap-6">
                        <div class="hidden md:block flex-shrink-0">
                            <div
                                class="w-20 h-20 bg-gradient-to-br from-uniba-blue to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
                                Awal Mula Transformasi Digital
                            </h2>
                            <p class="text-gray-600 leading-relaxed mb-4">
                                Unit Pelaksana Teknis Teknologi Informasi dan Komunikasi (UPT TIK) Universitas Bahaudin
                                Mudhary Madura merupakan unit yang berperan vital dalam mendukung transformasi digital
                                kampus. Perjalanan panjang UPT TIK dimulai dari kesadaran akan pentingnya teknologi
                                informasi dalam meningkatkan kualitas layanan akademik dan administratif.
                            </p>
                            <p class="text-gray-600 leading-relaxed">
                                Seiring dengan perkembangan zaman dan tuntutan modernisasi pendidikan tinggi, UPT TIK terus
                                berkembang dan berinovasi untuk memberikan layanan terbaik bagi civitas akademika UNIBA
                                Madura.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Timeline Section --}}
    <section class="py-20 bg-white relative overflow-hidden">
        {{-- Background Decoration --}}
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-50 rounded-full filter blur-3xl opacity-50"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-purple-50 rounded-full filter blur-3xl opacity-50"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16 scroll-animate">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Tonggak Perjalanan</h2>
                <div class="w-20 h-1 bg-uniba-yellow mx-auto mb-4"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Pencapaian dan perkembangan UPT TIK dari masa ke masa
                </p>
            </div>

            <div class="max-w-5xl mx-auto">
                @php
                    $timeline = [
                        [
                            'year' => '2000-2005',
                            'title' => 'Era Awal Digitalisasi',
                            'description' =>
                                'Dimulainya penggunaan komputer untuk administrasi dan perkuliahan. Pembentukan tim IT pertama untuk mengelola infrastruktur dasar teknologi informasi di kampus.',
                            'icon' =>
                                'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                            'color' => 'blue',
                            'highlights' => ['Komputer Lab pertama', 'Website pertama', 'Email kampus'],
                        ],
                        [
                            'year' => '2006-2010',
                            'title' => 'Pembangunan Infrastruktur',
                            'description' =>
                                'Pengembangan jaringan internet kampus dan pembangunan server center. Implementasi sistem informasi akademik pertama untuk mendukung proses belajar mengajar.',
                            'icon' =>
                                'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01',
                            'color' => 'green',
                            'highlights' => ['Server Center', 'Jaringan Fiber Optic', 'SIAKAD v1.0'],
                        ],
                        [
                            'year' => '2011-2015',
                            'title' => 'Ekspansi Layanan Digital',
                            'description' =>
                                'Peluncuran e-learning platform dan digitalisasi perpustakaan. Peningkatan bandwidth internet dan implementasi sistem informasi manajemen terintegrasi.',
                            'icon' =>
                                'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                            'color' => 'purple',
                            'highlights' => ['E-Learning Launch', 'Digital Library', 'Hotspot Area'],
                        ],
                        [
                            'year' => '2016-2020',
                            'title' => 'Transformasi Digital',
                            'description' =>
                                'Pembentukan resmi UPT TIK sebagai unit mandiri. Implementasi cloud computing, mobile apps, dan integrasi sistem berbasis API untuk meningkatkan efisiensi operasional.',
                            'icon' =>
                                'M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z',
                            'color' => 'orange',
                            'highlights' => ['UPT TIK Resmi', 'Cloud Infrastructure', 'Mobile Apps'],
                        ],
                        [
                            'year' => '2021-Sekarang',
                            'title' => 'Era Digital Modern',
                            'description' =>
                                'Implementasi UNIBA Satu Data, Google Workspace for Education, dan sistem keamanan cyber. Pengembangan berkelanjutan menuju smart campus dengan teknologi AI dan IoT.',
                            'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                            'color' => 'red',
                            'highlights' => ['UNIBA Satu Data', 'Google Workspace', 'Smart Campus'],
                        ],
                    ];
                @endphp

                {{-- Timeline Items --}}
                <div class="relative">
                    {{-- Vertical Line --}}
                    <div
                        class="hidden md:block absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-gradient-to-b from-blue-200 via-purple-200 to-red-200">
                    </div>

                    @foreach ($timeline as $index => $item)
                        <div class="scroll-animate mb-12 md:mb-20 stagger-{{ ($index % 4) + 1 }}">
                            <div class="flex flex-col md:flex-row items-center gap-8 relative">
                                {{-- Left Side (Desktop) --}}
                                @if ($index % 2 == 0)
                                    <div class="md:w-1/2 md:text-right">
                                        <div
                                            class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-6 md:p-8 border-l-4 md:border-l-0 md:border-r-4 border-{{ $item['color'] }}-500 transform hover:-translate-y-1">
                                            <span
                                                class="inline-block bg-{{ $item['color'] }}-100 text-{{ $item['color'] }}-600 text-sm font-bold px-4 py-1 rounded-full mb-3">
                                                {{ $item['year'] }}
                                            </span>
                                            <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-3">
                                                {{ $item['title'] }}
                                            </h3>
                                            <p class="text-gray-600 leading-relaxed mb-4">
                                                {{ $item['description'] }}
                                            </p>
                                            <div class="flex flex-wrap gap-2 md:justify-end">
                                                @foreach ($item['highlights'] as $highlight)
                                                    <span
                                                        class="inline-flex items-center gap-1 text-xs bg-{{ $item['color'] }}-50 text-{{ $item['color'] }}-700 px-3 py-1 rounded-full font-medium">
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        {{ $highlight }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Center Icon --}}
                                    <div class="flex-shrink-0 relative z-10">
                                        <div
                                            class="w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-{{ $item['color'] }}-400 to-{{ $item['color'] }}-600 rounded-full flex items-center justify-center shadow-xl border-4 border-white transform hover:scale-110 transition-transform duration-300">
                                            <svg class="w-8 h-8 md:w-10 md:h-10 text-white" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="{{ $item['icon'] }}"></path>
                                            </svg>
                                        </div>
                                    </div>

                                    {{-- Right Side (Desktop) / Empty Space --}}
                                    <div class="md:w-1/2"></div>
                                @else
                                    {{-- Empty Space (Desktop) --}}
                                    <div class="md:w-1/2"></div>

                                    {{-- Center Icon --}}
                                    <div class="flex-shrink-0 relative z-10 md:order-2">
                                        <div
                                            class="w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-{{ $item['color'] }}-400 to-{{ $item['color'] }}-600 rounded-full flex items-center justify-center shadow-xl border-4 border-white transform hover:scale-110 transition-transform duration-300">
                                            <svg class="w-8 h-8 md:w-10 md:h-10 text-white" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="{{ $item['icon'] }}"></path>
                                            </svg>
                                        </div>
                                    </div>

                                    {{-- Right Side Content (Desktop) --}}
                                    <div class="md:w-1/2 md:order-3">
                                        <div
                                            class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-6 md:p-8 border-l-4 border-{{ $item['color'] }}-500 transform hover:-translate-y-1">
                                            <span
                                                class="inline-block bg-{{ $item['color'] }}-100 text-{{ $item['color'] }}-600 text-sm font-bold px-4 py-1 rounded-full mb-3">
                                                {{ $item['year'] }}
                                            </span>
                                            <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-3">
                                                {{ $item['title'] }}
                                            </h3>
                                            <p class="text-gray-600 leading-relaxed mb-4">
                                                {{ $item['description'] }}
                                            </p>
                                            <div class="flex flex-wrap gap-2">
                                                @foreach ($item['highlights'] as $highlight)
                                                    <span
                                                        class="inline-flex items-center gap-1 text-xs bg-{{ $item['color'] }}-50 text-{{ $item['color'] }}-700 px-3 py-1 rounded-full font-medium">
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        {{ $highlight }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Statistics Section --}}
    <section class="py-16 bg-gradient-to-br from-uniba-blue to-blue-800 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="text-3xl font-bold text-white mb-4">UPT TIK Saat Ini</h2>
                <p class="text-blue-100">Pencapaian dan kapasitas layanan terkini</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-5xl mx-auto">
                @php
                    $stats = [
                        [
                            'number' => '20+',
                            'label' => 'Tahun Pengalaman',
                            'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                        ],
                        [
                            'number' => '50+',
                            'label' => 'Sistem Terintegrasi',
                            'icon' =>
                                'M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4',
                        ],
                        [
                            'number' => '99.5%',
                            'label' => 'Uptime Server',
                            'icon' =>
                                'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                        ],
                        [
                            'number' => '24/7',
                            'label' => 'Support Service',
                            'icon' =>
                                'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z',
                        ],
                    ];
                @endphp

                @foreach ($stats as $stat)
                    <div class="scroll-animate text-center group">
                        <div
                            class="bg-white bg-opacity-10 backdrop-blur-sm rounded-2xl p-6 hover:bg-opacity-20 transition-all duration-300 transform hover:-translate-y-2">
                            <div
                                class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="{{ $stat['icon'] }}"></path>
                                </svg>
                            </div>
                            <div class="text-3xl md:text-4xl font-bold text-white mb-2">{{ $stat['number'] }}</div>
                            <div class="text-blue-100 text-sm">{{ $stat['label'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Future Vision Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div
                    class="scroll-animate bg-gradient-to-r from-blue-600 to-blue-700 rounded-3xl shadow-2xl overflow-hidden">
                    <div class="p-8 md:p-12 text-white">
                        <div class="flex items-center gap-4 mb-6">
                            <div
                                class="w-16 h-16 bg-white bg-opacity-20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold">Masa Depan UPT TIK</h2>
                        </div>
                        <p class="text-blue-100 leading-relaxed mb-6">
                            Melangkah menuju tahun 2030, UPT TIK berkomitmen untuk terus berinovasi dan mengembangkan
                            infrastruktur teknologi informasi yang lebih canggih. Kami akan mengintegrasikan teknologi
                            terkini seperti Artificial Intelligence, Internet of Things, dan Big Data Analytics untuk
                            mewujudkan Smart Campus yang sesungguhnya.
                        </p>
                        <div class="flex flex-wrap gap-3">
                            <span
                                class="px-4 py-2 bg-white bg-opacity-20 backdrop-blur-sm rounded-full text-sm font-medium">AI
                                Integration</span>
                            <span
                                class="px-4 py-2 bg-white bg-opacity-20 backdrop-blur-sm rounded-full text-sm font-medium">IoT
                                Campus</span>
                            <span
                                class="px-4 py-2 bg-white bg-opacity-20 backdrop-blur-sm rounded-full text-sm font-medium">Big
                                Data Analytics</span>
                            <span
                                class="px-4 py-2 bg-white bg-opacity-20 backdrop-blur-sm rounded-full text-sm font-medium">Cybersecurity</span>
                            <span
                                class="px-4 py-2 bg-white bg-opacity-20 backdrop-blur-sm rounded-full text-sm font-medium">Green
                                IT</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
