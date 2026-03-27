<tr class="hover:bg-gray-50 transition-colors duration-150">
    <td class="px-6 py-4">
        <span class="text-sm font-semibold text-gray-600">{{ $items->firstItem() + $index }}</span>
    </td>
    <td class="px-6 py-4">
        @if ($item->icon)
            <img src="{{ $item->icon_url }}" alt="{{ $item->nama }}"
                class="w-10 h-10 object-cover rounded-lg border border-gray-200">
        @else
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-uniba-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                    </path>
                </svg>
            </div>
        @endif
    </td>
    <td class="px-6 py-4">
        <span class="text-sm font-semibold text-gray-800">{{ $item->nama }}</span>
        @if ($item->link)
            <a href="{{ $item->link }}" target="_blank"
                class="block text-xs text-blue-500 hover:underline mt-0.5 truncate max-w-[200px]">
                {{ $item->link }}
            </a>
        @endif
    </td>
    <td class="px-6 py-4">
        <p class="text-sm text-gray-600 line-clamp-2">
            @if ($item->deskripsi)
                {!! Str::limit(strip_tags($item->deskripsi), 100) !!}
            @else
                <span class="text-gray-400 italic">Tidak ada deskripsi</span>
            @endif
        </p>
    </td>
    <td class="px-6 py-4">
        @if ($item->kategori)
            <span
                class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                {{ $item->kategori->nama }}
            </span>
        @else
            <span class="text-gray-400 italic text-xs">Tanpa kategori</span>
        @endif
    </td>
    <td class="px-6 py-4 text-center">
        @if ($item->is_active)
            <span
                class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5"></span>
                Aktif
            </span>
        @else
            <span
                class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-600">
                <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-1.5"></span>
                Nonaktif
            </span>
        @endif
    </td>
    <td class="px-6 py-4">
        <div class="flex items-center justify-center gap-1">
            <button
                @click="$dispatch('open-show-layanan', {
                    id: {{ $item->id }},
                    nama: '{{ addslashes($item->nama) }}',
                    deskripsi: `{!! addslashes($item->deskripsi ?? '') !!}`,
                    icon: '{{ $item->icon ?? '' }}',
                    link: '{{ addslashes($item->link ?? '') }}',
                    kategori: '{{ addslashes($item->kategori?->nama ?? '') }}',
                    is_active: {{ $item->is_active ? 'true' : 'false' }}
                })"
                class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors duration-150"
                title="Lihat Detail">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                    </path>
                </svg>
            </button>

            <button
                @click="$dispatch('open-edit-layanan', {
                    id: {{ $item->id }},
                    nama: '{{ addslashes($item->nama) }}',
                    deskripsi: `{!! addslashes($item->deskripsi ?? '') !!}`,
                    icon: '{{ $item->icon ?? '' }}',
                    link: '{{ addslashes($item->link ?? '') }}',
                    kategori_layanan_id: {{ $item->kategori_layanan_id ?? 'null' }},
                    sort_order: {{ $item->sort_order }},
                    is_active: {{ $item->is_active ? 'true' : 'false' }}
                })"
                class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors duration-150" title="Edit">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
            </button>

            <form action="{{ route('admin.layanan.katalog-layanan.destroy', $item->id) }}" method="POST"
                onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors duration-150"
                    title="Hapus">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                        </path>
                    </svg>
                </button>
            </form>
        </div>
    </td>
</tr>