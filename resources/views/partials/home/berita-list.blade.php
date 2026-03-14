<div class="grid md:grid-cols-2 gap-6">
    @forelse ($newsItems as $item)
        <article
            class="bg-white rounded-lg shadow-sm overflow-hidden group hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
            <div class="h-40 overflow-hidden bg-gray-100">
                <img src="{{ $item->thumbnail_url }}" alt="{{ $item->title }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
            </div>
            <div class="p-5">
                <span class="text-xs text-uniba-blue font-bold">Berita</span>
                <h3 class="font-bold text-gray-800 mt-1 mb-2 group-hover:text-uniba-blue transition-colors line-clamp-2">
                    {{ $item->title }}
                </h3>
                <p class="text-gray-500 text-sm line-clamp-3">
                    {{ $item->excerpt ?: Str::limit(strip_tags($item->content), 110) }}
                </p>
            </div>
        </article>
    @empty
        <div
            class="md:col-span-2 bg-white border border-dashed border-gray-300 rounded-2xl p-8 text-center text-gray-500">
            Belum ada berita yang dipublikasikan.
        </div>
    @endforelse
</div>
