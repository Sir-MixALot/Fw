<?php

namespace Fw\Components\MultipleCheckboxElement;

use Fw\Core\Component\Base;

class MultipleCheckboxElement extends Base
{

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

        $this->template->render();
    }
}