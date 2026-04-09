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
        </div>
    </div>

    <div id="ajax-table-container">
        @include('admin.pages.kebijakan.partials.table')
    </div>

    @include('admin.pages.kebijakan.partials.form-create')

    @include('admin.pages.kebijakan.partials.form-edit')

    @include('admin.pages.kebijakan.partials.form-show')

@endsection
