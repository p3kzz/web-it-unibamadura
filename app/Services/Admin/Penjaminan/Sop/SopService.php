<?php

namespace App\Services\Admin\Penjaminan\Sop;

use App\Models\SopItem;
use Illuminate\Support\Facades\Storage;

class SopService
{
    public function store(array $data): SopItem
    {
        if (!empty($data['file'])) {
            $data['file'] = $data['file']->store('sop', 'public');
        }

        return SopItem::create([
            'judul' => $data['judul'],
            'deskripsi' => $data['deskripsi'] ?? null,
            'file' => $data['file'],
            'is_active' => $data['is_active'] ?? true,
        ]);
    }

    public function update(SopItem $sopItem, array $data): SopItem
    {
        if (isset($data['file'])) {
            if ($sopItem->file && Storage::disk('public')->exists($sopItem->file)) {
                Storage::disk('public')->delete($sopItem->file);
            }
            $data['file'] = $data['file']->store('sop', 'public');
        }

        $sopItem->update([
            'judul' => $data['judul'],
            'deskripsi' => $data['deskripsi'] ?? $sopItem->deskripsi,
            'file' => $data['file'] ?? $sopItem->file,
            'is_active' => $data['is_active'] ?? $sopItem->is_active,
        ]);

        return $sopItem->refresh();
    }

    public function delete(SopItem $sopItem): void
    {
        if ($sopItem->file && Storage::disk('public')->exists($sopItem->file)) {
            Storage::disk('public')->delete($sopItem->file);
        }

        $sopItem->delete();
    }
}
