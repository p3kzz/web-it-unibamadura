<x-filter-dropdown route="admin.content.index" param="status" :current="$statusFilter" :query="['type' => $section, 'search' => $search]" :options="[
    'published' => ['label' => 'Published', 'description' => 'Konten terbit'],
    'draft' => ['label' => 'Draft', 'description' => 'Belum terbit'],
    'trashed' => ['label' => 'Sampah', 'description' => 'Konten terhapus'],
]" />
