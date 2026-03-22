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
                            'number' => $totalPegawai,
                            'label' => 'Pegawai Aktif',
                            'icon' =>
                                'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
                            'color' => 'blue',
                        ],
                        [
                            'number' => $totalSertifikasi . '+',
                            'label' => 'Sertifikasi',
                            'icon' =>
                                'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z',
                            'color' => 'green',
                        ],
                        [
                            'number' => '100%',
                            'label' => 'Bersertifikasi',
                            'icon' =>
                                'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                            'color' => 'purple',
                        ],
                        [
                            'number' => $struktur?->periode?->start_year . '-' . $struktur?->periode?->end_year,
                            'label' => 'Periode Aktif',
                            'icon' =>
                                'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
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

            @if ($pegawaiList->count() > 0)
                <div class="max-w-7xl mx-auto space-y-8">
                    @php
                        $colors = ['blue', 'green', 'purple', 'orange', 'teal', 'indigo'];
                    @endphp

                    @foreach ($pegawaiList as $index => $pegawai)
                        @php
                            $color = $colors[$index % count($colors)];
                            $currentUnit = $pegawai->penugasan->first()?->unitOrganisasi;
                            $sertifikasiList = is_array($pegawai->sertifikasi) ? $pegawai->sertifikasi : [];
                        @endphp

                        <div class="scroll-animate stagger-{{ ($index % 3) + 1 }}">
                            <div
                                class="bg-white border-2 border-gray-200 rounded-2xl overflow-hidden hover:border-{{ $color }}-500 hover:shadow-2xl transition-all duration-300 group">
                                <div class="md:flex">
                                    {{-- Left Side - Profile --}}
                                    <div
                                        class="md:w-1/3 bg-gradient-to-br from-{{ $color }}-500 to-{{ $color }}-600 p-8 text-white relative overflow-hidden">
                                        {{-- Background Pattern --}}
                                        <div
                                            class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
                                        </div>

                                        <div class="relative z-10">
                                            {{-- Avatar --}}
                                            <div class="w-32 h-32 mx-auto mb-6 rounded-full bg-white p-1 shadow-xl">
                                                @if ($pegawai->foto)
                                                    <img src="{{ asset('storage/' . $pegawai->foto) }}"
                                                        alt="{{ $pegawai->nama }}"
                                                        class="w-full h-full rounded-full object-cover">
                                                @else
                                                    <div
                                                        class="w-full h-full rounded-full bg-gradient-to-br from-{{ $color }}-100 to-{{ $color }}-200 flex items-center justify-center">
                                                        <svg class="w-16 h-16 text-{{ $color }}-600" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>

                                            {{-- Name & Position --}}
                                            <h3 class="text-xl font-bold text-center mb-2">
                                                {{ $pegawai->nama }}
                                            </h3>

                                            {{-- Position Badge --}}
                                            <div class="flex justify-center mb-4">
                                                <span
                                                    class="inline-block bg-white bg-opacity-20 backdrop-blur-sm text-white text-xs font-bold px-4 py-2 rounded-full">
                                                    {{ $pegawai->jabatan }}
                                                </span>
                                            </div>

                                            {{-- Division --}}
                                            @if ($currentUnit)
                                                <div class="flex items-center justify-center gap-2 mb-4">
                                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                                        </path>
                                                    </svg>
                                                    <span class="text-sm text-white">{{ $currentUnit->name }}</span>
                                                </div>
                                            @endif

                                            {{-- Unit Type Badge --}}
                                            @if ($currentUnit)
                                                <div
                                                    class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-3 text-center">
                                                    <svg class="w-6 h-6 text-white mx-auto mb-2" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                                        </path>
                                                    </svg>
                                                    <p class="text-sm font-semibold">
                                                        {{ $currentUnit->type === 'directorate' ? 'Direktorat' : 'Subdirektorat' }}
                                                    </p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Right Side - Certifications --}}
                                    <div class="md:w-2/3 p-8">
                                        <div class="flex items-center gap-3 mb-6">
                                            <div
                                                class="w-10 h-10 bg-{{ $color }}-100 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-{{ $color }}-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <h4 class="text-xl font-bold text-gray-900">Kompetensi & Sertifikasi</h4>
                                        </div>

                                        @if (count($sertifikasiList) > 0)
                                            <div class="space-y-3">
                                                @foreach ($sertifikasiList as $cert)
                                                    <div
                                                        class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg hover:bg-{{ $color }}-50 transition-colors duration-200 group/cert">
                                                        <svg class="w-5 h-5 text-{{ $color }}-500 flex-shrink-0 mt-0.5"
                                                            fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span
                                                            class="text-gray-700 text-sm group-hover/cert:text-{{ $color }}-700 transition-colors">{{ $cert }}</span>
                                                    </div>
                                                @endforeach
                                            </div>

                                            {{-- Certification Count Badge --}}
                                            <div class="mt-6 flex items-center gap-2">
                                                <span
                                                    class="inline-flex items-center gap-2 bg-{{ $color }}-100 text-{{ $color }}-700 px-4 py-2 rounded-full text-sm font-semibold">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                        </path>
                                                    </svg>
                                                    {{ count($sertifikasiList) }} Sertifikasi
                                                </span>
                                            </div>
                                        @else
                                            <div class="text-center py-8 text-gray-500">
                                                <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                    </path>
                                                </svg>
                                                <p class="text-sm">Belum ada data sertifikasi</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                {{-- Empty State --}}
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Belum Ada Data Pegawai</h3>
                    <p class="text-gray-500 max-w-md mx-auto">
                        Data pegawai belum tersedia untuk ditampilkan saat ini.
                    </p>
                </div>
            @endif
        </div>
    </section>

    {{-- Certification Highlight Section --}}
    @if ($totalSertifikasi > 0)
        <section class="py-20 bg-gradient-to-br from-blue-50 to-indigo-50">
            <div class="container mx-auto px-4">
                <div class="max-w-5xl mx-auto">
                    <div
                        class="scroll-animate bg-gradient-to-r from-blue-600 to-blue-700 rounded-3xl shadow-2xl overflow-hidden p-8 md:p-12 text-white">
                        <div class="flex items-center gap-4 mb-6">
                            <div
                                class="w-16 h-16 bg-white bg-opacity-20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                    </path>
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold">Komitmen Pengembangan SDM</h2>
                        </div>
                        <p class="text-blue-100 leading-relaxed mb-6">
                            UPT TIK UNIBA Madura berkomitmen untuk terus meningkatkan kompetensi sumber daya manusia melalui
                            program sertifikasi internasional dan nasional. Dengan total lebih dari {{ $totalSertifikasi }}
                            sertifikasi profesional,
                            tim kami siap memberikan layanan teknologi informasi yang terbaik dan terdepan.
                        </p>
                        <div class="grid md:grid-cols-3 gap-4">
                            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-4 text-center">
                                <div class="text-2xl font-bold mb-1">{{ $totalPegawai }}</div>
                                <div class="text-blue-100 text-sm">Pegawai Aktif</div>
                            </div>
                            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-4 text-center">
                                <div class="text-2xl font-bold mb-1">{{ $totalSertifikasi }}+</div>
                                <div class="text-blue-100 text-sm">Total Sertifikasi</div>
                            </div>
                            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-4 text-center">
                                <div class="text-2xl font-bold mb-1">100%</div>
                                <div class="text-blue-100 text-sm">Bersertifikasi</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection
