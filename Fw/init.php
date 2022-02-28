<?php

use Fw\Core\Application;
use Fw\Core\Validator;

define("FW_CORE_INCLUDED", true);

spl_autoload_register(function($class) {
    $classPath = $_SERVER['DOCUMENT_ROOT'] . '/' . str_replace('\\', '/', $class) . '.php';

    if (file_exists($classPath)) {  
        require $classPath;
    }
});

session_start();

$app = Application::getInstance();