<?php

namespace StephenFrank\TypedCollections;


class IntegerCollection extends TypedCollection
{
    public function checkType($value)
    {
        if (!is_int($value)) {
            throw new \InvalidArgumentException('IntegerCollection cannot accept type ' . gettype($value));
        }
    }
}