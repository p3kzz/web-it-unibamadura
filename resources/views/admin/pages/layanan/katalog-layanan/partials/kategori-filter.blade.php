@php
    $kategoriLayananId = request('kategori_layanan_id', $katalogLayananId ?? null);

    $kategoriOptions = \App\Models\KategoriLayanan::query()
        ->orderBy('nama')
        ->get()
        ->mapWithKeys(function ($kategori) {
            return [
                $kategori->id => [
                    'label' => $kategori->nama,
                ],
            ];
        })
        ->toArray();
@endphp

<x-filter-dropdown route="admin.layanan.katalog-layanan.index" param="kategori_layanan_id" :current="$kategoriLayananId"
    placeholder="Semua Kategori Layanan" :query="[
        'search' => $search,
    ]" :options="$kategoriOptions" />
