<?php

declare(strict_types=1);

namespace ArgoTest\Types\Atomic;

use PHPUnit\Framework\Attributes\CoversClass;
use Argo\Types\Atomic\StringType;
use ArgoTest\Types\TestCase;

#[CoversClass(StringType::class)]
class StringTypeTest extends TestCase
{
    public function testToString(): void
    {
        $type = new StringType();
        self::assertEquals('string', (string) $type);
        self::assertEquals('string', $type->toNativeTypeString());
    }
}
