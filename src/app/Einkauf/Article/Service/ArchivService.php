<?php

namespace App\Einkauf\Article\Service;

use App\Einkauf\Article\Repository\ArchivRepository;

class ArchivService
{
    public function deleteArticle(int $id) : bool
    {
         $repository = new ArchivRepository();
         return $repository->toArchivByID($id);
    }
}