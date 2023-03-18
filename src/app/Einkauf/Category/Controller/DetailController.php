<?php

namespace App\Einkauf\Category\Controller;


use App\Einkauf\Category\Service\DetailService;
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

