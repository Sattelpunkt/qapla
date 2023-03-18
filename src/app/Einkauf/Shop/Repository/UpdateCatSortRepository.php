<?php

namespace App\Einkauf\Shop\Repository;

use Foundation\Database\Database;
use Foundation\Utils\D;

class UpdateCatSortRepository
{


    public function updateOrInsertCatSort($catID, $catPosition, $shopID): bool
    {
        /*
        echo $catPosition;
        echo "<br />";
        echo $catID;
        echo "<br />";
        echo $shopID;
        echo "<br />";
        */

        $db = new Database('EinkaufShopCatSort');

        $dbResult = $db->select()
            ->where('cat_id', '=', ':catID')
            ->addToQuery("AND shop_id = :shopID")
            ->args([
                ':shopID' => $shopID,
                ':catID' => $catID,
            ])->run();
        // D::dnd($dbResult);

        if (!empty($dbResult['position'])) {
            if ($dbResult['position'] == $catPosition) {
                return true;
            }
            $dbUpdate = new Database('EinkaufShopCatSort');
            $result = $dbUpdate->update(['position'])
                ->where('cat_id', '=', ':catID')
                ->addToQuery("AND `shop_id` = :shopID")
                ->args([
                    ':shopID' => $shopID,
                    ':catID' => $catID,
                    ':position' => $catPosition
                ])->run();
        } else {
            $dbInsert = new Database('EinkaufShopCatSort');
            $result = $dbInsert->insert(['shop_id', 'cat_id', 'position'])->args([
                ':shop_id' => $shopID,
                ':cat_id' => $catID,
                ':position' => $catPosition
            ])->run();
        }
        return $result;
    }


}
