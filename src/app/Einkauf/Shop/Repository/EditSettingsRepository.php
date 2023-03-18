<?php

namespace App\Einkauf\Shop\Repository;

use App\Einkauf\Shop\Model\ShopModel;
use App\Einkauf\Shop\Model\SortCatModel;
use Foundation\Database\Database;
use Foundation\Utils\D;

class EditSettingsRepository
{
    public function getShopByID($id): array
    {
        $db = new Database('EinkaufShop');
        $dbResult = $db->select()->where("id", "=", ":id")->args([':id' => $id])->run();
        $result[] = new ShopModel($dbResult['id'], $dbResult['name']);
        return $result;
    }

    public function updateCatByID(int $id, string $name): bool
    {
        $db = new Database('EinkaufShop');
        return $db->update(['name'])->where("id", "=", ":id")->args([':name' => $name, ':id' => $id])->run();
    }

    public function getSortCatByShopID(int $id): array
    {

        $db = new Database('EinkaufCat');
        $dbResult = $db->select(['EinkaufCat.id', 'EinkaufCat.name', 'IFNULL(EinkaufShopCatSort.position, 99) AS position'])
            ->leftJoin('EinkaufShopCatSort', 'EinkaufCat.id = EinkaufShopCatSort.cat_id')
            ->addToQuery('AND EinkaufShopCatSort.cat_id AND EinkaufShopCatSort.shop_id = :shopID')
            ->orderBy('Position')
            ->args([':shopID' => $id])
            ->run();
        if (array_key_exists(1, $dbResult)) {
            foreach ($dbResult as $cat) {
                $result[] = new SortCatModel($cat['id'], $cat['name'], $cat['position']);
            }
        } elseif (!empty($dbResult)) {
            $result[] = new SortCatModel($dbResult['id'], $dbResult['name'], $dbResult['position']);
        } else {
            $result = [];
        }
        return $result;
    }
}
