@php
    $kategoriLayananId = request('kategori_layanan_id', $katalogLayananId ?? null);
@endphp

<div class="flex-1">
    <x-table-search-hybrid placeholder="Cari katalog layanan..." :currentSearch="$search ?? ''" :preserveParams="[
        'kategori_layanan_id' => $kategoriLayananId,
    ]" />
</div>
