<?php

declare(strict_types=1);

namespace ArgoTest\Types\Atomic;

use PHPUnit\Framework\Attributes\CoversClass;
use Argo\Types\Atomic\FloatType;
use ArgoTest\Types\TestCase;

#[CoversClass(FloatType::class)]
class FloatTypeTest extends TestCase
{
    public function testToString(): void
    {
        $type = new FloatType();
        self::assertEquals('float', (string) $type);
        self::assertEquals('float', $type->toNativeTypeString());
    }
}
