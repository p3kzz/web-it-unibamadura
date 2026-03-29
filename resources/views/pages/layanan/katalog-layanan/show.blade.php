@extends('layouts.app')

@section('title', $katalogLayanan->nama . ' - UPT TIK UNIBA Madura')

@section('content')
    @php
        $status = trim((string) $katalogLayanan->status);
        $statusConfig = match ($status) {
            'Aktif' => [
                'bg' => 'bg-emerald-100',
                'text' => 'text-emerald-700',
                'dot' => 'bg-emerald-500',
                'label' => 'Layanan Aktif',
            ],
            'Maintenance' => [
                'bg' => 'bg-amber-100',
                'text' => 'text-amber-700',
                'dot' => 'bg-amber-500',
                'label' => 'Dalam Pemeliharaan',
            ],
            default => [
                'bg' => 'bg-gray-100',
                'text' => 'text-gray-600',
                'dot' => 'bg-gray-400',
                'label' => 'Tidak Aktif',
            ],
        };
    @endphp

    <section class="relative bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark pt-5 pb-40 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

        <div
            class="absolute top-20 right-10 w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow">
        </div>
        <div class="absolute bottom-20 left-10 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow"
            style="animation-delay: 1s;"></div>

        <div class="container mx-auto px-4 relative z-10">
            <nav class="inline-flex text-blue-100 hover:text-white transition-colors">
                <ol class="flex items-center space-x-2 text-blue-300 text-sm">
                    <li>
                        <a href="{{ route('home') }}"
                            class="hover:text-white transition-colors inline-flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Beranda
                        </a>
                    </li>
                    <li><svg class="w-3.5 h-3.5 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg></li>
                    <li><a href="{{ route('katalog-layanan.index') }}" class="hover:text-white transition-colors">Katalog
                            Layanan</a></li>
                    <li><svg class="w-3.5 h-3.5 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg></li>
                    <li class="text-white font-medium truncate max-w-[180px]">{{ $katalogLayanan->nama }}</li>
                </ol>
            </nav>
            <div class="max-w-4xl mx-auto text-center">

                <div class="flex flex-wrap items-center justify-center gap-3 mb-5 animate-fade-in-up stagger-1">
                    <span
                        class="inline-block bg-blue-800/50 backdrop-blur-sm text-blue-200 text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider border border-blue-700/50">
                        {{ $katalogLayanan->kategori?->nama ?? 'Layanan' }}
                    </span>
                    <span
                        class="{{ $statusConfig['bg'] }} {{ $statusConfig['text'] }} text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider inline-flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 {{ $statusConfig['dot'] }} rounded-full animate-pulse"></span>
                        {{ $status ?: 'N/A' }}
                    </span>
                </div>

                <h1
                    class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6 animate-fade-in-up stagger-2">
                    {{ $katalogLayanan->nama }}
                </h1>

                <p class="text-blue-100 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed animate-fade-in-up stagger-3">
                    {{ \Illuminate\Support\Str::limit(strip_tags($katalogLayanan->deskripsi ?? 'Layanan teknologi informasi untuk civitas akademika UNIBA Madura.'), 180) }}
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

    <section class="relative z-10 -mt-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4 max-w-4xl mx-auto scroll-animate">
                <div
                    class="bg-white rounded-2xl p-4 md:p-6 shadow-lg text-center border border-gray-100 hover:shadow-xl transition-all">
                    <div
                        class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center text-uniba-blue mx-auto mb-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="text-xs md:text-sm font-bold text-gray-900 leading-tight">
                        {{ $katalogLayanan->jam_layanan ?: 'Jam Kerja' }}</div>
                    <div class="text-[10px] text-gray-400 font-medium mt-1 uppercase tracking-wide">Jam Layanan</div>
                </div>
                <div
                    class="bg-white rounded-2xl p-4 md:p-6 shadow-lg text-center border border-gray-100 hover:shadow-xl transition-all">
                    <div
                        class="w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 mx-auto mb-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div class="text-xs md:text-sm font-bold text-gray-900 leading-tight">
                        {{ $katalogLayanan->pengguna_sasaran ?: 'Civitas Akademika' }}</div>
                    <div class="text-[10px] text-gray-400 font-medium mt-1 uppercase tracking-wide">Target Pengguna</div>
                </div>
                <div
                    class="bg-white rounded-2xl p-4 md:p-6 shadow-lg text-center border border-gray-100 hover:shadow-xl transition-all">
                    <div
                        class="w-10 h-10 bg-amber-50 rounded-xl flex items-center justify-center text-amber-600 mx-auto mb-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="text-xs md:text-sm font-bold text-gray-900 leading-tight truncate px-1">
                        {{ $katalogLayanan->service_owner ?: 'UPT TIK' }}</div>
                    <div class="text-[10px] text-gray-400 font-medium mt-1 uppercase tracking-wide">Penanggung Jawab</div>
                </div>
                <div
                    class="bg-white rounded-2xl p-4 md:p-6 shadow-lg text-center border border-gray-100 hover:shadow-xl transition-all">
                    <div
                        class="w-10 h-10 bg-amber-50 rounded-xl flex items-center justify-center text-amber-600 mx-auto mb-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="text-xs md:text-sm font-bold text-gray-900 leading-tight truncate px-1">
                        {{ $katalogLayanan->kontak ?: 'tidak tersedia' }}</div>
                    <div class="text-[10px] text-gray-400 font-medium mt-1 uppercase tracking-wide">Kontak</div>
                </div>
                <div
                    class="bg-white rounded-2xl p-4 md:p-6 shadow-lg text-center border border-gray-100 hover:shadow-xl transition-all">
                    <div
                        class="w-10 h-10 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600 mx-auto mb-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="text-xs md:text-sm font-bold text-gray-900 leading-tight">{{ $statusConfig['label'] }}
                    </div>
                    <div class="text-[10px] text-gray-400 font-medium mt-1 uppercase tracking-wide">Status</div>
                </div>
            </div>
        </div>
    </section>

    <section id="detail-layanan" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto space-y-8">

                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden scroll-animate">
                    <div class="p-8 md:p-10">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-1.5 h-10 bg-gradient-to-b from-uniba-blue to-blue-400 rounded-full"></div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">Tentang Layanan</h2>
                                <p class="text-sm text-gray-500">Deskripsi lengkap mengenai layanan ini</p>
                            </div>
                        </div>
                        <div
                            class="prose prose-blue max-w-none text-gray-600 leading-relaxed prose-headings:text-gray-900 prose-a:text-uniba-blue prose-strong:text-gray-900">
                            {!! $katalogLayanan->deskripsi !!}
                        </div>
                    </div>
                </div>

                @if ($katalogLayanan->cara_akses)
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden scroll-animate">
                        <div class="bg-gradient-to-r from-uniba-blue to-blue-600 px-8 md:px-10 py-6">
                            <h2 class="text-xl font-bold text-white flex items-center gap-3">
                                <span
                                    class="flex items-center justify-center w-10 h-10 bg-white/20 backdrop-blur rounded-xl">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                    </svg>
                                </span>
                                Cara Mengakses Layanan
                            </h2>
                        </div>
                        <div class="p-8 md:p-10">
                            <div
                                class="prose prose-sm md:prose-base prose-blue max-w-none text-gray-600 prose-ol:list-decimal prose-ul:list-disc prose-li:marker:text-uniba-blue">
                                {!! $katalogLayanan->cara_akses !!}
                            </div>
                        </div>
                    </div>
                @endif

                <div class="grid md:grid-cols-2 gap-6 scroll-animate">
                    <div
                        class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all">
                        <div class="bg-gradient-to-r from-amber-50 to-amber-100/50 px-6 py-4 border-b border-amber-100">
                            <h3 class="font-bold text-gray-900 flex items-center gap-3">
                                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm">
                                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                Informasi Biaya
                            </h3>
                        </div>
                        <div class="p-6">
                            <div class="text-sm text-gray-600 leading-relaxed prose prose-sm max-w-none">
                                {!! $katalogLayanan->biaya !!}
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all">
                        <div class="bg-gradient-to-r from-indigo-50 to-indigo-100/50 px-6 py-4 border-b border-indigo-100">
                            <h3 class="font-bold text-gray-900 flex items-center gap-3">
                                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm">
                                    <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                                Service Level Agreement
                            </h3>
                        </div>
                        <div class="p-6">
                            <div class="text-sm text-gray-600 leading-relaxed prose prose-sm max-w-none">
                                {!! $katalogLayanan->sla !!}
                            </div>
                        </div>
                    </div>
                </div>

                @if ($katalogLayanan->dependencies)
                    <div class="bg-blue-50 rounded-3xl p-6 md:p-8 border border-blue-100 scroll-animate">
                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-uniba-blue shadow-sm flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-2">Ketergantungan Layanan</h3>
                                <p class="text-gray-600 text-sm">{{ $katalogLayanan->dependencies }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($relatedLayanan->isNotEmpty())
                    <div class="scroll-animate">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-1.5 h-10 bg-gradient-to-b from-uniba-blue to-blue-400 rounded-full"></div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">Layanan Terkait</h2>
                                <p class="text-sm text-gray-500">Layanan lain yang mungkin Anda butuhkan</p>
                            </div>
                        </div>
                        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach ($relatedLayanan as $related)
                                <a href="{{ route('katalog-layanan.show', $related->id) }}"
                                    class="bg-white flex items-center gap-4 p-5 rounded-2xl border border-gray-100 hover:border-blue-200 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                                    <div
                                        class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center shrink-0 group-hover:bg-uniba-blue transition-all text-uniba-blue group-hover:text-white">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p
                                            class="text-sm font-bold text-gray-900 truncate group-hover:text-uniba-blue transition-colors">
                                            {{ $related->nama }}
                                        </p>
                                        <p class="text-[11px] text-gray-400 font-medium uppercase tracking-wider mt-0.5">
                                            {{ $related->kategori?->nama }}
                                        </p>
                                    </div>
                                    <svg class="w-4 h-4 text-gray-300 group-hover:text-uniba-blue transition-colors shrink-0"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>

    <section class="py-16 bg-gradient-to-br from-uniba-blue to-uniba-dark">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center scroll-animate">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Butuh Bantuan?</h2>
                <p class="text-blue-100 text-lg mb-8">
                    Tim Helpdesk UPT TIK siap membantu Anda. Hubungi kami jika memerlukan bantuan terkait layanan.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#"
                        class="px-8 py-4 bg-uniba-yellow text-uniba-blue font-bold rounded-xl hover:bg-yellow-400 transition-all shadow-lg transform hover:-translate-y-1 inline-flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        Hubungi Helpdesk
                    </a>
                    <a href="#"
                        class="px-8 py-4 bg-white/10 backdrop-blur text-white font-bold rounded-xl hover:bg-white/20 transition-all border border-white/20 inline-flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        FAQ & Panduan
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
