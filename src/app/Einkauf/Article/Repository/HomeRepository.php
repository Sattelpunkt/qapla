<?php

namespace App\Einkauf\Article\Repository;

use App\Einkauf\Article\Model\ArticleModel;
use Foundation\Database\Database;


class HomeRepository
{
    public function getAll(): array
    {
        $db = new Database('EinkaufArticle');
        $dbResult = $db->select(['EinkaufArticle.id', 'EinkaufArticle.anzahl', 'EinkaufArticle.name', 'EinkaufBundle.name as bundle', 'EinkaufCat.name as cat', 'EinkaufShop.name as shop'])
            ->join('EinkaufBundle', 'EinkaufArticle.bundle_id = EinkaufBundle.id')
            ->join('EinkaufShop', 'EinkaufArticle.shop_id = EinkaufShop.id')
            ->join('EinkaufCat', 'EinkaufArticle.cat_id = EinkaufCat.id')
            ->where('EinkaufArticle.type', '=', ':type')
            ->args([':type' => 0])
            ->run();
        if (array_key_exists(1, $dbResult)) {
            foreach ($dbResult as $article) {
                $result[] = new ArticleModel($article['id'], $article['anzahl'], $article['name'], $article['bundle'], $article['shop'], $article['cat']);
            }
        } elseif (empty($dbResult)) {
            return [];
        } else {
            $result[] = new ArticleModel($dbResult['id'], $dbResult['anzahl'], $dbResult['name'], $dbResult['bundle'], $dbResult['shop'], $dbResult['cat']);
        }
        return $result;
    }
}

