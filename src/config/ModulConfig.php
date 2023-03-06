<?php

namespace Config;



class ModulConfig
{
    protected static array $config = [
        'Home',

    ];

    public static function getModule(): array
    {
        return self::$config ?? [];
    }

}