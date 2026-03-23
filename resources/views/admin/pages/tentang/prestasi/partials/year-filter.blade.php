@php
    $yearOptions = $years
        ->mapWithKeys(function ($year) {
            return [
                $year => [
                    'label' => (string) $year,
                    'description' => 'Tahun ' . $year,
                ],
            ];
        })
        ->toArray();
@endphp

<x-filter-dropdown route="admin.tentang.prestasi.index" param="year" :current="$yearFilter" placeholder="Semua Tahun"
    :query="[
        'search' => $search,
    ]" :options="$yearOptions" />
