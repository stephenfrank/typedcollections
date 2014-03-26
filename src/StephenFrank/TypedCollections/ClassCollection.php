<?php

namespace StephenFrank\TypedCollections;


class ClassCollection extends TypedCollection
{
    protected $instanceType;

    protected function initType($value)
    {
        $this->type = get_class($value);
    }

    public function checkType($value)
    {
        if (get_class($value) !== $this->type) {
            throw new \InvalidArgumentException(
                    'ClassCollection of class ' . $this->type . ' cannot accept instance of ' . get_class($value)
            );
        }
    }

}