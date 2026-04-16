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
}
