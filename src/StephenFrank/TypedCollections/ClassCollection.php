<?php

namespace StephenFrank\TypedCollections;


class ClassCollection extends TypedCollection
{
    protected $instanceType;

    public function initType($value)
    {
        $this->type = gettype($value);
        $this->classType = get_class($value);
    }

    public function checkType($value)
    {
        if (get_class($value) !== $this->classType) {
            throw new \InvalidArgumentException("ClassCollection of class {$this->classType} cannot accept instance of ".get_class($value));
        }
    }

}