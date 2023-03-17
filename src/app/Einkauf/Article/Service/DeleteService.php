<?php

namespace App\Einkauf\Article\Service;

use App\Einkauf\Article\Repository\DeleteRepository;

class DeleteService
{
    public function deleteArticle(int $id) : bool
    {
         $repository = new DeleteRepository();
         return $repository->deleteByID($id);
    }
}