<?php

namespace Fw\Core\Component;

use Fw\Core\Page;
use Fw\Core\Application;

class Template
{
    public string $__path;
    public string $__relativePath;
    public string $id;
    public $component;
    
    public function __construct($templateId, $componentPath, $componentObj){
        $app = Application::getInstance();
        $this->component = $componentObj;
        $this->id = ucfirst($templateId);
        $this->__path = $app->getServer()->container['DOCUMENT_ROOT'] . $componentPath . '/Templates/' . $this->id . '/';
        $this->__relativePath = $componentPath . '/Templates/' . $this->id . '/';
    }

    public function render($page = 'template')
    {
        $result = $this->component->result;

        $component = Page::getInstance();

        if(file_exists($this->__path . 'result_modifier.php')){
            include $this->__path . 'result_modifier.php';
        }

        if(file_exists($this->__path . $page . '.php')){
            include $this->__path . $page . '.php';
        }

        if(file_exists($this->__path . 'component_epilog.php')){
            include $this->__path . 'component_epilog.php';
        }

        if(file_exists($this->__path . 'script.js')){
            $component->addJs($this->__relativePath . 'script.js');
        }

        if(file_exists($this->__path . 'style.css')){
            $component->addCss($this->__relativePath . 'style.css');
        }
    }
}