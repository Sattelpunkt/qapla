<?php

namespace Config;



class ModulConfig
{
    protected static array $config = [
        'test',
        'Einkauf/Category',

    ];

    public static function getModule(): array
    {
        return self::$config ?? [];
    }

}