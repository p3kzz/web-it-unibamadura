<div class="flex-1">
    <x-table-search-hybrid placeholder="Cari audit..." :currentSearch="$search ?? ''" :preserveParams="[
        'search' => $search,
    ]" />
</div>
