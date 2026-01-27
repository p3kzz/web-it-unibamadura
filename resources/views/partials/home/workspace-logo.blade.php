<div class="lg:w-2/5 flex justify-center scroll-animate w-full">
    <div class="text-center bg-white rounded-2xl shadow-xl p-6 sm:p-8 md:p-10 transform hover:scale-105 transition-transform duration-300 w-full max-w-md lg:max-w-none">
        {{-- Google Workspace Title --}}
        <div class="flex flex-col sm:flex-row items-center justify-center gap-2 sm:gap-3 mb-3 sm:mb-4 animate-fade-in">
            <span class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-700 google-font">Google</span>
            <span class="text-3xl sm:text-4xl lg:text-5xl font-medium text-gray-600 google-font">Workspace</span>
        </div>
        <span class="text-xs sm:text-sm md:text-base text-gray-400 uppercase tracking-widest block mb-6 sm:mb-8 animate-fade-in stagger-1">
            For Education Fundamentals
        </span>

        {{-- Icons Grid --}}
        <div class="grid grid-cols-3 gap-3 sm:gap-4 md:gap-6 mb-4 sm:mb-6">
            @php
            $apps = [
                ['name' => 'Gmail', 'gradient' => 'from-blue-500 to-blue-600', 'path' => 'M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z'],
                ['name' => 'Slides', 'gradient' => 'from-yellow-500 to-yellow-600', 'path' => 'M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z'],
                ['name' => 'Docs', 'gradient' => 'from-blue-600 to-blue-700', 'path' => 'M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z'],
                ['name' => 'Sheets', 'gradient' => 'from-green-500 to-green-600', 'path' => 'M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H7v-5h3v5zm4 0h-3v-9h3v9zm4 0h-3v-7h3v7z'],
                ['name' => 'Drive', 'gradient' => 'from-red-500 to-red-600', 'path' => 'M10 16V8c0-1.1.9-2 2-2h9V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-1h-9c-1.1 0-2-.9-2-2zm3-8c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h9V8h-9zm3 5.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z'],
                ['name' => 'Meet', 'gradient' => 'from-purple-500 to-purple-600', 'path' => 'M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-7 9h-2V5h2v6zm0 4h-2v-2h2v2z']
            ];
            @endphp

            @foreach($apps as $app)
            <div class="workspace-icon transform hover:scale-110 transition-transform cursor-pointer">
                <div class="bg-gradient-to-br {{ $app['gradient'] }} w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 rounded-xl sm:rounded-2xl flex items-center justify-center shadow-lg mx-auto">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 md:w-9 md:h-9 text-white" viewBox="0 0 24 24" fill="currentColor">
                        <path d="{{ $app['path'] }}"/>
                    </svg>
                </div>
                <p class="text-xs sm:text-xs md:text-xs font-semibold text-gray-600 mt-1 sm:mt-2">{{ $app['name'] }}</p>
            </div>
            @endforeach
        </div>

        {{-- Footer Badge --}}
        <div class="pt-3 sm:pt-4 border-t border-gray-200">
            <p class="text-xs sm:text-sm text-gray-500 font-medium">✨ Unlimited Storage</p>
        </div>
    </div>
</div>
