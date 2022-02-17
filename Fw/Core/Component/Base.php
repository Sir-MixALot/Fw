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

    public function __construct($namespace, $componentId, $templateId, $params)
    {
        $this->id = $componentId;
        $this->__path = str_replace('\\', '/', $namespace) . '/' . $this->id;
        $this->params = $params;
        $this->template = new Template($templateId, $this->__path, $this);
    }

    abstract protected function executeComponent();
}