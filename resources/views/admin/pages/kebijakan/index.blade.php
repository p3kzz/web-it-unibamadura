@extends('layouts.admin')

@section('page-title', 'Kebijakan & Aturan')
@section('page-subtitle', 'Kelola Kebijakan dan Aturan')

@section('content')

    <div class="mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-uniba-blue rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>
                <span class="text-lg font-semibold text-gray-700">Kebijakan & Aturan</span>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('admin.penjaminan.policy-category.index') }}"
                    class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-all duration-200 whitespace-nowrap">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                        </path>
                    </svg>
                    <span class="font-medium">Kelola Kategori</span>
                </a>

                <button @click="$dispatch('open-create-policy')"
                    class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-uniba-blue text-white rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 whitespace-nowrap">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span class="font-semibold">Tambah Kebijakan</span>
                </button>
            </div>
        </div>
    </div>

    <div id="ajax-table-container">
        @include('admin.pages.kebijakan.partials.table')
    </div>

    @include('admin.pages.kebijakan.partials.form-create')

    @include('admin.pages.kebijakan.partials.form-edit')

    @include('admin.pages.kebijakan.partials.form-show')

@endsection
