<?php

namespace App\Einkauf\Shop\Repository;

use App\Einkauf\Article\Model\ArticleModel;
use Foundation\Database\Database;
use Foundation\Utils\D;

class DetailRepository
{

    public function getAllArticleByCatID(int $id): array
    {
        $db = new Database('EinkaufArticle');
        $dbResult = $db->select(
            ['EinkaufArticle.id', 'EinkaufArticle.anzahl', 'EinkaufArticle.name',
                'EinkaufBundle.name as bundle', 'EinkaufCat.name as cat',
                'EinkaufShop.name as shop', 'IFNULL(EinkaufShopCatSort.position, 99) AS position'])
            ->leftJoin('EinkaufBundle', 'EinkaufArticle.bundle_id = EinkaufBundle.id')
            ->leftJoin('EinkaufShop', 'EinkaufArticle.shop_id = EinkaufShop.id')
            ->leftJoin('EinkaufCat', 'EinkaufArticle.cat_id = EinkaufCat.id')
            ->leftJoin('EinkaufShopCatSort', 'EinkaufArticle.cat_id = EinkaufShopCatSort.cat_id')
            ->where('type', '=', ':type')
            ->addToQuery('AND EinkaufArticle.shop_id = :shopID')
            ->addToQuery('AND EinkaufShopCatSort.cat_id = EinkaufShopCatSort.cat_id')
            ->orderBy('position')
            ->args([':type' => 0, ':shopID' => $id])
            ->run();
        if (empty($dbResult)) {
            $dbResult = $db->select(['EinkaufArticle.id', 'EinkaufArticle.anzahl', 'EinkaufArticle.name', 'EinkaufBundle.name as bundle', 'EinkaufCat.name as cat', 'EinkaufShop.name as shop'])
                ->join('EinkaufBundle', 'EinkaufArticle.bundle_id = EinkaufBundle.id')
                ->join('EinkaufShop', 'EinkaufArticle.shop_id = EinkaufShop.id')
                ->join('EinkaufCat', 'EinkaufArticle.cat_id = EinkaufCat.id')
                ->where('type', '=', ':type')
                ->addToQuery('AND EinkaufArticle.shop_id = :shopID')
                ->args([':type' => 0, ':shopID' => $id])
                ->run();
        }

        if (array_key_exists(1, $dbResult)) {
            // D::dnd($dbResult);
            foreach ($dbResult as $article) {
                $result[] = new ArticleModel($article['id'], $article['anzahl'], $article['name'], $article['bundle'], $article['shop'], $article['cat']);
            }
        } elseif (!empty($dbResult)) {
            $result[] = new ArticleModel($dbResult['id'], $dbResult['anzahl'], $dbResult['name'], $dbResult['bundle'], $dbResult['shop'], $dbResult['cat']);
        } else {
            $result = [];
        }
        return $result;

    }
}