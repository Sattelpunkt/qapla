<?php

namespace App\Einkauf\Category\Repository;

use App\Einkauf\Category\Model\CategoryModel;
use Core\BaseRepository;
use Foundation\Utils\D;

class MainSettingsRepository extends BaseRepository
{

    public  function getAll() : array
    {
        $dbResult =  $this->db->row($this->db->run('SELECT * FROM `EinkaufCat`'));
        $result = [];
        foreach ($dbResult as $value) {
            $result[] = new CategoryModel($value['id'],$value['name']);
        }

        return $result;
    }
}