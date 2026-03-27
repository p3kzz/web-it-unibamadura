<?php

namespace App\Services\Pages\Layanan\KatalogLayanan;

use App\Services\Admin\Layanan\KatalogLayanan\KatalogLayananQueryService;
use Illuminate\Database\Eloquent\Collection;

class KatalogLayananPageQuery
{
    public function __construct(
        private KatalogLayananQueryService $queryService
    ) {}

    public function getGroupedByCategory(): Collection
    {
        return $this->queryService->getGroupedByCategory();
    }

    public function getActive(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->queryService->getActive();
    }
}

