<?php

namespace App\Test\Controller;

use App\Test\Service\HomeService;

class HomeController
{
    public function penisAction(array $params, array $cleanData): void
    {
        echo "Hallo aus der Get";
    }

    public function indexAction(array $params, array $cleanData): void
    {
        $service = new HomeService();
        $service->printTestTemplate();
    }
}