@extends('layouts.admin')

@section('page-title', 'Daftar Periode')
@section('page-subtitle', 'Kelola periode kepengurusan / perencanaan')

@section('content')

    <div class="space-y-6">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <button @click="$dispatch('open-create-periode')"
                class="inline-flex items-center justify-center gap-2 px-4 py-2
                bg-uniba-blue text-white rounded-lg hover:bg-blue-800 transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Periode
            </button>
            <x-search-table :endpoint="route('admin.periode.index')" placeholder="Cari periode..." />
        </div>

        @include('admin.pages.periode.partials.table')

        @include('admin.pages.periode.partials.card')

    </div>

    {{-- Modal create --}}
    @include('admin.pages.periode.partials.form-create')

    {{-- Modal edit --}}
    @include('admin.pages.periode.partials.form-edit')

@endsection
