<?php

namespace Fw\Components\MultipleSelectElement;

use Fw\Core\Component\Base;

class MultipleSelectElement extends Base
{
    public function executeComponent()
    {
        $this->result = $this->params;
        $this->template->render();
    }
}