<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-4 py-3 text-left">Urutan</th>
                @if (in_array($section, ['misi', 'sasaran']))
                    <th class="px-4 py-3 text-left">Judul</th>
                @endif
                <th class="px-4 py-3 text-left">Konten</th>
                <th class="px-4 py-3 text-center w-32">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr class="border-t">
                    <td class="px-4 py-3">{{ $item->order ?? '-' }}</td>
                    @if (in_array($section, ['misi', 'sasaran']))
                        <td class="px-4 py-3">
                            {{ Str::limit($item->title, 120) }}
                        </td>
                    @endif

                    <td class="px-4 py-3">
                        {{ Str::limit($item->content, 120) }}
                    </td>
                    <td class="px-4 py-3 text-center flex justify-center gap-2">
                        <button @click="$dispatch('open-edit', {{ $item->toJson() }})"
                            class="px-3 py-1 text-xs bg-yellow-400 text-white rounded hover:bg-yellow-500">
                            Edit
                        </button>

                        <form method="POST" action="{{ route('admin.tentang.visi-misi.destroy', $item) }}"
                            onsubmit="return confirm('Yakin hapus data?')">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 text-xs bg-red-500 text-white rounded hover:bg-red-600">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-4 py-6 text-center text-gray-500">
                        Data belum tersedia
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
