<tr class="hover:bg-blue-50 transition-colors duration-150 group">
    <td class="px-6 py-4 whitespace-nowrap align-top">
        <span
            class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 text-uniba-blue font-bold rounded-lg text-sm group-hover:bg-blue-200 transition-colors">
            {{ $loop->iteration }}
        </span>
    </td>

    <td class="px-6 py-4 align-top">
        <div>
            <p class="font-semibold text-gray-900 break-words line-clamp-2 leading-tight">
                {{ $item->nama }}
            </p>
        </div>
    </td>

    <td class="px-6 py-4 whitespace-nowrap text-center align-top">
        @if ($item->is_active ?? true)
            <span
                class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-green-100 text-green-700 text-xs font-semibold rounded-full">
                <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                Aktif
            </span>
        @else
            <span
                class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gray-100 text-gray-600 text-xs font-semibold rounded-full">
                <span class="w-1.5 h-1.5 bg-gray-400 rounded-full"></span>
                Nonaktif
            </span>
        @endif
    </td>

    <td class="px-6 py-4 align-top">
        <div class="flex items-center justify-center gap-2">

            <button @click="$dispatch('open-edit-kategori-layanan', {{ $item->toJson() }})" title="Edit data"
                class="inline-flex items-center gap-1 px-3 py-2 bg-orange-600 hover:bg-orange-700 text-white text-xs font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </button>

            <form method="POST" action="{{ route('admin.layanan.kategori-layanan.destroy', $item) }}">
                @csrf
                @method('DELETE')
                <button type="button" onclick="confirmDelete(this)" @disabled($item->is_active)
                    title="{{ $item->is_active ? 'Tidak dapat menghapus data yang aktif' : 'Hapus data' }}"
                    class="inline-flex items-center gap-1 px-3 py-2 text-xs font-semibold rounded-lg shadow-md transition-all duration-200
                    {{ $item->is_active
                        ? 'bg-gray-300 text-gray-500 cursor-not-allowed'
                        : 'bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white hover:shadow-lg transform hover:-translate-y-0.5' }}">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </form>
        </div>
    </td>
</tr>
