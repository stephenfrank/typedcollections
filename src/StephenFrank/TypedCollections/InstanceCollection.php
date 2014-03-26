<?php

namespace StephenFrank\TypedCollections;


class InstanceCollection extends TypedCollection
{
    public function __construct($values, $instanceType)
    {
        $this->instanceType = $instanceType;

        parent::__construct($values);
    }

    public function checkType($value)
    {
        if (! $value instanceof $this->instanceType) {
            throw new \InvalidArgumentException("ClassCollection of type $this->instanceType cannot accept instance of ".get_class($value));
        }
    }
}