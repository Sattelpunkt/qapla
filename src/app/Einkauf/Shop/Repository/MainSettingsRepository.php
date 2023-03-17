<?php

namespace App\Einkauf\Shop\Repository;

use App\Einkauf\Shop\Model\ShopModel;
use Foundation\Database\Database;

class MainSettingsRepository
{
    public function getAll(): array
    {
        $db = new Database('EinkaufShop');
        $dbresult = $db->select()->run();
        if (array_key_exists(1, $dbresult)) {
            foreach ($dbresult as $value) {
                $result[] = new ShopModel($value['id'], $value['name']);
            }
        } elseif (empty($dbResult)) {
            $result = [];
        } else {
            $result[] = new ShopModel($dbResult['id'], $dbResult['name']);
        }
        return $result;
    }

    public function newShop($name): bool
    {
        $db = new Database('EinkaufShop');
        $args = [':name' => $name];
        return $db->insert(['name'])->args($args)->run();
    }
}