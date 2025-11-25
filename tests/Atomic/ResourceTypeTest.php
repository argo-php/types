<?php

declare(strict_types=1);

namespace ArgoTest\Types\Atomic;

use PHPUnit\Framework\Attributes\CoversClass;
use Argo\Types\Atomic\ResourceType;
use ArgoTest\Types\TestCase;

#[CoversClass(ResourceType::class)]
class ResourceTypeTest extends TestCase
{
    public function testToString(): void
    {
        $type = new ResourceType();
        self::assertEquals('resource', (string) $type);
        self::assertEquals('resource', $type->toNativeTypeString());
    }
}
