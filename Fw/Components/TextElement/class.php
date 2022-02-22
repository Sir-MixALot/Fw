<?php

namespace Fw\Components\TextElement;

use Fw\Core\Component\Base;

class TextElement extends Base
{

    public function executeComponent()
    {
        $this->result = $this->params;
        $this->template->render();
    }
}