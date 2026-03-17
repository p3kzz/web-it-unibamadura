<div class="lg:w-1/3 scroll-animate">
    <div class="flex items-center justify-between gap-4 mb-6">
        <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
            <svg class="w-5 h-5 text-uniba-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
            </svg>
            Agenda TIK
        </h3>
        <a href="{{ route('content.index', ['type' => 'agenda']) }}"
            class="text-uniba-blue text-sm font-semibold hover:underline">
            Arsip &rarr;
        </a>
    </div>
    <div class="space-y-4">
        @forelse ($agendaItems as $item)
            <a href="{{ route('content.show', ['type' => 'agenda', 'slug' => $item->slug]) }}"
                class="flex gap-4 items-start group bg-white border border-gray-200 rounded-xl p-3 hover:border-uniba-blue transition-all duration-300">
                <div
                    class="bg-white border border-gray-200 rounded-lg p-2 text-center w-16 shadow-sm group-hover:border-uniba-blue transition-all duration-300 group-hover:shadow-md transform group-hover:scale-110">
                    <span
                        class="block text-xs font-bold text-gray-400 uppercase">{{ optional($item->event_date)->translatedFormat('M') }}</span>
                    <span
                        class="block text-xl font-bold text-uniba-blue">{{ optional($item->event_date)->format('d') }}</span>
                </div>
                <div class="w-20 h-20 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0">
                    <img src="{{ $item->thumbnail_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                </div>
                <div class="min-w-0 flex-1">
                    <h4
                        class="font-bold text-gray-800 text-sm group-hover:text-uniba-blue transition-colors line-clamp-2">
                        {{ $item->title }}
                    </h4>
                    <span class="text-xs text-gray-500 flex items-center gap-1 mt-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 12.414A2 2 0 0112.828 11V6m8 6a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                        {{ $item->location ?: 'Lokasi akan diumumkan' }}
                    </span>
                    <p class="text-xs text-gray-600 mt-1 line-clamp-2">
                        {{ Str::limit(strip_tags($item->content), 90) }}
                    </p>
                </div>
            </a>
        @empty
            <div class="bg-white border border-dashed border-gray-300 rounded-2xl p-8 text-center text-gray-500">
                Belum ada agenda yang tersedia.
            </div>
        @endforelse
    </div>
</div>
