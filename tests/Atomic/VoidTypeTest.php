<?php

declare(strict_types=1);

namespace ArgoTest\Types\Atomic;

use PHPUnit\Framework\Attributes\CoversClass;
use Argo\Types\Atomic\VoidType;
use ArgoTest\Types\TestCase;

#[CoversClass(VoidType::class)]
class VoidTypeTest extends TestCase
{
    public function testToString(): void
    {
        $type = new VoidType();
        self::assertEquals('void', (string) $type);
        self::assertEquals('void', $type->toNativeTypeString());
    }
}
