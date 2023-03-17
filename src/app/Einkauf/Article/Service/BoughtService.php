<?php

namespace App\Einkauf\Article\Service;

use App\Einkauf\Article\Repository\BoughtRepository;

class BoughtService
{
    public function boughtArticle(int $id) : bool
    {
        $repository = new BoughtRepository();
        return $repository->toBoughtByID($id);
    }
}