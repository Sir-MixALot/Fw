<?php 

namespace Fw\Core;

class Config
{

    public static function getConfig(string $path)
    {
        $config = require_once('../config.php');
        $arrPath = explode('/', $path);
        
    }   
}
