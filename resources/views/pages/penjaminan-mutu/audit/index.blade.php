@extends('layouts.app')

@section('title', 'Audit - UPT TIK UNIBA Madura')

@section('content')
    <section class="relative bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark pt-20 pb-32 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

        <div
            class="absolute top-20 left-10 w-72 h-72 bg-yellow-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow">
        </div>
        <div class="absolute bottom-20 right-10 w-72 h-72 bg-indigo-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow"
            style="animation-delay: 1s;"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <span
                    class="inline-block bg-blue-800/50 backdrop-blur-sm text-blue-200 text-xs font-bold px-4 py-2 rounded-full uppercase tracking-wider mb-4 animate-fade-in-up border border-blue-700/50">
                    Penjaminan Mutu UPT TIK
                </span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 animate-fade-in-up stagger-1">
                    Audit
                </h1>
                <p class="text-lg md:text-xl text-blue-100 mb-10 animate-fade-in-up stagger-2 max-w-2xl mx-auto">
                    Informasi penjaminan mutu audit resmi untuk mendukung kebutuhan evaluasi dan peningkatan mutu institusi.
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
                <div class="bg-white rounded-2xl p-4 md:p-6 shadow-lg text-center border border-gray-100">
                    <div class="text-2xl md:text-3xl font-bold text-uniba-blue">{{ $audits->total() }}</div>
                    <div class="text-xs md:text-sm text-gray-500 font-medium">Total Audit</div>
                </div>
                <div class="bg-white rounded-2xl p-4 md:p-6 shadow-lg text-center border border-gray-100">
                    <div class="text-2xl md:text-3xl font-bold text-emerald-600">{{ $audits->count() }}</div>
                    <div class="text-xs md:text-sm text-gray-500 font-medium">Ditampilkan Saat Ini</div>
                </div>
                <div class="bg-white rounded-2xl p-4 md:p-6 shadow-lg text-center border border-gray-100">
                    <div class="text-2xl md:text-3xl font-bold text-amber-600">{{ $audits->sum('sections_count') }}</div>
                    <div class="text-xs md:text-sm text-gray-500 font-medium">Total Bagian</div>
                </div>
                <div class="bg-white rounded-2xl p-4 md:p-6 shadow-lg text-center border border-gray-100">
                    <div class="text-2xl md:text-3xl font-bold text-indigo-600">Aktif</div>
                    <div class="text-xs md:text-sm text-gray-500 font-medium">Status </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-14 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6 lg:gap-8">
                @forelse ($audits as $item)
                    <a href="{{ route('audit.show', $item->slug) }}"
                        class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden group hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 scroll-animate relative">
                        <div class="p-6 lg:p-8">
                            <div class="flex items-start justify-between gap-4 mb-5">
                                <div
                                    class="w-14 h-14 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl flex items-center justify-center text-uniba-blue group-hover:scale-110 group-hover:bg-gradient-to-br group-hover:from-uniba-blue group-hover:to-blue-800 group-hover:text-white transition-all duration-300 shadow-sm">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>

                                <span
                                    class="bg-emerald-100 text-emerald-700 text-[10px] font-bold px-3 py-1.5 rounded-full uppercase tracking-wider inline-flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span>
                                    Aktif
                                </span>
                            </div>

                            <h3
                                class="font-bold text-xl text-gray-900 mb-3 group-hover:text-uniba-blue transition-colors line-clamp-2 leading-tight">
                                {{ $item->title }}
                            </h3>

                            <p class="text-gray-500 text-sm mb-6 line-clamp-3 leading-relaxed">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->description ?: 'Informasi layanan web hosting tersedia untuk kebutuhan institusi.'), 150) }}
                            </p>

                            <div class="bg-blue-50 rounded-xl px-4 py-3 mb-6 flex items-center justify-between">
                                <span class="text-sm text-gray-500">Jumlah bagian</span>
                                <span class="text-sm font-bold text-uniba-blue">{{ $item->sections_count }}</span>
                            </div>

                            <div class="flex items-center justify-between pt-5 border-t border-gray-100">
                                <span class="text-xs text-gray-400">
                                    Diperbarui {{ $item->updated_at?->format('d M Y') }}
                                </span>
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
                            <h3 class="font-bold text-xl text-gray-900 mb-2">Belum ada layanan audit</h3>
                            <p class="text-gray-500 mb-8 max-w-md mx-auto">
                                Data audit belum dipublikasikan. Silakan cek kembali beberapa saat lagi.
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>

            @if ($audits->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $audits->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection
