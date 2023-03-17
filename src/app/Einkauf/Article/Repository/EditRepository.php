<?php

namespace App\Einkauf\Article\Repository;

use App\Einkauf\Article\Model\ArticleModel;
use Foundation\Database\Database;
use Foundation\Utils\D;


class EditRepository
{
    public function getArticleByID($id): array
    {
        $db = new Database('EinkaufArticle');
        $dbResult = $db->select(['EinkaufArticle.id', 'EinkaufArticle.anzahl', 'EinkaufArticle.name', 'EinkaufBundle.name as bundle', 'EinkaufBundle.id as bundleID', 'EinkaufCat.name as cat' ,'EinkaufCat.id as catID', 'EinkaufShop.name as shop', 'EinkaufShop.id as shopID'])
            ->join('EinkaufBundle', 'EinkaufArticle.bundle_id = EinkaufBundle.id')
            ->join('EinkaufShop', 'EinkaufArticle.shop_id = EinkaufShop.id')
            ->join('EinkaufCat', 'EinkaufArticle.cat_id = EinkaufCat.id')
            ->where('EinkaufArticle.id', '=' , ':id')
            ->args([':id' => $id])
            ->run();

            $result[] = new ArticleModel($dbResult['id'], $dbResult['anzahl'], $dbResult['name'], $dbResult['bundle'], $dbResult['shop'], $dbResult['cat'], $dbResult['catID'], $dbResult['bundleID'], $dbResult['shopID']);

        return $result;
    }

    public function UpdateArticleByID(int $id, array $data) : bool
    {
        $db = new Database('EinkaufArticle');
        return $db->update(['anzahl', 'name', 'bundle_id', 'cat_id', 'shop_id'])
            ->where("id" , "=", ":id")
            ->args([
                ':anzahl' => intval($data['anzahl']),
                ':name' => $data['name'],
                ':bundle_id' => intval($data['bundle']),
                ':cat_id' => intval($data['cat']),
                ':shop_id' => intval($data['shop']),
                ':id' => $id
            ])
            ->run();
    }
}

