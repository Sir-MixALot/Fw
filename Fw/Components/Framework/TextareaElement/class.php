<?php

namespace Fw\Components\Framework\TextareaElement;

use Fw\Core\Component\Base;

class TextareaElement extends Base
{
    public function executeComponent()
    {
        $this->result = $this->params;
        $this->template->render();
    }
}