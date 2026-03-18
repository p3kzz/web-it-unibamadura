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
                class="flex gap-4 items-start group bg-white border border-gray-200 rounded-xl p-3 hover:border-uniba-blue transition-all duration-300 hover:shadow-md">
                <div
                    class="bg-gradient-to-b from-uniba-blue to-blue-700 rounded-lg p-2 text-center w-16 shadow-sm group-hover:shadow-md transition-all duration-300 group-hover:scale-105">
                    <span
                        class="block text-xs font-bold text-blue-100 uppercase">{{ optional($item->event_date)->translatedFormat('M') }}</span>
                    <span
                        class="block text-xl font-bold text-white">{{ optional($item->event_date)->format('d') }}</span>
                    <span
                        class="block text-[10px] font-medium text-blue-200">{{ optional($item->event_date)->format('Y') }}</span>
                </div>
                <div class="min-w-0 flex-1">
                    <h4
                        class="font-bold text-gray-800 text-sm group-hover:text-uniba-blue transition-colors line-clamp-2">
                        {{ $item->title }}
                    </h4>
                    <div class="flex flex-wrap items-center gap-x-3 gap-y-1 mt-2">
                        <span class="text-xs text-gray-500 flex items-center gap-1">
                            <svg class="w-3 h-3 text-uniba-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            {{ $item->event_time ? \Carbon\Carbon::parse($item->event_time)->format('H:i') : '-' }} WIB
                        </span>
                        <span class="text-xs text-gray-500 flex items-center gap-1">
                            <svg class="w-3 h-3 text-uniba-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z">
                                </path>
                            </svg>
                            {{ Str::limit($item->location, 25) ?: 'TBA' }}
                        </span>
                    </div>
                    <p class="text-xs text-gray-600 mt-2 line-clamp-2">
                        {{ Str::limit(strip_tags($item->content), 80) }}
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
