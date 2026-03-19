<tr class="hover:bg-blue-50 transition-colors duration-150 group">
    <td class="px-6 py-4">
        <span
            class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 text-uniba-blue font-bold rounded-lg text-sm">
            {{ $index }}
        </span>
    </td>
    <td class="px-6 py-4">
        <div class="flex items-center gap-3 {{ $level > 0 ? 'ml-8' : '' }}">
            @if ($level > 0)
                <span class="text-gray-300">└</span>
            @endif
            <div>
                <p class="font-semibold text-gray-800">{{ $unit->name }}</p>
                @if ($unit->tasks)
                    <p class="text-sm text-gray-500 line-clamp-1">{{ Str::limit($unit->tasks, 80) }}</p>
                @endif
            </div>
        </div>
    </td>
    <td class="px-6 py-4">
        @if ($unit->type === 'directorate')
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                <span class="w-1.5 h-1.5 bg-blue-500 rounded-full mr-1.5"></span>
                Direktorat
            </span>
        @else
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-purple-100 text-purple-800">
                <span class="w-1.5 h-1.5 bg-purple-500 rounded-full mr-1.5"></span>
                Subdirektorat
            </span>
        @endif
    </td>
    <td class="px-6 py-4">
        <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
            <button @click="$dispatch('open-edit-unit', {{ json_encode($unit) }})"
                class="w-8 h-8 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center hover:bg-amber-200 transition-all"
                title="Edit">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
            </button>
            <form action="{{ route('admin.tentang.unit-organisasi.destroy', $unit) }}" method="POST" class="inline"
                onsubmit="return confirm('Yakin ingin menghapus unit ini?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="w-8 h-8 bg-red-100 text-red-600 rounded-lg flex items-center justify-center hover:bg-red-200 transition-all"
                    title="Hapus">
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
