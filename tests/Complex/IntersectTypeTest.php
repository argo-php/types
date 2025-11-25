<?php

declare(strict_types=1);

namespace ArgoTest\Types\Complex;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Argo\Types\Atomic\ClassType;
use Argo\Types\Atomic\IntType;
use Argo\Types\Atomic\MixedType;
use Argo\Types\Complex\IntersectType;
use Argo\Types\Complex\UnionType;
use Argo\Types\TypeInterface;
use ArgoTest\Types\Stubs\A;
use ArgoTest\Types\Stubs\ABImpl;
use ArgoTest\Types\Stubs\AImpl;
use ArgoTest\Types\Stubs\B;
use ArgoTest\Types\Stubs\C;
use ArgoTest\Types\Stubs\OtherABImpl;
use ArgoTest\Types\TestCase;

#[CoversClass(IntersectType::class)]
class IntersectTypeTest extends TestCase
{
    public static function typesProvider(): iterable
    {
        yield [
            new IntersectType(new ClassType(A::class), new ClassType(B::class)),
            new IntType(),
            false,
        ];

        yield [
            new IntersectType(new ClassType(A::class), new ClassType(B::class)),
            new MixedType(),
            false,
        ];

        yield [
            new IntersectType(new ClassType(A::class), new ClassType(B::class)),
            new ClassType(AImpl::class),
            false,
        ];

        yield [
            new IntersectType(new ClassType(A::class), new ClassType(B::class)),
            new ClassType(ABImpl::class),
            true,
        ];

        yield [
            new IntersectType(new ClassType(A::class), new ClassType(B::class)),
            new UnionType(new ClassType(ABImpl::class), new ClassType(AImpl::class)),
            false,
        ];

        yield [
            new IntersectType(new ClassType(A::class), new ClassType(B::class)),
            new UnionType(new ClassType(ABImpl::class), new ClassType(OtherABImpl::class)),
            true,
        ];

        yield [
            new IntersectType(new ClassType(A::class), new ClassType(B::class)),
            new IntersectType(new ClassType(A::class), new ClassType(B::class)),
            true,
        ];

        yield [
            new IntersectType(new ClassType(A::class), new ClassType(B::class)),
            new IntersectType(new ClassType(A::class), new ClassType(B::class), new ClassType(C::class)),
            true,
        ];

        yield [
            new IntersectType(new ClassType(A::class), new ClassType(B::class)),
            new IntersectType(new ClassType(ABImpl::class), new ClassType(C::class)),
            true,
        ];

        yield [
            new IntersectType(new ClassType(A::class), new ClassType(B::class)),
            new IntersectType(new ClassType(AImpl::class), new ClassType(B::class)),
            true,
        ];

        yield [
            new IntersectType(new ClassType(A::class), new ClassType(B::class)),
            new IntersectType(new ClassType(AImpl::class), new ClassType(C::class)),
            false,
        ];
    }

    #[DataProvider('typesProvider')]
    public function testIsContravariantTo(TypeInterface $initialType, TypeInterface $analyzeType, bool $expected): void
    {
        self::assertEquals($expected, $initialType->isContravariantTo($analyzeType));
    }
}
