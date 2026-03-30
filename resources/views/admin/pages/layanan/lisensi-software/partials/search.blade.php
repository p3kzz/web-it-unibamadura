<div class="flex-1">
    <x-table-search-hybrid placeholder="Cari lisensi software..." :currentSearch="$search ?? ''" :preserveParams="[
        'name' => $search,
    ]" />
</div>
