<div class="space-y-4">
    @forelse ($announcementItems as $item)
        <article
            class="bg-white border-l-4 border-amber-500 shadow-sm rounded-r-lg hover:shadow-md transition-shadow duration-300 transform hover:translate-x-1">
            <a href="{{ route('content.show', ['type' => 'announcement', 'slug' => $item->slug]) }}" class="block p-4">
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-1">
                        <span
                            class="inline-flex items-center px-2.5 py-1 rounded-full bg-amber-100 text-amber-700 text-[11px] font-bold uppercase tracking-wide">
                            Pengumuman
                        </span>
                        @if ($item->published_at)
                            <span class="text-xs text-gray-400">{{ $item->published_at->format('d M Y') }}</span>
                        @endif
                    </div>
                    <h4 class="font-bold text-gray-800 transition-colors line-clamp-2 hover:text-amber-700">
                        {{ $item->title }}
                    </h4>
                    <p class="text-sm text-gray-600 mt-1 line-clamp-3">
                        {{ $item->excerpt ?: Str::limit(strip_tags($item->content), 150) }}
                    </p>
                </div>
            </a>
        </article>
    @empty
        <div class="bg-white border border-dashed border-gray-300 rounded-2xl p-8 text-center text-gray-500">
            Belum ada pengumuman yang dipublikasikan.
        </div>
    @endforelse
</div>
