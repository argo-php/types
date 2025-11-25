<?php

declare(strict_types=1);

namespace ArgoTest\Types\Alias;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Argo\Types\Alias\NonEmptyArrayType;
use Argo\Types\Atomic\IntType;
use Argo\Types\Atomic\MixedType;
use Argo\Types\Atomic\NeverType;
use Argo\Types\Atomic\StringType;
use Argo\Types\Misc\KeyShapeItem;
use Argo\Types\Misc\KeyShapeItems;
use Argo\Types\Misc\ShapeItem;
use Argo\Types\Misc\ShapeItems;
use Argo\Types\TypeInterface;
use ArgoTest\Types\TestCase;

#[CoversClass(NonEmptyArrayType::class)]
class NonEmptyArrayTypeTest extends TestCase
{
    public static function stringProvider(): iterable
    {
        yield [new NonEmptyArrayType(), 'non-empty-array'];
        yield [new NonEmptyArrayType(new StringType()), 'non-empty-array<string>'];
        yield [new NonEmptyArrayType(new StringType(), new StringType()), 'non-empty-array<string, string>'];
        yield [new NonEmptyArrayType(new NeverType(), new NeverType()), 'non-empty-array{}'];
        yield [
            new NonEmptyArrayType(
                new NeverType(),
                shapeItems: new KeyShapeItems(
                    new KeyShapeItem('foo', new StringType()),
                    new KeyShapeItem('bar', new IntType(), true),
                ),
            ),
            'non-empty-array{foo: string, bar?: int}',
        ];
        yield [
            new NonEmptyArrayType(
                new MixedType(),
                shapeItems: new KeyShapeItems(
                    new KeyShapeItem('foo', new StringType()),
                    new KeyShapeItem('bar', new StringType()),
                ),
            ),
            'non-empty-array{foo: string, bar: string, ...}',
        ];
        yield [
            new NonEmptyArrayType(
                new StringType(),
                shapeItems: new KeyShapeItems(
                    new KeyShapeItem('foo', new StringType()),
                    new KeyShapeItem('bar', new StringType()),
                ),
            ),
            'non-empty-array{foo: string, bar: string, ...<array-key, string>}',
        ];
        yield [
            new NonEmptyArrayType(
                new StringType(),
                shapeItems: new ShapeItems(
                    new ShapeItem(new StringType()),
                    new ShapeItem(new StringType()),
                ),
            ),
            'non-empty-array{string, string, ...<array-key, string>}',
        ];
    }

    #[DataProvider('stringProvider')]
    public function testToString(TypeInterface $type, string $expectedString): void
    {
        self::assertEquals($expectedString, (string) $type);
        self::assertEquals('array', $type->toNativeTypeString());
    }
}
