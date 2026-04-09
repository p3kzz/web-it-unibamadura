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
            <div class="max-w-5xl mx-auto space-y-6">

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

            </div>
        </div>
    </section>

@endsection
