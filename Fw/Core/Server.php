<?php

namespace Fw\Core;

use Fw\Core\Type\Dictionary;

class Server extends Dictionary
{

    public function __construct()
    {
        parent::__construct($_SERVER);
        return $this->getContainer();
    }
}