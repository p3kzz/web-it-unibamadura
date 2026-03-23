<div class="flex-1">
    <x-table-search-hybrid placeholder="Cari program kerja..." :currentSearch="$search ?? ''" :preserveParams="[
        'periode_id' => $periodeFilter,
        'pilar_id' => $pilarFilter ?? null,
        'status' => $statusFilter ?? null,
    ]" />
</div>
