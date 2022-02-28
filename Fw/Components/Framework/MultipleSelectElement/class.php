<?php

namespace Fw\Components\Framework\MultipleSelectElement;

use Fw\Core\Component\Base;

class MultipleSelectElement extends Base
{
    public function executeComponent()
    {
        $this->result = $this->params;
        $this->template->render();
    }
}