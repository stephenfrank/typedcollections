<?php

namespace StephenFrank\TypedCollections;

use ArrayObject;
use InvalidArgumentException;

class TypedCollection extends ArrayObject
{
    protected $values;

    protected $type;

    protected $instanceOf;

    protected $typeHash;

    public function __construct($values = [], $type = null)
    {
        if ($type && !$this->type) {
            $this->type = $type;
        }

        foreach ($values as $key => $value) {
            $this->offsetSet($key, $value);
        }
    }

    public function checkType($value)
    {
        if (gettype($value) !== $this->type) {
            throw new InvalidArgumentException(
                'TypedCollection of type ' . $this->type . ' cannot accept value of type ' . gettype($value)
            );
        }
    }

    protected function initType($value)
    {
        $this->type = gettype($value);
    }

    public function offsetSet($offset, $value)
    {
        if (!$this->type) {
            $this->initType($value);
        }

        $this->checkType($value);

        parent::offsetSet($offset, $value);
    }

    public function getType()
    {
        return $this->type;
    }

}