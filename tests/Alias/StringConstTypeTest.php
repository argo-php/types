<?php

declare(strict_types=1);

namespace ArgoTest\Types\Alias;

use PHPUnit\Framework\Attributes\CoversClass;
use Argo\Types\Alias\StringConstType;
use ArgoTest\Types\TestCase;

#[CoversClass(StringConstType::class)]
class StringConstTypeTest extends TestCase
{
    public function testToString(): void
    {
        $type = new StringConstType('Hello');
        self::assertEquals("'Hello'", (string) $type);
        self::assertEquals('string', $type->toNativeTypeString());
    }
}
