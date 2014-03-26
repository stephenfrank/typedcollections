<?php

namespace StephenFrank\TypedCollections;


class NumericCollection extends TypedCollection
{
    public function checkType($value)
    {
        if (! (is_int($value) || is_float($value))) {
            throw new \InvalidArgumentException("NumericCollection cannot accept type ".gettype($value));
        }
    }
}