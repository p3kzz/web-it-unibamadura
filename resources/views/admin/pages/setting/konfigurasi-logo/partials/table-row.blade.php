<tr class="hover:bg-blue-50 transition-colors duration-150">
    <td class="px-6 py-4 text-sm font-medium text-gray-700">
        {{ $loop->iteration }}
    </td>

    <td class="px-6 py-4">
        <div class="flex items-center gap-3">
            @if ($item->logo_web)
                <img src="{{ asset('storage/' . $item->logo_web) }}" alt="Logo"
                    class="w-10 h-10 object-contain rounded-lg border border-gray-200">
            @else
                <div class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
            @endif
        </div>
    </td>

    <td class="px-6 py-4 text-sm text-gray-700">
        <p class="font-semibold text-gray-800">{{ $item->nama_web }}</p>
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

            <button @click="$dispatch('open-edit-konfigurasi-logo', {{ $item->toJson() }})" title="Edit"
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
            <form method="POST" action="{{ route('admin.setting-logo.destroy', $item) }}">
                @csrf
                @method('DELETE')

                <button type="button" onclick="confirmDelete(this)"
                    class="px-3 py-2 text-xs font-semibold
                    bg-red-500 text-white rounded-lg
                    hover:bg-red-600 transition-colors duration-200
                    shadow-sm hover:shadow-md">
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
