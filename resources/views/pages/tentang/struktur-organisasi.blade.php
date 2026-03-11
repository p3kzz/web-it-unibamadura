@extends('layouts.app')

@section('title', 'Struktur Organisasi - UPT TIK UNIBA Madura')

@section('content')

    <section class="relative bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

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

        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg class="relative block w-full h-12" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="fill-gray-50"></path>
            </svg>
        </div>
    </section>

    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">

            <div class="text-center mb-14 scroll-animate">
                <p class="text-xs font-bold text-uniba-blue uppercase tracking-widest mb-2">Bagan Resmi</p>
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-4">Bagan Struktur Organisasi</h2>
                <div class="flex items-center justify-center gap-3 mb-4">
                    <div class="h-px w-16 bg-gray-300"></div>
                    <div class="w-8 h-1.5 bg-uniba-yellow rounded-full"></div>
                    <div class="h-px w-16 bg-gray-300"></div>
                </div>
                <p class="text-gray-500 max-w-lg mx-auto text-sm leading-relaxed">
                    Bagan resmi hierarki dan alur koordinasi organisasi UPT TIK UNIBA Madura
                </p>
            </div>

            {{-- Gambar Bagan --}}
            <div class="max-w-5xl mx-auto scroll-animate">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">

                    {{-- Image container --}}
                    <div class="relative group">
                        <img src="{{ asset('images/struktur-organisasi/bagan.png') }}"
                            alt="Bagan Struktur Organisasi UPT TIK UNIBA Madura" class="w-full h-auto object-contain"
                            onerror="this.parentElement.classList.add('img-error')" id="bagan-img">
                        <div id="bagan-fallback"
                            class="hidden w-full py-24 flex-col items-center justify-center text-center bg-gradient-to-br from-gray-50 to-blue-50">
                            <div
                                class="w-20 h-20 bg-uniba-blue bg-opacity-10 rounded-2xl flex items-center justify-center mb-4 mx-auto">
                                <svg class="w-10 h-10 text-uniba-blue opacity-50" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <p class="text-gray-400 font-semibold mb-1">Gambar bagan belum tersedia</p>
                            <p class="text-gray-400 text-sm">Upload gambar ke <code
                                    class="bg-gray-100 px-2 py-0.5 rounded text-xs">public/images/struktur-organisasi/bagan.png</code>
                            </p>
                        </div>

                        <a href="{{ asset('images/struktur-organisasi/bagan.png') }}" target="_blank"
                            class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                            <div
                                class="bg-white bg-opacity-90 backdrop-blur-sm rounded-xl px-4 py-2 flex items-center gap-2 shadow-lg">
                                <svg class="w-4 h-4 text-uniba-blue" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                                <span class="text-sm font-semibold text-gray-700">Lihat ukuran penuh</span>
                            </div>
                        </a>
                    </div>

                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
                        <div class="flex items-center gap-2 text-xs text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Bagan Struktur Organisasi UPT TIK UNIBA Madura — Dokumen Resmi
                        </div>
                        <a href="{{ asset('images/struktur-organisasi/bagan.png') }}" download
                            class="inline-flex items-center gap-1.5 text-xs font-semibold text-uniba-blue hover:text-blue-800 transition-colors">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Unduh
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">

            <div class="text-center mb-14 scroll-animate">
                <p class="text-xs font-bold text-uniba-blue uppercase tracking-widest mb-2">Unit Kerja</p>
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-4">Direktorat & Divisi</h2>
                <div class="flex items-center justify-center gap-3 mb-4">
                    <div class="h-px w-16 bg-gray-300"></div>
                    <div class="w-8 h-1.5 bg-uniba-yellow rounded-full"></div>
                    <div class="h-px w-16 bg-gray-300"></div>
                </div>
                <p class="text-gray-500 max-w-lg mx-auto text-sm leading-relaxed">
                    Setiap direktorat memiliki peran strategis dalam mendukung ekosistem digital UNIBA Madura
                </p>
            </div>

            @php
                $directorates = [
                    [
                        'no' => '01',
                        'title' => 'Infrastruktur & Jaringan',
                        'coordinator' => '[Nama Koordinator]',
                        'nip' => 'NIP. [Nomor Induk Pegawai]',
                        'description' =>
                            'Bertanggung jawab atas pengelolaan seluruh infrastruktur teknologi kampus, mencakup server, data center, jaringan lokal maupun internet, serta memastikan ketersediaan dan keandalan layanan jaringan bagi seluruh civitas akademika.',
                        'tasks' => [
                            'Pengelolaan Server & Data Center',
                            'Maintenance Jaringan Kampus',
                            'Keamanan & Backup Data',
                            'Monitoring Infrastruktur 24/7',
                        ],
                        'accent' => 'blue',
                    ],
                    [
                        'no' => '02',
                        'title' => 'Sistem Informasi',
                        'coordinator' => '[Nama Koordinator]',
                        'nip' => 'NIP. [Nomor Induk Pegawai]',
                        'description' =>
                            'Mengembangkan, memelihara, dan mengintegrasikan seluruh sistem informasi akademik dan administrasi universitas guna mendukung efisiensi operasional dan pengambilan keputusan berbasis data.',
                        'tasks' => [
                            'Pengembangan SIAKAD',
                            'Integrasi Antar Sistem',
                            'Database Management',
                            'Aplikasi Mobile & Web',
                        ],
                        'accent' => 'emerald',
                    ],
                    [
                        'no' => '03',
                        'title' => 'Layanan & Support',
                        'coordinator' => '[Nama Koordinator]',
                        'nip' => 'NIP. [Nomor Induk Pegawai]',
                        'description' =>
                            'Menjadi garda terdepan dalam memberikan bantuan teknis dan layanan helpdesk kepada seluruh pengguna sistem TIK, memastikan setiap permasalahan teknis terselesaikan secara cepat dan profesional.',
                        'tasks' => ['Helpdesk & Ticketing', 'User Support', 'Pelatihan Pengguna', 'Dokumentasi & SOP'],
                        'accent' => 'violet',
                    ],
                    [
                        'no' => '04',
                        'title' => 'Multimedia & Konten',
                        'coordinator' => '[Nama Koordinator]',
                        'nip' => 'NIP. [Nomor Induk Pegawai]',
                        'description' =>
                            'Mengelola identitas digital kampus melalui produksi konten berkualitas, pengelolaan website resmi, dan strategi media sosial yang membangun reputasi positif UNIBA Madura di ranah digital.',
                        'tasks' => [
                            'Website Management',
                            'Strategi Media Sosial',
                            'Desain Grafis & Branding',
                            'Video & Foto Produksi',
                        ],
                        'accent' => 'amber',
                    ],
                    [
                        'no' => '05',
                        'title' => 'Data & Pelaporan',
                        'coordinator' => '[Nama Koordinator]',
                        'nip' => 'NIP. [Nomor Induk Pegawai]',
                        'description' =>
                            'Mengelola ekosistem data institusi secara terpadu, mulai dari pengumpulan, validasi, hingga analisis data untuk mendukung pelaporan PDDikti, akreditasi, dan pengambilan keputusan strategis universitas.',
                        'tasks' => [
                            'UNIBA Satu Data',
                            'Business Intelligence',
                            'Pelaporan PDDikti',
                            'Data Analytics & Visualisasi',
                        ],
                        'accent' => 'rose',
                    ],
                    [
                        'no' => '06',
                        'title' => 'Keamanan Informasi',
                        'coordinator' => '[Nama Koordinator]',
                        'nip' => 'NIP. [Nomor Induk Pegawai]',
                        'description' =>
                            'Menjaga integritas, kerahasiaan, dan ketersediaan seluruh aset informasi kampus melalui penerapan kebijakan keamanan siber, audit berkala, dan respons cepat terhadap insiden keamanan digital.',
                        'tasks' => [
                            'Cybersecurity & Penetration Testing',
                            'Audit Keamanan Sistem',
                            'Policy & Compliance',
                            'Incident Response',
                        ],
                        'accent' => 'indigo',
                    ],
                ];

                $accentMap = [
                    'blue' => [
                        'bg' => 'bg-blue-600',
                        'light' => 'bg-blue-50',
                        'text' => 'text-blue-600',
                        'border' => 'border-blue-200',
                        'dot' => 'bg-blue-500',
                    ],
                    'emerald' => [
                        'bg' => 'bg-emerald-600',
                        'light' => 'bg-emerald-50',
                        'text' => 'text-emerald-600',
                        'border' => 'border-emerald-200',
                        'dot' => 'bg-emerald-500',
                    ],
                    'violet' => [
                        'bg' => 'bg-violet-600',
                        'light' => 'bg-violet-50',
                        'text' => 'text-violet-600',
                        'border' => 'border-violet-200',
                        'dot' => 'bg-violet-500',
                    ],
                    'amber' => [
                        'bg' => 'bg-amber-500',
                        'light' => 'bg-amber-50',
                        'text' => 'text-amber-600',
                        'border' => 'border-amber-200',
                        'dot' => 'bg-amber-500',
                    ],
                    'rose' => [
                        'bg' => 'bg-rose-600',
                        'light' => 'bg-rose-50',
                        'text' => 'text-rose-600',
                        'border' => 'border-rose-200',
                        'dot' => 'bg-rose-500',
                    ],
                    'indigo' => [
                        'bg' => 'bg-indigo-600',
                        'light' => 'bg-indigo-50',
                        'text' => 'text-indigo-600',
                        'border' => 'border-indigo-200',
                        'dot' => 'bg-indigo-500',
                    ],
                ];
            @endphp

            <div class="max-w-6xl mx-auto space-y-6">
                @foreach ($directorates as $index => $dir)
                    @php $a = $accentMap[$dir['accent']]; @endphp
                    <div
                        class="scroll-animate group bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden">

                        <div class="flex flex-col md:flex-row">

                            <div
                                class="{{ $a['bg'] }} flex-shrink-0 w-full md:w-2 min-h-2 md:min-h-0 h-1.5 md:h-auto rounded-t-2xl md:rounded-t-none md:rounded-l-2xl">
                            </div>
                            <div class="flex flex-col md:flex-row flex-1 p-6 md:p-8 gap-6 md:gap-10">
                                <div class="flex-shrink-0 flex md:flex-col items-center md:items-start gap-4 md:gap-0">
                                    <span
                                        class="text-5xl md:text-7xl font-black leading-none {{ $a['text'] }} opacity-15 group-hover:opacity-25 transition-opacity select-none">
                                        {{ $dir['no'] }}
                                    </span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3 mb-4">
                                        <div>
                                            <p class="text-xs font-bold {{ $a['text'] }} uppercase tracking-widest mb-1">
                                                Direktorat</p>
                                            <h3 class="text-xl md:text-2xl font-black text-gray-900 leading-tight">
                                                {{ $dir['title'] }}
                                            </h3>
                                        </div>

                                        <div
                                            class="{{ $a['light'] }} {{ $a['border'] }} border rounded-xl px-4 py-3 flex-shrink-0 text-center sm:text-right">
                                            <p
                                                class="text-xs {{ $a['text'] }} font-bold uppercase tracking-wide mb-0.5">
                                                Koordinator</p>
                                            <p class="font-bold text-gray-900 text-sm">{{ $dir['coordinator'] }}</p>
                                            <p class="text-xs text-gray-400 mt-0.5">{{ $dir['nip'] }}</p>
                                        </div>
                                    </div>

                                    <p class="text-gray-600 text-sm leading-relaxed mb-5">
                                        {{ $dir['description'] }}
                                    </p>

                                    <div>
                                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Ruang
                                            Lingkup Tugas</p>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                                            @foreach ($dir['tasks'] as $task)
                                                <div class="flex items-center gap-2.5">
                                                    <div
                                                        class="w-1.5 h-1.5 rounded-full {{ $a['dot'] }} flex-shrink-0">
                                                    </div>
                                                    <span class="text-sm text-gray-700">{{ $task }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-16 bg-gradient-to-br from-uniba-blue to-uniba-dark">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center scroll-animate">
                <h2 class="text-2xl md:text-3xl font-black text-white mb-3">
                    Ada Pertanyaan Seputar Organisasi?
                </h2>
                <p class="text-blue-200 mb-8 text-sm leading-relaxed">
                    Hubungi kami untuk informasi lebih lanjut mengenai struktur dan layanan UPT TIK UNIBA Madura
                </p>
                <a href="#"
                    class="inline-flex items-center gap-2 bg-uniba-yellow text-uniba-blue font-bold px-8 py-3.5 rounded-xl hover:bg-yellow-300 transition-all duration-200 shadow-lg hover:shadow-xl hover:-translate-y-0.5 transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const img = document.getElementById('bagan-img');
            const fallback = document.getElementById('bagan-fallback');

            if (img) {
                img.addEventListener('error', function() {
                    img.classList.add('hidden');
                    fallback.classList.remove('hidden');
                    fallback.classList.add('flex');
                });

                if (!img.complete || img.naturalWidth === 0) {
                    img.dispatchEvent(new Event('error'));
                }
            }
        });
    </script>

@endsection
