<?php

namespace Fw\Components\Interfaces\Form;

use Fw\Core\Application;
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
        foreach($this->params as $name=>$param){
            if($name != 'elements'){
                $this->result['form'][$name] = $param;
            }else{
                foreach($param as $elements){
                    $this->result['elements'][$elements['type'] . 'Element'] = $elements;
                }
            }
        }
        
        $app = Application::getInstance();

        ob_start();

        foreach($this->result['elements'] as $elementName=>$elementProperties){
            if(strpos($elementName, '-') === false){
                $app->includeComponent($this->namespace . '\Form:' . ucfirst($elementName), 'default', $elementProperties);
            }else{
                $newElementName = '';
                $elementNamePieces = explode('-', $elementName);
                foreach($elementNamePieces as $piece){
                    $newElementName .= ucfirst($piece);
                }

                $app->includeComponent($this->namespace . '\Form:' . $newElementName, 'default', $elementProperties);
            }
            
        }

        $this->result['out'] = ob_get_contents();

        ob_clean();

        $this->template->render();

        ob_end_flush();
    }
}