TypedCollections
================

`stephenfrank/typedcollections: "0.1.x"`


A collection of helper classes to enforce type safety in array collections.

TypedCollection (base class)
------------------------------

The base class is array-accessible and enforces type-strictness by checking each item added to the collection against the defined type.

The type can be defined through the constructor arguments or will be defined automatically based on the first item added.

```
$integerCollection = new TypedCollection([1, 2]);
$integerCollection[] = 'a'; // throws InvalidArgumentException
```

{*Type*}Collection
------------------------------

Several classes have built-in types for strict checking against:

- bools `BoolCollection`
- integers `IntegerCollection`
- floats `FloatCollection`
- strings `StringCollection`
- array `ArrayCollection`
- objects `ObjectCollection`

```
$stringCollection = new StringCollection;
$stringCollection[] = 'foo';
$stringCollection[] = true; // throws InvalidArgumentException
```

ClassCollection
------------------------------
The ClassCollection will check that each item added to the array is of a particular class using `get_class()`.

```
$foosCollection = new ClassCollection([new Foo]);
// or new ClassCollection([new Foo], 'Foo');
$stringCollection[] = new StdClass; // throws InvalidArgumentException
```

InstanceCollection
------------------------------

The InstanceCollection will check each item using `instanceof` so that collections can be defined by an interface or inherited class.

```
$foosCollection = new InstanceCollection([
	new ArrayObject,
	new ArrayIterator
], 'ArrayAccess'); // This is A-okay

```

What&rsquo;s the point?
-----------------
Sometimes type strictness is important when exposing a public API in a framework or library. Effectively it reduces the number of places where the API consumer can shoot themselves in the foot.


```
class NumberAdder
{
	public function sum(NumericCollection $numerics);
}
```

Sometimes when using a third-party/legacy library you might want type-check against the kind of garbage they return and raise an exception when they don't return clean data

```
$resources = new ClassCollection($thirdPartyThinger->getResources(), 'AcmeResource');
// Will explode if <Resource>[] is not returned
```

Lastly, `InstanceCollection` makes it super easy to create your own typed collections.

```
class AcmeResourceCollection extends InstanceCollection
{
	protected $type = 'AcmeResource';
}
```




