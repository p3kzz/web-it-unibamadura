@extends('layouts.admin')

@section('page-title', 'Visi, Misi, Tujuan & Sasaran')
@section('page-subtitle', 'Kelola konten profil institusi')

@section('content')

    {{-- Header Section --}}
    <div class="mb-6">
        {{-- Top Bar: Section Tabs & Add Button --}}
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            {{-- Section Tabs --}}
            <div class="bg-white rounded-xl shadow-md border border-gray-200 p-1.5 inline-flex flex-wrap gap-1">
                @foreach (['visi', 'misi', 'tujuan', 'sasaran'] as $t)
                    <a href="{{ route('admin.tentang.visi-misi.index', ['section' => $t, 'periode_id' => $periodeFilter]) }}"
                        class="px-4 py-2.5 rounded-lg text-sm font-semibold transition-all duration-200 whitespace-nowrap
                        {{ $section === $t
                            ? 'bg-gradient-to-r from-uniba-blue to-blue-700 text-white shadow-md transform scale-105'
                            : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                        @if($section === $t)
                            <span class="inline-flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ ucfirst($t) }}
                            </span>
                        @else
                            {{ ucfirst($t) }}
                        @endif
                    </a>
                @endforeach
            </div>

            {{-- Add Button --}}
            <button @click="$dispatch('open-create')"
                class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-gradient-to-r from-uniba-blue to-blue-700 text-white rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 whitespace-nowrap">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span class="font-semibold">Tambah {{ ucfirst($section) }}</span>
            </button>
        </div>
    </div>

    {{-- Desktop Table --}}
    <div class="hidden lg:block bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200">
        {{-- Table Header Info with Filter --}}
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-uniba-blue rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">Daftar {{ ucfirst($section) }}</h3>
                        <p class="text-xs text-gray-500">Total: {{ $items->count() }} data</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    {{-- Filter Dropdown --}}
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" @click.away="open = false"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-white border-2 border-gray-300 rounded-lg hover:border-uniba-blue hover:bg-gray-50 transition-all duration-200 shadow-sm hover:shadow-md">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                            </svg>
                            <span class="text-sm font-semibold text-gray-700">
                                @if($periodeFilter)
                                    {{ $periodes->firstWhere('id', $periodeFilter)->name ?? 'Filter Periode' }}
                                @else
                                    Semua Periode
                                @endif
                            </span>
                            <svg class="w-4 h-4 text-gray-600 transition-transform duration-200"
                                :class="open ? 'rotate-180' : ''"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        {{-- Dropdown Menu --}}
                        <div x-show="open"
                            x-cloak
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-xl border border-gray-200 py-2 z-50 max-h-80 overflow-y-auto">

                            {{-- All Periods Option --}}
                            <a href="{{ route('admin.tentang.visi-misi.index', ['section' => $section]) }}"
                                class="flex items-center gap-3 px-4 py-2.5 hover:bg-blue-50 transition-colors duration-150 {{ !$periodeFilter ? 'bg-blue-50' : '' }}">
                                <div class="flex-shrink-0">
                                    @if(!$periodeFilter)
                                        <div class="w-5 h-5 bg-gradient-to-r from-uniba-blue to-blue-700 rounded-full flex items-center justify-center">
                                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                    @else
                                        <div class="w-5 h-5 border-2 border-gray-300 rounded-full"></div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold text-gray-800">Semua Periode</p>
                                    <p class="text-xs text-gray-500">Tampilkan semua data</p>
                                </div>
                            </a>

                            <div class="border-t border-gray-200 my-2"></div>

                            {{-- Period Options --}}
                            @foreach ($periodes as $periode)
                                <a href="{{ route('admin.tentang.visi-misi.index', ['section' => $section, 'periode_id' => $periode->id]) }}"
                                    class="flex items-center gap-3 px-4 py-2.5 hover:bg-blue-50 transition-colors duration-150 {{ $periodeFilter == $periode->id ? 'bg-blue-50' : '' }}">
                                    <div class="flex-shrink-0">
                                        @if($periodeFilter == $periode->id)
                                            <div class="w-5 h-5 bg-gradient-to-r from-uniba-blue to-blue-700 rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="w-5 h-5 border-2 border-gray-300 rounded-full"></div>
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-semibold text-gray-800">{{ $periode->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $periode->start_year }} - {{ $periode->end_year }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    {{-- Last Update Info --}}
                    <div class="text-sm text-gray-500 hidden xl:block">
                        <span class="inline-flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Terakhir diupdate: {{ now()->format('d M Y') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-uniba-blue to-blue-700 text-white">
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider w-24">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path>
                                </svg>
                                No
                            </div>
                        </th>
                        @if (in_array($section, ['misi', 'sasaran', 'tujuan']))
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                        </path>
                                    </svg>
                                    Judul
                                </div>
                            </th>
                        @endif
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                Periode
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                Konten
                            </div>
                        </th>
                        <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider w-24">
                            <div class="flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Status
                            </div>
                        </th>
                        <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider w-32">
                            <div class="flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                    </path>
                                </svg>
                                Aksi
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($items as $index => $item)
                        @include('admin.pages.tentang.visi-misi.partials.table-row')
                    @empty
                        <tr>
                            <td colspan="{{ in_array($section, ['misi', 'sasaran', 'tujuan']) ? '6' : '5' }}"
                                class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                            </path>
                                        </svg>
                                    </div>
                                    <p class="text-gray-500 font-medium mb-2">Data Belum Tersedia</p>
                                    <p class="text-gray-400 text-sm mb-4">Belum ada data {{ $section }} yang
                                        ditambahkan</p>
                                    <button @click="$dispatch('open-create')"
                                        class="inline-flex items-center gap-2 px-4 py-2 bg-uniba-blue text-white rounded-lg hover:bg-blue-800 transition-colors duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4"></path>
                                        </svg>
                                        Tambah Data Pertama
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Mobile Card View --}}
    <div class="lg:hidden space-y-4">
        {{-- Mobile Filter --}}
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" @click.away="open = false"
                class="w-full inline-flex items-center justify-between gap-2 px-4 py-3 bg-white border-2 border-gray-300 rounded-lg hover:border-uniba-blue transition-all duration-200 shadow-sm">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                    <span class="text-sm font-semibold text-gray-700">
                        @if($periodeFilter)
                            {{ $periodes->firstWhere('id', $periodeFilter)->name ?? 'Filter Periode' }}
                        @else
                            Semua Periode
                        @endif
                    </span>
                </div>
                <svg class="w-4 h-4 text-gray-600 transition-transform duration-200"
                    :class="open ? 'rotate-180' : ''"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            {{-- Dropdown Menu --}}
            <div x-show="open"
                x-cloak
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="absolute left-0 right-0 mt-2 bg-white rounded-lg shadow-xl border border-gray-200 py-2 z-50 max-h-80 overflow-y-auto">

                <a href="{{ route('admin.tentang.visi-misi.index', ['section' => $section]) }}"
                    class="flex items-center gap-3 px-4 py-2.5 hover:bg-blue-50 transition-colors duration-150 {{ !$periodeFilter ? 'bg-blue-50' : '' }}">
                    <div class="flex-shrink-0">
                        @if(!$periodeFilter)
                            <div class="w-5 h-5 bg-gradient-to-r from-uniba-blue to-blue-700 rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        @else
                            <div class="w-5 h-5 border-2 border-gray-300 rounded-full"></div>
                        @endif
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-800">Semua Periode</p>
                        <p class="text-xs text-gray-500">Tampilkan semua data</p>
                    </div>
                </a>

                <div class="border-t border-gray-200 my-2"></div>

                @foreach ($periodes as $periode)
                    <a href="{{ route('admin.tentang.visi-misi.index', ['section' => $section, 'periode_id' => $periode->id]) }}"
                        class="flex items-center gap-3 px-4 py-2.5 hover:bg-blue-50 transition-colors duration-150 {{ $periodeFilter == $periode->id ? 'bg-blue-50' : '' }}">
                        <div class="flex-shrink-0">
                            @if($periodeFilter == $periode->id)
                                <div class="w-5 h-5 bg-gradient-to-r from-uniba-blue to-blue-700 rounded-full flex items-center justify-center">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            @else
                                <div class="w-5 h-5 border-2 border-gray-300 rounded-full"></div>
                            @endif
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-800">{{ $periode->name }}</p>
                            <p class="text-xs text-gray-500">{{ $periode->start_year }} - {{ $periode->end_year }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        @forelse ($items as $index => $item)
            <div x-data="{ expanded: false }" class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden hover:shadow-xl transition-shadow duration-200">
                {{-- Card Header --}}
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-4 py-3 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-gradient-to-r from-uniba-blue to-blue-700 rounded-lg flex items-center justify-center">
                                <span class="text-white text-xs font-bold">#{{ $loop->iteration }}</span>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">{{ ucfirst($section) }}</p>
                            </div>
                        </div>
                        @if ($item->is_active ?? true)
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                                Aktif
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-gray-100 text-gray-600 text-xs font-semibold rounded-full">
                                <span class="w-1.5 h-1.5 bg-gray-400 rounded-full"></span>
                                Nonaktif
                            </span>
                        @endif
                    </div>
                </div>

                {{-- Card Content --}}
                <div class="p-4 space-y-3">
                    @if (in_array($section, ['misi', 'sasaran', 'tujuan']))
                        <div>
                            <p class="text-xs text-gray-500 mb-1 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                    </path>
                                </svg>
                                Judul
                            </p>
                            <p class="font-semibold text-gray-900 text-sm leading-relaxed">
                                <span x-show="!expanded">
                                    {{ Str::limit($item->title, 80) }}
                                </span>
                                <span x-show="expanded" x-cloak>
                                    {{ $item->title }}
                                </span>
                            </p>
                            @if (strlen($item->title) > 80)
                                <button @click="expanded = !expanded"
                                    class="text-xs text-uniba-blue hover:text-blue-800 font-medium mt-1 inline-flex items-center gap-1">
                                    <span x-text="expanded ? 'Tutup' : 'Lihat selengkapnya'"></span>
                                    <svg class="w-3 h-3 transition-transform duration-200" :class="expanded ? 'rotate-90' : ''"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            @endif
                        </div>
                    @endif

                    <div>
                        <p class="text-xs text-gray-500 mb-1 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            Periode
                        </p>
                        <p class="text-sm font-medium text-gray-700">
                            {{ $item->periode->name ?? '-' }}
                            @if ($item->periode)
                                <span class="text-xs text-gray-500 block mt-0.5">
                                    {{ $item->periode->start_year }} - {{ $item->periode->end_year }}
                                </span>
                            @endif
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-500 mb-1 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            Konten
                        </p>
                        <div class="text-sm text-gray-700 leading-relaxed">
                            <span x-show="!expanded">
                                {{ Str::limit($item->content, 150) }}
                            </span>
                            <span x-show="expanded" x-cloak>
                                {{ $item->content }}
                            </span>
                        </div>
                        @if (strlen($item->content) > 150)
                            <button @click="expanded = !expanded"
                                class="text-xs text-uniba-blue hover:text-blue-800 font-medium mt-1 inline-flex items-center gap-1">
                                <span x-text="expanded ? 'Tutup' : 'Lihat selengkapnya'"></span>
                                <svg class="w-3 h-3 transition-transform duration-200" :class="expanded ? 'rotate-90' : ''"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        @endif
                    </div>
                </div>

                {{-- Card Actions --}}
                <div class="bg-gray-50 px-4 py-3 flex items-center gap-2 border-t border-gray-200">
                    <button @click="$dispatch('open-edit', {{ $item->toJson() }})"
                        class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white text-sm font-semibold rounded-lg shadow hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        Edit
                    </button>

                    <form method="POST" action="{{ route('admin.tentang.visi-misi.destroy', $item) }}"
                        onsubmit="return confirm('⚠️ Yakin ingin menghapus data ini?\n\nData yang dihapus tidak dapat dikembalikan!')"
                        class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white text-sm font-semibold rounded-lg shadow hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-8 text-center">
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4 mx-auto">
                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                        </path>
                    </svg>
                </div>
                <p class="text-gray-500 font-medium mb-2">Data Belum Tersedia</p>
                <p class="text-gray-400 text-sm mb-4">Belum ada data {{ $section }} yang ditambahkan</p>
                <button @click="$dispatch('open-create')"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-uniba-blue text-white rounded-lg hover:bg-blue-800 transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Data Pertama
                </button>
            </div>
        @endforelse
    </div>

    {{-- Create Modal --}}
    @include('admin.pages.tentang.visi-misi.partials.form-create')

    {{-- Edit Modal --}}
    @include('admin.pages.tentang.visi-misi.partials.form-edit')

@endsection
