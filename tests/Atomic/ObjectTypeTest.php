<?php

declare(strict_types=1);

namespace ArgoTest\Types\Atomic;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Argo\Types\Atomic\ObjectType;
use Argo\Types\Atomic\StringType;
use Argo\Types\Misc\KeyShapeItem;
use Argo\Types\Misc\KeyShapeItems;
use Argo\Types\TypeInterface;
use ArgoTest\Types\TestCase;

#[CoversClass(ObjectType::class)]
class ObjectTypeTest extends TestCase
{
    public static function stringProvider(): iterable
    {
        yield [new ObjectType(), 'object'];
        yield [
            new ObjectType(
                new KeyShapeItems(
                    new KeyShapeItem('foo', new StringType()),
                    new KeyShapeItem('bar', new StringType(), true),
                ),
            ),
            'object{foo: string, bar?: string}',
        ];
    }

    #[DataProvider('stringProvider')]
    public function testToString(TypeInterface $type, string $expectedString): void
    {
        self::assertEquals($expectedString, (string) $type);
        self::assertEquals('object', $type->toNativeTypeString());
    }
}
