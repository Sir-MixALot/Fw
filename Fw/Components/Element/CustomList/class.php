<?php

namespace Fw\Components\Element\CustomList;

use Fw\Core\Component\Base;

class ListComponent extends Base
{

    public function __construct($componentId, $templateId, $params){
        $this->__path = __DIR__;
        $this->params = $params;
        parent::__construct($componentId, $templateId);
    }

    public function executeComponent()
    {
        $this->result['list'] = $this->params;
        $this->template->render();
    }
}