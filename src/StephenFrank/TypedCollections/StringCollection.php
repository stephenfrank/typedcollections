<?php

namespace StephenFrank\TypedCollections;


class StringCollection extends TypedCollection
{
    public function checkType($value)
    {
        if (! is_string($value)) {
            throw new \InvalidArgumentException("StringCollection cannot accept type ".gettype($value));
        }
    }
}