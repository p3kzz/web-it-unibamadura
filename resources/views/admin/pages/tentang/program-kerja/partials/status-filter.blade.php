@php
    $statusOptions = [
        'planning' => [
            'label' => 'Perencanaan',
            'description' => 'Program dalam tahap perencanaan',
        ],
        'in_progress' => [
            'label' => 'Berjalan',
            'description' => 'Program sedang berjalan',
        ],
        'completed' => [
            'label' => 'Selesai',
            'description' => 'Program sudah selesai',
        ],
        'cancelled' => [
            'label' => 'Dibatalkan',
            'description' => 'Program dibatalkan',
        ],
    ];
@endphp

<x-filter-dropdown route="admin.tentang.program-kerja.index" param="status" :current="$statusFilter ?? null" placeholder="Semua Status"
    :query="[
        'search' => $search,
        'periode_id' => $periodeFilter,
        'pilar_id' => $pilarFilter ?? null,
    ]" :options="$statusOptions" />
