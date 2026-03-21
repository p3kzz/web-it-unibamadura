<?php

namespace App\Services\Admin\Tentang\StrukturOrganisasi;

use App\Models\StrukturOrganisasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiService
{
    /**
     * Store a new struktur organisasi.
     */
    public function store(array $data): StrukturOrganisasi
    {
        return DB::transaction(function () use ($data) {
            if (!empty($data['image'])) {
                $data['image'] = $data['image']
                    ->store('struktur-organisasi', 'public');
            }

            $isActive = isset($data['is_active']) && (int) $data['is_active'] === 1;

            if ($isActive) {
                $this->deactivateAll($data['periode_id']);
            }

            return StrukturOrganisasi::create([
                'periode_id' => $data['periode_id'],
                'image' => $data['image'],
                'is_active' => $isActive,
            ]);
        });
    }

    /**
     * Update an existing struktur organisasi.
     */
    public function update(StrukturOrganisasi $struktur, array $data): StrukturOrganisasi
    {
        return DB::transaction(function () use ($struktur, $data) {
            if (isset($data['image'])) {
                if ($struktur->image && Storage::disk('public')->exists($struktur->image)) {
                    Storage::disk('public')->delete($struktur->image);
                }

                $data['image'] = $data['image']
                    ->store('struktur-organisasi', 'public');
            }

            $isActive = isset($data['is_active']) && (int) $data['is_active'] === 1;

            if ($isActive) {
                $this->deactivateAll($data['periode_id'], $struktur->id);
            }

            $struktur->update([
                'periode_id' => $data['periode_id'] ?? $struktur->periode_id,
                'image' => $data['image'] ?? $struktur->image,
                'is_active' => $isActive,
            ]);

            return $struktur->refresh();
        });
    }

    /**
     * Delete a struktur organisasi.
     */
    public function delete(StrukturOrganisasi $struktur): void
    {
        DB::transaction(function () use ($struktur) {
            $this->deleteImage($struktur->image);
            $struktur->delete();
        });
    }

    /**
     * Deactivate all struktur organisasi.
     */
    private function deactivateAll(int $periodeId, ?int $exceptId = null): void
    {
        StrukturOrganisasi::where('periode_id', $periodeId)
            ->where('is_active', true)
            ->when($exceptId, fn($q) => $q->where('id', '!=', $exceptId))
            ->update(['is_active' => false]);
    }

    private function deleteImage(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
