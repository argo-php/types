<?php

declare(strict_types=1);

namespace ArgoTest\Types\Alias;

use PHPUnit\Framework\Attributes\CoversClass;
use Argo\Types\Alias\ArrayKeyType;
use ArgoTest\Types\TestCase;

#[CoversClass(ArrayKeyType::class)]
class ArrayKeyTypeTest extends TestCase
{
    public function testToString(): void
    {
        $type = new ArrayKeyType();
        self::assertEquals('array-key', (string) $type);
        self::assertEquals('int|string', $type->toNativeTypeString());
    }
}
