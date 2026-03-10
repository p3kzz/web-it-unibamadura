<x-filter-dropdown route="admin.tentang.histories.index" param="is_active" :current="$statusFilter" :query="['type' => $section, 'search' => $search]"
    :options="[
        1 => ['label' => 'Aktif', 'description' => 'Hanya yang aktif'],
        0 => ['label' => 'Nonaktif', 'description' => 'Hanya yang nonaktif'],
    ]" />
