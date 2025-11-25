<?php

declare(strict_types=1);

namespace ArgoTest\Types\Alias;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Argo\Types\Alias\IterableType;
use Argo\Types\Atomic\IntType;
use Argo\Types\Atomic\StringType;
use Argo\Types\TypeInterface;
use ArgoTest\Types\TestCase;

#[CoversClass(IterableType::class)]
class IterableTypeTest extends TestCase
{
    public static function stringProvider(): iterable
    {
        yield [new IterableType(), 'iterable'];
        yield [new IterableType(new StringType()), 'iterable<string>'];
        yield [new IterableType(new StringType(), new IntType()), 'iterable<string, int>'];
    }

    #[DataProvider('stringProvider')]
    public function testToString(TypeInterface $type, string $expectedString): void
    {
        self::assertEquals($expectedString, (string) $type);
        self::assertEquals('iterable', $type->toNativeTypeString());
    }
}
