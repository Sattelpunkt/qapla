<?php

namespace Config;

class DatabaseConfig
{
    private static array $config = [
        'Host' => 'ddev-qapla-db:3306',
        'User' => 'root',
        'Password' => 'root',
        'Name' => 'whitelist'
    ];

    public static function get($name): string|int
    {
        return array_key_exists($name, static::$config) ? static::$config[$name] : "";
    }

}