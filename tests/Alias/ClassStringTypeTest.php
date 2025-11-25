<?php

declare(strict_types=1);

namespace ArgoTest\Types\Alias;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Argo\Types\Alias\ClassStringType;
use Argo\Types\TypeInterface;
use ArgoTest\Types\TestCase;

#[CoversClass(ClassStringType::class)]
class ClassStringTypeTest extends TestCase
{
    public static function stringProvider(): iterable
    {
        yield [new ClassStringType(), 'class-string'];
        yield [new ClassStringType('Hello'), 'class-string<Hello>'];
    }

    #[DataProvider('stringProvider')]
    public function testToString(TypeInterface $type, string $expectedString): void
    {
        self::assertEquals($expectedString, (string) $type);
        self::assertEquals('string', $type->toNativeTypeString());
    }
}
