@extends('layouts.app')

@section('title', $policy->title . ' - Kebijakan & Aturan - UPT TIK UNIBA Madura')

@section('content')

    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark pt-8 pb-24 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

        <div class="container mx-auto px-4 relative z-10">
            <a href="{{ route('policy.index') }}"
                class="inline-flex items-center text-blue-100 hover:text-white transition-colors mb-6">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Kembali ke Daftar Kebijakan
            </a>

            <div class="text-center mx-auto max-w-3xl">
                <span
                    class="inline-flex items-center px-4 py-2 rounded-full bg-white/10 text-blue-100 text-xs font-bold uppercase tracking-wider mb-4">
                    {{ $policy->category->name ?? 'Kebijakan' }}
                </span>

                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4">
                    {{ $policy->title }}
                </h1>

                @if ($policy->excerpt)
                    <p class="text-lg text-blue-100 max-w-3xl">{{ $policy->excerpt }}</p>
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

    {{-- Content Section --}}
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-[minmax(0,1fr)_320px] gap-10 items-start">

                {{-- Main Content --}}
                <article class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden">
                    <div class="p-6 md:p-10">
                        {{-- Meta Info --}}
                        <div class="flex flex-wrap items-center gap-4 mb-8 pb-6 border-b border-gray-100">
                            <div class="flex items-center gap-2 text-sm text-gray-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span>Diperbarui: {{ $policy->updated_at->translatedFormat('d F Y') }}</span>
                            </div>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-700">
                                {{ $policy->category->name ?? 'Kebijakan' }}
                            </span>
                        </div>

                        {{-- Content --}}
                        <div
                            class="prose prose-lg max-w-none prose-headings:text-gray-900 prose-p:text-gray-700 prose-a:text-uniba-blue prose-strong:text-gray-900 prose-li:text-gray-700 prose-table:border-collapse prose-th:bg-gray-100 prose-th:p-3 prose-td:p-3 prose-td:border prose-td:border-gray-200">
                            {!! $policy->content !!}
                        </div>
                    </div>
                </article>

                {{-- Sidebar --}}
                <aside class="space-y-6">
                    {{-- Category Info --}}
                    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-uniba-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                </path>
                            </svg>
                            Kategori
                        </h3>
                        <a href="{{ route('policy.index') }}"
                            class="flex items-center gap-3 p-3 rounded-xl bg-gray-50 hover:bg-blue-50 transition-colors">
                            <div class="w-10 h-10 bg-uniba-blue rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">{{ $policy->category->name ?? 'Kebijakan' }}</p>
                                <p class="text-sm text-gray-500">Lihat kebijakan lainnya</p>
                            </div>
                        </a>
                    </div>

                    {{-- Related Policies --}}
                    @if ($relatedPolicies->count() > 0)
                        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-uniba-blue" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                    </path>
                                </svg>
                                Kebijakan Terkait
                            </h3>
                            <div class="space-y-3">
                                @foreach ($relatedPolicies as $related)
                                    <a href="{{ route('policy.show', $related->slug) }}"
                                        class="block p-3 rounded-xl bg-gray-50 hover:bg-blue-50 transition-colors group">
                                        <p
                                            class="font-medium text-gray-900 group-hover:text-uniba-blue transition-colors line-clamp-2">
                                            {{ $related->title }}
                                        </p>
                                        @if ($related->excerpt)
                                            <p class="text-sm text-gray-500 mt-1 line-clamp-1">{{ $related->excerpt }}</p>
                                        @endif
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Quick Actions --}}
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl border border-blue-200 p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Butuh Bantuan?</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Hubungi tim UPT TIK untuk informasi lebih lanjut tentang kebijakan ini.
                        </p>
                        <a href="mailto:tik@uniba-madura.ac.id"
                            class="inline-flex items-center gap-2 w-full justify-center px-4 py-3 bg-uniba-blue text-white font-medium rounded-xl hover:bg-blue-700 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            Hubungi Kami
                        </a>
                    </div>

                    {{-- Share --}}
                    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-uniba-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z">
                                </path>
                            </svg>
                            Bagikan
                        </h3>
                        @php
                            $shareUrl = urlencode(request()->fullUrl());
                            $shareText = urlencode($policy->title);
                        @endphp
                        <div class="flex gap-2">
                            <a href="https://wa.me/?text={{ $shareText }}%20{{ $shareUrl }}" target="_blank"
                                class="flex-1 flex items-center justify-center gap-2 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                </svg>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank"
                                class="flex-1 flex items-center justify-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </a>
                            <a href="https://twitter.com/intent/tweet?text={{ $shareText }}&url={{ $shareUrl }}"
                                target="_blank"
                                class="flex-1 flex items-center justify-center gap-2 px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

@endsection
