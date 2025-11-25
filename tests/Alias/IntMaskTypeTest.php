<?php

declare(strict_types=1);

namespace ArgoTest\Types\Alias;

use PHPUnit\Framework\Attributes\CoversClass;
use Argo\Types\Alias\IntMaskType;
use ArgoTest\Types\TestCase;

#[CoversClass(IntMaskType::class)]
class IntMaskTypeTest extends TestCase
{
    public function testToString(): void
    {
        $type = new IntMaskType(1, 2, 5);
        self::assertEquals('int-mask<1, 2, 5>', (string) $type);
        self::assertEquals('int', $type->toNativeTypeString());
    }
}
