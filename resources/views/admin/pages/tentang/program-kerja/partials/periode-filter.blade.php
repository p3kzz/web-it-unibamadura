@php
    $periodeOptions = $periodes
        ->mapWithKeys(function ($periode) {
            return [
                $periode->id => [
                    'label' => $periode->name,
                    'description' => $periode->start_year . ' - ' . $periode->end_year,
                ],
            ];
        })
        ->toArray();
@endphp

<x-filter-dropdown route="admin.tentang.program-kerja.index" param="periode_id" :current="$periodeFilter"
    placeholder="Semua Periode" :query="[
        'search' => $search,
        'pilar_id' => $pilarFilter ?? null,
        'status' => $statusFilter ?? null,
    ]" :options="$periodeOptions" />
