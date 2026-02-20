@extends('layouts.admin')

@section('page-title', 'Visi, Misi, Tujuan & Sasaran')
@section('page-subtitle', 'Kelola konten profil institusi')

@section('content')

    <div class="mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" @click.away="open = false"
                    class="inline-flex items-center justify-between gap-3 px-4 py-2.5 bg-white border-2 border-gray-300 rounded-lg hover:border-uniba-blue transition-all duration-200 shadow-sm hover:shadow-md min-w-[200px]">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-uniba-blue rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <span class="text-sm font-semibold text-gray-700">{{ ucfirst($section) }}</span>
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
                    class="absolute left-0 mt-2 w-56 bg-white rounded-lg shadow-xl border border-gray-200 py-2 z-50">

                    @foreach (['visi', 'misi', 'tujuan', 'sasaran'] as $t)
                        <a href="{{ route('admin.tentang.visi-misi.index', array_filter(['section' => $t, 'periode_id' => $periodeFilter, 'search' => $search])) }}"
                            class="flex items-center gap-3 px-4 py-2.5 hover:bg-blue-50 transition-colors duration-150 {{ $section === $t ? 'bg-blue-50' : '' }}">
                            <div class="flex-shrink-0">
                                @if ($section === $t)
                                    <div class="w-5 h-5 bg-blue-700 rounded-full flex items-center justify-center">
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
                                <p class="text-sm font-semibold text-gray-800">{{ ucfirst($t) }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <button @click="$dispatch('open-create')"
                class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-uniba-blue text-white rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 whitespace-nowrap">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span class="font-semibold">Tambah {{ ucfirst($section) }}</span>
            </button>
        </div>
    </div>

    <div id="ajax-table-container">
        @include('admin.pages.tentang.visi-misi.partials.table')
    </div>

    @include('admin.pages.tentang.visi-misi.partials.form-create')

    @include('admin.pages.tentang.visi-misi.partials.form-edit')

@endsection
