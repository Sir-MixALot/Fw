<?php

namespace Fw\Core;

define('CONFIG', require_once('Fw/config.php'));

class Config
{

    public static function getConfig(string $path)
    {
        $arrPath = explode('/', $path);
        $config = CONFIG;
        foreach($arrPath as $pathPiece){
            $config = $config[$pathPiece];
        }
        return $config;
    }
}
