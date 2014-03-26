<?php

namespace StephenFrank\TypedCollections;


class ArrayCollection extends TypedCollection
{
    public function checkType($value)
    {
        if (! is_array($value)) {
            throw new \InvalidArgumentException("ArrayCollection cannot accept type ".gettype($value));
        }
    }
}