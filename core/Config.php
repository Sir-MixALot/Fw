<?php 

namespace core;


class Config
{

    public static function getConfig(string $path)
    {
        $config = require_once('../config.php');
        $arrPath = explode('/', $path);
        // echo $config[$arrPath[0]][$arrPath[1]];
        
    }   
}

Config::getConfig('db/host');