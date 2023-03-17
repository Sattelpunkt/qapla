<?php

namespace App\Einkauf\Shop\Repository;

use App\Einkauf\Shop\Model\ShopModel;
use Foundation\Database\Database;
use Foundation\Utils\D;

class MainSettingsRepository
{
    public function getAll(): array
    {
        $db = new Database('EinkaufShop');
        $dbResult = $db->select()->run();
        $result = [];
        if (array_key_exists(1, $dbResult)) {
            foreach ($dbResult as $value) {
                $result[] = new ShopModel($value['id'], $value['name']);
            }
        }  else {
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