<?php

namespace App\Einkauf\Shop\Controller;


use App\Einkauf\Shop\Service\DetailService;
use Foundation\Request\Router;

class DetailController
{
    public function indexAction(array $params, array $cleanData): void
    {
        if(empty($params['id'])) {
            Router::go('cat/detail/1');
        }
        $service = new DetailService();
        $service->printDetail($params['id']);
    }
}