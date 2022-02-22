<?php

namespace Fw\Components\SelectElement;

use Fw\Core\Component\Base;

class SelectElement extends Base
{

    public function executeComponent()
    {
        $this->result = $this->params;
        $this->template->render();
    }
}