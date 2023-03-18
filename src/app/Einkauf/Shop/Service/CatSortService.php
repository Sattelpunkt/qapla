<?php

namespace App\Einkauf\Shop\Service;

use App\Einkauf\Shop\Repository\UpdateCatSortRepository;
use Foundation\Utils\D;

class CatSortService
{
    public function updateCatSort(array $catData, int $id): bool
    {
        $i = 0;
        $repository = new UpdateCatSortRepository();
        foreach ($catData['catID'] as $catID) {
            if (!$repository->updateOrInsertCatSort($catID, $catData['postion'][$i], $id)) {
                return false;
            }
            $i++;
        }
        return true;
    }
}