<?php

namespace App\Einkauf\Article\Repository;

use Foundation\Database\Database;

class ArchivRepository
{
    public function toArchivByID(int $id): bool
    {
        $db = new Database('EinkaufArticle');
        return $db->update(['type'])
            ->where("id", "=", ":id")
            ->args([':id' => $id, ':type' => 2])
            ->run();
    }
}