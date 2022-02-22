<?php

namespace Fw\Components\RadioElement;

use Fw\Core\Component\Base;

class RadioElement extends Base
{

    public function executeComponent()
    {
        $this->result = $this->params;
        $this->template->render();
    }
}