<div class="lg:hidden space-y-4">
    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-4">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-bold text-gray-800">Daftar Kategori</h3>
            <span class="text-xs text-gray-500">
                @if ($search)
                    {{ $items->count() }} hasil
                @else
                    {{ $items->count() }} data
                @endif
            </span>
        </div>

        <div class="mb-4">
            @include('admin.pages.kebijakan.kategori.partials.search')
        </div>

        @forelse ($items as $index => $item)
            <div class="border border-gray-200 rounded-xl p-4 mb-3 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-start gap-3">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                            </path>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="font-semibold text-gray-800 truncate">{{ $item->name }}</h4>
                        <p class="text-sm text-gray-500 font-mono mt-1">{{ $item->slug }}</p>
                        <div class="flex items-center gap-2 mt-2">
                            <span
                                class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                {{ $item->policies_count ?? 0 }} kebijakan
                            </span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-2 mt-4 pt-3 border-t border-gray-100">
                    <button
                        @click="$dispatch('open-edit-category', {
                        id: {{ $item->id }},
                        name: '{{ addslashes($item->name) }}',
                        slug: '{{ $item->slug }}'
                    })"
                        class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                    </button>
                    <form action="{{ route('admin.penjaminan.policy-category.destroy', $item) }}" method="POST"
                        class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-center py-8">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                        </path>
                    </svg>
                </div>
                <p class="text-gray-500">Belum ada data kategori</p>
                <button @click="$dispatch('open-create-category')"
                    class="mt-3 inline-flex items-center gap-2 px-4 py-2 bg-uniba-blue text-white rounded-lg text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Kategori
                </button>
            </div>
        @endforelse

        @if ($items->hasPages())
            <div class="mt-4">
                {{ $items->links() }}
            </div>
        @endif
    </div>
</div>
