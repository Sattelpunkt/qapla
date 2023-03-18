<?php

namespace App\Einkauf\Article\Controller;

use App\Einkauf\Article\Service\PrintService;

class PrintController
{

    public function indexAction(array $params, array $cleanData): void
    {
        $service = new PrintService();
        $service->printView();
    }

}