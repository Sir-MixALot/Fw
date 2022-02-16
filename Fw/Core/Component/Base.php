<?php

namespace Fw\Core\Component;

use Fw\Core\Component\Template;

abstract class Base
{

    public $result = [];
    public string $id;
    public $params = [];
    protected $template;
    public string $__path;

    public function __construct($componentId, $templateId)
    {
        $this->id = $componentId;
        $this->template = new Template($templateId, $this );
    }

    abstract protected function executeComponent();
}