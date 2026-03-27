@extends('layouts.admin')

@section('page-title', 'Kategori Layanan')
@section('page-subtitle', 'Kelola kategori layanan yang tersedia di institusi')

@section('content')

    <div class="mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-uniba-blue rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                </div>
                <span class="text-lg font-semibold text-gray-700">Kategori Layanan</span>
            </div>

            <button @click="$dispatch('open-create')"
                class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-uniba-blue text-white rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 whitespace-nowrap">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span class="font-semibold">Tambah Kategori</span>
            </button>
        </div>
    </div>

    <div id="ajax-table-container">
        @include('admin.pages.layanan.kategori-layanan.partials.table')
    </div>

    @include('admin.pages.layanan.kategori-layanan.partials.form-create')

    @include('admin.pages.layanan.kategori-layanan.partials.form-edit')

    @include('admin.pages.layanan.kategori-layanan.partials.form-show')

@endsection
