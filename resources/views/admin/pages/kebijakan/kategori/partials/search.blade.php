<form method="GET" action="{{ route('admin.penjaminan.policy-category.index') }}" class="flex-1">
    <div class="relative">
        <input type="text" name="search" value="{{ $search ?? '' }}"
            class="w-full pl-10 pr-4 py-2.5 border-2 border-gray-300 rounded-lg focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none text-sm"
            placeholder="Cari nama kategori...">
        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
    </div>
</form>
