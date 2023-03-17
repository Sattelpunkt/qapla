<?php

namespace App\Einkauf\Article\Controller;

use App\Einkauf\Article\Service\EditService;
use Foundation\Bootstrap\FlashMessage;
use Foundation\Request\Router;
use Foundation\Utils\D;

class EditController
{
    public function indexAction(array $params, array $cleanData): void
    {
        if (empty($params['id'])) {
            Router::go('');
        }
        $service = new EditService();
        $service->printEdit($params['id']);

    }

    public function updateAction(array $params, array $cleanData): void
    {
        if (empty($params['id'])) {
            Router::go('');
        }
        $service = new EditService();
        if ($service->updateArticle($params['id'], $cleanData['post'])) {
            FlashMessage::add('success', 'Artikel wurden bearbeitet');
        } else {
            FlashMessage::add('danger', 'Es ist ein Fehler passiert');
        }
        Router::go('');

    }

}