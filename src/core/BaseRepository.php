<?php

namespace Core;

use Foundation\Database\Database;

class BaseRepository {
    protected Database $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

}