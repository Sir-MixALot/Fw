<?php

use Fw\core\Application;

spl_autoload_register(function($class){
    $path = str_replace('\\', '/', $class.'.php');
    if(file_exists($path)){
        require $path;
    }
});

session_start();