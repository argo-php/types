<?php

declare(strict_types=1);

namespace ArgoTest\Types\Atomic;

use PHPUnit\Framework\Attributes\CoversClass;
use Argo\Types\Atomic\MixedType;
use ArgoTest\Types\TestCase;

#[CoversClass(MixedType::class)]
class MixedTypeTest extends TestCase
{
    public function testToString(): void
    {
        $type = new MixedType();
        self::assertEquals('mixed', (string) $type);
        self::assertEquals('mixed', $type->toNativeTypeString());
    }
}
