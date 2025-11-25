<?php

declare(strict_types=1);

namespace ArgoTest\Types\Atomic;

use PHPUnit\Framework\Attributes\CoversClass;
use Argo\Types\Atomic\NotType;
use Argo\Types\Atomic\StringType;
use ArgoTest\Types\TestCase;

#[CoversClass(NotType::class)]
class NotTypeTest extends TestCase
{
    public function testToString(): void
    {
        $type = new NotType(new StringType());
        self::assertEquals('!string', (string) $type);
        self::assertEquals('mixed', $type->toNativeTypeString());
    }
}
