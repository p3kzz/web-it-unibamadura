<?php

namespace App\Services\Admin\Layanan\KatalogLayanan;

use App\Models\KatalogLayanan;
use Illuminate\Support\Facades\Storage;

class KatalogLayananService
{
    public function store(array $data): KatalogLayanan
    {
        if (!empty($data['icon']) && $data['icon'] instanceof \Illuminate\Http\UploadedFile) {
            $data['icon'] = $data['icon']->store('katalog-layanan/icons', 'public');
        }

        return KatalogLayanan::create([
            'kategori_layanan_id' => $data['kategori_layanan_id'] ?? null,
            'nama' => $data['nama'],
            'deskripsi' => $data['deskripsi'] ?? null,
            'icon' => $data['icon'] ?? null,
            'link' => $data['link'] ?? null,
            'is_active' => $data['is_active'] ?? true,
            'sort_order' => $data['sort_order'] ?? 0,
        ]);
    }

    public function update(KatalogLayanan $item, array $data): KatalogLayanan
    {
        if (!empty($data['icon']) && $data['icon'] instanceof \Illuminate\Http\UploadedFile) {
            if ($item->icon && Storage::disk('public')->exists($item->icon)) {
                Storage::disk('public')->delete($item->icon);
            }
            $data['icon'] = $data['icon']->store('katalog-layanan/icons', 'public');
        }

        $item->update([
            'kategori_layanan_id' => $data['kategori_layanan_id'] ?? null,
            'nama' => $data['nama'],
            'deskripsi' => $data['deskripsi'] ?? $item->deskripsi,
            'icon' => $data['icon'] ?? $item->icon,
            'link' => $data['link'] ?? null,
            'is_active' => $data['is_active'] ?? $item->is_active,
            'sort_order' => $data['sort_order'] ?? $item->sort_order,
        ]);

        return $item->refresh();
    }

    public function delete(KatalogLayanan $item): void
    {
        if ($item->icon && Storage::disk('public')->exists($item->icon)) {
            Storage::disk('public')->delete($item->icon);
        }

        $item->delete();
    }
}

