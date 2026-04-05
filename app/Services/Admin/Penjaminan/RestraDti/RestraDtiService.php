<?php

namespace App\Services\Admin\Penjaminan\RestraDti;

use App\Models\RestraDti;
use Illuminate\Support\Facades\Storage;

class RestraDtiService
{
    /**
     * Create a new class instance.
     */
    public function store(array $data): RestraDti
    {
        if (!empty($data['file'])) {
            $data['file'] = $data['file']->store('restra-dti', 'public');
        }

        return RestraDti::create([
            'judul' => $data['judul'],
            'deskripsi' => $data['deskripsi'] ?? null,
            'file' => $data['file'],
            'is_active' => $data['is_active'] ?? true,
        ]);
    }

    public function update(RestraDti $renstra, array $data): RestraDti
    {
        if (isset($data['file'])) {
            if ($renstra->file && Storage::disk('public')->exists($renstra->file)) {
                Storage::disk('public')->delete($renstra->file);
            }
            $data['file'] = $data['file']->store('restra-dti', 'public');
        }

        $renstra->update([
            'judul' => $data['judul'],
            'deskripsi' => $data['deskripsi'] ?? $renstra->deskripsi,
            'file' => $data['file'] ?? $renstra->file,
            'is_active' => $data['is_active'] ?? $renstra->is_active,
        ]);

        return $renstra->refresh();
    }

    public function delete(RestraDti $renstra): void
    {
        if ($renstra->file && Storage::disk('public')->exists($renstra->file)) {
            Storage::disk('public')->delete($renstra->file);
        }

        $renstra->delete();
    }
}
