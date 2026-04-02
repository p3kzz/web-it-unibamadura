<div class="flex-1">
    <x-table-search-hybrid placeholder="Cari email akun..." :currentSearch="$search ?? ''" :preserveParams="[
        'search' => $search,
    ]" />
</div>
