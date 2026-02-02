@extends('layouts.admin')

@section('page-title', 'Visi, Misi, Tujuan & Sasaran')
@section('page-subtitle', 'Kelola konten profil institusi')

@section('content')

    {{-- Alert --}}
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Filter Type --}}
    <div class="flex items-center justify-between mb-6">
        <div class="flex gap-2">
            @foreach (['visi', 'misi', 'tujuan', 'sasaran'] as $t)
                <a href="{{ route('admin.tentang.visi-misi.index', ['type' => $t]) }}"
                    class="px-4 py-2 rounded-lg text-sm font-semibold
                {{ $type === $t ? 'bg-uniba-blue text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                    {{ ucfirst($t) }}
                </a>
            @endforeach
        </div>

        <button @click="$dispatch('open-create')"
            class="px-4 py-2 bg-uniba-blue text-white rounded-lg hover:bg-blue-800 transition">
            + Tambah {{ ucfirst($type) }}
        </button>
    </div>

    {{-- Table --}}
    @include('admin.pages.tentang.visi-misi.partials.table')

    {{-- Create Modal --}}
    @include('admin.pages.tentang.visi-misi.partials.form-create')

    {{-- Edit Modal --}}
    @include('admin.pages.tentang.visi-misi.partials.form-edit')

@endsection
