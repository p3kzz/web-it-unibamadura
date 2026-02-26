<?php

namespace App\Services\Admin\Tentang\Histories;

use App\Models\Histories;
use Illuminate\Support\Facades\DB;

class HistoriesService
{
    /**
     * Create a new class instance.
     */
    public function store(array $data): Histories
    {
        return DB::transaction(function () use ($data) {
            return Histories::create($data);
        });
    }

    public function update(Histories $history, array $data): Histories
    {
        return DB::transaction(function () use ($history, $data) {

            $history->update($data);

            return $history->refresh();
        });
    }

    public function delete(Histories $history): void
    {
        DB::transaction(function () use ($history) {
            $history->delete();
        });
    }

}
