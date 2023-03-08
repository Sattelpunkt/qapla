<?php

namespace App\Einkauf\Category\Controller;

use App\Einkauf\Category\Service\MainSettingsService;

class MainSettingsController
{

    public function indexAction(array $params, array $cleanData): void
    {
        $service = new MainSettingsService();
        $service->printMainSettings();
    }
}