@extends('layouts.app')

@section('title', 'Katalog Layanan - UPT TIK UNIBA Madura')

@section('content')
    <section class="relative bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark pt-20 pb-32 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <span
                    class="inline-block bg-blue-800/50 backdrop-blur-sm text-blue-200 text-xs font-bold px-4 py-2 rounded-full uppercase tracking-wider mb-4 animate-fade-in-up border border-blue-700/50">
                    <svg class="w-4 h-4 inline-block mr-1 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Layanan UPT TIK
                </span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 animate-fade-in-up stagger-1">
                    Katalog Layanan
                </h1>
                <p class="text-lg md:text-xl text-blue-100 mb-10 animate-fade-in-up stagger-2 max-w-2xl mx-auto">
                    Temukan berbagai layanan teknologi informasi untuk mendukung aktivitas akademik dan administrasi Anda.
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
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto">
                @php
                    $totalLayanan = $katalogLayanan->total() ?? $katalogLayanan->count();
                    $activeCount = $katalogLayanan->where('status', 'Aktif')->count();
                @endphp
                <div class="bg-white rounded-2xl p-4 md:p-6 shadow-lg text-center border border-gray-100">
                    <div class="text-2xl md:text-3xl font-bold text-uniba-blue">{{ $totalLayanan }}</div>
                    <div class="text-xs md:text-sm text-gray-500 font-medium">Total Layanan</div>
                </div>
                <div class="bg-white rounded-2xl p-4 md:p-6 shadow-lg text-center border border-gray-100">
                    <div class="text-2xl md:text-3xl font-bold text-emerald-600">{{ $activeCount }}</div>
                    <div class="text-xs md:text-sm text-gray-500 font-medium">Layanan Aktif</div>
                </div>
                <div class="bg-white rounded-2xl p-4 md:p-6 shadow-lg text-center border border-gray-100">
                    <div class="text-2xl md:text-3xl font-bold text-amber-600">{{ count($kategoriLayanan ?? []) }}</div>
                    <div class="text-xs md:text-sm text-gray-500 font-medium">Kategori</div>
                </div>
                <div class="bg-white rounded-2xl p-4 md:p-6 shadow-lg text-center border border-gray-100">
                    <div class="text-2xl md:text-3xl font-bold text-indigo-600">24/7</div>
                    <div class="text-xs md:text-sm text-gray-500 font-medium">Support Online</div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6 lg:gap-8">
                @forelse ($katalogLayanan as $index => $item)
                    @php
                        $status = trim((string) $item->status);
                        $statusConfig = match ($status) {
                            'Aktif' => [
                                'bg' => 'bg-emerald-100',
                                'text' => 'text-emerald-700',
                                'dot' => 'bg-emerald-500',
                            ],
                            'Tidak Aktif' => ['bg' => 'bg-gray-100', 'text' => 'text-gray-600', 'dot' => 'bg-gray-400'],
                            'Maintenance' => [
                                'bg' => 'bg-amber-100',
                                'text' => 'text-amber-700',
                                'dot' => 'bg-amber-500',
                            ],
                            default => ['bg' => 'bg-blue-100', 'text' => 'text-blue-700', 'dot' => 'bg-blue-500'],
                        };
                        $staggerDelay = ($index % 6) * 0.1;
                    @endphp

                    <a href="{{ route('katalog-layanan.show', $item->id) }}"
                        class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden group hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 scroll-animate relative"
                        style="animation-delay: {{ $staggerDelay }}s;">

                        <div class="p-6 lg:p-8">
                            <div class="flex items-start justify-between gap-4 mb-5">
                                <div
                                    class="w-14 h-14 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl flex items-center justify-center text-uniba-blue group-hover:scale-110 group-hover:bg-gradient-to-br group-hover:from-uniba-blue group-hover:to-blue-800 group-hover:text-white transition-all duration-300 shadow-sm">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                                <div class="flex flex-wrap items-center gap-2">
                                    <span
                                        class="{{ $statusConfig['bg'] }} {{ $statusConfig['text'] }} text-[10px] font-bold px-3 py-1.5 rounded-full uppercase tracking-wider inline-flex items-center gap-1.5">
                                        <span
                                            class="w-1.5 h-1.5 {{ $statusConfig['dot'] }} rounded-full animate-pulse"></span>
                                        {{ $status ?: 'N/A' }}
                                    </span>
                                </div>
                            </div>

                            <span
                                class="inline-block text-xs text-uniba-blue font-bold bg-blue-50 px-3 py-1.5 rounded-lg uppercase tracking-wider mb-3 border border-blue-100">
                                {{ $item->kategori?->nama ?? 'Umum' }}
                            </span>

                            <h3
                                class="font-bold text-xl text-gray-900 mb-3 group-hover:text-uniba-blue transition-colors line-clamp-2 leading-tight">
                                {{ $item->nama }}
                            </h3>

                            <p class="text-gray-500 text-sm mb-6 line-clamp-2 leading-relaxed">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi ?? 'Layanan teknologi informasi untuk civitas akademika.'), 120) }}
                            </p>

                            <div class="grid grid-cols-2 gap-3 text-sm mb-6">
                                @if ($item->pengguna_sasaran)
                                    <div class="flex items-center gap-2 text-gray-500">
                                        <div
                                            class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-4 h-4 text-uniba-blue" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </div>
                                        <span class="truncate">{{ $item->pengguna_sasaran }}</span>
                                    </div>
                                @endif

                                @if ($item->jam_layanan)
                                    <div class="flex items-center gap-2 text-gray-500">
                                        <div
                                            class="w-8 h-8 bg-emerald-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <span class="truncate">{{ $item->jam_layanan }}</span>
                                    </div>
                                @endif
                            </div>

                            <div class="flex items-center justify-between pt-5 border-t border-gray-100">
                                @if ($item->service_owner)
                                    <div class="flex items-center gap-2 text-sm text-gray-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span class="truncate max-w-[120px]">{{ $item->service_owner }}</span>
                                    </div>
                                @else
                                    <div></div>
                                @endif
                                <span
                                    class="text-uniba-blue font-semibold text-sm inline-flex items-center gap-2 group-hover:gap-3 transition-all">
                                    Detail
                                    <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="md:col-span-2 xl:col-span-3 scroll-animate">
                        <div class="bg-white border-2 border-dashed border-gray-200 rounded-3xl p-12 md:p-16 text-center">
                            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="font-bold text-xl text-gray-900 mb-2">Tidak ada layanan ditemukan</h3>
                            <p class="text-gray-500 mb-8 max-w-md mx-auto">
                                Maaf, tidak ada layanan yang sesuai dengan filter pencarian Anda. Coba gunakan kata kunci
                                lain atau reset filter.
                            </p>
                            <a href="{{ route('katalog-layanan.index') }}"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-uniba-blue text-white font-semibold rounded-xl hover:bg-uniba-dark transition-all shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Lihat Semua Layanan
                            </a>
                        </div>
                    </div> 
                @endforelse
            </div>

            @if ($katalogLayanan->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $katalogLayanan->links() }}
                </div>
            @endif
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
