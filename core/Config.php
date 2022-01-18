<?php 

namespace core;

class Config
{
    public static function getConfig()
    {
        $config = require_once('../config.php');
    }   
}