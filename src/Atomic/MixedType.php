<?php

declare(strict_types=1);

namespace Argo\Types\Atomic;

use Argo\Types\Misc\DefaultNullable;
use Argo\Types\NamedTypeInterface;
use Argo\Types\TypeInterface;

/**
 * @api
 * @implements NamedTypeInterface<mixed>
 * @psalm-immutable
 */
readonly class MixedType implements NamedTypeInterface
{
    /** @use DefaultNullable<mixed> */
    use DefaultNullable;

    public function isContravariantTo(TypeInterface $type): bool
    {
        return true;
    }

    public function __toString(): string
    {
        return $this->toNativeTypeString();
    }

    public function toNativeTypeString(): string
    {
        return 'mixed';
    }
}
