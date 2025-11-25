<?php

declare(strict_types=1);

namespace Argo\Types\Atomic;

use Argo\Types\Misc\DefaultNullable;
use Argo\Types\NamedTypeInterface;
use Argo\Types\TypeInterface;

/**
 * @api
 * @implements NamedTypeInterface<callable>
 * @psalm-immutable
 */
readonly class CallableType implements NamedTypeInterface
{
    /** @use DefaultNullable<callable> */
    use DefaultNullable;

    public function isContravariantTo(TypeInterface $type): bool
    {
        return $type instanceof CallableType;
    }

    public function __toString(): string
    {
        return $this->toNativeTypeString();
    }

    public function toNativeTypeString(): string
    {
        return 'callable';
    }
}
