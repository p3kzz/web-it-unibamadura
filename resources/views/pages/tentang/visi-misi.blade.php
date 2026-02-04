@extends('layouts.app')

@section('title', 'Visi & Misi - UPT TIK UNIBA Madura')

@section('content')

    <section class="relative bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <span
                    class="inline-block bg-blue-800 text-blue-200 text-xs font-bold px-4 py-2 rounded-full uppercase tracking-wider mb-4 animate-fade-in-up">
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

        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg class="relative block w-full h-12" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="fill-gray-50"></path>
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
                            <div
                                class="w-16 h-16 bg-gradient-to-br from-uniba-blue to-blue-600 rounded-xl flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-3xl font-bold text-gray-900">Visi</h2>
                                <div class="w-20 h-1 bg-uniba-yellow mt-2"></div>
                            </div>
                        </div>

                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-8 border-l-4 border-uniba-blue">
                            @if ($visi)
                                <p class="text-lg md:text-xl text-gray-700 leading-relaxed italic">
                                    "{{ $visi->content }}"
                                </p>
                            @else
                                <p class="text-lg md:text-xl text-gray-700 leading-relaxed italic">
                                    Tidak ada visi yang tersedia.
                                </p>
                            @endif
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
                            <div
                                class="w-16 h-16 bg-gradient-to-br from-uniba-yellow to-yellow-500 rounded-xl flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-uniba-blue" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-3xl font-bold text-gray-900">Misi</h2>
                                <div class="w-20 h-1 bg-uniba-yellow mt-2"></div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            @if ($misi->isEmpty())
                                <p class="text-gray-700">
                                    Tidak ada misi yang tersedia.
                                </p>
                            @else
                                @foreach ($misi as $index => $item)
                                    <div
                                        class="scroll-animate bg-white rounded-xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 border-l-4 border-uniba-blue">
                                        <div class="flex items-start gap-4">
                                            <div class="flex-shrink-0">
                                                <div
                                                    class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                                    <span class="font-bold text-blue-600">{{ $index + 1 }}</span>
                                                </div>
                                            </div>
                                            <div class="flex-1">
                                                @if ($item->title)
                                                    <h3 class="text-lg font-bold text-gray-900 mb-1">
                                                        {{ $item->title }}
                                                    </h3>
                                                @endif
                                                <p class="text-gray-600 leading-relaxed">
                                                    {{ $item->content }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
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
                            <div
                                class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-3xl font-bold text-gray-900">Tujuan</h2>
                                <div class="w-20 h-1 bg-uniba-yellow mt-2"></div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            @if ($tujuan->isEmpty())
                                <p class="text-gray-700">
                                    Tidak ada tujuan yang tersedia.
                                </p>
                            @else
                                @foreach ($tujuan as $index => $item)
                                    <div
                                        class="scroll-animate bg-gradient-to-r from-gray-50 to-white rounded-xl p-5 border-l-4 border-green-500">
                                        <div class="flex items-start gap-3">
                                            <span
                                                class="w-7 h-7 flex items-center justify-center rounded-full bg-green-500 text-white font-bold text-sm">
                                                {{ $index + 1 }}
                                            </span>
                                            <p class="text-gray-700 leading-relaxed">
                                                {{ $item->content }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
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
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                </path>
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
                    @if ($sasaran->isEmpty())
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Tidak ada sasaran yang tersedia.
                        </p>
                    @else
                        @foreach ($sasaran as $index => $item)
                            <div
                                class="scroll-animate bg-white rounded-xl p-6 shadow-sm hover:shadow-xl transition-all duration-300">
                                <div class="flex items-start gap-3">
                                    <span
                                        class="w-6 h-6 rounded-full bg-purple-100 text-purple-600 font-bold text-xs flex items-center justify-center">
                                        {{ $index + 1 }}
                                    </span>
                                    <div>
                                        @if ($item->title)
                                            <h3 class="text-lg font-bold text-gray-900 mb-1">
                                                {{ $item->title }}
                                            </h3>
                                        @endif
                                        <p class="text-gray-600 text-sm leading-relaxed">
                                            {{ $item->content }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
