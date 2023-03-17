<?php

namespace App\Einkauf\Article\Repository;

use Foundation\Database\Database;

class BoughtRepository
{
    public function toBoughtByID(int $id): bool
    {
        $db = new Database('EinkaufArticle');
        return $db->update(['type'])
            ->where("id", "=", ":id")
            ->args([':id' => $id, ':type' => 1])
            ->run();
    }
}