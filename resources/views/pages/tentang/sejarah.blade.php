@extends('layouts.app')

@section('title', 'Sejarah - UPT TIK UNIBA Madura')

@section('content')

    <section class="relative bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

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
                    Sejarah UPT TIK
                </h1>
                <p class="text-lg text-blue-100 animate-fade-in-up stagger-2">
                    Perjalanan transformasi digital UNIBA Madura dari masa ke masa
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

    @if ($intro)
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto">
                    <div class="scroll-animate bg-white rounded-2xl shadow-xl p-8 md:p-12 border-t-4 border-uniba-yellow">
                        <div class="flex items-start gap-6">
                            <div class="hidden md:block flex-shrink-0">
                                <div
                                    class="w-20 h-20 bg-gradient-to-br from-uniba-blue to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
                                    {{ $intro->title }}
                                </h2>
                                <div class="text-gray-600 leading-relaxed space-y-4">
                                    {!! nl2br(e($intro->content)) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($timelines->count() > 0)
        <section class="py-20 bg-white relative overflow-hidden">
            <div class="absolute top-0 right-0 w-96 h-96 bg-blue-50 rounded-full filter blur-3xl opacity-50"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-purple-50 rounded-full filter blur-3xl opacity-50"></div>

            <div class="container mx-auto px-4 relative z-10">
                <div class="text-center mb-16 scroll-animate">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Tonggak Perjalanan</h2>
                    <div class="w-20 h-1 bg-uniba-yellow mx-auto mb-4"></div>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Pencapaian dan perkembangan UPT TIK dari masa ke masa
                    </p>
                </div>

                <div class="max-w-5xl mx-auto">
                    @php
                        $colors = ['blue', 'green', 'purple', 'orange', 'red', 'indigo', 'pink', 'teal'];

                        $icons = [
                            'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                            'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01',
                            'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                            'M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z',
                            'M13 10V3L4 14h7v7l9-11h-7z',
                            'M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z',
                            'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                            'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
                        ];
                    @endphp

                    <div class="relative">
                        <div
                            class="hidden md:block absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-gradient-to-b from-blue-200 via-purple-200 to-red-200">
                        </div>

                        @foreach ($timelines as $index => $item)
                            @php
                                $color = $colors[$index % count($colors)];
                                $icon = $icons[$index % count($icons)];
                            @endphp

                            <div class="scroll-animate mb-12 md:mb-20 stagger-{{ ($index % 4) + 1 }}">
                                <div class="flex flex-col md:flex-row items-center gap-8 relative">
                                    @if ($index % 2 == 0)
                                        <div class="md:w-1/2 md:text-right">
                                            <div
                                                class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-6 md:p-8 border-l-4 md:border-l-0 md:border-r-4 border-{{ $color }}-500 transform hover:-translate-y-1">
                                                @if ($item->sub_title)
                                                    <span
                                                        class="inline-block bg-{{ $color }}-100 text-{{ $color }}-600 text-sm font-bold px-4 py-1 rounded-full mb-3">
                                                        {{ $item->sub_title }}
                                                    </span>
                                                @endif
                                                <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-3">
                                                    {{ $item->title }}
                                                </h3>
                                                <p class="text-gray-600 leading-relaxed mb-4">
                                                    {{ $item->content }}
                                                </p>
                                                @if ($item->extras && count($item->extras) > 0)
                                                    <div class="flex flex-wrap gap-2 md:justify-end">
                                                        @foreach ($item->extras as $highlight)
                                                            <span
                                                                class="inline-flex items-center gap-1 text-xs bg-{{ $color }}-50 text-{{ $color }}-700 px-3 py-1 rounded-full font-medium">
                                                                <svg class="w-3 h-3" fill="currentColor"
                                                                    viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                                {{ $highlight }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 relative z-10">
                                            <div
                                                class="w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-{{ $color }}-400 to-{{ $color }}-600 rounded-full flex items-center justify-center shadow-xl border-4 border-white transform hover:scale-110 transition-transform duration-300">
                                                <svg class="w-8 h-8 md:w-10 md:h-10 text-white" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="{{ $icon }}"></path>
                                                </svg>
                                            </div>
                                        </div>

                                        <div class="md:w-1/2"></div>
                                    @else
                                        <div class="md:w-1/2"></div>
                                        <div class="flex-shrink-0 relative z-10 md:order-2">
                                            <div
                                                class="w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-{{ $color }}-400 to-{{ $color }}-600 rounded-full flex items-center justify-center shadow-xl border-4 border-white transform hover:scale-110 transition-transform duration-300">
                                                <svg class="w-8 h-8 md:w-10 md:h-10 text-white" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="{{ $icon }}"></path>
                                                </svg>
                                            </div>
                                        </div>

                                        <div class="md:w-1/2 md:order-3">
                                            <div
                                                class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-6 md:p-8 border-l-4 border-{{ $color }}-500 transform hover:-translate-y-1">
                                                @if ($item->sub_title)
                                                    <span
                                                        class="inline-block bg-{{ $color }}-100 text-{{ $color }}-600 text-sm font-bold px-4 py-1 rounded-full mb-3">
                                                        {{ $item->sub_title }}
                                                    </span>
                                                @endif
                                                <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-3">
                                                    {{ $item->title }}
                                                </h3>
                                                <p class="text-gray-600 leading-relaxed mb-4">
                                                    {{ $item->content }}
                                                </p>
                                                @if ($item->extras && count($item->extras) > 0)
                                                    <div class="flex flex-wrap gap-2">
                                                        @foreach ($item->extras as $highlight)
                                                            <span
                                                                class="inline-flex items-center gap-1 text-xs bg-{{ $color }}-50 text-{{ $color }}-700 px-3 py-1 rounded-full font-medium">
                                                                <svg class="w-3 h-3" fill="currentColor"
                                                                    viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                                {{ $highlight }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($vision)
        <section class="py-20 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto">
                    <div
                        class="scroll-animate bg-gradient-to-r from-blue-600 to-blue-700 rounded-3xl shadow-2xl overflow-hidden">
                        <div class="p-8 md:p-12 text-white">
                            <div class="flex items-center gap-4 mb-6">
                                <div
                                    class="w-16 h-16 bg-white bg-opacity-20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <h2 class="text-3xl font-bold">{{ $vision->title }}</h2>
                            </div>
                            <p class="text-blue-100 leading-relaxed mb-6">
                                {{ $vision->content }}
                            </p>
                            @if ($vision->extras && count($vision->extras) > 0)
                                <div class="flex flex-wrap gap-3">
                                    @foreach ($vision->extras as $tag)
                                        <span
                                            class="px-4 py-2 bg-white bg-opacity-20 backdrop-blur-sm rounded-full text-sm font-medium">
                                            {{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection
