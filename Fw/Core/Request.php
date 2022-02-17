<?php

namespace Fw\Core;

use Fw\Core\Type\Dictionary;

class Request extends Dictionary
{
    public function __construct()
    {
        parent::__construct($_REQUEST);
        return $this->getContainer();
    }
}