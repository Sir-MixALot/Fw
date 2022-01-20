<?php

namespace Fw\Core;

class Application
{

    private $__components = [];
    private $pager = null;
    private $template = null;
    private static $instance = null;

    private function __construct()
    {
        //
    }

    private function __clone()
    {
        //
    }

    private function __wakeup()
    {
        //
    }

    public static function getInstance()
    {
        return static::$instance ?? (static::$instance = new static());
    }

}