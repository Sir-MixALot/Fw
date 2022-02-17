<?php 

namespace Fw\Core\Type;

use IteratorAggregate;
use ArrayAccess;
use ArrayIterator;
use Countable;
use Traversable;

class Dictionary implements IteratorAggregate, ArrayAccess, Countable
{

    public $container = [];

    public function __construct($inParams)
    {
        $this->setContainer($inParams);
    }

    public function setContainer($inParams)
    {
        $this->container = $inParams;
    }

    public function getContainer()
    {
        return $this->container;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this);
    }   

    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetGet($offset): mixed
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    public function count(): int
    {
        return count($this->container);
    }
}