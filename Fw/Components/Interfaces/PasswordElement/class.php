<?php

namespace Fw\Components\Interfaces\PasswordElement;

use Fw\Core\Component\Base;

class PasswordElement extends Base
{

    public function executeComponent()
    {
        $this->result = $this->params;
        $this->template->render();
    }
}