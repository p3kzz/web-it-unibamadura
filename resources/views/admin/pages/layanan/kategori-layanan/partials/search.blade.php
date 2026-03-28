<div class="flex-1">
    <x-table-search-hybrid placeholder="Cari Kategori Layanan..." :currentSearch="$search ?? ''" :preserveParams="[
        'nama' => $search,
    ]" />
</div>
