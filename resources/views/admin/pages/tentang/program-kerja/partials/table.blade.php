<div class="hidden lg:block bg-white rounded-2xl shadow-lg overflow-visible border border-gray-200">
    <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between gap-4 mb-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-uniba-blue rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800">Daftar Program Kerja</h3>
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
            @include('admin.pages.tentang.program-kerja.partials.search')
            @include('admin.pages.tentang.program-kerja.partials.periode-filter')
            @include('admin.pages.tentang.program-kerja.partials.status-filter')
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <colgroup>
                <col style="width: 60px;">
                <col style="width: 90px;">
                <col style="width: 180px;">
                <col style="width: 150px;">
                <col style="width: 150px;">
                <col>
                <col style="width: 100px;">
                <col style="width: 100px;">
                <col style="width: 140px;">
            </colgroup>
            <thead>
                <tr class="bg-uniba-blue text-white">
                    <th class="px-4 py-4 text-left text-xs font-bold uppercase tracking-wider">No</th>
                    <th class="px-4 py-4 text-left text-xs font-bold uppercase tracking-wider">Kode</th>
                    <th class="px-4 py-4 text-left text-xs font-bold uppercase tracking-wider">Nama</th>
                    <th class="px-4 py-4 text-left text-xs font-bold uppercase tracking-wider">Pilar</th>
                    <th class="px-4 py-4 text-left text-xs font-bold uppercase tracking-wider">Periode</th>
                    <th class="px-4 py-4 text-left text-xs font-bold uppercase tracking-wider">Tujuan</th>
                    <th class="px-4 py-4 text-center text-xs font-bold uppercase tracking-wider">Status</th>
                    <th class="px-4 py-4 text-center text-xs font-bold uppercase tracking-wider">Aktif</th>
                    <th class="px-4 py-4 text-center text-xs font-bold uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($items as $index => $item)
                    @include('admin.pages.tentang.program-kerja.partials.table-row')
                @empty
                    @include('admin.pages.tentang.program-kerja.partials.empty-state')
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

@include('admin.pages.tentang.program-kerja.partials.mobile-card')
