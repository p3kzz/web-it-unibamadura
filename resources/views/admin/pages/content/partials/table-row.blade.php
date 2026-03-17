<tr class="hover:bg-blue-50 transition-colors duration-150 group">
    <td class="px-4 py-4 whitespace-nowrap">
        <div class="flex items-center gap-2">
            <span
                class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 text-uniba-blue font-bold rounded-lg text-sm group-hover:bg-blue-200 transition-colors duration-150">
                {{ $loop->iteration }}
            </span>
        </div>
    </td>

    <td class="px-4 py-4">
        <div class="flex items-center space-x-3">
            @if ($section === 'news')
                @if ($item->thumbnail)
                    <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="Thumbnail"
                        class="w-16 h-16 rounded-lg object-cover flex-shrink-0">
                @else
                    <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16" />
                        </svg>
                    </div>
                @endif
            @endif

            <div class="flex-1 min-w-0">
                <p class="font-semibold text-gray-900 break-words line-clamp-2">
                    {{ $item->title }}
                </p>
            </div>
        </div>
    </td>

    @if ($section === 'news')
        <td class="px-4 py-4 text-sm text-gray-700">
            <div class="break-words max-w-sm xl:max-w-md">
                <p class="line-clamp-2">{{ Str::limit(strip_tags($item->excerpt), 100) }}</p>
            </div>
        </td>

        <td class="px-4 py-4 text-sm text-gray-700">
            <div class="break-words max-w-sm xl:max-w-md">
                <p class="line-clamp-2">{{ Str::limit(strip_tags($item->content), 100) }}</p>
            </div>
        </td>
    @elseif ($section === 'announcement')
        <td class="px-4 py-4 text-sm text-gray-700">
            <div class="break-words max-w-sm xl:max-w-md">
                <p class="line-clamp-2">{{ Str::limit(strip_tags($item->content), 100) }}</p>
            </div>
        </td>
    @elseif ($section === 'agenda')
        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-700">
            {{ $item->event_date ? \Carbon\Carbon::parse($item->event_date)->format('d M Y') : '-' }}
        </td>
        <td class="px-4 py-4 text-sm text-gray-700">
            {{ Str::limit($item->location ?? '-', 50) }}
        </td>
    @endif

    <td class="px-4 py-4 whitespace-nowrap text-center">
        @if ($item->trashed())
            <span
                class="inline-flex items-center gap-1 px-3 py-1 bg-red-100 text-red-700 text-xs font-semibold rounded-full">
                <span class="w-1.5 h-1.5 bg-red-500 rounded-full"></span>
                Di Sampah
            </span>
        @elseif ($item->status === 'published')
            <span
                class="inline-flex items-center gap-1 px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">
                <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                Dipublikasikan
            </span>
        @else
            <span
                class="inline-flex items-center gap-1 px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-semibold rounded-full">
                <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full"></span>
                Draft
            </span>
        @endif
    </td>

    <td class="px-4 py-4 whitespace-nowrap">
        <div class="flex items-center justify-center gap-2">
            @if ($item->trashed())
                <form method="POST" action="{{ route('admin.content.restore', $item->slug) }}" class="inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" title="Pulihkan {{ $section }}"
                        class="inline-flex items-center gap-1 px-3 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded-lg shadow hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m14.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-14.357-2m14.357 2H15" />
                        </svg>
                        Restore
                    </button>
                </form>
            @else
                <button @click="$dispatch('open-show-content', {{ $item->toJson() }})" type="button"
                    title="Lihat detail {{ $section }}"
                    class="inline-flex items-center gap-1 px-3 py-2 bg-uniba-blue hover:bg-blue-700 text-white text-xs font-semibold rounded-lg shadow hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>

                <button @click="$dispatch('open-edit-content', {{ $item->toJson() }})" type="button"
                    title="Edit {{ $section }}"
                    class="inline-flex items-center gap-1 px-3 py-2 bg-orange-500 hover:bg-orange-600 text-white text-xs font-semibold rounded-lg shadow hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </button>

                <form method="POST" action="{{ route('admin.content.destroy', $item) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDelete(this)"
                        title="{{ $item->status === 'published' ? 'Tidak dapat menghapus data yang sudah dipublikasikan' : 'Hapus ' . $section }}"
                        class="inline-flex items-center gap-1 px-3 py-2 text-xs font-semibold rounded-lg transition-all duration-200 shadow-sm
                        {{ $item->status === 'published' ? 'bg-gray-300 text-gray-500 cursor-not-allowed' : 'bg-red-500 text-white hover:bg-red-600 hover:shadow-lg transform hover:-translate-y-0.5' }}"
                        {{ $item->status === 'published' ? 'disabled' : '' }}>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </form>
            @endif
        </div>
    </td>
</tr>
