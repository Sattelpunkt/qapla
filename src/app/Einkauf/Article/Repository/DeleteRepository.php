<?php

namespace App\Einkauf\Article\Repository;

use Foundation\Database\Database;

class DeleteRepository
{
    public function deleteByID(int $id): bool
    {
        $db = new Database('EinkaufArticle');
        return $db->delete()->where("id", "=", ":id")->args([':id' => $id])->run();
    }
}