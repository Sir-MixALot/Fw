<?php

use Fw\Core\Application;

spl_autoload_register(function($class) {
    $classPieces = explode('\\', $class);
    $path = '/'.$classPieces[0].'/';

    for($i = 1; $i < count($classPieces) - 1; $i++){
        $path .= lcfirst($classPieces[$i]) . '/';
    }

    $path .= end($classPieces) . '.php';
    $DIR = $_SERVER['DOCUMENT_ROOT'];

    if (file_exists($DIR . $path)) {  
        require $DIR . $path;
    }
});

session_start();
