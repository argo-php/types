<?php

declare(strict_types=1);

namespace ArgoTest\Types\Alias;

use PHPUnit\Framework\Attributes\CoversClass;
use Argo\Types\Alias\NumericStringType;
use ArgoTest\Types\TestCase;

#[CoversClass(NumericStringType::class)]
class NumericStringTypeTest extends TestCase
{
    public function testToString(): void
    {
        $type = new NumericStringType();
        self::assertEquals('numeric-string', (string) $type);
        self::assertEquals('string', $type->toNativeTypeString());
    }
}
