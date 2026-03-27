@extends('layouts.admin')

@section('page-title', 'Katalog Layanan')
@section('page-subtitle', 'Kelola Katalog Layanan UPT TIK')

@section('content')

    <div class="mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-uniba-blue rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                </div>
                <span class="text-lg font-semibold text-gray-700">Katalog Layanan</span>
            </div>

            <button @click="$dispatch('open-create-layanan')"
                class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-uniba-blue text-white rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 whitespace-nowrap">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span class="font-semibold">Tambah Layanan</span>
            </button>
        </div>
    </div>

    <div id="ajax-table-container">
        @include('admin.pages.layanan.katalog-layanan.partials.table')
    </div>

    @include('admin.pages.layanan.katalog-layanan.partials.form-create')

    @include('admin.pages.layanan.katalog-layanan.partials.form-edit')

    @include('admin.pages.layanan.katalog-layanan.partials.form-show')

@endsection