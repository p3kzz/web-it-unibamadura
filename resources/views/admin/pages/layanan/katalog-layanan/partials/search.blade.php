<div class="flex-1">
    <x-table-search-hybrid placeholder="Cari katalog layanan..." :currentSearch="$search ?? ''" :preserveParams="[
        'search' => $search,
    ]" />
</div>
