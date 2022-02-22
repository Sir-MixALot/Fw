<?php

namespace Fw\Components\CheckboxElement;

use Fw\Core\Component\Base;

class CheckboxElement extends Base
{

    public function executeComponent()
    {
        $this->result = $this->params;
        $this->template->render();
    }
}