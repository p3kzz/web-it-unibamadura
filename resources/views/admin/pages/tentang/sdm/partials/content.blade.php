@if ($selectedStruktur)
    <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg overflow-hidden border border-gray-200">
        {{-- Header --}}
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-4 sm:px-6 py-3 sm:py-4 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 sm:gap-4">
                <div class="flex items-center gap-2 sm:gap-3">
                    <div
                        class="w-8 h-8 sm:w-10 sm:h-10 bg-emerald-500 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base sm:text-lg font-bold text-gray-800">Daftar Pegawai</h3>
                        <p class="text-xs sm:text-sm text-gray-500">
                            {{ $selectedStruktur->periode->name ?? 'Periode ' . $selectedStruktur->periode->start_year . '-' . $selectedStruktur->periode->end_year }}
                        </p>
                    </div>
                </div>

                {{-- Filter by Unit --}}
                @if ($units->count() > 0)
                    <div class="flex items-center gap-2">
                        <select
                            onchange="window.location.href='{{ route('admin.tentang.pegawai.index', ['struktur_id' => $strukturId]) }}&unit_id=' + this.value"
                            class="text-sm border-gray-300 rounded-lg focus:ring-uniba-blue focus:border-uniba-blue">
                            <option value="">Semua Unit</option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->id }}" {{ $unitId == $unit->id ? 'selected' : '' }}>
                                    {{ $unit->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif
            </div>
        </div>

        @if ($pegawai->count() > 0)
            {{-- Desktop Table View --}}
            <div class="hidden lg:block overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-uniba-blue text-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider w-16">No</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Pegawai</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Unit</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Sertifikasi</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider w-32">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider w-28">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($pegawai as $index => $p)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $index + 1 }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ $p->foto_url }}" alt="{{ $p->nama }}"
                                            class="w-10 h-10 rounded-full object-cover border-2 border-gray-200">
                                        <div>
                                            <p class="font-semibold text-gray-800">{{ $p->nama }}</p>
                                            <p class="text-sm text-gray-500">{{ $p->jabatan }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $currentUnit = $p->penugasan->where('is_primary', true)->first()
                                            ?->unitOrganisasi;
                                    @endphp
                                    @if ($currentUnit)
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold {{ $currentUnit->type === 'directorate' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                                            {{ $currentUnit->name }}
                                        </span>
                                    @else
                                        <span class="text-gray-400 text-sm">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if ($p->sertifikasi && count($p->sertifikasi) > 0)
                                        <div class="flex flex-wrap gap-1">
                                            @foreach (array_slice($p->sertifikasi, 0, 2) as $sertif)
                                                <span
                                                    class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    {{ $sertif }}
                                                </span>
                                            @endforeach
                                            @if (count($p->sertifikasi) > 2)
                                                <span
                                                    class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                                                    +{{ count($p->sertifikasi) - 2 }}
                                                </span>
                                            @endif
                                        </div>
                                    @else
                                        <span class="text-gray-400 text-sm">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if ($p->status === 'aktif')
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                            Aktif
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                            Nonaktif
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-1">
                                        <button @click="$dispatch('open-show-pegawai', {{ json_encode($p) }})"
                                            class="p-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-all"
                                            title="Detail">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                        <button @click="$dispatch('open-edit-pegawai', {{ json_encode($p) }})"
                                            class="p-2 bg-orange-600 hover:bg-orange-700 text-white rounded-lg transition-all"
                                            title="Edit">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                        <form action="{{ route('admin.tentang.pegawai.destroy', $p) }}" method="POST"
                                            class="inline"
                                            onsubmit="return confirm('Yakin ingin menghapus pegawai ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-all"
                                                title="Hapus">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Mobile Card View --}}
            <div class="lg:hidden p-3 sm:p-4 space-y-3">
                @foreach ($pegawai as $index => $p)
                    @include('admin.pages.tentang.sdm.partials.mobile-card', [
                        'p' => $p,
                        'index' => $index,
                    ])
                @endforeach
            </div>

            {{-- Pagination --}}
            @if ($pegawai->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $pegawai->links() }}
                </div>
            @endif
        @else
            @include('admin.pages.tentang.sdm.partials.empty-state')
        @endif
    </div>
@else
    {{-- No struktur selected --}}
    <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg overflow-hidden border border-gray-200">
        <div class="py-16 sm:py-20 text-center px-4">
            <div
                class="w-20 h-20 sm:w-24 sm:h-24 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
                <svg class="w-10 h-10 sm:w-12 sm:h-12 text-uniba-blue" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
            </div>
            @if ($strukturList->count() > 0)
                <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-2">Pilih Struktur Organisasi</h3>
                <p class="text-gray-500 mb-6 max-w-md mx-auto text-sm sm:text-base">
                    Pilih struktur organisasi dari dropdown di atas untuk mengelola data pegawai
                </p>
            @else
                <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-2">Belum Ada Struktur Organisasi</h3>
                <p class="text-gray-500 mb-6 max-w-md mx-auto text-sm sm:text-base">
                    Buat struktur organisasi terlebih dahulu sebelum menambahkan data pegawai
                </p>
                <a href="{{ route('admin.tentang.struktur-organisasi.index') }}"
                    class="inline-flex items-center gap-2 px-5 sm:px-6 py-2.5 sm:py-3 bg-uniba-blue text-white rounded-lg sm:rounded-xl hover:bg-blue-700 transition-all font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-sm sm:text-base">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                    Kelola Struktur Organisasi
                </a>
            @endif
        </div>
    </div>
@endif
