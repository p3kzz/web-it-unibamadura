@extends('layouts.app')

@section('title', 'Program Kerja - UPT TIK UNIBA Madura')

@section('content')

    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

        {{-- Animated Background Elements --}}
        <div
            class="absolute top-20 right-10 w-72 h-72 bg-yellow-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow">
        </div>
        <div class="absolute bottom-20 left-10 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow"
            style="animation-delay: 1s;"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <span
                    class="inline-block bg-blue-800 text-blue-200 text-xs font-bold px-4 py-2 rounded-full uppercase tracking-wider mb-4 animate-fade-in-up">
                    Tentang Kami
                </span>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-fade-in-up stagger-1">
                    Program Kerja
                </h1>
                <p class="text-lg text-blue-100 animate-fade-in-up stagger-2">
                    Rencana strategis dan program unggulan UPT TIK UNIBA Madura
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

    {{-- Tujuan Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">
                <div class="text-center mb-12 scroll-animate">
                    <div class="flex items-center justify-center gap-4 mb-4">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Tujuan Program Kerja</h2>
                    <div class="w-20 h-1 bg-uniba-yellow mx-auto mb-4"></div>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Arah strategis pengembangan teknologi informasi UNIBA Madura
                    </p>
                </div>

                <div class="scroll-animate bg-white rounded-2xl shadow-xl p-8 md:p-12 border-t-4 border-blue-500">
                    <div class="prose prose-lg max-w-none">
                        <p class="text-gray-700 leading-relaxed mb-6">
                            Program kerja UPT TIK dirancang untuk mendukung pencapaian visi dan misi Universitas Bahaudin
                            Mudhary Madura melalui pemanfaatan teknologi informasi dan komunikasi yang optimal. Tujuan utama
                            meliputi:
                        </p>

                        <div class="grid md:grid-cols-2 gap-6">
                            @php
                                $goals = [
                                    [
                                        'title' => 'Meningkatkan Kualitas Layanan TI',
                                        'desc' =>
                                            'Memberikan layanan teknologi informasi yang responsif, handal, dan berorientasi pada kepuasan pengguna',
                                    ],
                                    [
                                        'title' => 'Transformasi Digital Berkelanjutan',
                                        'desc' =>
                                            'Mendorong digitalisasi proses bisnis kampus secara menyeluruh dan berkelanjutan',
                                    ],
                                    [
                                        'title' => 'Integrasi Sistem Informasi',
                                        'desc' =>
                                            'Mengintegrasikan seluruh sistem informasi untuk mendukung pengambilan keputusan berbasis data',
                                    ],
                                    [
                                        'title' => 'Keamanan & Keandalan Sistem',
                                        'desc' => 'Menjamin keamanan data dan keandalan infrastruktur TI institusi',
                                    ],
                                ];
                            @endphp

                            @foreach ($goals as $goal)
                                <div
                                    class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-6 border-l-4 border-blue-500">
                                    <h4 class="font-bold text-gray-900 mb-2">{{ $goal['title'] }}</h4>
                                    <p class="text-gray-600 text-sm">{{ $goal['desc'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Sasaran Perjanjian Kinerja Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12 scroll-animate">
                    <div class="flex items-center justify-center gap-4 mb-4">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Sasaran Perjanjian Kinerja</h2>
                    <div class="w-20 h-1 bg-uniba-yellow mx-auto mb-4"></div>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Target kinerja berdasarkan komitmen institusi
                    </p>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    @php
                        $targets = [
                            [
                                'code' => 'SK-01',
                                'target' => 'Tingkat Kepuasan Layanan TI',
                                'indicator' => 'Index Kepuasan ≥ 85%',
                                'baseline' => '80%',
                                'year_target' => '≥ 85%',
                                'color' => 'blue',
                                'icon' =>
                                    'M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5',
                            ],
                            [
                                'code' => 'SK-02',
                                'target' => 'Uptime Sistem Informasi',
                                'indicator' => 'Availability ≥ 99%',
                                'baseline' => '98.5%',
                                'year_target' => '≥ 99%',
                                'color' => 'green',
                                'icon' =>
                                    'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                            ],
                            [
                                'code' => 'SK-03',
                                'target' => 'Integrasi Sistem Data',
                                'indicator' => 'Sistem terintegrasi ≥ 90%',
                                'baseline' => '75%',
                                'year_target' => '≥ 90%',
                                'color' => 'purple',
                                'icon' =>
                                    'M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4',
                            ],
                            [
                                'code' => 'SK-04',
                                'target' => 'Pelatihan SDM TI',
                                'indicator' => 'Pelatihan ≥ 2x/tahun',
                                'baseline' => '1x/tahun',
                                'year_target' => '≥ 2x/tahun',
                                'color' => 'orange',
                                'icon' =>
                                    'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                            ],
                            [
                                'code' => 'SK-05',
                                'target' => 'Keamanan Informasi',
                                'indicator' => 'Zero Major Security Breach',
                                'baseline' => '0 incident',
                                'year_target' => '0 incident',
                                'color' => 'red',
                                'icon' =>
                                    'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z',
                            ],
                            [
                                'code' => 'SK-06',
                                'target' => 'Digitalisasi Layanan',
                                'indicator' => 'Layanan online ≥ 80%',
                                'baseline' => '65%',
                                'year_target' => '≥ 80%',
                                'color' => 'indigo',
                                'icon' => 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z',
                            ],
                        ];
                    @endphp

                    @foreach ($targets as $index => $target)
                        <div class="scroll-animate stagger-{{ ($index % 4) + 1 }}">
                            <div
                                class="bg-white border-2 border-{{ $target['color'] }}-200 rounded-2xl p-6 hover:border-{{ $target['color'] }}-500 hover:shadow-xl transition-all duration-300 group">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0">
                                        <div
                                            class="w-14 h-14 bg-gradient-to-br from-{{ $target['color'] }}-400 to-{{ $target['color'] }}-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="{{ $target['icon'] }}"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2 mb-2">
                                            <span
                                                class="inline-block bg-{{ $target['color'] }}-100 text-{{ $target['color'] }}-700 text-xs font-bold px-3 py-1 rounded-full">
                                                {{ $target['code'] }}
                                            </span>
                                        </div>
                                        <h4 class="font-bold text-gray-900 mb-2 text-lg">{{ $target['target'] }}</h4>
                                        <p class="text-{{ $target['color'] }}-600 font-semibold text-sm mb-3">
                                            {{ $target['indicator'] }}</p>

                                        <div class="grid grid-cols-2 gap-3">
                                            <div class="bg-gray-50 rounded-lg p-3">
                                                <p class="text-xs text-gray-500 mb-1">Baseline</p>
                                                <p class="font-bold text-gray-900">{{ $target['baseline'] }}</p>
                                            </div>
                                            <div class="bg-{{ $target['color'] }}-50 rounded-lg p-3">
                                                <p class="text-xs text-{{ $target['color'] }}-600 mb-1">Target Tahun Ini
                                                </p>
                                                <p class="font-bold text-{{ $target['color'] }}-700">
                                                    {{ $target['year_target'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Pilar Transformasi Digital Section --}}
    <section class="py-20 bg-gradient-to-br from-blue-50 to-indigo-50">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12 scroll-animate">
                    <div class="flex items-center justify-center gap-4 mb-4">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Pilar Transformasi Digital</h2>
                    <div class="w-20 h-1 bg-uniba-yellow mx-auto mb-4"></div>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Fondasi utama dalam mewujudkan kampus digital
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    @php
                        $pillars = [
                            [
                                'number' => '01',
                                'title' => 'Infrastructure Excellence',
                                'subtitle' => 'Infrastruktur Unggul',
                                'description' =>
                                    'Membangun dan mengelola infrastruktur TI yang handal, scalable, dan aman untuk mendukung seluruh operasional kampus',
                                'items' => [
                                    'Data Center',
                                    'Cloud Computing',
                                    'Network Infrastructure',
                                    'Backup & Disaster Recovery',
                                ],
                                'color' => 'blue',
                                'icon' =>
                                    'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01',
                            ],
                            [
                                'number' => '02',
                                'title' => 'Digital Services',
                                'subtitle' => 'Layanan Digital',
                                'description' =>
                                    'Mengembangkan layanan digital yang user-friendly dan terintegrasi untuk meningkatkan efisiensi proses akademik dan administrasi',
                                'items' => [
                                    'SIAKAD Online',
                                    'E-Learning Platform',
                                    'Mobile Apps',
                                    'Self-Service Portal',
                                ],
                                'color' => 'green',
                                'icon' => 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z',
                            ],
                            [
                                'number' => '03',
                                'title' => 'Data-Driven Decision',
                                'subtitle' => 'Berbasis Data',
                                'description' =>
                                    'Memanfaatkan data dan analytics untuk mendukung pengambilan keputusan strategis yang lebih baik dan terukur',
                                'items' => [
                                    'UNIBA Satu Data',
                                    'Business Intelligence',
                                    'Dashboard Analytics',
                                    'Reporting System',
                                ],
                                'color' => 'purple',
                                'icon' =>
                                    'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
                            ],
                        ];
                    @endphp

                    @foreach ($pillars as $index => $pillar)
                        <div class="scroll-animate stagger-{{ $index + 1 }}">
                            <div
                                class="bg-white rounded-2xl shadow-xl overflow-hidden group hover:shadow-2xl transition-all duration-300 h-full flex flex-col">
                                {{-- Header --}}
                                <div
                                    class="bg-gradient-to-r from-{{ $pillar['color'] }}-500 to-{{ $pillar['color'] }}-600 p-6 relative overflow-hidden">
                                    <div class="absolute top-0 right-0 text-9xl font-bold text-white opacity-10">
                                        {{ $pillar['number'] }}</div>
                                    <div class="relative z-10">
                                        <div
                                            class="w-14 h-14 bg-white bg-opacity-20 backdrop-blur-sm rounded-xl flex items-center justify-center mb-4">
                                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="{{ $pillar['icon'] }}"></path>
                                            </svg>
                                        </div>
                                        <h3 class="text-xl font-bold text-white mb-1">{{ $pillar['title'] }}</h3>
                                        <p class="text-{{ $pillar['color'] }}-100 text-sm">{{ $pillar['subtitle'] }}</p>
                                    </div>
                                </div>

                                {{-- Content --}}
                                <div class="p-6 flex-1 flex flex-col">
                                    <p class="text-gray-600 mb-6 leading-relaxed">{{ $pillar['description'] }}</p>

                                    <div class="mt-auto">
                                        <p class="text-xs font-semibold text-gray-500 uppercase mb-3">Key Components:</p>
                                        <ul class="space-y-2">
                                            @foreach ($pillar['items'] as $item)
                                                <li class="flex items-center gap-2">
                                                    <svg class="w-4 h-4 text-{{ $pillar['color'] }}-500"
                                                        fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="text-gray-700 text-sm">{{ $item }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Program Kerja Detail Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-12 scroll-animate">
                    <div class="flex items-center justify-center gap-4 mb-4">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Kode & Program Kerja</h2>
                    <div class="w-20 h-1 bg-uniba-yellow mx-auto mb-4"></div>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Rincian program kerja berdasarkan kode kegiatan
                    </p>
                </div>

                <div class="scroll-animate">
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border-t-4 border-orange-500">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="bg-gradient-to-r from-orange-500 to-orange-600 text-white">
                                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Kode
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Program
                                            Kerja</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Pilar
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Target
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @php
                                        $programs = [
                                            [
                                                'code' => 'PK-01',
                                                'name' => 'Upgrade Infrastruktur Server & Storage',
                                                'pillar' => 'Infrastructure',
                                                'target' => 'Q1-Q2',
                                                'status' => 'progress',
                                                'color' => 'blue',
                                            ],
                                            [
                                                'code' => 'PK-02',
                                                'name' => 'Pengembangan SIAKAD Terintegrasi',
                                                'pillar' => 'Digital Services',
                                                'target' => 'Q1-Q4',
                                                'status' => 'progress',
                                                'color' => 'green',
                                            ],
                                            [
                                                'code' => 'PK-03',
                                                'name' => 'Implementasi UNIBA Satu Data',
                                                'pillar' => 'Data-Driven',
                                                'target' => 'Q2-Q3',
                                                'status' => 'planning',
                                                'color' => 'purple',
                                            ],
                                            [
                                                'code' => 'PK-04',
                                                'name' => 'Peningkatan Keamanan Cyber',
                                                'pillar' => 'Infrastructure',
                                                'target' => 'Q1-Q4',
                                                'status' => 'progress',
                                                'color' => 'blue',
                                            ],
                                            [
                                                'code' => 'PK-05',
                                                'name' => 'Digitalisasi Layanan Akademik',
                                                'pillar' => 'Digital Services',
                                                'target' => 'Q2-Q4',
                                                'status' => 'planning',
                                                'color' => 'green',
                                            ],
                                            [
                                                'code' => 'PK-06',
                                                'name' => 'Dashboard Analytics & BI',
                                                'pillar' => 'Data-Driven',
                                                'target' => 'Q3-Q4',
                                                'status' => 'planning',
                                                'color' => 'purple',
                                            ],
                                            [
                                                'code' => 'PK-07',
                                                'name' => 'E-Learning Platform Enhancement',
                                                'pillar' => 'Digital Services',
                                                'target' => 'Q1-Q2',
                                                'status' => 'progress',
                                                'color' => 'green',
                                            ],
                                            [
                                                'code' => 'PK-08',
                                                'name' => 'Mobile App Development',
                                                'pillar' => 'Digital Services',
                                                'target' => 'Q2-Q3',
                                                'status' => 'progress',
                                                'color' => 'green',
                                            ],
                                            [
                                                'code' => 'PK-09',
                                                'name' => 'Network Infrastructure Upgrade',
                                                'pillar' => 'Infrastructure',
                                                'target' => 'Q1-Q3',
                                                'status' => 'progress',
                                                'color' => 'blue',
                                            ],
                                            [
                                                'code' => 'PK-10',
                                                'name' => 'Pelatihan & Sertifikasi SDM',
                                                'pillar' => 'Infrastructure',
                                                'target' => 'Q1-Q4',
                                                'status' => 'ongoing',
                                                'color' => 'blue',
                                            ],
                                        ];
                                    @endphp

                                    @foreach ($programs as $program)
                                        <tr class="hover:bg-{{ $program['color'] }}-50 transition-colors duration-200">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="inline-flex items-center justify-center px-3 py-1 rounded-full text-xs font-bold bg-{{ $program['color'] }}-100 text-{{ $program['color'] }}-700">
                                                    {{ $program['code'] }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4">
                                                <span class="font-semibold text-gray-900">{{ $program['name'] }}</span>
                                            </td>
                                            <td class="px-6 py-4">
                                                <span class="text-gray-600 text-sm">{{ $program['pillar'] }}</span>
                                            </td>
                                            <td class="px-6 py-4">
                                                <span class="inline-flex items-center gap-1 text-gray-700 text-sm">
                                                    <svg class="w-4 h-4 text-gray-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                    {{ $program['target'] }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4">
                                                @if ($program['status'] == 'progress')
                                                    <span
                                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                                                        <span
                                                            class="w-2 h-2 bg-blue-500 rounded-full mr-2 animate-pulse"></span>
                                                        In Progress
                                                    </span>
                                                @elseif($program['status'] == 'planning')
                                                    <span
                                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">
                                                        <span class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></span>
                                                        Planning
                                                    </span>
                                                @else
                                                    <span
                                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                                        Ongoing
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Timeline Summary Section --}}
    <section class="py-20 bg-gradient-to-br from-gray-900 to-blue-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-5xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-4">Timeline Program Kerja 2026</h2>
                <p class="text-blue-200 mb-12">Jadwal pelaksanaan program kerja sepanjang tahun</p>

                <div class="grid md:grid-cols-4 gap-4">
                    @php
                        $quarters = [
                            ['q' => 'Q1', 'period' => 'Jan - Mar', 'programs' => 6, 'color' => 'blue'],
                            ['q' => 'Q2', 'period' => 'Apr - Jun', 'programs' => 7, 'color' => 'green'],
                            ['q' => 'Q3', 'period' => 'Jul - Sep', 'programs' => 5, 'color' => 'purple'],
                            ['q' => 'Q4', 'period' => 'Oct - Des', 'programs' => 4, 'color' => 'orange'],
                        ];
                    @endphp

                    @foreach ($quarters as $quarter)
                        <div
                            class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 hover:bg-opacity-20 transition-all duration-300">
                            <div class="text-{{ $quarter['color'] }}-400 font-bold text-3xl mb-2">{{ $quarter['q'] }}
                            </div>
                            <div class="text-sm text-blue-200 mb-4">{{ $quarter['period'] }}</div>
                            <div class="text-4xl font-bold mb-2">{{ $quarter['programs'] }}</div>
                            <div class="text-xs text-blue-200">Program</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
