<?php

namespace Foundation\Database;

use Config\DatabaseConfig;
use PDO;
use PDOException;

class Database
{

    private $dsn, $user, $pass;
    private static $db = null;
    private $dbh,  $stmt;
    private $options = [
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];


    private function __construct()
    {
        $this->dsn = "mysql:host=" . DatabaseConfig::get('Host'). ";dbname=" .DatabaseConfig::get('Name');
        $this->user = DatabaseConfig::get('User');
        $this->pass = DatabaseConfig::get('Password');


        try {
            $this->dbh = new PDO($this->dsn, $this->user, $this->pass, $this->options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }

    }

    public static function getInstance(): ?Database
    {
        if (self::$db == null) {
            self::$db = new self();
        }
        return self::$db;
    }



    public function __destruct()
    {
        $db = null;
        $dbh = null;
    }

    public function run($sql, $args = null, $fetch = null)
    {
        if (!$args) {
            return $this->dbh->query($sql);
        }
        $stmt = $this->dbh->prepare($sql);
        if($fetch == null) {
            return $stmt->execute($args);
        } else {
            $stmt->execute($args);
            return $this->$fetch($stmt);
        }

    }

    public function row($stmt)
    {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function col($stmt)
    {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getLastInsertID()
    {
        return $this->dbh->lastInsertId();
    }
}
