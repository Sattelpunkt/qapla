<?php

namespace App\Test\Controller;

use App\Test\Service\HomeService;
use Foundation\Bootstrap\FlashMessage;

class HomeController
{
    public function penisAction(array $params, array $cleanData): void
    {
        echo "Hallo aus der Get";
    }

    public function indexAction(array $params, array $cleanData): void
    {
        //FlashMessage::add('danger', 'Keven ist der Beste');
        $service = new HomeService();
        $service->printTestTemplate();
    }
}