<?php

namespace App\Einkauf\Category\Service;

use App\Einkauf\Category\Repository\DetailRepository;
use Core\BaseService;

class DetailService extends BaseService
{
    public function printDetail($id)
    {
        $repository = new DetailRepository();
        $this->response->setContentTemplate(get_class($this),'Detail');
        $this->response->__set('article', $repository->getAllArticleByCatID($id));
        $this->response->render();
    }
}