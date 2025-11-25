<?php

declare(strict_types=1);

namespace ArgoTest\Types\Alias;

use PHPUnit\Framework\Attributes\CoversClass;
use Argo\Types\Alias\PositiveIntType;
use ArgoTest\Types\TestCase;

#[CoversClass(PositiveIntType::class)]
class PositiveIntTypeTest extends TestCase
{
    public function testToString(): void
    {
        $type = new PositiveIntType();
        self::assertEquals('positive-int', (string) $type);
        self::assertEquals('int', $type->toNativeTypeString());
    }
}
