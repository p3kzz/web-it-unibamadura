<tr class="hover:bg-gray-50 transition-colors duration-150">
    <td class="px-6 py-4">
        <span class="text-sm font-semibold text-gray-600">{{ $items->firstItem() + $index }}</span>
    </td>
    <td class="px-6 py-4">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm-1 2l5 5h-5V4zm-3 9v6h-2v-4H7v-2h6zm3 0v6h-2v-6h2zm3 0v6h-2v-6h2z" />
                </svg>
            </div>
            <span class="text-sm font-semibold text-gray-800">{{ $item->judul }}</span>
        </div>
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
            <a href="{{ asset('storage/' . $item->file) }}" target="_blank"
                class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition-colors duration-150" title="Download">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
            </a>

            <button @click="$dispatch('open-show-sop', {{ $item->toJson() }})" title="Lihat detail"
                class="inline-flex items-center gap-1 px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                    </path>
                </svg>
            </button>

            <button @click="$dispatch('open-edit-sop', {{ $item->toJson() }})" title="Edit data"
                class="inline-flex items-center gap-1 px-3 py-2 bg-orange-600 hover:bg-orange-700 text-white text-xs font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
            </button>

            <form method="POST" action="{{ route('admin.sop.destroy', $item) }}">
                @csrf
                @method('DELETE')
                <button type="button" onclick="confirmDelete(this)" title="Hapus data"
                    class="inline-flex items-center gap-1 px-3 py-2 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white text-xs font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </form>
        </div>
    </td>
</tr>
