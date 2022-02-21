<?php

namespace Fw\Components\Interfaces\Form\TextareaElement;

use Fw\Core\Component\Base;

class TextareaElement extends Base
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