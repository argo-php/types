<?php

declare(strict_types=1);

namespace ArgoTest\Types\Atomic;

use PHPUnit\Framework\Attributes\CoversClass;
use Argo\Types\Atomic\NeverType;
use ArgoTest\Types\TestCase;

#[CoversClass(NeverType::class)]
class NeverTypeTest extends TestCase
{
    public function testToString(): void
    {
        $type = new NeverType();
        self::assertEquals('never', (string) $type);
        self::assertEquals('never', $type->toNativeTypeString());
    }
}
