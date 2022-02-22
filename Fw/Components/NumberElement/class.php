<?php

namespace Fw\Components\NumberElement;

use Fw\Core\Component\Base;

class NumberElement extends Base
{
    public function executeComponent()
    {
        $this->result = $this->params;
        $this->template->render();
    }
}