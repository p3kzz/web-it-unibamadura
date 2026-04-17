<?php

namespace App\Services\Admin\Layanan\KatalogLayanan;

use App\Models\KatalogLayanan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KatalogLayananService
{
    /**
     * Create a new class instance.
     */
    public function store(array $data): KatalogLayanan
    {
        return DB::transaction(function () use ($data) {

            if (!empty($data['icon'])) {
                $data['icon'] = $data['icon']
                    ->store('katalog-layanan/icon', 'public');
            }
            return KatalogLayanan::create($data);
        });
    }

    public function update(KatalogLayanan $katalogLayanan, array $data): KatalogLayanan
    {
        return DB::transaction(function () use ($katalogLayanan, $data) {
            if (isset($data['icon']) && $data['icon']) {
                if ($katalogLayanan->icon && Storage::disk('public')->exists($katalogLayanan->icon)) {
                    Storage::disk('public')->delete($katalogLayanan->icon);
                }
                $data['icon'] = $data['icon']
                    ->store('katalog-layanan/icon', 'public');
            } else {
                unset($data['icon']);
            }
            $katalogLayanan->update($data);

            return $katalogLayanan->refresh();
        });
    }

    public function delete(KatalogLayanan $katalogLayanan): void
    {
        if ($katalogLayanan->icon && Storage::disk('public')->exists($katalogLayanan->icon)) {
            Storage::disk('public')->delete($katalogLayanan->icon);
        }
        $katalogLayanan->delete();
    }
}
