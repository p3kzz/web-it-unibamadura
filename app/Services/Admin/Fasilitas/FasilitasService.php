<?php

namespace App\Services\Admin\Fasilitas;

use App\Models\Fasilitas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FasilitasService
{
    /**
     * Create a new fasilitas.
     */
    public function store(array $data): Fasilitas
    {
        return DB::transaction(function () use ($data) {
            // Handle image upload
            if (!empty($data['image'])) {
                $data['image'] = $data['image']
                    ->store('fasilitas', 'public');
            }
            return Fasilitas::create($data);
        });
    }

    /**
     * Update fasilitas data.
     */
    public function update(Fasilitas $fasilitas, array $data): Fasilitas
    {
        return DB::transaction(function () use ($fasilitas, $data) {
            // Handle image upload
            if (isset($data['image'])) {

                if ($fasilitas->image && Storage::disk('public')->exists($fasilitas->image)) {
                    Storage::disk('public')->delete($fasilitas->image);
                }

                $data['image'] = $data['image']
                    ->store('fasilitas', 'public');
            }

            $fasilitas->update($data);

            return $fasilitas->refresh();
        });
    }

    /**
     * Delete fasilitas and related data.
     */
    public function delete(Fasilitas $fasilitas): void
    {
        DB::transaction(function () use ($fasilitas) {
            $this->deleteImage($fasilitas->image);
            $fasilitas->delete();
        });
    }

    /**
     * Delete image from storage.
     */
    private function deleteImage(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
