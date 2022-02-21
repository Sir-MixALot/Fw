<?php

namespace Fw\Components\Interfaces\Form\MultipleTextElement;

use Fw\Core\Component\Base;
use Fw\Core\Application;

class MultipleTextElement extends Base
{

    public $namespace;

    public function __construct($namespace, $componentId, $templateId, $params){
        $this->namespace = $namespace;
        parent::__construct($namespace, $componentId, $templateId, $params);
    }

    public function executeComponent()
    {
        foreach($this->params as $name=>$param){
            if($name != 'fields'){
                $this->result['element'][$name] = $param;
            }else{
                foreach($param as $elements){
                    $this->result['fields'][] = $elements;
                }
            }
        }

        $app = Application::getInstance();

        ob_start();

        foreach($this->result['fields'] as $elementProperties){
            $app->includeComponent($this->namespace . ':' . ucfirst($elementProperties['type']) . 'Element', 'default', $elementProperties);
        }

        $this->result['out'] = ob_get_contents();

        ob_clean();

        $this->template->render();

        ob_end_flush();
    }
}