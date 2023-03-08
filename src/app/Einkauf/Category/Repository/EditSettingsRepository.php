<?php

namespace App\Einkauf\Category\Repository;

use App\Einkauf\Category\Model\CategoryModel;
use Foundation\Database\Database;
use Foundation\Utils\D;

class EditSettingsRepository
{
    public function getCatByID($id): array
    {
        $db = new Database('EinkaufCat');
        $dbResult = $db->select()->where("id", "=",":id")->args([':id' => $id])->run();
        $result[] = new CategoryModel($dbResult['id'], $dbResult['name']);
        return $result;
    }

    public function updateCatByID($id, $name): bool
    {
        $db = new Database('EinkaufCat');
        return $db->update(['name'])->where("id", "=", ":id")->args([':name' => $name, ':id' => $id ])->run();
        //return ($this->db->run('UPDATE `EinkaufCat` SET `name` = :name WHERE `id` = :id', [':name' => $name, ':id' => $id]));
    }

}