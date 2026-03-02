<div class="flex-1">
    <x-table-search-hybrid placeholder="Cari {{ $section }}..." :currentSearch="$search ?? ''" :preserveParams="['type' => $section]" />
</div>
