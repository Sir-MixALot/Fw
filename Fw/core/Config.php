<?php 

namespace Fw\Core;

use Fw\Core\Application;
class Config
{

    public static function getConfig(string $path)
    {
        $config = require_once('../config.php');
        $arrPath = explode('/', $path);
        
    }   
}

Config::getConfig('db/host');