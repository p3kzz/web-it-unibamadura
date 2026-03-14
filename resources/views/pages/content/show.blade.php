@extends('layouts.app')

@section('title', $content->meta_title ?: $content->title . ' - UPT TIK UNIBA Madura')
@section('meta_description', $content->meta_description ?: ($content->excerpt ?:
    \Illuminate\Support\Str::limit(strip_tags($content->content), 155)))
@section('og_image', $content->thumbnail_url)

@php
    $shareUrl = urlencode(request()->fullUrl());
    $shareText = urlencode($content->title);
    $shareWa = urlencode($content->title . ' — ' . request()->fullUrl());
@endphp

@section('content')
    <section class="relative bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl">
                <a href="{{ route('content.index', ['type' => $content->type]) }}"
                    class="inline-flex items-center gap-2 text-blue-100 hover:text-white transition-colors mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Kembali ke {{ strtolower($pageMeta['label']) }}
                </a>

                <div class="flex flex-wrap items-center gap-3 mb-4">
                    <span
                        class="inline-flex items-center px-4 py-2 rounded-full bg-white/10 text-blue-100 text-xs font-bold uppercase tracking-wider">
                        {{ $pageMeta['label'] }}
                    </span>
                    @if ($content->published_at)
                        <span class="text-sm text-blue-100">
                            {{ $content->published_at->translatedFormat('d F Y') }}
                        </span>
                    @endif
                    @if ($content->type === 'agenda' && $content->event_date)
                        <span class="text-sm text-blue-100">
                            Agenda: {{ $content->event_date->translatedFormat('d F Y') }}
                        </span>
                    @endif
                    <span class="inline-flex items-center gap-1.5 text-sm text-blue-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                        {{ number_format($content->views) }} kali dilihat
                    </span>
                </div>

                <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight mb-4">{{ $content->title }}</h1>
                @if ($content->excerpt)
                    <p class="text-lg text-blue-100 max-w-3xl">{{ $content->excerpt }}</p>
                @endif
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
            <div class="grid lg:grid-cols-[minmax(0,1fr)_320px] gap-10 items-start">

                {{-- ── Main Article ── --}}
                <article class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden">
                    @if ($content->thumbnail)
                        <img src="{{ $content->thumbnail_url }}" alt="{{ $content->title }}"
                            class="w-full max-h-[28rem] object-cover">
                    @endif

                    <div class="p-6 md:p-10">
                        @if ($content->type === 'agenda')
                            <div class="grid sm:grid-cols-2 gap-4 mb-8">
                                <div class="bg-emerald-50 border border-emerald-100 rounded-2xl p-4">
                                    <p class="text-xs font-bold uppercase tracking-wide text-emerald-700 mb-1">Tanggal
                                        Agenda</p>
                                    <p class="text-lg font-semibold text-gray-900">
                                        {{ $content->event_date?->translatedFormat('l, d F Y') ?? 'Akan diumumkan' }}
                                    </p>
                                </div>
                                <div class="bg-blue-50 border border-blue-100 rounded-2xl p-4">
                                    <p class="text-xs font-bold uppercase tracking-wide text-blue-700 mb-1">Lokasi</p>
                                    <p class="text-lg font-semibold text-gray-900">
                                        {{ $content->location ?: 'Akan diumumkan' }}
                                    </p>
                                </div>
                            </div>
                        @endif

                        <div
                            class="prose prose-lg max-w-none prose-headings:text-gray-900 prose-p:text-gray-700 prose-a:text-uniba-blue prose-strong:text-gray-900 prose-li:text-gray-700">
                            {!! $content->content !!}
                        </div>

                        {{-- ── Share Bar (inside article) ── --}}
                        <div class="mt-10 pt-8 border-t border-gray-100" x-data="{ copied: false }">
                            <p class="text-xs font-bold uppercase tracking-wide text-gray-400 mb-4">Bagikan artikel ini
                            </p>
                            <div class="flex flex-wrap gap-3">
                                <a href="https://wa.me/?text={{ $shareWa }}" target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[#25D366] text-white text-sm font-semibold hover:opacity-90 transition-opacity">
                                    <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                    </svg>
                                    WhatsApp
                                </a>

                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank"
                                    rel="noopener noreferrer"
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[#1877F2] text-white text-sm font-semibold hover:opacity-90 transition-opacity">
                                    <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                    </svg>
                                    Facebook
                                </a>

                                <a href="https://twitter.com/intent/tweet?text={{ $shareText }}&url={{ $shareUrl }}"
                                    target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-black text-white text-sm font-semibold hover:opacity-90 transition-opacity">
                                    <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.736-8.835L1.254 2.25H8.08l4.253 5.622 5.911-5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg>
                                    X (Twitter)
                                </a>

                                <button
                                    @click="navigator.clipboard.writeText('{{ request()->fullUrl() }}').then(() => { copied = true; setTimeout(() => copied = false, 2500) })"
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-gray-200 bg-white text-gray-700 text-sm font-semibold hover:bg-gray-50 transition-colors">
                                    <svg x-show="!copied" class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <svg x-show="copied" class="w-4 h-4 flex-shrink-0 text-green-500" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span x-text="copied ? 'Tersalin!' : 'Salin Tautan'"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </article>

                {{-- ── Sidebar ── --}}
                <aside class="space-y-6 lg:sticky lg:top-6">

                    {{-- Info Panel --}}
                    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6">
                        <h2 class="text-lg font-bold text-gray-900 mb-4">Informasi</h2>
                        <div class="space-y-4 text-sm text-gray-600">
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wide text-gray-400 mb-1">Kategori</p>
                                <p class="font-medium text-gray-800">{{ $pageMeta['label'] }}</p>
                            </div>
                            @if ($content->author)
                                <div>
                                    <p class="text-xs font-bold uppercase tracking-wide text-gray-400 mb-1">Penulis</p>
                                    <p class="font-medium text-gray-800">{{ $content->author->name }}</p>
                                </div>
                            @endif
                            @if ($content->published_at)
                                <div>
                                    <p class="text-xs font-bold uppercase tracking-wide text-gray-400 mb-1">
                                        Dipublikasikan</p>
                                    <p>{{ $content->published_at->translatedFormat('d F Y, H:i') }}</p>
                                </div>
                            @endif
                            @if ($content->type === 'agenda' && $content->event_date)
                                <div>
                                    <p class="text-xs font-bold uppercase tracking-wide text-gray-400 mb-1">Tanggal
                                        Kegiatan</p>
                                    <p>{{ $content->event_date->translatedFormat('d F Y') }}</p>
                                </div>
                            @endif
                            @if ($content->location)
                                <div>
                                    <p class="text-xs font-bold uppercase tracking-wide text-gray-400 mb-1">Lokasi</p>
                                    <p>{{ $content->location }}</p>
                                </div>
                            @endif
                            <div class="flex items-center gap-2 pt-1 border-t border-gray-100">
                                <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                                <span class="text-gray-700 font-medium">{{ number_format($content->views) }} kali
                                    dilihat</span>
                            </div>
                        </div>
                    </div>

                    {{-- Related Content --}}
                    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6">
                        <h2 class="text-lg font-bold text-gray-900 mb-4">Konten Terkait</h2>
                        <div class="space-y-4">
                            @forelse ($relatedItems as $item)
                                <a href="{{ route('content.show', ['type' => $content->type, 'slug' => $item->slug]) }}"
                                    class="flex gap-3 group">
                                    <div class="w-16 h-16 rounded-xl overflow-hidden flex-shrink-0 bg-gray-100">
                                        <img src="{{ $item->thumbnail_url }}" alt="{{ $item->title }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-xs text-gray-400 mb-1">
                                            {{ $item->published_at?->translatedFormat('d M Y') ?? $item->event_date?->translatedFormat('d M Y') }}
                                        </p>
                                        <h3
                                            class="text-sm font-semibold text-gray-900 group-hover:text-uniba-blue transition-colors line-clamp-2 leading-snug">
                                            {{ $item->title }}
                                        </h3>
                                    </div>
                                </a>
                            @empty
                                <p class="text-sm text-gray-500">Belum ada konten terkait.</p>
                            @endforelse
                        </div>

                        <a href="{{ route('content.index', ['type' => $content->type]) }}"
                            class="mt-5 flex items-center justify-center gap-2 text-sm font-semibold text-uniba-blue hover:text-blue-800 transition-colors pt-4 border-t border-gray-100">
                            Lihat semua {{ strtolower($pageMeta['label']) }}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
