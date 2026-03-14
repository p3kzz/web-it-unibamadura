<div class="lg:hidden space-y-3 px-1">

    <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-4 space-y-3">
        @include('admin.pages.content.partials.search')

        <div class="flex items-center gap-2">
            @include('admin.pages.content.partials.status-filter')
        </div>
        <div class="flex items-center justify-between pt-1 border-t border-gray-100">
            <p class="text-xs text-gray-400">
                {{ $search ? 'Hasil pencarian:' : 'Total:' }}
                <span class="font-semibold text-gray-600">{{ $items->count() }} data</span>
            </p>
            @if ($items->count() > 0)
                <p class="text-xs text-gray-400">
                    Update:
                    <span class="font-medium text-gray-500">
                        {{ optional($items->max('updated_at'))->format('d M Y') ?? '-' }}
                    </span>
                </p>
            @endif
        </div>
    </div>
    @forelse ($items as $item)
        <div x-data="{ expanded: false }"
            class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-200">
            <div
                class="flex items-center justify-between px-4 py-3 border-b border-gray-100
                        {{ $item->trashed() ? 'bg-red-50' : ($item->status === 'published' ? 'bg-green-50' : 'bg-yellow-50') }}">
                <div class="flex items-center gap-2.5 min-w-0">
                    <div class="w-8 h-8 bg-uniba-blue rounded-lg flex items-center justify-center flex-shrink-0">
                        <span class="text-white text-xs font-bold">
                            {{ $loop->iteration + ($items->currentPage() - 1) * $items->perPage() }}
                        </span>
                    </div>
                    <div class="min-w-0">
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide leading-none">
                            {{ ucfirst($section) }}
                        </p>
                        @if ($item->published_at)
                            <p class="text-xs text-gray-500 mt-0.5 leading-none">
                                {{ \Carbon\Carbon::parse($item->published_at)->format('d M Y, H:i') }}
                            </p>
                        @else
                            <p class="text-xs text-gray-400 mt-0.5 leading-none">Belum dipublikasikan</p>
                        @endif
                    </div>
                </div>
                @if ($item->trashed())
                    <span
                        class="inline-flex items-center gap-1 px-2.5 py-1 bg-red-100 text-red-700 text-xs font-semibold rounded-full flex-shrink-0">
                        <span class="w-1.5 h-1.5 bg-red-500 rounded-full"></span>
                        Sampah
                    </span>
                @elseif ($item->status === 'published')
                    <span
                        class="inline-flex items-center gap-1 px-2.5 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full flex-shrink-0">
                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                        Publish
                    </span>
                @else
                    <span
                        class="inline-flex items-center gap-1 px-2.5 py-1 bg-yellow-100 text-yellow-700 text-xs font-semibold rounded-full flex-shrink-0">
                        <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full"></span>
                        Draft
                    </span>
                @endif
            </div>

            <div class="p-4 space-y-3">
                @if ($section === 'news' && $item->thumbnail)
                    <div class="flex gap-3">
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}"
                            class="w-20 h-20 rounded-xl object-cover flex-shrink-0 border border-gray-100">
                        <div class="flex-1 min-w-0">
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Judul</p>
                            <p class="text-sm font-semibold text-gray-900 leading-snug">
                                <span x-show="!expanded">{{ Str::limit($item->title, 60) }}</span>
                                <span x-show="expanded" x-cloak>{{ $item->title }}</span>
                            </p>
                            @if (strlen($item->title) > 60)
                                <button @click="expanded = !expanded"
                                    class="text-xs text-uniba-blue font-semibold mt-1 hover:underline">
                                    <span x-text="expanded ? '↑ Tutup' : '↓ Selengkapnya'"></span>
                                </button>
                            @endif
                        </div>
                    </div>
                @else
                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Judul</p>
                        <p class="text-sm font-semibold text-gray-900 leading-snug">
                            <span x-show="!expanded">{{ Str::limit($item->title, 80) }}</span>
                            <span x-show="expanded" x-cloak>{{ $item->title }}</span>
                        </p>
                        @if (strlen($item->title) > 80)
                            <button @click="expanded = !expanded"
                                class="text-xs text-uniba-blue font-semibold mt-1 hover:underline">
                                <span x-text="expanded ? '↑ Tutup' : '↓ Selengkapnya'"></span>
                            </button>
                        @endif
                    </div>
                @endif

                <div class="border-t border-gray-100"></div>
                @if ($section === 'news')
                    @if ($item->excerpt)
                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Excerpt</p>
                            <p class="text-sm text-gray-600 leading-relaxed line-clamp-2">
                                {{ $item->excerpt }}
                            </p>
                        </div>
                        <div class="border-t border-gray-100"></div>
                    @endif
                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Konten</p>
                        <div class="text-sm text-gray-700 leading-relaxed">
                            <span x-show="!expanded">{{ Str::limit(strip_tags($item->content), 100) }}</span>
                            <span x-show="expanded" x-cloak>{{ Str::limit(strip_tags($item->content), 300) }}</span>
                        </div>
                        @if (strlen(strip_tags($item->content)) > 100)
                            <button @click="expanded = !expanded"
                                class="text-xs text-uniba-blue font-semibold mt-1 hover:underline">
                                <span x-text="expanded ? '↑ Tutup' : '↓ Selengkapnya'"></span>
                            </button>
                        @endif
                    </div>
                @elseif ($section === 'announcement')
                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Konten</p>
                        <div class="text-sm text-gray-700 leading-relaxed">
                            <span x-show="!expanded">{{ Str::limit($item->content ?? '-', 150) }}</span>
                            <span x-show="expanded" x-cloak>{{ $item->content ?? '-' }}</span>
                        </div>
                        @if (strlen($item->content ?? '') > 150)
                            <button @click="expanded = !expanded"
                                class="text-xs text-uniba-blue font-semibold mt-1 hover:underline">
                                <span x-text="expanded ? '↑ Tutup' : '↓ Selengkapnya'"></span>
                            </button>
                        @endif
                    </div>
                @elseif ($section === 'agenda')
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Tanggal</p>
                            <p class="text-sm font-medium text-gray-800">
                                {{ $item->event_date ? \Carbon\Carbon::parse($item->event_date)->format('d M Y') : '-' }}
                            </p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Lokasi</p>
                            <p class="text-sm font-medium text-gray-800 truncate">
                                {{ Str::limit($item->location ?? '-', 30) }}
                            </p>
                        </div>
                    </div>
                @endif
            </div>
            <div class="grid grid-cols-2 gap-2 px-4 pb-4">
                @if ($item->trashed())
                    <form method="POST" action="{{ route('admin.content.restore', $item->slug) }}" class="col-span-2">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5
                                bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800
                                text-white text-sm font-semibold rounded-xl
                                shadow-sm hover:shadow-md transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m14.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-14.357-2m14.357 2H15" />
                            </svg>
                            Restore
                        </button>
                    </form>
                @else
                    <button @click="$dispatch('open-edit-content', {{ $item->toJson() }})"
                        class="inline-flex items-center justify-center gap-2 px-4 py-2.5
                            bg-orange-500 hover:bg-orange-600 active:bg-orange-700
                            text-white text-sm font-semibold rounded-xl
                            shadow-sm hover:shadow-md transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit
                    </button>

                    <form method="POST" action="{{ route('admin.content.destroy', $item) }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete(this)"
                            {{ $item->status === 'published' ? 'disabled' : '' }}
                            class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5
                                text-sm font-semibold rounded-xl transition-all duration-200
                                shadow-sm
                                {{ $item->status === 'published'
                                    ? 'bg-gray-200 text-gray-400 cursor-not-allowed'
                                    : 'bg-red-500 hover:bg-red-600 active:bg-red-700 text-white hover:shadow-md' }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            {{ $item->status === 'published' ? 'Terkunci' : 'Hapus' }}
                        </button>
                    </form>
                @endif
            </div>
        </div>
    @empty
        <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-10 text-center">
            <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mb-4 mx-auto">
                @if ($search)
                    <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                @else
                    <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                @endif
            </div>

            <p class="text-gray-700 font-semibold mb-1">
                @if ($search)
                    Tidak ada hasil pencarian
                @else
                    Belum ada data
                @endif
            </p>
            <p class="text-gray-400 text-sm mb-5 leading-relaxed">
                @if ($search)
                    Tidak ditemukan <span class="font-medium text-gray-600">{{ $section }}</span>
                    dengan kata kunci "<span class="font-semibold text-gray-700">{{ $search }}</span>"
                @else
                    Belum ada data <span class="font-medium">{{ $section }}</span> yang ditambahkan
                @endif
            </p>

            @include('admin.pages.content.partials.empty-state')
        </div>
    @endforelse

    @if ($items->hasPages())
        <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-4">
            {{ $items->links() }}
        </div>
    @endif

</div>
