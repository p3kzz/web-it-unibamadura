<div class="flex-1">
    <x-table-search-hybrid placeholder="Cari detail layanan..." :currentSearch="$search ?? ''" :preserveParams="[
        'search' => $search,
    ]" />
</div>
