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
$validate = new Validator(
    'chain',
    true,
    [
        new Validator('minLength', 5),
        new Validator('upperCase'),
        new Validator('regexp', '/^&#91;A-Za-z0-9&#93;{0,}$/'),
        new Validator('in', [1,2,'REGEX',4]),
        new Validator('email')
    ]
);