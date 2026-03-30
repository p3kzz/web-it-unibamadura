<div class="flex-1">
    <x-table-search-hybrid placeholder="Cari web hosting..." :currentSearch="$search ?? ''" :preserveParams="[
        'search' => $search,
    ]" />
</div>
