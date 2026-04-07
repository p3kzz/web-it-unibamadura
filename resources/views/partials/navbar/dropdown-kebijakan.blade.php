<div class="relative group">
    <button
        class="flex items-center text-gray-600 hover:text-uniba-blue h-20 group-hover:text-uniba-blue transition-colors">
        <span>Kebijakan & Aturan</span>
        <svg class="w-3 h-3 ml-1 transform group-hover:rotate-180 transition-transform duration-300" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>
    <div
        class="absolute right-0 top-full w-72 bg-white border-t-4 border-uniba-yellow shadow-lg py-2 rounded-b-lg invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-all duration-300">
        <a href="{{ route('policy.index') }}"
            class="block px-4 py-2 hover:bg-gray-50 hover:text-uniba-blue transition-colors text-gray-700 font-medium border-b border-gray-100">
            Kebijakan dan Aturan Umum
        </a>
        @forelse ($navPolicyCategories as $category)
            <a href="{{ route('policy.category', $category->slug) }}"
                class="block px-4 py-2 hover:bg-gray-50 hover:text-uniba-blue transition-colors text-gray-700">
                {{ $category->name }}
            </a>
        @empty
            <span class="block px-4 py-2 text-gray-400 text-sm italic">Belum ada kategori</span>
        @endforelse
    </div>
</div>
