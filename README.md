# argo/types

Extended PHP type definition system.

Allows for more complete description of types in PHP, taking into account not only built-in types but also extended 
phpstan/psalm types, described in PHPDoc. This package itself only provides classes with type descriptions.

### Argo\Types\TypeInterface

A common interface for all types. Provides several common methods:

```php
public function isNullable(): bool;
```
Checks that the specified type is nullable (that is, it allows null to be used as a value).
```php
public function setNullable(): TypeInterface;
```
Returns a new instance of the type that is nullable. If the type was already nullable, it returns itself.
```php
public function __toString(): string;
```
Returns a string representation of the type. This returns a full description of the type, suitable for PHPDoc.
```php
public function toNativeTypeString(): string;
```
Returns a string representation of a native PHP type.
```php
public function isContravariantTo(TypeInterface $type): bool;
```
Checks whether the given type is contravariant with respect to the passed `$type`.

### Argo\Types\NamedTypeInterface

An interface implemented by all non-generic or complex types. It provides no additional methods.

### Argo\Types\Atomic\*

This namespace contains basic PHP types:
* `ArrayType` - array type
* `BoolType` - bool type
* `Callable` - callable type
* `ClassType` - type for all non-anonymous classes
* `FloatType` - float type
* `IntType` - int type
* `MixedType` - mixed type
* `NeverType` - never type
* `NotType` - a special type for aliases that represents the negation of the type
* `NullType` - null type
* `ObjectType` - object type
* `ResourceType` - resource type
* `StringType` - string type
* `VoidType` - void type

### Argo\Types\Alias\*

Special aliases for types:
* `ArrayKeyType` - array-key (int|string)
* `CallableStringType` - callable-string (string)
* `ClassStringType` - class-string (string)
* `FalseType` - false (bool)
* `FloatConstType` - constant float (e.g. 1.23)
* `IntConstType` - constant int (e.g. 123)
* `IntMaskOfType` - int-mask-of (int)
* `IntMaskType` - int-mask (int)
* `IntRangeType` - int<min,max> (int)
* `IterableType` - iterable (array|\Traversable)
* `ListType` - list (array)
* `NegativeIntType` - negative-int (int)
* `NonEmptyArrayType` - non-empty-array (array)
* `NonEmptyListType` - non-empty-list (array)
* `NonEmptyStringType` - non-empty-string (string)
* `NonFalsyStringType` - non-falsy-string (string)
* `NonNegativeIntType` - non-negative-int (int)
* `NonPositiveIntType` - non-positive-int (int)
* `NumericStringType` - numeric-string (string)
* `NumericType` - numeric (int|float|numeric-string)
* `PositiveIntType` - positive-int (int)
* `ScalarType` - scalar (string|int|float|bool)
* `StringConstType` - constant string (e.g. "hello")
* `TraitStringType` - trait-string (string)
* `TrueType` - true (bool)
* `TruthyStringType` - truthy-string (string)

### Argo\Types\Complex\*

Complex types:
* `IntersectType` - intersection type of several types (intersect)
* `UnionType` - union type of several types (union)
