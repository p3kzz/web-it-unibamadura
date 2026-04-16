<?php

namespace App\Services\Admin\SettingWeb\KonfigurasiLogo;

use App\Models\KonfigurasiLogo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KonfigurasiLogoservice
{
    /**
     * Create a new class instance.
     */
    public function store(array $data): KonfigurasiLogo
    {
        return DB::transaction(function () use ($data) {
            $isActive = isset($data['is_active']) && (int) $data['is_active'] === 1;

            if ($isActive) {
                $this->deactivateAll();
            }
            if (!empty($data['logo_web'])) {
                $data['logo_web'] = $data['logo_web']
                    ->store('logo_web', 'public');
            }
            return KonfigurasiLogo::create($data);
        });
    }

    public function update(KonfigurasiLogo $konfigurasiLogo, array $data): KonfigurasiLogo
    {
        return DB::transaction(function () use ($konfigurasiLogo, $data) {
            $isActive = isset($data['is_active']) && (int) $data['is_active'] === 1;

            if ($isActive) {
                $this->deactivateAll($konfigurasiLogo->id);
            }
            if (isset($data['logo_web']) && $data['logo_web']) {
                if ($konfigurasiLogo->logo_web && Storage::disk('public')->exists($konfigurasiLogo->logo_web)) {
                    Storage::disk('public')->delete($konfigurasiLogo->logo_web);
                }
                $data['logo_web'] = $data['logo_web']
                    ->store('logo_web', 'public');
            } else {
                unset($data['logo_web']);
            }
            $konfigurasiLogo->update($data);
            return $konfigurasiLogo->refresh();
        });
    }

    public function delete(KonfigurasiLogo $konfigurasiLogo): void
    {
        if ($konfigurasiLogo->logo_web && Storage::disk('public')->exists($konfigurasiLogo->logo_web)) {
            Storage::disk('public')->delete($konfigurasiLogo->logo_web);
        }
        $konfigurasiLogo->delete();
    }

    private function deactivateAll(?int $exceptId = null): void
    {
        KonfigurasiLogo::where('is_active', true)
            ->when($exceptId, fn($q) => $q->where('id', '!=', $exceptId))
            ->update(['is_active' => false]);
    }
}
