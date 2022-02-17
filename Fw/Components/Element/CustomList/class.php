<?php

namespace Fw\Components\Element\CustomList;

use Fw\Core\Component\Base;

class ListComponent extends Base
{

    public function __construct($namespace, $componentId, $templateId, $params){
        parent::__construct($namespace, $componentId, $templateId, $params);
    }

    public function executeComponent()
    {
        $this->result['list'] = $this->params;
        $this->template->render();
    }
}