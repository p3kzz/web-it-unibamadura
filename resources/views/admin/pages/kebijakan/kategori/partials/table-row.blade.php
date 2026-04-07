<tr class="hover:bg-gray-50 transition-colors duration-150">
    <td class="px-6 py-4">
        <span class="text-sm font-semibold text-gray-600">{{ $items->firstItem() + $index }}</span>
    </td>
    <td class="px-6 py-4">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                    </path>
                </svg>
            </div>
            <span class="text-sm font-semibold text-gray-800">{{ $item->name }}</span>
        </div>
    </td>
    <td class="px-6 py-4">
        <span class="text-sm text-gray-600 font-mono bg-gray-100 px-2 py-1 rounded">{{ $item->slug }}</span>
    </td>
    <td class="px-6 py-4 text-center">
        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
            {{ $item->policies_count ?? 0 }} kebijakan
        </span>
    </td>
    <td class="px-6 py-4">
        <div class="flex items-center justify-center gap-1">
            <button
                @click="$dispatch('open-edit-category', {
                id: {{ $item->id }},
                name: '{{ addslashes($item->name) }}',
                slug: '{{ $item->slug }}'
            })"
                class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors duration-150" title="Edit">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
            </button>

            <form action="{{ route('admin.penjaminan.policy-category.destroy', $item) }}" method="POST" class="inline"
                onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini? Pastikan tidak ada kebijakan yang terkait.')">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors duration-150" title="Hapus">
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
