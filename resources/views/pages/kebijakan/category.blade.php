@extends('layouts.app')

@section('title', $category->name . ' - Kebijakan & Aturan - UPT TIK UNIBA Madura')

@section('content')

    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

        <div
            class="absolute top-20 left-10 w-72 h-72 bg-yellow-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow">
        </div>
        <div class="absolute bottom-20 right-10 w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow"
            style="animation-delay: 1s;"></div>

        <div class="container mx-auto px-4 relative z-10">
            <a href="{{ route('policy.index') }}"
                class="inline-flex items-center text-blue-100 hover:text-white transition-colors mb-6">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Semua Kebijakan
            </a>

            <div class="text-center max-w-3xl mx-auto">
                <span
                    class="inline-block bg-blue-800 text-blue-200 text-xs font-bold px-4 py-2 rounded-full uppercase tracking-wider mb-4 animate-fade-in-up">
                    Kebijakan & Aturan
                </span>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-fade-in-up stagger-1">
                    {{ $category->name }}
                </h1>
                <p class="text-lg text-blue-100 animate-fade-in-up stagger-2">
                    Daftar kebijakan dan aturan dalam kategori {{ $category->name }}
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

    {{-- Policies Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-[minmax(0,1fr)_320px] gap-10 items-start">

                {{-- Main Content --}}
                <div>
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-12 h-12 bg-uniba-blue rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">Daftar Kebijakan</h2>
                            <p class="text-gray-500">{{ $category->activePolicies->count() }} kebijakan tersedia</p>
                        </div>
                    </div>

                    @forelse ($category->activePolicies as $policy)
                        <a href="{{ route('policy.show', $policy->slug) }}"
                            class="group block bg-white border border-gray-200 rounded-2xl p-6 mb-4 hover:shadow-xl hover:border-uniba-blue/30 transition-all duration-300">
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-uniba-blue transition-colors">
                                    <svg class="w-7 h-7 text-uniba-blue group-hover:text-white transition-colors"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3
                                        class="text-xl font-bold text-gray-900 group-hover:text-uniba-blue transition-colors mb-2">
                                        {{ $policy->title }}
                                    </h3>
                                    @if ($policy->excerpt)
                                        <p class="text-gray-600 line-clamp-2 mb-3">
                                            {{ $policy->excerpt }}
                                        </p>
                                    @endif
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-gray-400">
                                            Diperbarui {{ $policy->updated_at->diffForHumans() }}
                                        </span>
                                        <span class="flex items-center text-uniba-blue text-sm font-medium">
                                            Baca Selengkapnya
                                            <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="bg-white rounded-2xl border border-gray-200 p-12 text-center">
                            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-700 mb-2">Belum Ada Kebijakan</h3>
                            <p class="text-gray-500">Kebijakan dalam kategori ini akan segera ditampilkan.</p>
                        </div>
                    @endforelse
                </div>

                {{-- Sidebar --}}
                <aside class="space-y-6">
                    {{-- Other Categories --}}
                    @if ($otherCategories->count() > 0)
                        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-uniba-blue" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                    </path>
                                </svg>
                                Kategori Lainnya
                            </h3>
                            <div class="space-y-2">
                                @foreach ($otherCategories as $otherCategory)
                                    <a href="{{ route('policy.category', $otherCategory->slug) }}"
                                        class="flex items-center gap-3 p-3 rounded-xl bg-gray-50 hover:bg-blue-50 transition-colors group">
                                        <div
                                            class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center group-hover:bg-uniba-blue transition-colors">
                                            <svg class="w-5 h-5 text-gray-500 group-hover:text-white transition-colors"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                                </path>
                                            </svg>
                                        </div>
                                        <span
                                            class="font-medium text-gray-700 group-hover:text-uniba-blue transition-colors">
                                            {{ $otherCategory->name }}
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Quick Actions --}}
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl border border-blue-200 p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Butuh Bantuan?</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Hubungi tim UPT TIK untuk informasi lebih lanjut tentang kebijakan.
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
                </aside>
            </div>
        </div>
    </section>

@endsection
