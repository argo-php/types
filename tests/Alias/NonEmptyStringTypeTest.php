<?php

declare(strict_types=1);

namespace ArgoTest\Types\Alias;

use PHPUnit\Framework\Attributes\CoversClass;
use Argo\Types\Alias\NonEmptyStringType;
use ArgoTest\Types\TestCase;

#[CoversClass(NonEmptyStringType::class)]
class NonEmptyStringTypeTest extends TestCase
{
    public function testToString(): void
    {
        $type = new NonEmptyStringType();
        self::assertEquals('non-empty-string', (string) $type);
        self::assertEquals('string', $type->toNativeTypeString());
    }
}
