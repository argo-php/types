<?php

declare(strict_types=1);

namespace ArgoTest\Types\Complex;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Argo\Types\Atomic\ClassType;
use Argo\Types\Atomic\FloatType;
use Argo\Types\Atomic\IntType;
use Argo\Types\Atomic\MixedType;
use Argo\Types\Atomic\StringType;
use Argo\Types\Complex\IntersectType;
use Argo\Types\Complex\UnionType;
use Argo\Types\TypeInterface;
use ArgoTest\Types\Stubs\A;
use ArgoTest\Types\Stubs\ABImpl;
use ArgoTest\Types\Stubs\AImpl;
use ArgoTest\Types\Stubs\B;
use ArgoTest\Types\Stubs\BImpl;
use ArgoTest\Types\TestCase;

#[CoversClass(UnionType::class)]
class UnionTypeTest extends TestCase
{
    public static function typesProvider(): iterable
    {
        yield [
            new UnionType(new IntType(), new StringType()),
            new IntType(),
            true,
        ];

        yield [
            new UnionType(new IntType(), new StringType()),
            new MixedType(),
            false,
        ];

        yield [
            new UnionType(new IntType(), new StringType()),
            new FloatType(),
            false,
        ];

        yield [
            new UnionType(new ClassType(A::class), new ClassType(B::class)),
            new ClassType(AImpl::class),
            true,
        ];

        yield [
            new UnionType(new ClassType(A::class), new ClassType(B::class)),
            new ClassType(ABImpl::class),
            true,
        ];

        yield [
            new UnionType(new ClassType(A::class), new ClassType(B::class)),
            new UnionType(new ClassType(AImpl::class), new ClassType(BImpl::class), new ClassType(
                ABImpl::class,
            )),
            true,
        ];

        yield [
            new UnionType(new ClassType(A::class), new ClassType(B::class)),
            new UnionType(new ClassType(ABImpl::class), new IntType()),
            false,
        ];

        yield [
            new UnionType(new ClassType(AImpl::class), new ClassType(BImpl::class)),
            new ClassType(A::class),
            false,
        ];

        yield [
            new UnionType(new ClassType(AImpl::class), new ClassType(BImpl::class)),
            new IntersectType(new ClassType(A::class), new ClassType(B::class)),
            false,
        ];
    }

    #[DataProvider('typesProvider')]
    public function testIsContravariantTo(TypeInterface $initialType, TypeInterface $analyzeType, bool $expected): void
    {
        self::assertEquals($expected, $initialType->isContravariantTo($analyzeType));
    }
}
