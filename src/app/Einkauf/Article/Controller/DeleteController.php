<?php

namespace App\Einkauf\Article\Controller;


use App\Einkauf\Article\Service\DeleteService;
use Foundation\Bootstrap\FlashMessage;
use Foundation\Request\Router;

class DeleteController
{
    public function indexAction(array $params, array $cleanData): void
    {
        if (empty($params['id'])) {
            Router::go('');
        }
        $serivce = new DeleteService();
        if ($serivce->deleteArticle($params['id'])) {
            FlashMessage::add('success', 'Artikel wurden gelöscht');
        } else {
            FlashMessage::add('danger', 'Es ist ein Fehler passiert');
        }

        Router::go('');
    }


}