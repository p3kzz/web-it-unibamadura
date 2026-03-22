@if ($selectedStruktur)
    <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg overflow-hidden border border-gray-200 mb-4 sm:mb-6">
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-4 sm:px-6 py-3 sm:py-4 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 sm:gap-4">
                <div class="flex items-center gap-2 sm:gap-3">
                    <div
                        class="w-8 h-8 sm:w-10 sm:h-10 bg-uniba-blue rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <h3 class="text-base sm:text-lg font-bold text-gray-800 truncate">Bagan Struktur Organisasi</h3>
                        <p class="text-xs sm:text-sm text-gray-500 flex flex-wrap items-center gap-1">
                            <span
                                class="truncate">{{ $selectedStruktur->periode->name ?? 'Periode ' . $selectedStruktur->periode->start_year . '-' . $selectedStruktur->periode->end_year }}</span>
                            @if ($selectedStruktur->is_active)
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Aktif
                                </span>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <button @click="$dispatch('open-edit-struktur', {{ json_encode($selectedStruktur) }})"
                        class="flex-1 sm:flex-none inline-flex items-center justify-center gap-1.5 sm:gap-2 px-3 sm:px-4 py-2 bg-amber-500 text-white rounded-lg hover:bg-amber-600 transition-all text-xs sm:text-sm font-semibold">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        <span class="hidden xs:inline">Edit</span> Bagan
                    </button>
                    <form action="{{ route('admin.tentang.struktur-organisasi.destroy', $selectedStruktur) }}"
                        method="POST" class="inline flex-1 sm:flex-none"
                        onsubmit="return confirm('Yakin ingin menghapus struktur ini beserta semua unit-nya?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-1.5 sm:gap-2 px-3 sm:px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-all text-xs sm:text-sm font-semibold">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="p-4 sm:p-6">
            @if ($selectedStruktur->image)
                <div class="relative group">
                    <img src="{{ asset('storage/' . $selectedStruktur->image) }}" alt="Bagan Struktur Organisasi"
                        class="w-full h-auto rounded-lg sm:rounded-xl border border-gray-200 shadow-sm">
                    <a href="{{ asset('storage/' . $selectedStruktur->image) }}" target="_blank"
                        class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100 rounded-lg sm:rounded-xl">
                        <div
                            class="bg-white bg-opacity-90 backdrop-blur-sm rounded-lg sm:rounded-xl px-3 sm:px-4 py-2 flex items-center gap-2 shadow-lg">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-uniba-blue" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                            <span class="text-xs sm:text-sm font-semibold text-gray-700">Lihat ukuran penuh</span>
                        </div>
                    </a>
                </div>
            @else
                <div
                    class="py-8 sm:py-12 text-center bg-gray-50 rounded-lg sm:rounded-xl border-2 border-dashed border-gray-300">
                    <svg class="w-12 h-12 sm:w-16 sm:h-16 text-gray-300 mx-auto mb-3 sm:mb-4" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    <p class="text-gray-500 font-medium text-sm sm:text-base">Belum ada gambar bagan</p>
                    <p class="text-gray-400 text-xs sm:text-sm mt-1">Klik "Edit Bagan" untuk mengupload gambar</p>
                </div>
            @endif
        </div>
    </div>

    <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg overflow-hidden border border-gray-200">
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
                        <h3 class="text-base sm:text-lg font-bold text-gray-800">Unit Organisasi</h3>
                        <p class="text-xs sm:text-sm text-gray-500">Direktorat dan Subdirektorat</p>
                    </div>
                </div>
                <button @click="$dispatch('open-create-unit', { struktur_id: {{ $selectedStruktur->id }} })"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-4 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition-all text-xs sm:text-sm font-semibold">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Unit
                </button>
            </div>
        </div>

        @if ($units->count() > 0)
            {{-- Desktop Table View --}}
            <div class="hidden lg:block overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-uniba-blue text-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider w-16">No</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Nama Unit</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider w-32">Tipe</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider w-24">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($units as $index => $unit)
                            @include('admin.pages.tentang.struktur-organisasi.partials.table-row', [
                                'unit' => $unit,
                                'index' => $index + 1,
                                'level' => 0,
                            ])

                            @foreach ($unit->children as $childIndex => $child)
                                @include('admin.pages.tentang.struktur-organisasi.partials.table-row', [
                                    'unit' => $child,
                                    'index' => $index + 1 . '.' . ($childIndex + 1),
                                    'level' => 1,
                                ])
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Mobile Card View --}}
            <div class="lg:hidden p-3 sm:p-4 space-y-3">
                @foreach ($units as $index => $unit)
                    {{-- Parent Unit Card --}}
                    <div class="bg-gray-50 rounded-xl border border-gray-200 overflow-hidden">
                        <div class="px-4 py-3 border-b border-gray-200 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span
                                    class="inline-flex items-center justify-center w-7 h-7 bg-uniba-blue text-white font-bold rounded-lg text-xs">
                                    {{ $index + 1 }}
                                </span>
                                @if ($unit->type === 'directorate')
                                    <span
                                        class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                        Direktorat
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-purple-100 text-purple-800">
                                        Subdirektorat
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="px-4 py-3">
                            <p class="font-semibold text-gray-800 text-sm">{{ $unit->name }}</p>
                            @if ($unit->description)
                                <p class="text-xs text-gray-500 mt-1 line-clamp-2">
                                    {{ Str::limit(strip_tags($unit->description), 100) }}</p>
                            @endif
                        </div>
                        <div class="px-4 pb-3 flex gap-2">
                            <button
                                @click="$dispatch('open-show-unit', {{ json_encode($unit->load('parent', 'children')) }})"
                                class="flex-1 inline-flex items-center justify-center gap-1 px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded-lg transition-all">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                Detail
                            </button>
                            <button @click="$dispatch('open-edit-unit', {{ json_encode($unit) }})"
                                class="flex-1 inline-flex items-center justify-center gap-1 px-3 py-2 bg-orange-600 hover:bg-orange-700 text-white text-xs font-semibold rounded-lg transition-all">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit
                            </button>
                            <form action="{{ route('admin.tentang.unit-organisasi.destroy', $unit) }}" method="POST"
                                class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete(this)"
                                    class="w-full inline-flex items-center justify-center gap-1 px-3 py-2 bg-red-600 hover:bg-red-700 text-white text-xs font-semibold rounded-lg transition-all">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </div>

                        {{-- Child Units --}}
                        @if ($unit->children->count() > 0)
                            <div class="border-t border-gray-200 bg-white">
                                <div class="px-4 py-2 bg-gray-100">
                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">
                                        Subdirektorat</p>
                                </div>
                                @foreach ($unit->children as $childIndex => $child)
                                    <div class="px-4 py-3 border-b border-gray-100 last:border-b-0">
                                        <div class="flex items-start gap-2 mb-2">
                                            <span
                                                class="inline-flex items-center justify-center w-6 h-6 bg-purple-100 text-purple-700 font-bold rounded text-xs flex-shrink-0 mt-0.5">
                                                {{ $index + 1 }}.{{ $childIndex + 1 }}
                                            </span>
                                            <div class="min-w-0 flex-1">
                                                <p class="font-semibold text-gray-800 text-sm">{{ $child->name }}</p>
                                                @if ($child->description)
                                                    <p class="text-xs text-gray-500 mt-0.5 line-clamp-1">
                                                        {{ Str::limit(strip_tags($child->description), 60) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="flex gap-2 ml-8">
                                            <button
                                                @click="$dispatch('open-show-unit', {{ json_encode($child->load('parent', 'children')) }})"
                                                class="flex-1 inline-flex items-center justify-center gap-1 px-2 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium rounded-lg transition-all">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                Detail
                                            </button>
                                            <button @click="$dispatch('open-edit-unit', {{ json_encode($child) }})"
                                                class="flex-1 inline-flex items-center justify-center gap-1 px-2 py-1.5 bg-orange-600 hover:bg-orange-700 text-white text-xs font-medium rounded-lg transition-all">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Edit
                                            </button>
                                            <form
                                                action="{{ route('admin.tentang.unit-organisasi.destroy', $child) }}"
                                                method="POST" class="flex-1">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmDelete(this)"
                                                    class="w-full inline-flex items-center justify-center gap-1 px-2 py-1.5 bg-red-600 hover:bg-red-700 text-white text-xs font-medium rounded-lg transition-all">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="py-12 sm:py-16 text-center px-4">
                <div
                    class="w-16 h-16 sm:w-20 sm:h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10 text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
                <p class="text-gray-500 font-medium mb-2 text-sm sm:text-base">Belum ada unit organisasi</p>
                <p class="text-gray-400 text-xs sm:text-sm mb-4">Tambahkan direktorat atau subdirektorat untuk struktur
                    ini</p>
                <button @click="$dispatch('open-create-unit', { struktur_id: {{ $selectedStruktur->id }} })"
                    class="inline-flex items-center gap-2 px-4 sm:px-5 py-2 sm:py-2.5 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition-all font-semibold text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                        </path>
                    </svg>
                    Tambah Unit Pertama
                </button>
            </div>
        @endif
    </div>
@else
    <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg overflow-hidden border border-gray-200">
        <div class="py-16 sm:py-20 text-center px-4">
            <div
                class="w-20 h-20 sm:w-24 sm:h-24 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
                <svg class="w-10 h-10 sm:w-12 sm:h-12 text-uniba-blue" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                    </path>
                </svg>
            </div>
            @if ($strukturList->count() > 0)
                <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-2">Pilih Struktur Organisasi</h3>
                <p class="text-gray-500 mb-6 max-w-md mx-auto text-sm sm:text-base">
                    Pilih struktur organisasi dari dropdown di atas untuk melihat bagan dan unit organisasi
                </p>
            @else
                <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-2">Belum Ada Struktur Organisasi</h3>
                <p class="text-gray-500 mb-6 max-w-md mx-auto text-sm sm:text-base">
                    Mulai dengan membuat struktur organisasi baru untuk periode kepengurusan
                </p>
                <button @click="$dispatch('open-create-struktur')"
                    class="inline-flex items-center gap-2 px-5 sm:px-6 py-2.5 sm:py-3 bg-uniba-blue text-white rounded-lg sm:rounded-xl hover:bg-blue-700 transition-all font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-sm sm:text-base">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                        </path>
                    </svg>
                    Buat Struktur Pertama
                </button>
            @endif
        </div>
    </div>
@endif
