<?php

namespace App\Home\Controller;

class HomeController
{
    public function getAction(array $params, array $cleanData): void
    {
        echo "Hallo aus der Get";
    }

    public function indexAction(array $params, array $cleanData): void
    {
        echo "Hallo aus der index";
    }
}