<?php

namespace Fw\Core;

use Fw\Core\Type\Dictionary;

class Server extends Dictionary
{

    public function __construct(array $server)
    {
        parent::__construct($server);
        return $this->getContainer();
    }
}