<tr class="hover:bg-blue-50 transition-colors duration-150 group">
    {{-- No Column --}}
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center gap-2">
            <span
                class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 text-uniba-blue font-bold rounded-lg text-sm group-hover:bg-blue-200 transition-colors duration-150">
                {{ $items->firstItem() + $index }}
            </span>
        </div>
    </td>

    {{-- Title Column --}}
    <td class="px-6 py-4">
        <div class="flex items-center gap-3 max-w-xs">
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
            </div>
            <div class="min-w-0 flex-1">
                <p class="text-sm font-semibold text-gray-800 line-clamp-2" title="{{ $item->title }}">
                    {{ $item->title }}
                </p>
            </div>
        </div>
    </td>

    {{-- Excerpt Column --}}
    <td class="px-6 py-4">
        <div class="max-w-xs">
            @if ($item->excerpt)
                <p class="text-sm text-gray-600 line-clamp-2" title="{{ $item->excerpt }}">
                    {{ $item->excerpt }}
                </p>
            @else
                <span class="text-sm text-gray-400 italic">Tidak ada ringkasan</span>
            @endif
        </div>
    </td>

    {{-- Content Column --}}
    <td class="px-6 py-4">
        <div class="max-w-md">
            @if ($item->content)
                <p class="text-sm text-gray-600 line-clamp-3" title="{{ strip_tags($item->content) }}">
                    {{ Str::limit(strip_tags($item->content), 120) }}
                </p>
            @else
                <span class="text-sm text-gray-400 italic">Tidak ada content</span>
            @endif
        </div>
    </td>

    {{-- Status Column --}}
    <td class="px-6 py-4 text-center whitespace-nowrap">
        @if ($item->is_active)
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5 animate-pulse"></span>
                Aktif
            </span>
        @else
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-600">
                <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-1.5"></span>
                Nonaktif
            </span>
        @endif
    </td>

    {{-- Action Column --}}
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center justify-center gap-2">
            {{-- Detail Button --}}
            <button
                @click="$dispatch('open-show-policy', {
                    id: {{ $item->id }},
                    title: '{{ addslashes($item->title) }}',
                    slug: '{{ $item->slug }}',
                    excerpt: '{{ addslashes($item->excerpt ?? '') }}',
                    content: `{!! addslashes($item->content ?? '') !!}`,
                    is_active: {{ $item->is_active ? 'true' : 'false' }}
                })"
                class="inline-flex items-center gap-1 px-3 py-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white text-xs font-semibold rounded-lg shadow hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5"
                title="Lihat Detail">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                    </path>
                </svg>
            </button>

            {{-- Edit Button --}}
            <button
                @click="$dispatch('open-edit-policy', {
                    id: {{ $item->id }},
                    title: '{{ addslashes($item->title) }}',
                    slug: '{{ $item->slug }}',
                    excerpt: '{{ addslashes($item->excerpt ?? '') }}',
                    content: `{!! addslashes($item->content ?? '') !!}`,
                    is_active: {{ $item->is_active ? 'true' : 'false' }}
                })"
                class="inline-flex items-center gap-1 px-3 py-2 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white text-xs font-semibold rounded-lg shadow hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5"
                title="Edit">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
            </button>

            {{-- Delete Button --}}
            <form action="{{ route('admin.penjaminan.policy.destroy', $item) }}" method="POST" class="inline"
                onsubmit="return confirm('⚠️ Apakah Anda yakin ingin menghapus kebijakan ini?\n\nData yang dihapus tidak dapat dikembalikan!')">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="inline-flex items-center gap-1 px-3 py-2 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white text-xs font-semibold rounded-lg shadow hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5"
                    title="Hapus">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                        </path>
                    </svg>
                </button>
            </form>
        </div>
    </td>
</tr>
