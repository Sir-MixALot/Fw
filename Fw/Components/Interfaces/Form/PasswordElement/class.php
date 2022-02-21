<?php

namespace Fw\Components\Interfaces\Form\PasswordElement;

use Fw\Core\Component\Base;

class PasswordElement extends Base
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