@extends('layouts.app')

@section('title', 'Visi & Misi - UPT TIK UNIBA Madura')

@section('content')

{{-- Hero Section --}}
<section class="relative bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark py-20 overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center max-w-3xl mx-auto">
            <span class="inline-block bg-blue-800 text-blue-200 text-xs font-bold px-4 py-2 rounded-full uppercase tracking-wider mb-4 animate-fade-in-up">
                Tentang Kami
            </span>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-fade-in-up stagger-1">
                Visi & Misi
            </h1>
            <p class="text-lg text-blue-100 animate-fade-in-up stagger-2">
                Komitmen kami dalam memajukan teknologi informasi untuk UNIBA Madura
            </p>
        </div>
    </div>

    {{-- Decorative Wave --}}
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
        <svg class="relative block w-full h-12" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="fill-gray-50"></path>
        </svg>
    </div>
</section>

{{-- Visi Section --}}
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <div class="scroll-animate bg-white rounded-2xl shadow-xl overflow-hidden border-t-4 border-uniba-yellow">
                <div class="p-8 md:p-12">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-uniba-blue to-blue-600 rounded-xl flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900">Visi</h2>
                            <div class="w-20 h-1 bg-uniba-yellow mt-2"></div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-8 border-l-4 border-uniba-blue">
                        <p class="text-lg md:text-xl text-gray-700 leading-relaxed italic">
                            "Terwujudnya sistem teknologi informasi Universitas Bahaudin Mudhary Madura yang terintegrasi, aman, dan berkelanjutan guna mendukung tata kelola universitas yang unggul, mandiri, dan berkualitas pada tahun 2030"
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Misi Section --}}
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <div class="scroll-animate bg-gray-50 rounded-2xl shadow-xl overflow-hidden border-t-4 border-uniba-yellow">
                <div class="p-8 md:p-12">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-uniba-yellow to-yellow-500 rounded-xl flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-uniba-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900">Misi</h2>
                            <div class="w-20 h-1 bg-uniba-yellow mt-2"></div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        @php
                        $misi = [
                            [
                                'title' => 'Sistem Informasi Terintegrasi',
                                'description' => 'Mengembangkan dan mengelola sistem informasi terintegrasi yang mendukung penyelenggaraan pendidikan, penelitian, dan pengabdian kepada masyarakat guna menghasilkan lulusan yang berkualitas dan beretika.',
                                'icon' => 'M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4',
                                'color' => 'blue'
                            ],
                            [
                                'title' => 'Platform Pembelajaran Digital',
                                'description' => 'Menyediakan dan mengoptimalkan platform pembelajaran digital yang adaptif dan berkelanjutan untuk mendukung pembelajaran sepanjang hayat secara mandiri dan inovatif.',
                                'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                                'color' => 'green'
                            ],
                            [
                                'title' => 'Teknologi Adaptif',
                                'description' => 'Mengembangkan sistem dan layanan teknologi informasi yang adaptif terhadap perkembangan IPTEK, guna menunjang proses akademik dan non-akademik yang berorientasi pada mutu dan daya saing lulusan.',
                                'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                                'color' => 'purple'
                            ],
                            [
                                'title' => 'Dukungan Penelitian',
                                'description' => 'Mendukung kegiatan penelitian dan pengembangan melalui penyediaan infrastruktur, aplikasi, dan layanan teknologi informasi yang andal, aman, dan berkelanjutan.',
                                'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                                'color' => 'orange'
                            ],
                            [
                                'title' => 'UNIBA Satu Data',
                                'description' => 'Meningkatkan efisiensi dan efektivitas pengelolaan data dan pelaporan institusi melalui implementasi kebijakan UNIBA MADURA Satu Data yang terintegrasi dan akurat.',
                                'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
                                'color' => 'red'
                            ],
                            [
                                'title' => 'Layanan Prima Digital',
                                'description' => 'Mewujudkan layanan prima berbasis digital bagi sivitas akademika dan pemangku kepentingan melalui pemanfaatan teknologi informasi yang mudah diakses, responsif, dan berorientasi pada kepuasan pengguna.',
                                'icon' => 'M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5',
                                'color' => 'indigo'
                            ],
                            [
                                'title' => 'Infrastruktur & Keamanan',
                                'description' => 'Mengembangkan dan meningkatkan kapasitas infrastruktur server, jaringan, dan keamanan informasi guna menjamin ketersediaan, keandalan, dan perlindungan data institusi.',
                                'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                                'color' => 'teal'
                            ],
                            [
                                'title' => 'Standar Mutu & Akreditasi',
                                'description' => 'Menjamin kesesuaian sistem dan layanan teknologi informasi dengan regulasi nasional, kebijakan kementerian, serta standar penjaminan mutu dan akreditasi perguruan tinggi.',
                                'icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z',
                                'color' => 'pink'
                            ]
                        ];
                        @endphp

                        @foreach($misi as $index => $item)
                        <div class="scroll-animate bg-white rounded-xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border-l-4 border-{{ $item['color'] }}-500 group stagger-{{ $index + 1 }}">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-{{ $item['color'] }}-100 rounded-lg flex items-center justify-center group-hover:bg-{{ $item['color'] }}-500 transition-colors duration-300">
                                        <svg class="w-6 h-6 text-{{ $item['color'] }}-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-2">
                                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-{{ $item['color'] }}-100 text-{{ $item['color'] }}-600 font-bold text-sm">
                                            {{ $index + 1 }}
                                        </span>
                                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-{{ $item['color'] }}-600 transition-colors">
                                            {{ $item['title'] }}
                                        </h3>
                                    </div>
                                    <p class="text-gray-600 leading-relaxed">
                                        {{ $item['description'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Values Section --}}
<section class="py-16 bg-gradient-to-br from-blue-50 to-indigo-50">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <div class="scroll-animate bg-white rounded-2xl shadow-xl overflow-hidden border-t-4 border-uniba-yellow">
                <div class="p-8 md:p-12">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900">Tujuan</h2>
                            <div class="w-20 h-1 bg-uniba-yellow mt-2"></div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        @php
                        $tujuan = [
                            [
                                'text' => 'Mewujudkan ekosistem teknologi informasi yang terintegrasi, andal, dan berkelanjutan guna mendukung proses pendidikan dalam menghasilkan lulusan yang berintegritas, bermoral, profesional, dan memiliki kompetensi tinggi di bidang ekonomi, bisnis, dan teknologi informasi.',
                                'icon' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z'
                            ],
                            [
                                'text' => 'Menyediakan dan mengembangkan layanan serta platform teknologi informasi yang mendukung penguasaan ilmu pengetahuan dan keterampilan digital, sehingga lulusan mampu berkolaborasi secara efektif, beradaptasi dengan dunia kerja, serta memiliki kemampuan berwirausaha dan menciptakan lapangan pekerjaan.',
                                'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'
                            ],
                            [
                                'text' => 'Mendukung pengembangan kompetensi lulusan yang adaptif terhadap perkembangan ilmu pengetahuan, teknologi, dan seni (IPTEKS) melalui pemanfaatan sistem pembelajaran digital, laboratorium virtual, dan infrastruktur teknologi informasi yang relevan dan mutakhir.',
                                'icon' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'
                            ],
                            [
                                'text' => 'Mengoptimalkan pemanfaatan teknologi informasi untuk mendukung penyelesaian permasalahan dan tantangan masyarakat lokal, khususnya melalui penguatan sistem pendukung kegiatan penelitian dan pengabdian kepada masyarakat berbasis kebutuhan daerah.',
                                'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'
                            ],
                            [
                                'text' => 'Meningkatkan kualitas tata kelola data, informasi, dan layanan digital universitas sebagai dasar pengambilan keputusan strategis serta peningkatan mutu akademik dan non-akademik.',
                                'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'
                            ],
                            [
                                'text' => 'Menjamin keamanan, keandalan, dan keberlanjutan sistem teknologi informasi guna mendukung aktivitas sivitas akademika dan pemangku kepentingan secara efektif dan efisien.',
                                'icon' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z'
                            ],
                            [
                                'text' => 'Mendukung pencapaian standar mutu, akreditasi, dan regulasi nasional melalui pengembangan sistem teknologi informasi yang sesuai dengan kebijakan pemerintah dan kebutuhan penjaminan mutu perguruan tinggi.',
                                'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'
                            ]
                        ];
                        @endphp

                        @foreach($tujuan as $index => $item)
                        <div class="scroll-animate bg-gradient-to-r from-gray-50 to-white rounded-xl p-5 shadow-sm hover:shadow-md transition-all duration-300 border-l-4 border-green-500 group stagger-{{ $index + 1 }}">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center group-hover:bg-green-500 transition-colors duration-300">
                                        <svg class="w-5 h-5 text-green-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-start gap-3">
                                        <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-green-500 text-white font-bold text-sm flex-shrink-0 mt-0.5">
                                            {{ $index + 1 }}
                                        </span>
                                        <p class="text-gray-700 leading-relaxed">
                                            {{ $item['text'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Sasaran Section --}}
<section class="py-16 bg-gradient-to-br from-purple-50 to-pink-50">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-12 scroll-animate">
                <div class="flex items-center justify-center gap-4 mb-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                    </div>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Sasaran</h2>
                <div class="w-20 h-1 bg-purple-500 mx-auto mb-4"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Target strategis yang ingin dicapai dalam implementasi teknologi informasi di UNIBA Madura
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                @php
                $sasaran = [
                    [
                        'title' => 'Integrasi Sistem',
                        'description' => 'Terwujudnya sistem informasi terintegrasi yang mendukung seluruh proses bisnis universitas',
                        'icon' => 'M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4',
                        'gradient' => 'from-blue-500 to-blue-600',
                        'bg' => 'blue'
                    ],
                    [
                        'title' => 'Digitalisasi Pembelajaran',
                        'description' => 'Platform pembelajaran digital yang inovatif dan mudah diakses oleh seluruh civitas akademika',
                        'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                        'gradient' => 'from-green-500 to-green-600',
                        'bg' => 'green'
                    ],
                    [
                        'title' => 'Infrastruktur Handal',
                        'description' => 'Infrastruktur TI yang reliable dengan uptime minimal 99% untuk mendukung operasional kampus',
                        'icon' => 'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01',
                        'gradient' => 'from-purple-500 to-purple-600',
                        'bg' => 'purple'
                    ],
                    [
                        'title' => 'Keamanan Data',
                        'description' => 'Sistem keamanan informasi yang memenuhi standar ISO 27001 untuk melindungi data institusi',
                        'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                        'gradient' => 'from-red-500 to-red-600',
                        'bg' => 'red'
                    ],
                    [
                        'title' => 'UNIBA Satu Data',
                        'description' => 'Single source of truth untuk data institusi yang akurat, terkini, dan terintegrasi',
                        'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
                        'gradient' => 'from-yellow-500 to-orange-600',
                        'bg' => 'yellow'
                    ],
                    [
                        'title' => 'Kepuasan Pengguna',
                        'description' => 'Tingkat kepuasan pengguna layanan TI minimal 85% melalui survey berkala',
                        'icon' => 'M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5',
                        'gradient' => 'from-indigo-500 to-indigo-600',
                        'bg' => 'indigo'
                    ],
                    [
                        'title' => 'SDM Kompeten',
                        'description' => 'Peningkatan kompetensi SDM TI melalui sertifikasi dan pelatihan berkelanjutan',
                        'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
                        'gradient' => 'from-teal-500 to-teal-600',
                        'bg' => 'teal'
                    ],
                    [
                        'title' => 'Akreditasi & Standar',
                        'description' => 'Memenuhi standar akreditasi BAN-PT dan regulasi Dikti dalam aspek teknologi informasi',
                        'icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z',
                        'gradient' => 'from-pink-500 to-pink-600',
                        'bg' => 'pink'
                    ]
                ];
                @endphp

                @foreach($sasaran as $index => $item)
                <div class="scroll-animate bg-white rounded-xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 group stagger-{{ ($index % 4) + 1 }}">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0">
                            <div class="w-14 h-14 bg-gradient-to-br {{ $item['gradient'] }} rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-start gap-2 mb-2">
                                <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-{{ $item['bg'] }}-100 text-{{ $item['bg'] }}-600 font-bold text-xs flex-shrink-0 mt-1">
                                    {{ $index + 1 }}
                                </span>
                                <h3 class="text-lg font-bold text-gray-900 group-hover:text-{{ $item['bg'] }}-600 transition-colors">
                                    {{ $item['title'] }}
                                </h3>
                            </div>
                            <p class="text-gray-600 text-sm leading-relaxed ml-8">
                                {{ $item['description'] }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
