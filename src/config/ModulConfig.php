<?php

namespace Config;

class ModulConfig
{
    protected static array $config = [
        'test',
        'Einkauf/Category',
        'Einkauf/Shop',
        'Einkauf/Bundle',
    ];

    public static function getModule(): array
    {
        return self::$config ?? [];
    }

}