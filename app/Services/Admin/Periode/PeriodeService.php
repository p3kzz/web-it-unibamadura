<?php

namespace App\Services\Admin\Periode;

use App\Models\Periode;
use Illuminate\Support\Facades\DB;

class PeriodeService
{
    public function create(array $data): Periode
    {
        return DB::transaction(function () use ($data) {

            $isActive = isset($data['is_active']) && (int) $data['is_active'] === 1;

            if ($isActive) {
                $this->deactivateAll();
            }

            return Periode::create([
                'name'       => $data['name'],
                'start_year' => $data['start_year'],
                'end_year'   => $data['end_year'],
                'is_active'  => $isActive,
            ]);
        });
    }


    public function update(Periode $periode, array $data): Periode
    {
        return DB::transaction(function () use ($periode, $data) {

            $isActive = isset($data['is_active']) && (int) $data['is_active'] === 1;

            if ($isActive) {
                $this->deactivateAll($periode->id);
            }

            $periode->update([
                'name'       => $data['name'],
                'start_year' => $data['start_year'],
                'end_year'   => $data['end_year'],
                'is_active'  => $isActive,
            ]);

            return $periode;
        });
    }


    private function deactivateAll(?int $exceptId = null): void
    {
        Periode::where('is_active', true)
            ->when($exceptId, fn($q) => $q->where('id', '!=', $exceptId))
            ->update(['is_active' => false]);
    }
}
