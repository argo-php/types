<?php

declare(strict_types=1);

namespace ArgoTest\Types\Alias;

use PHPUnit\Framework\Attributes\CoversClass;
use Argo\Types\Alias\ScalarType;
use ArgoTest\Types\TestCase;

#[CoversClass(ScalarType::class)]
class ScalarTypeTest extends TestCase
{
    public function testToString(): void
    {
        $type = new ScalarType();
        self::assertEquals('scalar', (string) $type);
        self::assertEquals('string|int|float|bool', $type->toNativeTypeString());
    }
}
