<?php

use core\Application;

spl_autoload_register(function($class){
    $path = str_replace('\\', '/', $class.'.php');
    if(file_exists($path)){
        require $path;
    }
});

session_start();

// $new['1'] = Application::getInstance();
// $new['1']->getTest('hiu123');
// $new['2'] = Application::getInstance();
// echo '<pre>' . print_r($new, true) . '</pre>';