<?php

namespace Fw\Components\MultipleRadioElement;

use Fw\Core\Component\Base;

class MultipleRadioElement extends Base
{

    public function executeComponent()
    {
        foreach($this->params as $name=>$param){
            if($name != 'radios'){
                $this->result['element'][$name] = $param;
            }else{
                foreach($param as $elements){
                    $this->result['radios'][] = $elements;
                }
            }
        }

        $this->template->render();
    }
}