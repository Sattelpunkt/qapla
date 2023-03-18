<?php

namespace App\Einkauf\Shop\Service;
use App\Einkauf\Shop\Repository\DetailRepository;

use Core\BaseService;
use Foundation\Utils\D;

class DetailService extends BaseService
{
    public function printDetail(int $id) : void
    {
        $repository = new DetailRepository();
        $this->response->setContentTemplate(get_class($this),'Detail');
        $this->response->__set('article', $repository->getAllArticleByCatID($id));
        //$result = $repository->getAllArticleByCatID($id);

        //D::dnd($result);
        $this->response->render();
    }
}