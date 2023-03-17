<?php

namespace App\Einkauf\Article\Controller;


use App\Einkauf\Article\Service\ArchivService;
use Foundation\Bootstrap\FlashMessage;
use Foundation\Request\Router;
use Foundation\Utils\D;

class ArchivController
{
    public function indexAction(array $params, array $cleanData): void
    {
        if (empty($params['id'])) {
            Router::go('');
        }
        $service = new ArchivService();
        if ($service->archivArticle($params['id'])) {
            FlashMessage::add('success', 'Artikel wurden ins Archiv verschoben');
        } else {
            FlashMessage::add('danger', 'Es ist ein Fehler passiert');
        }
        if (!empty($params['callback'])) {
            $params['callback'] = str_replace('--', '/', $params['callback']);
            Router::go($params['callback']);
        } else {
            Router::go('');
        }
    }

    public function printAction($params, array $cleanData): void
    {
        $service = new ArchivService();
        $service->printArchiv();
    }

    public function deleteAllAction($params, array $cleanData): void
    {
        $service = new ArchivService();
        if ($service->deleteAll()) {
            FlashMessage::add('success', 'Archiv wurde gelöscht');
        } else {
            FlashMessage::add('danger', 'Es ist ein Fehler passiert');
        }
        Router::go('article/archiv');
    }


}