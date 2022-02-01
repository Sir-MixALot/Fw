<?php

namespace Fw\Core;

define('CONFIG', require_once('config.php'));

class Config
{

    public static function getConfig(string $path)
    {
        $arrPath = explode('/', $path);
        return CONFIG[$arrPath[0]][$arrPath[1]];
    }
}
