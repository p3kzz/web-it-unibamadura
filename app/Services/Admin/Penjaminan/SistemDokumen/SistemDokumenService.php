<?php

namespace App\Services\Admin\Penjaminan\SistemDokumen;

use App\Models\SistemDokumenItem;
use Illuminate\Support\Facades\Storage;

class SistemDokumenService
{
    public function store(array $data): SistemDokumenItem
    {
        if (!empty($data['file'])) {
            $data['file'] = $data['file']->store('sistem-dokumen', 'public');
        }

        return SistemDokumenItem::create([
            'judul' => $data['judul'],
            'deskripsi' => $data['deskripsi'] ?? null,
            'file' => $data['file'],
            'is_active' => $data['is_active'] ?? true,
        ]);
    }

    public function update(SistemDokumenItem $item, array $data): SistemDokumenItem
    {
        if (isset($data['file'])) {
            if ($item->file && Storage::disk('public')->exists($item->file)) {
                Storage::disk('public')->delete($item->file);
            }
            $data['file'] = $data['file']->store('sistem-dokumen', 'public');
        }

        $item->update([
            'judul' => $data['judul'],
            'deskripsi' => $data['deskripsi'] ?? $item->deskripsi,
            'file' => $data['file'] ?? $item->file,
            'is_active' => $data['is_active'] ?? $item->is_active,
        ]);

        return $item->refresh();
    }

    public function delete(SistemDokumenItem $item): void
    {
        if ($item->file && Storage::disk('public')->exists($item->file)) {
            Storage::disk('public')->delete($item->file);
        }

        $item->delete();
    }
}
