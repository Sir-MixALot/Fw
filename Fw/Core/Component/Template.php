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
    public $cssPath;
    public $jsPath;
    
    public function __construct($templateId, $componentPath, $componentObj)
    {
        $app = Application::getInstance();

        $this->component = $componentObj;
        $this->id = ucfirst($templateId);
        $this->__path = $app->getServer()->container['DOCUMENT_ROOT'] . $componentPath . '/Templates/' . $this->id . '/';
        $this->__relativePath = $componentPath . '/Templates/' . $this->id . '/';
    }

    public function render($page = 'template')
    {
        $result = $this->component->result;

        $this->cssPath = glob($this->__path . '*.css');
        $this->jsPath = glob($this->__path . '*.js');

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

        if(!empty($this->jsPath)){
            $this->jsPath = explode('/', $this->jsPath[0]);

            if(file_exists($this->__path . end($this->jsPath))){
                $component->addJs($this->__relativePath . end($this->jsPath));
            }
        }

        if(!empty($this->cssPath)){
            $this->cssPath = explode('/', $this->cssPath[0]);

            if(file_exists($this->__path . end($this->cssPath))){
                $component->addCss($this->__relativePath . end($this->cssPath));
            }
        }
        
    }
}