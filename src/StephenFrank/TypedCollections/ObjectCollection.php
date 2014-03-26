<?php

namespace StephenFrank\TypedCollections;


class ObjectCollection extends TypedCollection
{
    public function checkType($value)
    {
        if (!is_object($value)) {
            throw new \InvalidArgumentException('ObjectCollection cannot accept type ' . gettype($value));
        }
    }
}