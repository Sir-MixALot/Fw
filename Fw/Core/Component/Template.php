<?php

namespace Fw\Core\Component;

use Fw\Core\Page;

class Template
{
    public $__component;
    public string $__path;
    public string $__relativePath;
    public string $id;
    
    public function __construct($templateId, $componentObj){
        $this->__component = $componentObj;
        $this->id = ucfirst($templateId);
        $this->__path = $this->__component->__path . '/Templates/' . $this->id . '/';
        $this->__relativePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', $this->__path);
    }

    public function render($page = 'template')
    {
        $result = $this->__component->result;

        $component = Page::getInstance();

        if(file_exists($this->__path . 'result_modifier.php')){
            include $this->__path . 'result_modifier.php';
        }

        if(file_exists($this->__path.$page . '.php')){
            include $this->__path.$page . '.php';
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