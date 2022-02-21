<?php

namespace Fw\Components\Interfaces\Form\MultipleCheckboxElement;

use Fw\Core\Component\Base;
use Fw\Core\Application;

class MultipleCheckboxElement extends Base
{
    public $namespace;

    public function __construct($namespace, $componentId, $templateId, $params){
        $this->namespace = $namespace;
        parent::__construct($namespace, $componentId, $templateId, $params);
    }

    public function executeComponent()
    {
        foreach($this->params as $name=>$param){
            if($name != 'boxes'){
                $this->result['element'][$name] = $param;
            }else{
                foreach($param as $elements){
                    $this->result['boxes'][] = $elements;
                }
            }
        }

        $app = Application::getInstance();

        ob_start();

        foreach($this->result['boxes'] as $elementProperties){
            $app->includeComponent($this->namespace . ':' . ucfirst($elementProperties['type']) . 'Element', 'default', $elementProperties);
        }

        $this->result['out'] = ob_get_contents();

        ob_clean();

        $this->template->render();

        ob_end_flush();
    }
}