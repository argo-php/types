<?php

declare(strict_types=1);

namespace ArgoTest\Types\Atomic;

use PHPUnit\Framework\Attributes\CoversClass;
use Argo\Types\Atomic\IntType;
use ArgoTest\Types\TestCase;

#[CoversClass(IntType::class)]
class IntTypeTest extends TestCase
{
    public function testToString(): void
    {
        $type = new IntType();
        self::assertEquals('int', (string) $type);
        self::assertEquals('int', $type->toNativeTypeString());
    }
}
