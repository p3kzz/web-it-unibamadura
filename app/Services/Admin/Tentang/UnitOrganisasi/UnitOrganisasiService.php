<?php

namespace App\Services\Admin\Tentang\UnitOrganisasi;

use App\Models\UnitOrganisasi;
use Illuminate\Support\Facades\DB;

class UnitOrganisasiService
{
    /**
     * Store a new unit organisasi.
     */
    public function store(array $data): UnitOrganisasi
    {
        return DB::transaction(function () use ($data) {

            if (!empty($data['parent_id'])) {
                $parent = UnitOrganisasi::find($data['parent_id']);

                if ((int) $parent->struktur_organisasi_id !== (int) $data['struktur_organisasi_id']) {
                    throw new \Exception('Parent tidak valid.');
                }
            }

            $order = $data['order'] ?? $this->getNextOrder(
                $data['struktur_organisasi_id'],
                $data['parent_id'] ?? null
            );

            return UnitOrganisasi::create([
                'struktur_organisasi_id' => $data['struktur_organisasi_id'],
                'name' => $data['name'],
                'parent_id' => $data['parent_id'] ?? null,
                'type' => $data['type'],
                'description' => $data['description'] ?? null,
                'order' => $order,
            ]);
        });
    }

    /**
     * Update an existing unit organisasi.
     */
    public function update(UnitOrganisasi $unit, array $data): UnitOrganisasi
    {
        return DB::transaction(function () use ($unit, $data) {

            if (array_key_exists('parent_id', $data)) {
                $this->validateParent($unit, $data['parent_id']);
            }

            $newParentId = $data['parent_id'] ?? $unit->parent_id;

            $order = $data['order'] ?? $unit->order;

            if ($newParentId != $unit->parent_id) {
                $order = $this->getNextOrder(
                    $unit->struktur_organisasi_id,
                    $newParentId
                );
            }

            $unit->update([
                'name' => $data['name'] ?? $unit->name,
                'parent_id' => $newParentId,
                'type' => $data['type'] ?? $unit->type,
                'description' => $data['description'] ?? $unit->description,
                'order' => $order,
            ]);

            return $unit->refresh();
        });
    }
    /**
     * Delete a unit organisasi.
     */
    public function delete(UnitOrganisasi $unit): void
    {
        DB::transaction(function () use ($unit) {

            if ($unit->children()->exists()) {
                throw new \Exception('Unit memiliki child, tidak bisa dihapus.');
            }

            $unit->delete();
        });
    }

    private function validateParent(UnitOrganisasi $unit, ?int $parentId): void
    {
        if (!$parentId) return;

        if ((int) $unit->id === (int) $parentId) {
            throw new \Exception('Unit tidak boleh menjadi parent dirinya sendiri.');
        }

        $parent = UnitOrganisasi::find($parentId);

        if (!$parent) {
            throw new \Exception('Parent tidak ditemukan.');
        }

        if ((int) $parent->struktur_organisasi_id !== (int) $unit->struktur_organisasi_id) {
            throw new \Exception('Parent harus dalam struktur yang sama.');
        }

        $current = $parent;
        while ($current) {
            if ((int) $current->id === (int) $unit->id) {
                throw new \Exception('Terjadi circular reference.');
            }
            $current = $current->parent;
        }
    }

    private function getNextOrder(int $strukturId, ?int $parentId): int
    {
        return UnitOrganisasi::where('struktur_organisasi_id', $strukturId)
            ->where('parent_id', $parentId)
            ->max('order') + 1;
    }
}
