<?php

namespace App\Einkauf\Article\Controller;


use App\Einkauf\Article\Service\ArchivService;
use Foundation\Bootstrap\FlashMessage;
use Foundation\Request\Router;

class ArchivController
{
    public function indexAction(array $params, array $cleanData): void
    {
        if (empty($params['id'])) {
            Router::go('');
        }
        $serivce = new ArchivService();
        if ($serivce->archivArticle($params['id'])) {
            FlashMessage::add('success', 'Artikel wurden ins Archiv verschoben');
        } else {
            FlashMessage::add('danger', 'Es ist ein Fehler passiert');
        }

        Router::go('');
    }


}