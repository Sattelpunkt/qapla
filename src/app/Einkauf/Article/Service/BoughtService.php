<?php

namespace App\Einkauf\Article\Service;

use App\Einkauf\Article\Repository\BoughtRepository;
use Core\BaseService;

class BoughtService extends BaseService
{
    public function boughtArticle(int $id): bool
    {
        $repository = new BoughtRepository();
        return $repository->toBoughtByID($id);
    }

    public function printBought(): void
    {
        $repository = new BoughtRepository();
        $this->response->setContentTemplate(get_class($this), 'Bought');
        $this->response->__set('article', $repository->getAll());
        $this->response->render();
    }

    public function allToArchiv(): bool
    {
        $repository = new BoughtRepository();
        return $repository->allToArchiv();
    }

}