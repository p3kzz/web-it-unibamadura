@extends('layouts.admin')

@section('page-title', 'Setting Konfigurasi Logo')
@section('page-subtitle', 'Kelola konfigurasi logo untuk website')

@section('content')

    <div class="space-y-6">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <button @click="$dispatch('open-create-konfigurasi-logo')"
                class="inline-flex items-center justify-center gap-2 px-4 py-2
                bg-uniba-blue text-white rounded-lg hover:bg-blue-800 transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Konfigurasi Logo
            </button>
            {{-- <x-search-table :endpoint="route('admin.konfigurasi-logo.index')" placeholder="Cari konfigurasi logo..." /> --}}
        </div>

        @include('admin.pages.setting.konfigurasi-logo.partials.table')

        {{-- @include('admin.pages.setting.konfigurasi-logo.partials.card') --}}

    </div>

    {{-- Modal create --}}
    {{-- @include('admin.pages.setting.konfigurasi-logo.partials.form-create') --}}

    {{-- Modal edit --}}
    {{-- @include('admin.pages.setting.konfigurasi-logo.partials.form-edit') --}}

@endsection
