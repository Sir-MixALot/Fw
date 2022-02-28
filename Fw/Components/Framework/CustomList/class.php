<?php

namespace Fw\Components\Framework\CustomList;

use Fw\Core\Component\Base;

class ListComponent extends Base
{
    
    public function executeComponent()
    {
        $this->result['list'] = $this->params;
        $this->template->render();
    }
}