<div class="lg:w-1/3 scroll-animate">
    <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
        <svg class="w-5 h-5 text-uniba-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
        </svg>
        Agenda TIK
    </h3>
    <div class="space-y-4">
        @php
        $agenda = [
            [
                'month' => 'Jan',
                'date' => '28',
                'title' => 'Workshop Laravel 12 & Tailwind',
                'time' => '09:00 - 12:00 WIB'
            ]
        ];
        @endphp

        @foreach($agenda as $item)
        <div class="flex gap-4 items-start group">
            <div class="bg-white border border-gray-200 rounded-lg p-2 text-center w-16 shadow-sm group-hover:border-uniba-blue transition-all duration-300 group-hover:shadow-md transform group-hover:scale-110">
                <span class="block text-xs font-bold text-gray-400 uppercase">{{ $item['month'] }}</span>
                <span class="block text-xl font-bold text-uniba-blue">{{ $item['date'] }}</span>
            </div>
            <div>
                <h4 class="font-bold text-gray-800 text-sm group-hover:text-uniba-blue transition-colors cursor-pointer">
                    {{ $item['title'] }}
                </h4>
                <span class="text-xs text-gray-500 flex items-center gap-1 mt-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ $item['time'] }}
                </span>
            </div>
        </div>
        @endforeach
    </div>
</div>
