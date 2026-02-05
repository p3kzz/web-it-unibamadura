@extends('layouts.admin')

@section('title', 'Manajemen Periode')

@section('content')

    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Daftar Periode</h1>
                <p class="text-sm text-gray-500">
                    Kelola periode kepengurusan / perencanaan
                </p>
            </div>

            <button @click="$dispatch('open-create-periode')"
                class="inline-flex items-center gap-2 px-4 py-2
                bg-uniba-blue text-white rounded-lg hover:bg-blue-800">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Periode
            </button>
        </div>

        {{-- Table --}}
        <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">
                            No
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">
                            Nama Periode
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">
                            Tahun
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-bold text-gray-600 uppercase">
                            Status
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-bold text-gray-600 uppercase">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse ($periode as $periode)
                        <tr class="hover:bg-blue-50">
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4">
                                <p class="font-semibold text-gray-800">
                                    {{ $periode->name }}
                                </p>
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $periode->start_year }} – {{ $periode->end_year }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                @if ($periode->is_active)
                                    <span
                                        class="inline-flex items-center gap-1
                                    px-3 py-1 text-xs font-semibold
                                    bg-green-100 text-green-700 rounded-full">
                                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                                        Aktif
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center
                                    px-3 py-1 text-xs font-semibold
                                    bg-gray-100 text-gray-600 rounded-full">
                                        Nonaktif
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">

                                    {{-- Edit --}}
                                    <button @click="$dispatch('open-edit-periode', {{ $periode->toJson() }})"
                                        class="px-3 py-2 text-xs font-semibold
                                        bg-orange-500 text-white rounded-lg
                                        hover:bg-orange-600">
                                        Edit
                                    </button>

                                    {{-- Delete --}}
                                    <form method="POST" action="{{ route('admin.periode.destroy', $periode) }}"
                                        onsubmit="return confirm('Yakin ingin menghapus periode ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" @disabled($periode->is_active)
                                            class="px-3 py-2 text-xs font-semibold rounded-lg
                                            {{ $periode->is_active
                                                ? 'bg-gray-300 text-gray-500 cursor-not-allowed'
                                                : 'bg-red-500 text-white hover:bg-red-600' }}">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                                Belum ada periode yang ditambahkan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    {{-- Modal create --}}
    @include('admin.pages.periode.partials.form-create')

    {{-- Modal edit --}}
    @include('admin.pages.periode.partials.form-edit')

@endsection
