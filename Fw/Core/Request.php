<?php

namespace Fw\Core;

use Fw\Core\Type\Dictionary;

class Request extends Dictionary
{
    public function __construct(array $request)
    {
        parent::__construct($request);
        return $this->getContainer();
    }
}