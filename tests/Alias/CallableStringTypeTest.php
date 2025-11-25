<?php

declare(strict_types=1);

namespace ArgoTest\Types\Alias;

use PHPUnit\Framework\Attributes\CoversClass;
use Argo\Types\Alias\CallableStringType;
use ArgoTest\Types\TestCase;

#[CoversClass(CallableStringType::class)]
class CallableStringTypeTest extends TestCase
{
    public function testToString(): void
    {
        $type = new CallableStringType();
        self::assertEquals('callable-string', (string) $type);
        self::assertEquals('string', $type->toNativeTypeString());
    }
}
