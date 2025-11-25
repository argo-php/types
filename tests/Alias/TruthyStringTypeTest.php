<?php

declare(strict_types=1);

namespace ArgoTest\Types\Alias;

use PHPUnit\Framework\Attributes\CoversClass;
use Argo\Types\Alias\TruthyStringType;
use ArgoTest\Types\TestCase;

#[CoversClass(TruthyStringType::class)]
class TruthyStringTypeTest extends TestCase
{
    public function testToString(): void
    {
        $type = new TruthyStringType();
        self::assertEquals('truthy-string', (string) $type);
        self::assertEquals('string', $type->toNativeTypeString());
    }
}
