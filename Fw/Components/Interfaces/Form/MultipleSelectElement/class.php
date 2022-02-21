<?php

namespace Fw\Components\Interfaces\Form\MultipleSelectElement;

use Fw\Core\Component\Base;

class MultipleSelectElement extends Base
{

    public function __construct($namespace, $componentId, $templateId, $params){
        parent::__construct($namespace, $componentId, $templateId, $params);
    }

    public function executeComponent()
    {
        $this->result = $this->params;
        $this->template->render();
    }
}