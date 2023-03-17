<?php

namespace App\Einkauf\Bundle\Repository;
use Foundation\Database\Database;

class DeleteSettingsRepository
{

    public function deleteById($id): bool
    {
        $db = new Database('EinkaufArticle');
        if ($db->update(['bundle_id'])->where("bundle_id", "=", ":id")->args([':bundle_id' => 1, ':id' => $id])->run()) {
        $db = new Database('EinkaufBundle');
        return $db->delete()->where("id", "=",":id")->args([':id' => $id])->run();
        } else {
            return false;
        }
    }
}