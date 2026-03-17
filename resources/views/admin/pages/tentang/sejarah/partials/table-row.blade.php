<tr class="hover:bg-blue-50 transition-colors duration-150 group">
    <td class="px-6 py-4 whitespace-nowrap align-top">
        <span
            class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 text-uniba-blue font-bold rounded-lg text-sm group-hover:bg-blue-200 transition-colors">
            {{ $loop->iteration }}
        </span>
    </td>

    <td class="px-6 py-4 align-top">
        <p class="font-semibold text-gray-900 break-words line-clamp-2 leading-tight">
            {{ $item->title }}
        </p>
    </td>

    @if (in_array($section, ['timeline']))
        <td class="px-6 py-4 whitespace-nowrap align-top">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-uniba-blue flex-shrink-0" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
                <span class="text-sm font-medium text-gray-900">{{ $item->sub_title ?? '-' }}</span>
            </div>
        </td>
    @endif

    <td class="px-6 py-4 align-top">
        <p class="text-sm text-gray-700 leading-relaxed break-words line-clamp-3">
            {{ Str::limit($item->content, 120) }}
        </p>
    </td>

    @if (in_array($section, ['timeline', 'vision']))
        <td class="px-6 py-4 align-top">
            <div class="flex flex-wrap gap-1.5">
                @php
                    $extras = is_array($item->extras) ? $item->extras : ($item->extras ? [$item->extras] : []);
                @endphp
                @forelse($extras as $extra)
                    <span
                        class="inline-flex items-center gap-1 px-2.5 py-1 bg-blue-100 text-uniba-blue text-xs font-semibold rounded-lg">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                            </path>
                        </svg>
                        {{ $extra }}
                    </span>
                @empty
                    <span class="text-gray-400 text-xs">-</span>
                @endforelse
            </div>
        </td>
    @endif

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
            <button @click="$dispatch('open-show-histories', {{ $item->toJson() }})" title="Lihat detail"
                class="inline-flex items-center gap-1 px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </button>

            <button @click="$dispatch('open-edit-histories', {{ $item->toJson() }})" title="Edit data"
                class="inline-flex items-center gap-1 px-3 py-2 bg-orange-600 hover:bg-orange-700 text-white text-xs font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </button>

            <form method="POST" action="{{ route('admin.tentang.histories.destroy', $item) }}">
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
