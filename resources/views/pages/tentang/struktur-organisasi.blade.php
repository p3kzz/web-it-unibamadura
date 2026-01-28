@extends('layouts.app')

@section('title', 'Struktur Organisasi - UPT TIK UNIBA Madura')

@section('content')

    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

        {{-- Animated Background Elements --}}
        <div
            class="absolute top-20 right-10 w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow">
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
                    Struktur Organisasi
                </h1>
                <p class="text-lg text-blue-100 animate-fade-in-up stagger-2">
                    Susunan kepemimpinan dan tim UPT TIK UNIBA Madura
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

    {{-- Organizational Chart Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">

            {{-- Kepala UPT --}}
            <div class="max-w-md mx-auto mb-12 scroll-animate">
                <div
                    class="bg-gradient-to-br from-uniba-blue to-blue-700 rounded-2xl shadow-2xl p-8 text-center relative overflow-hidden group hover:shadow-3xl transition-all duration-300 transform hover:-translate-y-2">
                    {{-- Background Pattern --}}
                    <div
                        class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
                    </div>

                    <div class="relative z-10">
                        {{-- Avatar --}}
                        <div class="w-32 h-32 mx-auto mb-4 rounded-full bg-white p-1 shadow-xl">
                            <div
                                class="w-full h-full rounded-full bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                                <svg class="w-16 h-16 text-uniba-blue" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        </div>

                        {{-- Badge --}}
                        <span
                            class="inline-block bg-uniba-yellow text-uniba-blue text-xs font-bold px-4 py-1 rounded-full mb-3">
                            KEPALA UPT
                        </span>

                        {{-- Name & Title --}}
                        <h3 class="text-2xl font-bold text-white mb-2">
                            [Nama Kepala UPT]
                        </h3>
                        <p class="text-blue-100 text-sm mb-4">
                            NIP: [Nomor Induk Pegawai]
                        </p>

                        {{-- Description --}}
                        <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-4 mt-4">
                            <p class="text-blue-50 text-sm leading-relaxed">
                                Memimpin dan mengkoordinasikan seluruh kegiatan UPT TIK dalam memberikan layanan teknologi
                                informasi
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Connector Line --}}
                <div class="flex justify-center">
                    <div class="w-1 h-12 bg-gradient-to-b from-blue-600 to-transparent"></div>
                </div>
            </div>

            {{-- Divisi/Bagian --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
                @php
                    $divisions = [
                        [
                            'title' => 'Koordinator Infrastruktur & Jaringan',
                            'name' => '[Nama Koordinator]',
                            'nip' => '[NIP]',
                            'description' => 'Mengelola infrastruktur server, jaringan, dan keamanan sistem',
                            'responsibilities' => [
                                'Pengelolaan Server & Data Center',
                                'Maintenance Jaringan Kampus',
                                'Keamanan & Backup Data',
                                'Monitoring Infrastruktur',
                            ],
                            'icon' =>
                                'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01',
                            'color' => 'blue',
                        ],
                        [
                            'title' => 'Koordinator Sistem Informasi',
                            'name' => '[Nama Koordinator]',
                            'nip' => '[NIP]',
                            'description' => 'Mengembangkan dan mengelola sistem informasi akademik dan administrasi',
                            'responsibilities' => [
                                'Pengembangan SIAKAD',
                                'Integrasi Sistem',
                                'Database Management',
                                'Aplikasi Mobile & Web',
                            ],
                            'icon' =>
                                'M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z',
                            'color' => 'green',
                        ],
                        [
                            'title' => 'Koordinator Layanan & Support',
                            'name' => '[Nama Koordinator]',
                            'nip' => '[NIP]',
                            'description' => 'Memberikan layanan helpdesk dan dukungan teknis kepada pengguna',
                            'responsibilities' => [
                                'Helpdesk & Ticketing',
                                'User Support',
                                'Pelatihan Pengguna',
                                'Dokumentasi & SOP',
                            ],
                            'icon' =>
                                'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z',
                            'color' => 'purple',
                        ],
                        [
                            'title' => 'Koordinator Multimedia & Konten',
                            'name' => '[Nama Koordinator]',
                            'nip' => '[NIP]',
                            'description' => 'Mengelola konten digital, website, dan media kampus',
                            'responsibilities' => [
                                'Website Management',
                                'Social Media',
                                'Desain Grafis',
                                'Video Production',
                            ],
                            'icon' =>
                                'M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z',
                            'color' => 'blue',
                        ],
                        [
                            'title' => 'Koordinator Data & Pelaporan',
                            'name' => '[Nama Koordinator]',
                            'nip' => '[NIP]',
                            'description' => 'Mengelola data institusi dan sistem pelaporan',
                            'responsibilities' => [
                                'UNIBA Satu Data',
                                'Business Intelligence',
                                'Pelaporan PDDikti',
                                'Data Analytics',
                            ],
                            'icon' =>
                                'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
                            'color' => 'red',
                        ],
                        [
                            'title' => 'Koordinator Keamanan Informasi',
                            'name' => '[Nama Koordinator]',
                            'nip' => '[NIP]',
                            'description' => 'Menjaga keamanan sistem dan data institusi',
                            'responsibilities' => [
                                'Cybersecurity',
                                'Audit Keamanan',
                                'Policy & Compliance',
                                'Incident Response',
                            ],
                            'icon' =>
                                'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z',
                            'color' => 'indigo',
                        ],
                    ];
                @endphp

                @foreach ($divisions as $index => $division)
                    <div class="scroll-animate stagger-{{ ($index % 4) + 1 }}">
                        <div
                            class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group transform hover:-translate-y-2 h-full flex flex-col">
                            {{-- Header with gradient --}}
                            <div
                                class="bg-gradient-to-r from-{{ $division['color'] }}-500 to-{{ $division['color'] }}-600 p-6 relative overflow-hidden">
                                <div
                                    class="absolute top-0 right-0 w-32 h-32 bg-white opacity-10 rounded-full -mr-16 -mt-16">
                                </div>
                                <div class="relative z-10">
                                    {{-- Icon --}}
                                    <div
                                        class="w-14 h-14 bg-white bg-opacity-20 backdrop-blur-sm rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="{{ $division['icon'] }}"></path>
                                        </svg>
                                    </div>

                                    {{-- Title --}}
                                    <h3 class="text-lg font-bold text-white mb-1">
                                        {{ $division['title'] }}
                                    </h3>
                                </div>
                            </div>

                            {{-- Content --}}
                            <div class="p-6 flex-1 flex flex-col">
                                {{-- Avatar Placeholder --}}
                                <div class="flex items-center gap-3 mb-4">
                                    <div
                                        class="w-12 h-12 rounded-full bg-{{ $division['color'] }}-100 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-{{ $division['color'] }}-600" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-900">{{ $division['name'] }}</p>
                                        <p class="text-xs text-gray-500">{{ $division['nip'] }}</p>
                                    </div>
                                </div>

                                {{-- Description --}}
                                <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                                    {{ $division['description'] }}
                                </p>

                                {{-- Responsibilities --}}
                                <div class="mt-auto">
                                    <p class="text-xs font-semibold text-gray-500 uppercase mb-2">Tanggung Jawab:</p>
                                    <ul class="space-y-2">
                                        @foreach ($division['responsibilities'] as $responsibility)
                                            <li class="flex items-start gap-2 text-sm">
                                                <svg class="w-4 h-4 text-{{ $division['color'] }}-500 flex-shrink-0 mt-0.5"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="text-gray-700">{{ $responsibility }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            {{-- Footer Badge --}}
                            <div class="px-6 pb-6">
                                <div class="bg-{{ $division['color'] }}-50 rounded-lg px-3 py-2 text-center">
                                    <span
                                        class="text-xs font-semibold text-{{ $division['color'] }}-700">Koordinator</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Staff Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Tim Staf UPT TIK</h2>
                <div class="w-20 h-1 bg-uniba-yellow mx-auto mb-4"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Tenaga profesional yang mendukung operasional layanan TIK
                </p>
            </div>

            <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">
                @php
                    $staff = [
                        ['name' => '[Nama Staff]', 'position' => 'System Administrator', 'color' => 'blue'],
                        ['name' => '[Nama Staff]', 'position' => 'Network Engineer', 'color' => 'green'],
                        ['name' => '[Nama Staff]', 'position' => 'Web Developer', 'color' => 'purple'],
                        ['name' => '[Nama Staff]', 'position' => 'Database Administrator', 'color' => 'orange'],
                        ['name' => '[Nama Staff]', 'position' => 'Help Desk Support', 'color' => 'red'],
                        ['name' => '[Nama Staff]', 'position' => 'UI/UX Designer', 'color' => 'pink'],
                        ['name' => '[Nama Staff]', 'position' => 'Content Creator', 'color' => 'indigo'],
                        ['name' => '[Nama Staff]', 'position' => 'Data Analyst', 'color' => 'teal'],
                    ];
                @endphp

                @foreach ($staff as $index => $person)
                    <div class="scroll-animate stagger-{{ ($index % 4) + 1 }}">
                        <div
                            class="bg-white border border-gray-200 rounded-xl p-6 text-center hover:shadow-xl hover:border-{{ $person['color'] }}-500 transition-all duration-300 group transform hover:-translate-y-2">
                            {{-- Avatar --}}
                            <div
                                class="w-20 h-20 mx-auto mb-4 rounded-full bg-gradient-to-br from-{{ $person['color'] }}-400 to-{{ $person['color'] }}-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>

                            {{-- Info --}}
                            <h4 class="font-bold text-gray-900 mb-1">{{ $person['name'] }}</h4>
                            <p class="text-sm text-{{ $person['color'] }}-600 font-medium">{{ $person['position'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Organization Chart Visualization --}}
    <section class="py-20 bg-gradient-to-br from-blue-50 to-indigo-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Bagan Organisasi</h2>
                <div class="w-20 h-1 bg-uniba-yellow mx-auto mb-4"></div>
                <p class="text-gray-600">Struktur hierarki organisasi UPT TIK</p>
            </div>

            <div class="max-w-5xl mx-auto scroll-animate">
                <div class="bg-white rounded-2xl shadow-xl p-8 overflow-x-auto">
                    <div class="min-w-max">
                        {{-- Simple Org Chart Representation --}}
                        <div class="flex flex-col items-center">
                            {{-- Level 1: Kepala --}}
                            <div
                                class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-4 rounded-lg font-bold shadow-lg mb-4">
                                KEPALA UPT TIK
                            </div>

                            {{-- Connector --}}
                            <div class="w-1 h-12 bg-blue-300"></div>

                            {{-- Level 2: Koordinator --}}
                            <div class="flex gap-4 flex-wrap justify-center">
                                <div class="bg-blue-100 text-blue-800 px-6 py-3 rounded-lg font-semibold text-sm shadow">
                                    Infrastruktur
                                </div>
                                <div class="bg-green-100 text-green-800 px-6 py-3 rounded-lg font-semibold text-sm shadow">
                                    Sistem Informasi
                                </div>
                                <div
                                    class="bg-purple-100 text-purple-800 px-6 py-3 rounded-lg font-semibold text-sm shadow">
                                    Layanan
                                </div>
                                <div
                                    class="bg-orange-100 text-orange-800 px-6 py-3 rounded-lg font-semibold text-sm shadow">
                                    Multimedia
                                </div>
                                <div class="bg-red-100 text-red-800 px-6 py-3 rounded-lg font-semibold text-sm shadow">
                                    Data
                                </div>
                                <div
                                    class="bg-indigo-100 text-indigo-800 px-6 py-3 rounded-lg font-semibold text-sm shadow">
                                    Keamanan
                                </div>
                            </div>

                            {{-- Connector --}}
                            <div class="w-1 h-12 bg-gray-300 mt-4"></div>

                            {{-- Level 3: Staff --}}
                            <div class="bg-gray-100 text-gray-700 px-8 py-3 rounded-lg font-medium shadow text-center">
                                STAF PENDUKUNG
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
