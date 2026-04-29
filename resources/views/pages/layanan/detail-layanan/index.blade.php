@extends('layouts.app')

@section('title', ($detail?->title ?? 'Detail Layanan') . ' - Web detail UPT TIK UNIBA Madura')

@section('content')
    @if (!$detail)
        <section class="relative bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark pt-5 pb-40 overflow-hidden">
            <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
            </div>

            <div
                class="absolute top-20 right-10 w-72 h-72 bg-indigo-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow">
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
                        <li><a href="{{ route('katalog-layanan.index') }}"
                                class="hover:text-white transition-colors">Layanan</a></li>
                    </ol>
                </nav>

                <div class="max-w-4xl mx-auto text-center">
                    <h1
                        class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6 animate-fade-in-up stagger-2">
                        Detail Layanan Tidak Ditemukan
                    </h1>

                    <p
                        class="text-blue-100 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed animate-fade-in-up stagger-3">
                        Maaf, detail layanan yang Anda cari tidak tersedia saat ini.
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

        <section class="py-16 bg-gray-50 min-h-96">
            <div class="container mx-auto px-4">
                <div class="max-w-2xl mx-auto text-center">
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-12">
                        <svg class="w-20 h-20 mx-auto text-gray-300 mb-6" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h2 class="text-2xl font-bold text-gray-900 mb-3">Layanan Belum Tersedia</h2>
                        <p class="text-gray-600 mb-8">Detail layanan ini masih dalam tahap persiapan. Silakan kembali ke
                            daftar
                            layanan atau hubungi kami untuk informasi lebih lanjut.</p>

                        <div class="flex flex-col gap-3">
                            <a href="{{ route('katalog-layanan.index') }}"
                                class="inline-flex items-center justify-center px-6 py-3 bg-uniba-blue text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Kembali ke Daftar Layanan
                            </a>
                            <a href="{{ route('home') }}"
                                class="inline-flex items-center justify-center px-6 py-3 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition-colors">
                                Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="relative bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark pt-5 pb-40 overflow-hidden">
            <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
            </div>

            <div
                class="absolute top-20 right-10 w-72 h-72 bg-indigo-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow">
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
                        <li><a href="{{ route('katalog-layanan.index') }}"
                                class="hover:text-white transition-colors">Layanan</a></li>
                        <li><svg class="w-3.5 h-3.5 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg></li>
                        <li class="text-white font-medium truncate max-w-[180px]">{{ $detail->title }}</li>
                    </ol>
                </nav>

                <div class="max-w-4xl mx-auto text-center">
                    <span
                        class="inline-block bg-emerald-100 text-emerald-700 text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider mb-4">
                        Layanan Aktif
                    </span>

                    <h1
                        class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6 animate-fade-in-up stagger-2">
                        {{ $detail->title }}
                    </h1>

                    <p
                        class="text-blue-100 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed animate-fade-in-up stagger-3">
                        Informasi detail layanan untuk mendukung layanan digital institusi.
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

        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="max-w-5xl mx-auto space-y-6">
                    @if ($detail->content && is_array($detail->content) && count($detail->content) > 0)
                        @foreach ($detail->content as $index => $section)
                            <article
                                class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden scroll-animate">
                                <div class="bg-uniba-blue px-8 md:px-10 py-6">
                                    <h3 class="text-xl font-bold text-white flex items-center gap-3">
                                        <span
                                            class="inline-flex items-center justify-center w-8 h-8 bg-white/20 rounded-lg text-sm font-bold">
                                            {{ $index + 1 }}
                                        </span>
                                        {{ $section['title'] ?? ($section->title ?? 'Bagian ' . ($index + 1)) }}
                                    </h3>
                                </div>

                                <div class="p-8 md:p-10">
                                    <div
                                        class="prose prose-sm md:prose max-w-none prose-headings:text-gray-900 prose-p:text-gray-700 prose-li:text-gray-700">
                                        {!! $section['content'] ?? ($section->content ?? '') !!}
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    @else
                        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 md:p-10">
                            <div
                                class="prose prose-sm md:prose max-w-none prose-headings:text-gray-900 prose-p:text-gray-700 prose-li:text-gray-700">
                                {!! $detail->content ?? '<p class="text-gray-500">Tidak ada konten untuk layanan ini.</p>' !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif
@endsection
