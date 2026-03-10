@props(['active' => false])

@if($active)
    <div class="w-5 h-5 bg-blue-700 rounded-full flex items-center justify-center">
        <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 13l4 4L19 7"/>
        </svg>
    </div>
@else
    <div class="w-5 h-5 border-2 border-gray-300 rounded-full"></div>
@endif
