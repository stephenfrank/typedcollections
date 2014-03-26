<?php

namespace StephenFrank\TypedCollections;


class BoolCollection extends TypedCollection
{
    public function checkType($value)
    {
        if (! is_bool($value)) {
            throw new \InvalidArgumentException("BoolCollection cannot accept type ".gettype($value));
        }
    }

}