@extends('layouts.app')

@section('title', $pageMeta['title'] . ' - UPT TIK UNIBA Madura')
@section('meta_description', $pageMeta['description'])

@section('content')
    <section class="relative bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <span
                    class="inline-block bg-blue-800 text-blue-200 text-xs font-bold px-4 py-2 rounded-full uppercase tracking-wider mb-4 animate-fade-in-up">
                    {{ $pageMeta['label'] }}
                </span>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-fade-in-up stagger-1">
                    {{ $pageMeta['title'] }}
                </h1>
                <p class="text-lg text-blue-100 animate-fade-in-up stagger-2">{{ $pageMeta['description'] }}</p>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg class="relative block w-full h-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="fill-gray-50"></path>
            </svg>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-200 p-6 md:p-8 mb-8">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Arsip
                            {{ $pageMeta['label'] }}</p>
                        <h2 class="text-2xl font-bold text-gray-900 mt-1">{{ $items->total() }} item tersedia</h2>
                    </div>
                    <form method="GET" action="{{ route('content.index', ['type' => $type]) }}" class="w-full lg:w-auto">
                        <div class="flex flex-col sm:flex-row gap-3">
                            <input type="text" name="search" value="{{ $search }}"
                                placeholder="Cari {{ strtolower($pageMeta['label']) }}..."
                                class="w-full sm:w-80 px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-uniba-blue/20 focus:border-uniba-blue">
                            <button type="submit"
                                class="px-5 py-3 bg-uniba-blue text-white rounded-xl font-semibold hover:bg-blue-800 transition-colors">
                                Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            @if ($items->count())
                <div class="grid gap-6 {{ $type === 'agenda' ? 'md:grid-cols-2' : 'md:grid-cols-2 xl:grid-cols-3' }}">
                    @foreach ($items as $item)
                        <article
                            class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden hover:shadow-xl transition-all duration-300 group">
                            @if (in_array($item, ['news', 'announcemenet']))
                                <a href="{{ route('content.show', ['type' => $type, 'slug' => $item->slug]) }}"
                                    class="block h-52 overflow-hidden bg-gray-100">
                                    <img src="{{ $item->thumbnail_url }}" alt="{{ $item->title }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </a>
                            @endif

                            <div class="p-6">
                                <div class="flex items-center gap-3 text-xs text-gray-500 mb-3">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full bg-gray-100 text-gray-700 font-semibold uppercase tracking-wide">
                                        {{ $pageMeta['label'] }}
                                    </span>
                                    @if ($type === 'agenda' && $item->event_date)
                                        <span>{{ $item->event_date->translatedFormat('d M Y') }}</span>
                                    @elseif ($item->published_at)
                                        <span>{{ $item->published_at->translatedFormat('d M Y') }}</span>
                                    @endif
                                </div>

                                <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                                    <a href="{{ route('content.show', ['type' => $type, 'slug' => $item->slug]) }}"
                                        class="hover:text-uniba-blue transition-colors">
                                        {{ $item->title }}
                                    </a>
                                </h3>

                                @if ($type === 'agenda')
                                    <div class="space-y-2 text-sm text-gray-600 mb-4">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                            <span>{{ $item->event_date?->translatedFormat('l, d F Y') ?? 'Tanggal akan diumumkan' }}</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 12.414A2 2 0 0112.828 11V6m8 6a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            </svg>
                                            <span>{{ $item->location ?: 'Lokasi akan diumumkan' }}</span>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 leading-relaxed line-clamp-2 mb-4">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 140) }}
                                    </p>
                                @else
                                    <p class="text-gray-600 leading-relaxed line-clamp-3 mb-4">
                                        {{ $item->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($item->content), 160) }}
                                    </p>
                                @endif

                                <a href="{{ route('content.show', ['type' => $type, 'slug' => $item->slug]) }}"
                                    class="inline-flex items-center gap-2 text-uniba-blue font-semibold hover:text-blue-800 transition-colors">
                                    Baca selengkapnya
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-10">
                    {{ $items->links() }}
                </div>
            @else
                <div class="bg-white border border-dashed border-gray-300 rounded-3xl p-12 text-center text-gray-500">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Belum ada data</h3>
                    <p>
                        @if ($search)
                            Tidak ada {{ strtolower($pageMeta['label']) }} yang cocok dengan kata kunci
                            "{{ $search }}".
                        @else
                            Belum ada {{ strtolower($pageMeta['label']) }} yang dipublikasikan.
                        @endif
                    </p>
                </div>
            @endif
        </div>
    </section>
@endsection
