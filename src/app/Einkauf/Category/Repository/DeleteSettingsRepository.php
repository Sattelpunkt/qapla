<?php

namespace App\Einkauf\Category\Repository;

use Foundation\Database\Database;

class DeleteSettingsRepository
{

    public function deleteById($id): bool
    {
        $db = new Database('EinkaufArticle');
        $db->update(['cat_id'])->where("cat_id", "=", ":id")->args([':cat_id' => 1, ':id' => $id])->run();
        $db = new Database('EinkaufCat');
        return $db->delete()->where("id", "=", ":id")->args([':id' => $id])->run();

    }
}