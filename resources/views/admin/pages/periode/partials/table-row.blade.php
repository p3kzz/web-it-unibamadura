<tr class="hover:bg-blue-50 transition-colors duration-150">
    <td class="px-6 py-4 text-sm font-medium text-gray-700">
        {{ $loop->iteration }}
    </td>

    <td class="px-6 py-4">
        <p class="font-semibold text-gray-800">
            {{ $item->name }}
        </p>
    </td>

    <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">
        <span class="inline-flex items-center gap-1">
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                </path>
            </svg>
            {{ $item->start_year }} – {{ $item->end_year }}
        </span>
    </td>

    <td class="px-6 py-4 text-center">
        @if ($item->is_active)
            <span
                class="inline-flex items-center gap-1.5
                                            px-3 py-1.5 text-xs font-semibold
                                            bg-green-100 text-green-700 rounded-full">
                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                Aktif
            </span>
        @else
            <span
                class="inline-flex items-center
                                            px-3 py-1.5 text-xs font-semibold
                                            bg-gray-100 text-gray-600 rounded-full">
                Nonaktif
            </span>
        @endif
    </td>

    <td class="px-6 py-4">
        <div class="flex items-center justify-center gap-2">

            <button @click="$dispatch('open-edit-periode', {{ $item->toJson() }})"
                class="px-3 py-2 text-xs font-semibold
                                            bg-orange-500 text-white rounded-lg
                                            hover:bg-orange-600 transition-colors duration-200
                                            shadow-sm hover:shadow-md">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
            </button>

            {{-- Delete --}}
            <form method="POST" id="delete-form" action="{{ route('admin.periode.destroy', $item) }}">
                @csrf
                @method('DELETE')

                <button type="button" onclick="confirmDelete(() => document.getElementById('delete-form').submit())"
                    @disabled($item->is_active)
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
