<?php

namespace StephenFrank\TypedCollections;


class InstanceCollection extends TypedCollection
{
    public function __construct($values = [], $instanceType = null)
    {
        if (!$instanceType && !$this->type) {
            throw new \InvalidArgumentException('InstanceCollection requires a defined type');
        }

        parent::__construct($values, $instanceType);
    }

    public function checkType($value)
    {
        if (!$value instanceof $this->type) {
            throw new \InvalidArgumentException(
                'InstanceCollection of type ' . $this->type . ' cannot accept instance of ' . get_class($value)
            );
        }
    }
}