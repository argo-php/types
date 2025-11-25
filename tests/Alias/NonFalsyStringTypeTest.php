<?php

declare(strict_types=1);

namespace ArgoTest\Types\Alias;

use PHPUnit\Framework\Attributes\CoversClass;
use Argo\Types\Alias\NonFalsyStringType;
use ArgoTest\Types\TestCase;

#[CoversClass(NonFalsyStringType::class)]
class NonFalsyStringTypeTest extends TestCase
{
    public function testToString(): void
    {
        $type = new NonFalsyStringType();
        self::assertEquals('non-falsy-string', (string) $type);
        self::assertEquals('string', $type->toNativeTypeString());
    }
}
