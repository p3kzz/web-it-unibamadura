<div class="flex-1">
    <form id="search-form" method="GET" action="{{ route('admin.layanan.katalog-layanan.index') }}">
        <input type="hidden" name="is_active" value="{{ $isActive ?? '' }}">
        <div class="relative">
            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0"></path>
            </svg>
            <input type="text" name="search" value="{{ $search ?? '' }}"
                placeholder="Cari nama atau deskripsi layanan..."
                class="w-full pl-9 pr-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-uniba-blue focus:border-transparent"
                hx-get="{{ route('admin.layanan.katalog-layanan.index') }}" hx-target="#ajax-table-container"
                hx-trigger="keyup changed delay:400ms" hx-include="#search-form">
        </div>
    </form>
</div>