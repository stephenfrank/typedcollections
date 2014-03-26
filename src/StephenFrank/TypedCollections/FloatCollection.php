<?php

namespace StephenFrank\TypedCollections;


class FloatCollection extends TypedCollection
{
    public function checkType($value)
    {
        if (! is_float($value)) {
            throw new \InvalidArgumentException("FloatCollection cannot accept type ".gettype($value));
        }
    }

} 