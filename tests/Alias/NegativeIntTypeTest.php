<?php

declare(strict_types=1);

namespace ArgoTest\Types\Alias;

use PHPUnit\Framework\Attributes\CoversClass;
use Argo\Types\Alias\NegativeIntType;
use ArgoTest\Types\TestCase;

#[CoversClass(NegativeIntType::class)]
class NegativeIntTypeTest extends TestCase
{
    public function testToString(): void
    {
        $type = new NegativeIntType();
        self::assertEquals('negative-int', (string) $type);
        self::assertEquals('int', $type->toNativeTypeString());
    }
}
