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
            return UnitOrganisasi::create([
                'struktur_organisasi_id' => $data['struktur_organisasi_id'],
                'name' => $data['name'],
                'parent_id' => $data['parent_id'] ?? null,
                'type' => $data['type'],
                'tasks' => $data['tasks'] ?? null,
                'functions' => $data['functions'] ?? null,
                'order' => $data['order'] ?? 0,
            ]);
        });
    }

    /**
     * Update an existing unit organisasi.
     */
    public function update(UnitOrganisasi $unit, array $data): UnitOrganisasi
    {
        return DB::transaction(function () use ($unit, $data) {
            $unit->update([
                'name' => $data['name'] ?? $unit->name,
                'parent_id' => array_key_exists('parent_id', $data) ? $data['parent_id'] : $unit->parent_id,
                'type' => $data['type'] ?? $unit->type,
                'tasks' => $data['tasks'] ?? $unit->tasks,
                'functions' => array_key_exists('functions', $data) ? $data['functions'] : $unit->functions,
                'order' => $data['order'] ?? $unit->order,
            ]);

            return $unit->refresh();
        });
    }

    /**
     * Delete a unit organisasi.
     */
    public function delete(UnitOrganisasi $unit): void
    {
        $unit->delete();
    }

    /**
     * Update order of units.
     */
    public function updateOrder(array $orderedIds): void
    {
        DB::transaction(function () use ($orderedIds) {
            foreach ($orderedIds as $index => $id) {
                UnitOrganisasi::where('id', $id)->update(['order' => $index]);
            }
        });
    }
}
