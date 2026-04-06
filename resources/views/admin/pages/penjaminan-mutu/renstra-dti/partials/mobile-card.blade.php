<div class="lg:hidden space-y-4">
    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-4">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-bold text-gray-800">Daftar Renstra DTI</h3>
            <span class="text-xs text-gray-500">
                @if ($search)
                    {{ $items->count() }} hasil
                @else
                    {{ $items->count() }} data
                @endif
            </span>
        </div>

        <div class="mb-4">
            @include('admin.pages.penjaminan-mutu.renstra-dti.partials.search')
        </div>

        @forelse ($items as $index => $item)
            <div class="border border-gray-200 rounded-xl p-4 mb-3 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-start gap-3">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm-1 2l5 5h-5V4zm-3 9v6h-2v-4H7v-2h6zm3 0v6h-2v-6h2zm3 0v6h-2v-6h2z" />
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="font-semibold text-gray-800 truncate">{{ $item->judul }} <span class="text-xs text-gray-500">({{ $item->year }})</span></h4>
                        <p class="text-sm text-gray-600 mt-1 line-clamp-2">
                            @if ($item->deskripsi)
                                {!! Str::limit(strip_tags($item->deskripsi), 80) !!}
                            @else
                                <span class="text-gray-400 italic">Tidak ada deskripsi</span>
                            @endif
                        </p>
                        <div class="flex items-center gap-2 mt-2">
                            @if ($item->is_active)
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                    Aktif
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-600">
                                    Nonaktif
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-2 mt-4 pt-3 border-t border-gray-100">
                    <a href="{{ asset('storage/' . $item->file) }}" target="_blank"
                        class="p-2 text-green-600 hover:bg-green-50 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                    </a>
                    <button
                        @click="$dispatch('open-show-renstra-dti', {
                        id: {{ $item->id }},
                        judul: '{{ addslashes($item->judul) }}',
                        year: '{{ addslashes($item->year ?? '') }}',
                        deskripsi: `{!! addslashes($item->deskripsi ?? '') !!}`,
                        file: '{{ $item->file }}',
                        is_active: {{ $item->is_active ? 'true' : 'false' }}
                    })"
                        class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                    </button>
                    <button
                        @click="$dispatch('open-edit-renstra-dti', {
                        id: {{ $item->id }},
                        judul: '{{ addslashes($item->judul) }}',
                        year: '{{ addslashes($item->year ?? '') }}',
                        deskripsi: `{!! addslashes($item->deskripsi ?? '') !!}`,
                        file: '{{ $item->file }}',
                        is_active: {{ $item->is_active ? 'true' : 'false' }}
                    })"
                        class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                    </button>
                    <form action="{{ route('admin.penjaminan.renstra-dti.destroy', $item) }}" method="POST"
                        class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Renstra DTI ini?')">
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
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>
                <p class="text-gray-500">Belum ada data Renstra DTI</p>
                <button @click="$dispatch('open-create-renstra-dti')"
                    class="mt-3 inline-flex items-center gap-2 px-4 py-2 bg-uniba-blue text-white rounded-lg text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Renstra DTI
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
