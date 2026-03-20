@extends('layouts.admin')

@section('page-title', 'Struktur Organisasi')
@section('page-subtitle', 'Kelola bagan struktur dan unit organisasi UPT TIK')

@section('content')
    <div class="space-y-6">
        {{-- Header Actions --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            {{-- Dropdown Filter Struktur --}}
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" @click.away="open = false"
                    class="inline-flex items-center justify-between gap-3 px-4 py-2.5 bg-white border-2 border-gray-300 rounded-lg hover:border-uniba-blue transition-all duration-200 shadow-sm hover:shadow-md min-w-[280px]">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-uniba-blue rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                        <span class="text-sm font-semibold text-gray-700">
                            @if ($selectedStruktur)
                                {{ $selectedStruktur->periode->name ?? 'Periode ' . $selectedStruktur->periode->start_year . '-' . $selectedStruktur->periode->end_year }}
                            @else
                                Pilih Struktur Organisasi
                            @endif
                        </span>
                    </div>
                    <svg class="w-4 h-4 text-gray-600 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute left-0 mt-2 w-72 bg-white rounded-lg shadow-xl border border-gray-200 py-2 z-50 max-h-64 overflow-y-auto">

                    @forelse ($strukturList as $struktur)
                        <a href="{{ route('admin.tentang.struktur-organisasi.index', ['struktur_id' => $struktur->id]) }}"
                            class="flex items-center gap-3 px-4 py-2.5 hover:bg-blue-50 transition-colors duration-150 {{ $selectedStruktur && $selectedStruktur->id === $struktur->id ? 'bg-blue-50' : '' }}">
                            <div class="flex-shrink-0">
                                @if ($selectedStruktur && $selectedStruktur->id === $struktur->id)
                                    <div class="w-5 h-5 bg-uniba-blue rounded-full flex items-center justify-center">
                                        <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                @else
                                    <div class="w-5 h-5 border-2 border-gray-300 rounded-full"></div>
                                @endif
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-gray-800">
                                    {{ $struktur->periode->name ?? 'Periode ' . $struktur->periode->start_year . '-' . $struktur->periode->end_year }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    {{ $struktur->is_active ? '● Aktif' : '○ Tidak Aktif' }}
                                </p>
                            </div>
                        </a>
                    @empty
                        <div class="px-4 py-3 text-center text-gray-500 text-sm">
                            Belum ada struktur organisasi
                        </div>
                    @endforelse
                </div>
            </div>

            <button @click="$dispatch('open-create-struktur')"
                class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-uniba-blue text-white rounded-lg hover:bg-blue-700 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 whitespace-nowrap">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span class="font-semibold">Tambah Struktur</span>
            </button>
        </div>

        {{-- Content Area --}}
        <div id="ajax-content-container">
            @include('admin.pages.tentang.struktur-organisasi.partials.content')
        </div>
    </div>

    {{-- Modals --}}
    @include('admin.pages.tentang.struktur-organisasi.partials.form-create-struktur')
    @include('admin.pages.tentang.struktur-organisasi.partials.form-edit-struktur')
    @include('admin.pages.tentang.struktur-organisasi.partials.form-create-unit')
    @include('admin.pages.tentang.struktur-organisasi.partials.form-edit-unit')
@endsection
