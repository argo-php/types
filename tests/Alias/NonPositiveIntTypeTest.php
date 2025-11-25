<?php

declare(strict_types=1);

namespace ArgoTest\Types\Alias;

use PHPUnit\Framework\Attributes\CoversClass;
use Argo\Types\Alias\NonPositiveIntType;
use ArgoTest\Types\TestCase;

#[CoversClass(NonPositiveIntType::class)]
class NonPositiveIntTypeTest extends TestCase
{
    public function testToString(): void
    {
        $type = new NonPositiveIntType();
        self::assertEquals('non-positive-int', (string) $type);
        self::assertEquals('int', $type->toNativeTypeString());
    }
}
