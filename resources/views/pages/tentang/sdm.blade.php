@extends('layouts.app')

@section('title', 'Sumber Daya Manusia - UPT TIK UNIBA Madura')

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
                    Sumber Daya Manusia
                </h1>
                <p class="text-lg text-blue-100 animate-fade-in-up stagger-2">
                    Tim profesional dan bersertifikasi yang menggerakkan teknologi informasi UNIBA Madura
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

    {{-- Statistics Section --}}
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
                @php
                    $stats = [
                        [
                            'number' => '3',
                            'label' => 'Pegawai Tetap',
                            'icon' =>
                                'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
                            'color' => 'blue',
                        ],
                        [
                            'number' => '20+',
                            'label' => 'Sertifikasi',
                            'icon' =>
                                'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z',
                            'color' => 'green',
                        ],
                        [
                            'number' => '2',
                            'label' => 'Doktor (S3)',
                            'icon' =>
                                'M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222',
                            'color' => 'purple',
                        ],
                        [
                            'number' => '1',
                            'label' => 'Magister (S2)',
                            'icon' =>
                                'M12 14l9-5-9-5-9 5 9 5z M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z',
                            'color' => 'orange',
                        ],
                    ];
                @endphp

                @foreach ($stats as $stat)
                    <div
                        class="scroll-animate bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 text-center">
                        <div
                            class="w-12 h-12 bg-{{ $stat['color'] }}-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-{{ $stat['color'] }}-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="{{ $stat['icon'] }}"></path>
                            </svg>
                        </div>
                        <div class="text-3xl font-bold text-gray-900 mb-1">{{ $stat['number'] }}</div>
                        <div class="text-sm text-gray-600">{{ $stat['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Profile Cards Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Profil Tim</h2>
                <div class="w-20 h-1 bg-uniba-yellow mx-auto mb-4"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Tenaga ahli bersertifikasi internasional dan nasional
                </p>
            </div>

            @php
                $team = [
                    [
                        'name' => 'DR. RADEN ARIEF SETYAWAN, S.T., M.T.',
                        'position' => 'Direktur DTI',
                        'bagian' => 'Direktorat Teknologi Informasi',
                        'education' => 'Doktor S3',
                        'certifications' => [
                            'Certified International Specialist in Data Visualization (CISDV)',
                            'Microsoft Azure AI Fundamentals (AI-900)',
                            'Microsoft Azure Fundamentals (AZ-900)',
                        ],
                        'color' => 'blue',
                        'icon' =>
                            'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                    ],
                    [
                        'name' => 'MOCH. ALFAN CHOIRUDIN, S.Sos.',
                        'position' => 'Sekretaris DTI',
                        'bagian' => 'Direktorat Teknologi Informasi',
                        'education' => 'Sarjana S1',
                        'certifications' => ['Diklat Perbendaharaan', 'Diklat Pengadaan Barang dan Jasa'],
                        'color' => 'green',
                        'icon' =>
                            'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                    ],
                    [
                        'name' => 'FARID JAUHARI, S.Kom., M.Kom.',
                        'position' => 'Kepala Subdit Infrastruktur',
                        'bagian' => 'Sub Direktorat Infrastruktur',
                        'education' => 'Magister S2',
                        'certifications' => [
                            'Microsoft Office Specialist – Excel 2019 Associate',
                            'Microsoft Technology Associate – Software Development Fundamentals',
                            'Badan Nasional Sertifikasi Profesi Kompetensi "Programming"',
                            'IBM Information Management DB2 10 Technical Professional v3',
                            'IBM Certified Solution Developer DB2 9.7 SQL Procedure',
                            'IBM Certified Database Associate DB2 10.1 Fundamentals',
                            'IBM Certified Database Associate DB2 Fundamentals',
                            'IBM DB2 Academic Associate "DB2 Database and Application Fundamentals"',
                            'Certified International Specialist in Data Visualization (CISDV)',
                            'Google Certified Educator Level 1 and 2',
                            'Microsoft Azure AI Fundamentals (AI-900)',
                        ],
                        'color' => 'purple',
                        'icon' =>
                            'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01',
                    ],
                ];
            @endphp

            <div class="max-w-7xl mx-auto space-y-8">
                @foreach ($team as $index => $member)
                    <div class="scroll-animate stagger-{{ $index + 1 }}">
                        <div
                            class="bg-white border-2 border-gray-200 rounded-2xl overflow-hidden hover:border-{{ $member['color'] }}-500 hover:shadow-2xl transition-all duration-300 group">
                            <div class="md:flex">
                                {{-- Left Side - Profile --}}
                                <div
                                    class="md:w-1/3 bg-gradient-to-br from-{{ $member['color'] }}-500 to-{{ $member['color'] }}-600 p-8 text-white relative overflow-hidden">
                                    {{-- Background Pattern --}}
                                    <div
                                        class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
                                    </div>

                                    <div class="relative z-10">
                                        {{-- Avatar --}}
                                        <div class="w-32 h-32 mx-auto mb-6 rounded-full bg-white p-1 shadow-xl">
                                            <div
                                                class="w-full h-full rounded-full bg-gradient-to-br from-{{ $member['color'] }}-100 to-{{ $member['color'] }}-200 flex items-center justify-center">
                                                <svg class="w-16 h-16 text-{{ $member['color'] }}-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>

                                        {{-- Name & Position --}}
                                        <h3 class="text-xl font-bold text-center mb-2">
                                            {{ $member['name'] }}
                                        </h3>

                                        {{-- Position Badge --}}
                                        <div class="flex justify-center mb-4">
                                            <span
                                                class="inline-block bg-white bg-opacity-20 backdrop-blur-sm text-white text-xs font-bold px-4 py-2 rounded-full">
                                                {{ $member['position'] }}
                                            </span>
                                        </div>

                                        {{-- Division --}}
                                        <div class="flex items-center justify-center gap-2 mb-4">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="{{ $member['icon'] }}"></path>
                                            </svg>
                                            <span class="text-sm text-white">{{ $member['bagian'] }}</span>
                                        </div>

                                        {{-- Education --}}
                                        <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-3 text-center">
                                            <svg class="w-6 h-6 text-white mx-auto mb-2" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                                <path
                                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222">
                                                </path>
                                            </svg>
                                            <p class="text-sm font-semibold">{{ $member['education'] }}</p>
                                        </div>
                                    </div>
                                </div>

                                {{-- Right Side - Certifications --}}
                                <div class="md:w-2/3 p-8">
                                    <div class="flex items-center gap-3 mb-6">
                                        <div
                                            class="w-10 h-10 bg-{{ $member['color'] }}-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-{{ $member['color'] }}-600" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                                </path>
                                            </svg>
                                        </div>
                                        <h4 class="text-xl font-bold text-gray-900">Kompetensi & Sertifikasi</h4>
                                    </div>

                                    <div class="space-y-3">
                                        @foreach ($member['certifications'] as $cert)
                                            <div
                                                class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg hover:bg-{{ $member['color'] }}-50 transition-colors duration-200 group/cert">
                                                <svg class="w-5 h-5 text-{{ $member['color'] }}-500 flex-shrink-0 mt-0.5"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span
                                                    class="text-gray-700 text-sm group-hover/cert:text-{{ $member['color'] }}-700 transition-colors">{{ $cert }}</span>
                                            </div>
                                        @endforeach
                                    </div>

                                    {{-- Certification Count Badge --}}
                                    <div class="mt-6 flex items-center gap-2">
                                        <span
                                            class="inline-flex items-center gap-2 bg-{{ $member['color'] }}-100 text-{{ $member['color'] }}-700 px-4 py-2 rounded-full text-sm font-semibold">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                </path>
                                            </svg>
                                            {{ count($member['certifications']) }} Sertifikasi
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Certification Highlight Section --}}
    <section class="py-20 bg-gradient-to-br from-blue-50 to-indigo-50">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">
                <div
                    class="scroll-animate bg-gradient-to-r from-blue-600 to-blue-700 rounded-3xl shadow-2xl overflow-hidden p-8 md:p-12 text-white">
                    <div class="flex items-center gap-4 mb-6">
                        <div
                            class="w-16 h-16 bg-white bg-opacity-20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                </path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold">Komitmen Pengembangan SDM</h2>
                    </div>
                    <p class="text-blue-100 leading-relaxed mb-6">
                        UPT TIK UNIBA Madura berkomitmen untuk terus meningkatkan kompetensi sumber daya manusia melalui
                        program sertifikasi internasional dan nasional. Dengan total lebih dari 20 sertifikasi profesional,
                        tim kami siap memberikan layanan teknologi informasi yang terbaik dan terdepan.
                    </p>
                    <div class="grid md:grid-cols-3 gap-4">
                        <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-4 text-center">
                            <div class="text-2xl font-bold mb-1">100%</div>
                            <div class="text-blue-100 text-sm">Bersertifikasi</div>
                        </div>
                        <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-4 text-center">
                            <div class="text-2xl font-bold mb-1">3+</div>
                            <div class="text-blue-100 text-sm">Microsoft Certified</div>
                        </div>
                        <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-4 text-center">
                            <div class="text-2xl font-bold mb-1">10+</div>
                            <div class="text-blue-100 text-sm">IBM Certified</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
