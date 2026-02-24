<tr x-data="{ expanded: false }" class="hover:bg-blue-50 transition-colors duration-150 group">
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center gap-2">
            <span
                class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 text-uniba-blue font-bold rounded-lg text-sm group-hover:bg-blue-200 transition-colors duration-150">
                {{ $loop->iteration }}
            </span>
        </div>
    </td>
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
                <svg class="w-3 h-3 transition-transform duration-200" :class="expanded ? 'rotate-90' : ''"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        @endif
    </td>

    @if (in_array($section, ['timeline']))
        <td class="px-6 py-4">
            <div class="flex-1">
                <p class="font-semibold text-gray-900 mb-1">
                    <span x-show="!expanded">
                        {{ $item->sub_title }}
                    </span>
                    <span x-show="expanded" x-cloak>
                        {{ $item->sub_title }}
                    </span>
                </p>
            </div>
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
                <svg class="w-3 h-3 transition-transform duration-200" :class="expanded ? 'rotate-90' : ''"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        @endif
    </td>
    @if (in_array($section, ['timeline', 'vision']))
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center gap-2 flex-wrap">
                @if (is_array($item->extras) && count($item->extras) > 0)
                    @foreach ($item->extras as $extra)
                        <span
                            class="inline-flex items-center justify-center px-2.5 py-1 bg-blue-100 text-uniba-blue font-bold rounded-lg text-sm group-hover:bg-blue-200 transition-colors duration-150">
                            {{ $extra }}
                        </span>
                    @endforeach
                @elseif($item->extras)
                    <span
                        class="inline-flex items-center justify-center px-2.5 py-1 bg-blue-100 text-uniba-blue font-bold rounded-lg text-sm group-hover:bg-blue-200 transition-colors duration-150">
                        {{ $item->extras }}
                    </span>
                @else
                    <span
                        class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 text-uniba-blue font-bold rounded-lg text-sm group-hover:bg-blue-200 transition-colors duration-150">
                        -
                    </span>
                @endif
            </div>
        </td>
    @endif
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center gap-2">
            <span
                class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 text-uniba-blue font-bold rounded-lg text-sm group-hover:bg-blue-200 transition-colors duration-150">
                {{ $item->order }}
            </span>
        </div>
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
                class="inline-flex items-center gap-1 px-3 py-2 bg-orange-500  hover:bg-orange-700 text-white text-xs font-semibold rounded-lg shadow hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5"
                title="Edit data">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
            </button>

            <form method="POST" action="{{ route('admin.tentang.histories.destroy', $item) }}" class="inline">
                @csrf
                @method('DELETE')
                <button type="button" onclick="confirmDelete(this)" @disabled($item->is_active)
                    class="px-3 py-2 text-xs font-semibold rounded-lg transition-colors duration-200 shadow-sm
                    {{ $item->is_active
                        ? 'bg-gray-300 text-gray-500 cursor-not-allowed'
                        : 'bg-red-500 text-white hover:bg-red-600 hover:shadow-md' }}">
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
