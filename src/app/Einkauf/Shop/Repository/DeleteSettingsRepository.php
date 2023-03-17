<?php

namespace App\Einkauf\Shop\Repository;

use Foundation\Database\Database;

class DeleteSettingsRepository
{

    public function deleteById($id): bool
    {
        $db = new Database('EinkaufArticle');
        $db->update(['shop_id'])->where("shop_id", "=", ":id")->args([':shop_id' => 1, ':id' => $id])->run();
        $db = new Database('EinkaufShop');
        return $db->delete()->where("id", "=", ":id")->args([':id' => $id])->run();

    }
}