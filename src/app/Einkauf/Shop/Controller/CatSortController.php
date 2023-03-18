<?php

namespace App\Einkauf\Shop\Controller;

use App\Einkauf\Shop\Service\CatSortService;
use Foundation\Bootstrap\FlashMessage;
use Foundation\Request\Router;
use Foundation\Utils\D;

class CatSortController
{
    public function indexAction(array $params, array $cleanData): void
    {
        $catData = $cleanData['post'];
        $shopID = $params['id'];
        $service = new CatSortService();
        if ($service->updateCatSort($cleanData['post'], $shopID)) {
            FlashMessage::add('success', 'Reihenfolge wurde festgelegt');
        } else {
            FlashMessage::add('danger', 'Es ist ein Fehler passiert');
        }
        Router::go("shop/settings/edit/$shopID");
    }
}