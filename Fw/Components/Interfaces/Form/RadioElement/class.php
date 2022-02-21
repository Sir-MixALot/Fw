<?php

namespace Fw\Components\Interfaces\Form\RadioElement;

use Fw\Core\Component\Base;

class RadioElement extends Base
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