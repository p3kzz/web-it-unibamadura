<div class="hidden lg:block bg-white rounded-2xl shadow-lg overflow-visible border border-gray-200">
    <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between gap-4 mb-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-uniba-blue rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800">Daftar Katalog Layanan</h3>
                    <p class="text-xs text-gray-500">
                        @if ($search)
                            Hasil pencarian: {{ $items->count() }} data
                        @else
                            Total: {{ $items->count() }} data
                        @endif
                    </p>
                </div>
            </div>

            <div class="text-sm text-gray-500 hidden xl:block">
                <span class="inline-flex items-center gap-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Terakhir diupdate: {{ now()->format('d M Y') }}
                </span>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-3">
            @include('admin.pages.layanan.katalog-layanan.partials.search')
            @include('admin.pages.layanan.katalog-layanan.partials.status-filter')
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <colgroup>
                <col style="width: 60px;">
                <col style="width: 60px;">
                <col style="width: 220px;">
                <col>
                <col style="width: 160px;">
                <col style="width: 120px;">
                <col style="width: 160px;">
            </colgroup>
            <thead>
                <tr class="bg-uniba-blue text-white">
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">No</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Icon</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Nama Layanan</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Deskripsi</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Kategori</th>
                    <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($items as $index => $item)
                    @include('admin.pages.layanan.katalog-layanan.partials.table-row')
                @empty
                    @include('admin.pages.layanan.katalog-layanan.partials.empty-state')
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($items->hasPages())
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 border-t border-gray-200">
            <div class="p-4">
                {{ $items->links() }}
            </div>
        </div>
    @endif
</div>

@include('admin.pages.layanan.katalog-layanan.partials.mobile-card')