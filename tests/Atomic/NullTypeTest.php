<?php

declare(strict_types=1);

namespace ArgoTest\Types\Atomic;

use PHPUnit\Framework\Attributes\CoversClass;
use Argo\Types\Atomic\NullType;
use ArgoTest\Types\TestCase;

#[CoversClass(NullType::class)]
class NullTypeTest extends TestCase
{
    public function testToString(): void
    {
        $type = new NullType();
        self::assertEquals('null', (string) $type);
        self::assertEquals('null', $type->toNativeTypeString());
    }
}
