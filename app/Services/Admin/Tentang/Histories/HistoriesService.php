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

            if (empty($data['order'])) {
                $data['order'] = Histories::where('type', $data['type'])->max('order') + 1;
            }

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

    public function swapOrder(int $orderA, int $orderB): void
    {
        DB::transaction(function () use ($orderA, $orderB) {

            $a = Histories::where('order', $orderA)->firstOrFail();
            $b = Histories::where('order', $orderB)->firstOrFail();

            $a->update(['order' => 999]);
            $b->update(['order' => $orderA]);
            $a->update(['order' => $orderB]);
        });
    }
}
