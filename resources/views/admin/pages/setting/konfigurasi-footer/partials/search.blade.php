<div class="flex-1">
    <x-table-search-hybrid placeholder="Cari {{ $type }}..." :currentSearch="$search ?? ''" :preserveParams="[
        'type' => $type,
    ]" />
</div>
