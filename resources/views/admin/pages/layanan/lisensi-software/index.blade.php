@extends('layouts.admin')

@section('page-title', 'Licenses Software')
@section('page-subtitle', 'Kelola lisensi software institusi')

@section('content')

    <div class="mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <button @click="$dispatch('open-create')"
                class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-uniba-blue text-white rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 whitespace-nowrap">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span class="font-semibold">Tambah Lisensi Software</span>
            </button>
        </div>
    </div>

    <div id="ajax-table-container">
        @include('admin.pages.layanan.lisensi-software.partials.table')
    </div>

    @include('admin.pages.layanan.lisensi-software.partials.form-create')

    @include('admin.pages.layanan.lisensi-software.partials.form-edit')

    @include('admin.pages.layanan.lisensi-software.partials.form-show')

@endsection
