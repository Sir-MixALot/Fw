<?php

namespace Fw\Components\Framework\Form;

use Fw\Core\Component\Base;


class Form extends Base
{
    public $namespace;

    public function __construct($namespace, $componentId, $templateId, $params){
        $this->namespace = $namespace;
        parent::__construct($namespace, $componentId, $templateId, $params);
    }

    public function executeComponent()
    {
        foreach($this->params as $name => $param){
            if($name != 'elements'){
                $this->result['form'][$name] = $param;
            }else{
                foreach($param as $elements){
                    $this->result['elements'][$elements['type'] . 'Element'] = $elements;
                }
            }
        }
        $this->template->render();
    }
}