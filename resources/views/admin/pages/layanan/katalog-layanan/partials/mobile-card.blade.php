{{-- Mobile Cards --}}
<div class="lg:hidden space-y-4">
    @forelse ($items as $item)
        <div class="bg-white rounded-2xl shadow border border-gray-200 p-4">
            <div class="flex items-start gap-3 mb-3">
                @if ($item->icon)
                    <img src="{{ $item->icon_url }}" alt="{{ $item->nama }}"
                        class="w-12 h-12 object-cover rounded-xl border border-gray-200 flex-shrink-0">
                @else
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-uniba-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>
                    </div>
                @endif
                <div class="flex-1 min-w-0">
                    <h3 class="font-semibold text-gray-800 truncate">{{ $item->nama }}</h3>
                    @if ($item->kategori)
                        <span
                            class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-700 mt-1">
                            {{ $item->kategori->nama }}
                        </span>
                    @endif
                </div>
                @if ($item->is_active)
                    <span
                        class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-700 flex-shrink-0">
                        Aktif
                    </span>
                @else
                    <span
                        class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-600 flex-shrink-0">
                        Nonaktif
                    </span>
                @endif
            </div>

            @if ($item->deskripsi)
                <p class="text-sm text-gray-600 line-clamp-2 mb-3">{{ strip_tags($item->deskripsi) }}</p>
            @endif

            <div class="flex gap-2">
                <button
                    @click="$dispatch('open-edit-layanan', {
                        id: {{ $item->id }},
                        nama: '{{ addslashes($item->nama) }}',
                        deskripsi: `{!! addslashes($item->deskripsi ?? '') !!}`,
                        icon: '{{ $item->icon ?? '' }}',
                        link: '{{ addslashes($item->link ?? '') }}',
                        kategori_layanan_id: {{ $item->kategori_layanan_id ?? 'null' }},
                        sort_order: {{ $item->sort_order }},
                        is_active: {{ $item->is_active ? 'true' : 'false' }}
                    })"
                    class="flex-1 py-2 text-sm font-semibold text-amber-600 bg-amber-50 hover:bg-amber-100 rounded-lg transition-colors">
                    Edit
                </button>
                <form action="{{ route('admin.layanan.katalog-layanan.destroy', $item->id) }}" method="POST"
                    class="flex-1" onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="w-full py-2 text-sm font-semibold text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition-colors">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    @empty
        <div class="bg-white rounded-2xl shadow border border-gray-200 p-8 text-center">
            <p class="text-gray-500">Belum ada data layanan</p>
        </div>
    @endforelse

    @if ($items->hasPages())
        <div class="py-4">
            {{ $items->links() }}
        </div>
    @endif
</div>