<?php

namespace App\Einkauf\Article\Service;

use App\Einkauf\Article\Repository\HomeRepository;
use Core\BaseService;

class PrintService extends BaseService
{
    public function printView() : void
    {
        $repository = new HomeRepository();
        $this->response->setContentTemplate(get_class($this), 'Print');
        $this->response->__set('article', $repository->getAll());
        $this->response->render();
    }
}