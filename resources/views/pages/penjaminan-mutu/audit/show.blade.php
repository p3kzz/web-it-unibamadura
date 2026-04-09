@extends('layouts.app')

@section('title', $audit->title . ' - Audit UPT TIK UNIBA Madura')

@section('content')
    <section class="relative bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark pt-5 pb-40 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

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
                    <li><a href="{{ route('audit.index') }}" class="hover:text-white transition-colors">Audit</a></li>
                    <li><svg class="w-3.5 h-3.5 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg></li>
                    <li class="text-white font-medium truncate max-w-[180px]">{{ $audit->title }}</li>
                </ol>
            </nav>

            <div class="max-w-2xl mx-auto text-center">
                <span
                    class="inline-block bg-emerald-100 text-emerald-700 text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider mb-4">
                    Penjaminan Mutu
                </span>

                <h1
                    class="text-4xl md:text-2xl lg:text-4xl font-extrabold text-white leading-tight mb-6 animate-fade-in-up stagger-2">
                    {{ $audit->title }}
                </h1>

                <p class="text-blue-100 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed animate-fade-in-up stagger-3">
                    {{ $audit->description ?: 'Informasi layanan audit untuk mendukung kebutuhan evaluasi dan peningkatan mutu institusi.' }}
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
                @forelse ($audit->sections as $index => $section)
                    <article class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden scroll-animate">
                        <div class="bg-gradient-to-r from-uniba-blue to-blue-600 px-8 md:px-10 py-6">
                            <h3 class="text-xl font-bold text-white flex items-center gap-3">
                                <span
                                    class="inline-flex items-center justify-center w-8 h-8 bg-white/20 rounded-lg text-sm font-bold">
                                    {{ $index + 1 }}
                                </span>
                                {{ $section->title }}
                            </h3>
                        </div>

                        <div class="p-8 md:p-10">
                            <div
                                class="prose prose-sm md:prose max-w-none prose-headings:text-gray-900 prose-p:text-gray-700 prose-li:text-gray-700">
                                {!! $section->content !!}
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="bg-white border-2 border-dashed border-gray-200 rounded-3xl p-12 text-center">
                        <h3 class="font-bold text-xl text-gray-900 mb-2">Bagian hosting belum tersedia</h3>
                        <p class="text-gray-500 max-w-md mx-auto">
                            Data web hosting ini belum memiliki rincian bagian. Silakan cek kembali beberapa saat lagi.
                        </p>
                    </div>
                @endforelse

                @if ($relatedAudits->isNotEmpty())
                    <div class="scroll-animate pt-2">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-1.5 h-10 bg-gradient-to-b from-uniba-blue to-blue-400 rounded-full"></div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">Layanan Terkait</h2>
                                <p class="text-sm text-gray-500">Referensi layanan audit lain yang tersedia</p>
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach ($relatedAudits as $related)
                                <a href="{{ route('audit.show', $related->slug) }}"
                                    class="bg-white flex items-center gap-4 p-5 rounded-2xl border border-gray-100 hover:border-blue-200 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                                    <div
                                        class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center shrink-0 group-hover:bg-uniba-blue transition-all text-uniba-blue group-hover:text-white">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p
                                            class="text-sm font-bold text-gray-900 truncate group-hover:text-uniba-blue transition-colors">
                                            {{ $related->title }}
                                        </p>
                                        <p class="text-[11px] text-gray-400 font-medium uppercase tracking-wider mt-0.5">
                                            {{ $related->sections_count }} Bagian
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
@endsection
