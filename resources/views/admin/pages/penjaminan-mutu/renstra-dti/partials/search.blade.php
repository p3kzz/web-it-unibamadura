<div class="flex-1">
    <x-table-search-hybrid placeholder="Cari renstra..." :currentSearch="$search ?? ''" :preserveParams="[
        'search' => $search,
    ]" />
</div>
