<div class="flex-1">
    <x-table-search-hybrid placeholder="Cari prestasi..." :currentSearch="$search ?? ''" :preserveParams="[
        'year' => $yearFilter,
    ]" />
</div>
