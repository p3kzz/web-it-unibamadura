<div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200">
    <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-uniba-blue rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800">Daftar {{ ucfirst($section) }}</h3>
                    <p class="text-xs text-gray-500">Total: {{ $items->count() }} data</p>
                </div>
            </div>
            <div class="text-sm text-gray-500">
                <span class="inline-flex items-center gap-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Terakhir diupdate: {{ now()->format('d M Y') }}
                </span>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-gradient-to-r from-uniba-blue to-blue-700 text-white">
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider w-24">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path>
                            </svg>
                            No
                        </div>
                    </th>
                    @if (in_array($section, ['misi', 'sasaran', 'tujuan']))
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                    </path>
                                </svg>
                                Judul
                            </div>
                        </th>
                    @endif
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            Konten
                        </div>
                    </th>
                    <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider w-24">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Status
                        </div>
                    </th>
                    <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider w-32">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                </path>
                            </svg>
                            Aksi
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($items as $index => $item)
                    <tr x-data="{ expanded: false }" class="hover:bg-blue-50 transition-colors duration-150 group">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <span
                                    class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 text-uniba-blue font-bold rounded-lg text-sm group-hover:bg-blue-200 transition-colors duration-150">
                                    {{ $loop->iteration }}
                                </span>
                            </div>
                        </td>

                        @if (in_array($section, ['misi', 'sasaran', 'tujuan']))
                            <td class="px-6 py-4">
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-900 mb-1">
                                        <span x-show="!expanded">
                                            {{ Str::limit($item->title, 80) }}
                                        </span>
                                        <span x-show="expanded" x-cloak>
                                            {{ $item->title }}
                                        </span>
                                    </p>
                                </div>
                                @if (strlen($item->title) > 80)
                                    <button @click="expanded = !expanded"
                                        class="text-xs text-uniba-blue hover:text-blue-800 font-medium mt-1 inline-flex items-center gap-1">
                                        <span x-text="expanded ? 'Tutup' : 'Lihat selengkapnya'"></span>
                                        <svg class="w-3 h-3 transition-transform duration-200"
                                            :class="expanded ? 'rotate-90' : ''" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </button>
                                @endif
                            </td>
                        @endif

                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-700 leading-relaxed">
                                <span x-show="!expanded">
                                    {{ Str::limit($item->content, 150) }}
                                </span>
                                <span x-show="expanded" x-cloak>
                                    {{ $item->content }}
                                </span>
                            </div>

                            @if (strlen($item->content) > 150)
                                <button @click="expanded = !expanded"
                                    class="text-xs text-uniba-blue hover:text-blue-800 font-medium mt-1 inline-flex items-center gap-1">
                                    <span x-text="expanded ? 'Tutup' : 'Lihat selengkapnya'"></span>
                                    <svg class="w-3 h-3 transition-transform duration-200"
                                        :class="expanded ? 'rotate-90' : ''" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            @if ($item->is_active ?? true)
                                <span
                                    class="inline-flex items-center gap-1 px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">
                                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                                    Aktif
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center gap-1 px-3 py-1 bg-gray-100 text-gray-600 text-xs font-semibold rounded-full">
                                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full"></span>
                                    Nonaktif
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <button @click="$dispatch('open-edit', {{ $item->toJson() }})"
                                    class="inline-flex items-center gap-1 px-3 py-2 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white text-xs font-semibold rounded-lg shadow hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5"
                                    title="Edit data">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                    Edit
                                </button>

                                <form method="POST" action="{{ route('admin.tentang.visi-misi.destroy', $item) }}"
                                    onsubmit="return confirm('⚠️ Yakin ingin menghapus data ini?\n\nData yang dihapus tidak dapat dikembalikan!')"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center gap-1 px-3 py-2 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white text-xs font-semibold rounded-lg shadow hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5"
                                        title="Hapus data">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ in_array($section, ['misi', 'sasaran', 'tujuan']) ? '5' : '4' }}"
                            class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                        </path>
                                    </svg>
                                </div>
                                <p class="text-gray-500 font-medium mb-2">Data Belum Tersedia</p>
                                <p class="text-gray-400 text-sm mb-4">Belum ada data {{ $section }} yang
                                    ditambahkan</p>
                                <button @click="$dispatch('open-create')"
                                    class="inline-flex items-center gap-2 px-4 py-2 bg-uniba-blue text-white rounded-lg hover:bg-blue-800 transition-colors duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Tambah Data Pertama
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
