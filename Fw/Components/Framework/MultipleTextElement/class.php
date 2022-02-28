<?php

namespace Fw\Components\Framework\MultipleTextElement;

use Fw\Core\Component\Base;

class MultipleTextElement extends Base
{

    public function executeComponent()
    {
        foreach($this->params as $name => $param){
            if($name != 'fields'){
                $this->result['element'][$name] = $param;
            }else{
                foreach($param as $elements){
                    $this->result['fields'][] = $elements;
                }
            }
        }

        $this->template->render();
    }
}