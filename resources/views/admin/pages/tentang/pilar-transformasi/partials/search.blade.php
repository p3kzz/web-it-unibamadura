<div class="flex-1">
    <x-table-search-hybrid placeholder="Cari pilar transformasi..." :currentSearch="$search ?? ''" :preserveParams="[
        'periode_id' => $periodeFilter,
    ]" />
</div>
