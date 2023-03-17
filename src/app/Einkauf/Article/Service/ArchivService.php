<?php

namespace App\Einkauf\Article\Service;

use App\Einkauf\Article\Repository\ArchivRepository;
use Core\BaseService;

class ArchivService extends BaseService
{
    public function archivArticle(int $id) : bool
    {
         $repository = new ArchivRepository();
         return $repository->toArchivByID($id);
    }

    public function printArchiv()
    {
        $repository = new ArchivRepository();
        $this->response->setContentTemplate(get_class($this), 'Archiv');
        $this->response->__set('article', $repository->getAll());
        $this->response->render();
    }

    public function deleteAll() : bool
    {
        $repository = new ArchivRepository();
        return $repository->deleteAll();
    }
}