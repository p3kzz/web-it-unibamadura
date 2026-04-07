<tr class="hover:bg-gray-50 transition-colors duration-150">
    <td class="px-6 py-4">
        <span class="text-sm font-semibold text-gray-600">{{ $items->firstItem() + $index }}</span>
    </td>
    <td class="px-6 py-4">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
            </div>
            <div class="min-w-0">
                <span class="text-sm font-semibold text-gray-800 block truncate">{{ $item->title }}</span>
                <span class="text-xs text-gray-400">{{ $item->slug }}</span>
            </div>
        </div>
    </td>
    <td class="px-6 py-4">
        <span
            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-700">
            {{ $item->category->name ?? '-' }}
        </span>
    </td>
    <td class="px-6 py-4">
        <p class="text-sm text-gray-600 line-clamp-2">
            @if ($item->excerpt)
                {{ Str::limit($item->excerpt, 80) }}
            @else
                <span class="text-gray-400 italic">Tidak ada ringkasan</span>
            @endif
        </p>
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
                @click="$dispatch('open-show-policy', {
                id: {{ $item->id }},
                title: '{{ addslashes($item->title) }}',
                slug: '{{ $item->slug }}',
                excerpt: '{{ addslashes($item->excerpt ?? '') }}',
                content: `{!! addslashes($item->content ?? '') !!}`,
                category_id: {{ $item->policy_category_id }},
                category_name: '{{ addslashes($item->category->name ?? '') }}',
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
                @click="$dispatch('open-edit-policy', {
                id: {{ $item->id }},
                title: '{{ addslashes($item->title) }}',
                slug: '{{ $item->slug }}',
                excerpt: '{{ addslashes($item->excerpt ?? '') }}',
                content: `{!! addslashes($item->content ?? '') !!}`,
                category_id: {{ $item->policy_category_id }},
                is_active: {{ $item->is_active ? 'true' : 'false' }}
            })"
                class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors duration-150" title="Edit">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
            </button>

            <form action="{{ route('admin.penjaminan.policy.destroy', $item) }}" method="POST" class="inline"
                onsubmit="return confirm('Apakah Anda yakin ingin menghapus kebijakan ini?')">
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
