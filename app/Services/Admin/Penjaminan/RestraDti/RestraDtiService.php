<?php

namespace App\Services\Admin\Penjaminan\RestraDti;

use App\Models\RestraDti;
use Illuminate\Support\Facades\Storage;

class RestraDtiService
{
    /**
     * Create a new class instance.
     */
    public function store(array $data): RestraDti
    {
        if (!empty($data['file'])) {
            $data['file'] = $data['file']->store('restra-dti', 'public');
        }

        return RestraDti::create($data);
    }

    public function update(RestraDti $restra_dti, array $data): RestraDti
    {
        if (isset($data['file'])) {
            if ($restra_dti->file && Storage::disk('public')->exists($restra_dti->file)) {
                Storage::disk('public')->delete($restra_dti->file);
            }
            $data['file'] = $data['file']->store('restra-dti', 'public');
        }

        $restra_dti->update($data);

        return $restra_dti->refresh();
    }

    public function delete(RestraDti $restra_dti): void
    {
        if ($restra_dti->file && Storage::disk('public')->exists($restra_dti->file)) {
            Storage::disk('public')->delete($restra_dti->file);
        }

        $restra_dti->delete();
    }
}
