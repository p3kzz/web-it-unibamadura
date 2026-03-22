<?php

namespace App\Services\Admin\Tentang\Sdm;

use App\Models\Pegawai;
use App\Models\PenugasanPegawai;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PegawaiService
{
    /**
     * Create a new pegawai with optional unit assignment.
     */
    public function store(array $data): Pegawai
    {
        return DB::transaction(function () use ($data) {
            // Handle foto upload
            if (!empty($data['foto'])) {
                $data['foto'] = $data['foto']->store('pegawai', 'public');
            }

            // Handle sertifikasi - ensure it's an array
            if (!empty($data['sertifikasi']) && is_string($data['sertifikasi'])) {
                $data['sertifikasi'] = array_filter(
                    array_map('trim', explode(',', $data['sertifikasi']))
                );
            }

            $pegawai = Pegawai::create([
                'nama' => $data['nama'],
                'foto' => $data['foto'] ?? null,
                'jabatan' => $data['jabatan'],
                'sertifikasi' => $data['sertifikasi'] ?? null,
                'status' => $data['status'] ?? 'aktif',
            ]);

            // Assign to unit if provided
            if (!empty($data['unit_organisasi_id'])) {
                PenugasanPegawai::create([
                    'pegawai_id' => $pegawai->id,
                    'unit_organisasi_id' => $data['unit_organisasi_id'],
                    'is_primary' => true,
                    'tanggal_mulai' => now(),
                ]);
            }

            return $pegawai;
        });
    }

    /**
     * Update pegawai data.
     */
    public function update(Pegawai $pegawai, array $data): Pegawai
    {
        return DB::transaction(function () use ($pegawai, $data) {
            // Handle foto upload
            if (isset($data['foto']) && $data['foto']) {
                $this->deletePhoto($pegawai->foto);
                $data['foto'] = $data['foto']->store('pegawai', 'public');
            } else {
                unset($data['foto']);
            }

            // Handle sertifikasi
            if (isset($data['sertifikasi']) && is_string($data['sertifikasi'])) {
                $data['sertifikasi'] = array_filter(
                    array_map('trim', explode(',', $data['sertifikasi']))
                );
            }

            $pegawai->update($data);

            // Update unit assignment if changed
            if (isset($data['unit_organisasi_id'])) {
                $this->updateUnitAssignment($pegawai, $data['unit_organisasi_id']);
            }

            return $pegawai->refresh();
        });
    }

    /**
     * Delete pegawai and related data.
     */
    public function delete(Pegawai $pegawai): void
    {
        DB::transaction(function () use ($pegawai) {
            $this->deletePhoto($pegawai->foto);
            $pegawai->delete();
        });
    }

    /**
     * Update or create unit assignment for pegawai.
     */
    public function updateUnitAssignment(Pegawai $pegawai, ?int $unitId): void
    {
        // If no unit provided, just end current assignment
        if (!$unitId) {
            PenugasanPegawai::where('pegawai_id', $pegawai->id)
                ->where('is_primary', true)
                ->whereNull('tanggal_selesai')
                ->update(['tanggal_selesai' => now()]);
            return;
        }

        // Check if already assigned to this unit and active
        $existingActive = PenugasanPegawai::where('pegawai_id', $pegawai->id)
            ->where('unit_organisasi_id', $unitId)
            ->whereNull('tanggal_selesai')
            ->first();

        if ($existingActive) {
            // Already assigned to this unit, just ensure it's primary
            $existingActive->update(['is_primary' => true]);

            // End other primary assignments
            PenugasanPegawai::where('pegawai_id', $pegawai->id)
                ->where('id', '!=', $existingActive->id)
                ->where('is_primary', true)
                ->whereNull('tanggal_selesai')
                ->update(['is_primary' => false]);
            return;
        }

        // End current primary assignment if exists
        PenugasanPegawai::where('pegawai_id', $pegawai->id)
            ->where('is_primary', true)
            ->whereNull('tanggal_selesai')
            ->update(['tanggal_selesai' => now(), 'is_primary' => false]);

        // Check if there's an old (ended) assignment to this unit
        $existingEnded = PenugasanPegawai::where('pegawai_id', $pegawai->id)
            ->where('unit_organisasi_id', $unitId)
            ->whereNotNull('tanggal_selesai')
            ->first();

        if ($existingEnded) {
            // Reactivate the old assignment
            $existingEnded->update([
                'is_primary' => true,
                'tanggal_mulai' => now(),
                'tanggal_selesai' => null,
            ]);
        } else {
            // Create new assignment
            PenugasanPegawai::create([
                'pegawai_id' => $pegawai->id,
                'unit_organisasi_id' => $unitId,
                'is_primary' => true,
                'tanggal_mulai' => now(),
            ]);
        }
    }

    /**
     * Assign pegawai to a new unit (additional assignment).
     */
    public function assignToUnit(Pegawai $pegawai, int $unitId, bool $isPrimary = false): PenugasanPegawai
    {
        return PenugasanPegawai::create([
            'pegawai_id' => $pegawai->id,
            'unit_organisasi_id' => $unitId,
            'is_primary' => $isPrimary,
            'tanggal_mulai' => now(),
        ]);
    }

    /**
     * End a unit assignment.
     */
    public function endAssignment(PenugasanPegawai $penugasan): void
    {
        $penugasan->update(['tanggal_selesai' => now()]);
    }

    /**
     * Delete photo from storage.
     */
    private function deletePhoto(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
