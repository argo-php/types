<?php

declare(strict_types=1);

namespace ArgoTest\Types\Alias;

use PHPUnit\Framework\Attributes\CoversClass;
use Argo\Types\Alias\NonNegativeIntType;
use ArgoTest\Types\TestCase;

#[CoversClass(NonNegativeIntType::class)]
class NonNegativeIntTypeTest extends TestCase
{
    public function testToString(): void
    {
        $type = new NonNegativeIntType();
        self::assertEquals('non-negative-int', (string) $type);
        self::assertEquals('int', $type->toNativeTypeString());
    }
}
