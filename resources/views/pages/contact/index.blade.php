@extends('layouts.app')

@section('title', 'Hubungi Kami - UPT TIK UNIBA Madura')

@section('content')

    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark pt-20 pb-32 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

        <div
            class="absolute top-20 left-10 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow">
        </div>
        <div class="absolute bottom-20 right-10 w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow"
            style="animation-delay: 1s;"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <span
                    class="inline-block bg-blue-800/50 backdrop-blur-sm text-blue-200 text-xs font-bold px-4 py-2 rounded-full uppercase tracking-wider mb-4 animate-fade-in-up border border-blue-700/50">
                    <svg class="w-4 h-4 inline-block mr-1 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Layanan Kami
                </span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 animate-fade-in-up stagger-1">
                    Hubungi Kami
                </h1>
                <p class="text-lg md:text-xl text-blue-100 mb-8 animate-fade-in-up stagger-2 max-w-2xl mx-auto">
                    Kami siap membantu Anda dengan berbagai saluran komunikasi yang tersedia 24/7
                </p>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg class="relative block w-full h-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="fill-gray-50"></path>
            </svg>
        </div>
    </section>

    {{-- Stats Section --}}
    {{-- <section class="relative z-10 -mt-8">
        <div class="container mx-auto px-4">
            @php
                $emailCount = count($groupedByType->get('email', []));
                $phoneCount = count($groupedByType->get('phone', []));
                $addressCount = count($groupedByType->get('address', []));
                $totalCount = $emailCount + $phoneCount + $addressCount;
            @endphp
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto">
                <div
                    class="bg-white rounded-2xl p-4 md:p-6 shadow-lg text-center border border-gray-100 hover:shadow-xl transition-shadow scroll-animate">
                    <div class="text-2xl md:text-3xl font-bold text-uniba-blue">{{ $totalCount }}</div>
                    <div class="text-xs md:text-sm text-gray-500 font-medium">Total Kontak</div>
                </div>
                <div class="bg-white rounded-2xl p-4 md:p-6 shadow-lg text-center border border-gray-100 hover:shadow-xl transition-shadow scroll-animate"
                    style="animation-delay: 0.1s;">
                    <div class="text-2xl md:text-3xl font-bold text-blue-600">{{ $emailCount }}</div>
                    <div class="text-xs md:text-sm text-gray-500 font-medium">Email</div>
                </div>
                <div class="bg-white rounded-2xl p-4 md:p-6 shadow-lg text-center border border-gray-100 hover:shadow-xl transition-shadow scroll-animate"
                    style="animation-delay: 0.2s;">
                    <div class="text-2xl md:text-3xl font-bold text-green-600">{{ $phoneCount }}</div>
                    <div class="text-xs md:text-sm text-gray-500 font-medium">Telepon</div>
                </div>
                <div class="bg-white rounded-2xl p-4 md:p-6 shadow-lg text-center border border-gray-100 hover:shadow-xl transition-shadow scroll-animate"
                    style="animation-delay: 0.3s;">
                    <div class="text-2xl md:text-3xl font-bold text-orange-600">{{ $addressCount }}</div>
                    <div class="text-xs md:text-sm text-gray-500 font-medium">Alamat</div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- Contact Information Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                @if ($groupedByType->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        @php
                            $contactTypes = [
                                'email' => [
                                    'label' => 'Email',
                                    'description' => 'Hubungi kami melalui email untuk pertanyaan umum atau pengajuan',
                                    'icon' =>
                                        'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                                    'color' => 'blue',
                                    'gradient' => 'from-blue-500 to-blue-600',
                                ],
                                'phone' => [
                                    'label' => 'Telepon',
                                    'description' => 'Hubungi kami melalui telepon untuk bantuan cepat dan konsultasi',
                                    'icon' =>
                                        'M3 5a2 2 0 012-2h3.28a1 1 0 00.948.684l1.498 4.493a1 1 0 00.502.756l2.048 1.029a2 2 0 002.992-2.059l-.5-5A2 2 0 0013.5 2H5a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-3.061a1 1 0 00-1.517-.852l-1.483.742a1 1 0 00-.502.756L12.196 15.5h-4.692l-1.498-4.493a1 1 0 00-.502-.756l-2.048-1.029a2 2 0 00-2.992 2.059l.5 5A2 2 0 006.5 18H15',
                                    'color' => 'green',
                                    'gradient' => 'from-green-500 to-green-600',
                                ],
                                'address' => [
                                    'label' => 'Alamat',
                                    'description' => 'Kunjungi kantor kami secara langsung untuk layanan tatap muka',
                                    'icon' =>
                                        'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z',
                                    'color' => 'orange',
                                    'gradient' => 'from-orange-500 to-orange-600',
                                ],
                            ];
                        @endphp

                        @foreach ($contactTypes as $type => $info)
                            @if ($groupedByType->has($type))
                                <div class="scroll-animate stagger-{{ $loop->index + 1 }}">
                                    <div
                                        class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden h-full flex flex-col border border-gray-100 hover:border-{{ $info['color'] }}-200 transform hover:-translate-y-1">
                                        {{-- Header with Gradient --}}
                                        <div
                                            class="bg-gradient-to-r {{ $info['gradient'] }} p-8 flex items-center gap-4 relative overflow-hidden">
                                            <div
                                                class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
                                            </div>
                                            <div
                                                class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center relative z-10 shadow-lg">
                                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="{{ $info['icon'] }}"></path>
                                                </svg>
                                            </div>
                                            <div class="relative z-10">
                                                <h2 class="text-3xl font-bold text-white">{{ $info['label'] }}</h2>
                                                <p class="text-white/80 text-sm mt-1">{{ $info['description'] }}</p>
                                            </div>
                                        </div>

                                        {{-- Content --}}
                                        <div class="p-8 flex-grow">
                                            <div class="space-y-5">
                                                @foreach ($groupedByType[$type] as $index => $contact)
                                                    <div class="group">
                                                        <div
                                                            class="flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 transition-colors">
                                                            <div
                                                                class="flex-shrink-0 w-10 h-10 bg-{{ $info['color'] }}-100 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                                                <span
                                                                    class="text-{{ $info['color'] }}-600 font-bold text-sm">
                                                                    {{ $index + 1 }}
                                                                </span>
                                                            </div>
                                                            <div class="min-w-0 flex-1">
                                                                <h3 class="font-semibold text-gray-900 mb-1.5">
                                                                    {{ $contact->label }}</h3>
                                                                <p
                                                                    class="text-gray-600 break-words text-sm leading-relaxed hover:text-{{ $info['color'] }}-600 transition-colors">
                                                                    {{ $contact->value }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        {{-- Footer --}}
                                        <div
                                            class="px-8 py-4 border-t border-gray-100 bg-gradient-to-r from-{{ $info['color'] }}-50 to-transparent">
                                            <p class="text-xs text-gray-500 flex items-center gap-2">
                                                <svg class="w-4 h-4 text-{{ $info['color'] }}-500" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Tersedia & siap membantu
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    {{-- Info Cards Section --}}
                    <div class="mt-16">
                        <div class="text-center mb-12 scroll-animate">
                            <h2 class="text-3xl font-bold text-gray-900 mb-4">Mengapa Menghubungi Kami?</h2>
                            <div class="w-20 h-1 bg-uniba-yellow mx-auto"></div>
                        </div>

                        <div class="grid md:grid-cols-3 gap-6">
                            {{-- Card 1 --}}
                            <div
                                class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8 border border-blue-200 hover:shadow-lg transition-shadow scroll-animate">
                                <div
                                    class="w-14 h-14 bg-blue-500 rounded-2xl flex items-center justify-center mb-4 shadow-lg">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-2">Respon Cepat</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    Tim kami siap memberikan respon cepat terhadap setiap pertanyaan dan kebutuhan Anda
                                </p>
                            </div>

                            {{-- Card 2 --}}
                            <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-8 border border-green-200 hover:shadow-lg transition-shadow scroll-animate"
                                style="animation-delay: 0.1s;">
                                <div
                                    class="w-14 h-14 bg-green-500 rounded-2xl flex items-center justify-center mb-4 shadow-lg">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m7 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-2">Profesional</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    Layanan profesional dari tim berpengalaman yang siap membantu dengan solusi terbaik
                                </p>
                            </div>

                            {{-- Card 3 --}}
                            <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-8 border border-purple-200 hover:shadow-lg transition-shadow scroll-animate"
                                style="animation-delay: 0.2s;">
                                <div
                                    class="w-14 h-14 bg-purple-500 rounded-2xl flex items-center justify-center mb-4 shadow-lg">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z">
                                        </path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-2">Dukungan 24/7</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    Hubungi kami kapan saja melalui berbagai saluran komunikasi yang tersedia sepanjang
                                    waktu
                                </p>
                            </div>
                        </div>
                    </div>
                @else
                    {{-- Empty State --}}
                    <div class="text-center py-20">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Belum Ada Data Kontak</h3>
                        <p class="text-gray-500 max-w-md mx-auto">
                            Informasi kontak belum tersedia untuk ditampilkan saat ini. Silahkan hubungi admin untuk
                            informasi lebih
                            lanjut.
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div
            class="absolute top-10 -left-20 w-96 h-96 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20">
        </div>
        <div
            class="absolute bottom-10 -right-20 w-96 h-96 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20">
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center scroll-animate">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Siap Membantu Anda
                </h2>
                <p class="text-blue-100 text-lg mb-8 max-w-2xl mx-auto">
                    Jangan ragu untuk menghubungi kami melalui salah satu saluran komunikasi di atas. Tim kami akan segera
                    merespon dengan solusi terbaik untuk Anda.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/"
                        class="px-8 py-4 bg-uniba-yellow text-uniba-blue font-bold rounded-xl hover:bg-yellow-400 transition-all shadow-lg transform hover:-translate-y-1 inline-flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali ke Beranda
                    </a>
                    <a href="/"
                        class="px-8 py-4 bg-white/10 backdrop-blur text-white font-bold rounded-xl hover:bg-white/20 transition-all border border-white/20 inline-flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Jelajahi Layanan
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
