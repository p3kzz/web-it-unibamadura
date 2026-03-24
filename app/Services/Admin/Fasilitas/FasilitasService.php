<?php

namespace App\Services\Admin\Fasilitas;

use App\Models\Fasilitas;
use App\Models\FasilitasImage;
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

            $fasilitas = Fasilitas::create([
                'nama' => $data['nama'],
                'deskripsi' => $data['deskripsi'],
                'image' => $data['image'] ?? null,
                'is_active' => $data['is_active'] ?? true,
            ]);

            // Handle gallery images
            if (!empty($data['gallery_images'])) {
                $this->storeGalleryImages($fasilitas, $data['gallery_images']);
            }

            return $fasilitas;
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

            $fasilitas->update([
                'nama' => $data['nama'],
                'deskripsi' => $data['deskripsi'],
                'image' => $data['image'] ?? $fasilitas->image,
                'is_active' => $data['is_active'] ?? $fasilitas->is_active,
            ]);

            // Handle new gallery images
            if (!empty($data['gallery_images'])) {
                $this->storeGalleryImages($fasilitas, $data['gallery_images']);
            }

            return $fasilitas->refresh();
        });
    }

    /**
     * Delete fasilitas and related data.
     */
    public function delete(Fasilitas $fasilitas): void
    {
        DB::transaction(function () use ($fasilitas) {
            // Delete gallery images from storage
            foreach ($fasilitas->galleryImages as $galleryImage) {
                $this->deleteImage($galleryImage->image);
            }

            // Delete main image
            $this->deleteImage($fasilitas->image);

            // Delete fasilitas (gallery images cascade deleted via FK)
            $fasilitas->delete();
        });
    }

    /**
     * Store multiple gallery images.
     */
    private function storeGalleryImages(Fasilitas $fasilitas, array $images): void
    {
        $maxOrder = $fasilitas->galleryImages()->max('sort_order') ?? 0;

        foreach ($images as $index => $image) {
            $path = $image->store('fasilitas/gallery', 'public');

            FasilitasImage::create([
                'fasilitas_id' => $fasilitas->id,
                'image' => $path,
                'sort_order' => $maxOrder + $index + 1,
            ]);
        }
    }

    /**
     * Delete a single gallery image.
     */
    public function deleteGalleryImage(int $imageId): void
    {
        $image = FasilitasImage::findOrFail($imageId);

        $this->deleteImage($image->image);
        $image->delete();
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
