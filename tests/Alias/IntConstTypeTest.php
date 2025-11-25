<?php

declare(strict_types=1);

namespace ArgoTest\Types\Alias;

use PHPUnit\Framework\Attributes\CoversClass;
use Argo\Types\Alias\IntConstType;
use ArgoTest\Types\TestCase;

#[CoversClass(IntConstType::class)]
class IntConstTypeTest extends TestCase
{
    public function testToString(): void
    {
        $type = new IntConstType(12);
        self::assertEquals('12', (string) $type);
        self::assertEquals('int', $type->toNativeTypeString());
    }
}
