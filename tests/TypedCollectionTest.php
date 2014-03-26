<?php

namespace StephenFrank\TypedCollections;

use ArrayObject;
use InvalidArgumentException;

require("../vendor/autoload.php");


class TypedCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage TypedCollection of type integer cannot accept value of type string
     */
    public function testTypedCollection()
    {
        $typed = new TypedCollection([1, 'a']);
    }

    public function testClassCollection()
    {
        $typed = new ClassCollection([new \StdClass, new \StdClass]);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage ClassCollection of class stdClass cannot accept instance of ArrayObject
     */
    public function testClassCollectionInvalid()
    {
        $typed = new ClassCollection([new \StdClass, new \ArrayObject]);
    }

    /**
     *
     */
    public function testIntegerCollection()
    {
        $integers = new IntegerCollection([1]);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage IntegerCollection cannot accept type string
     */
    public function testIntegerCollectionException()
    {
        $integers = new IntegerCollection(['foo']);
    }

    /**
     *
     */
    public function testStringCollection()
    {
        $strings = new StringCollection(['foo']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage StringCollection cannot accept type integer
     */
    public function testStringCollectionException()
    {
        $strings = new StringCollection([1]);
    }

    /**
     *
     */
    public function testFloatCollection()
    {
        $floats = new FloatCollection([1.0]);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage FloatCollection cannot accept type integer
     */
    public function testFloatCollectionException()
    {
        $floats = new FloatCollection([1]);
    }

    /**
     *
     */
    public function testNumericCollection()
    {
        $numerics = new NumericCollection([1.0, 1]);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage NumericCollection cannot accept type string
     */
    public function testNumericCollectionException()
    {
        $numerics = new NumericCollection(['a']);
    }

    /**
     *
     */
    public function testInstanceCollection()
    {
        $intances = new InstanceCollection([new ArrayObject, new \ArrayIterator], 'ArrayAccess');
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage ClassCollection of type ArrayAccess cannot accept instance of stdClass
     */
    public function testInstanceCollectionException()
    {
        $intances = new InstanceCollection([new ArrayObject, new \StdClass], 'ArrayAccess');
    }


}