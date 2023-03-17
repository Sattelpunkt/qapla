<?php

namespace App\Einkauf\Article\Controller;


use App\Einkauf\Article\Service\BoughtService;
use Foundation\Bootstrap\FlashMessage;
use Foundation\Request\Router;

class BoughtController
{
    public function indexAction(array $params, array $cleanData): void
    {
        if (empty($params['id'])) {
            Router::go('');
        }
        $service = new BoughtService();
        if ($service->boughtArticle($params['id'])) {
            FlashMessage::add('success', 'Artikel wurden gekauft');
        } else {
            FlashMessage::add('danger', 'Es ist ein Fehler passiert');
        }

        Router::go('');
    }

    public function printAction($params, array $cleanData): void
    {
        $service = new BoughtService();
        $service->printBought();

    }


}