<?php

declare(strict_types=1);

namespace Argo\Types\Atomic;

use Argo\Types\Misc\DefaultNullable;
use Argo\Types\NamedTypeInterface;
use Argo\Types\TypeInterface;

/**
 * @api
 * @template TType
 * @implements NamedTypeInterface<mixed>
 * @psalm-immutable
 */
readonly class NotType implements NamedTypeInterface
{
    /** @use DefaultNullable<mixed> */
    use DefaultNullable;

    /**
     * @param TypeInterface<TType> $type
     * @codeCoverageIgnore
     */
    public function __construct(
        public TypeInterface $type,
    ) {}

    public function isContravariantTo(TypeInterface $type): bool
    {
        return !$this->type->isContravariantTo($type);
    }

    public function __toString(): string
    {
        return '!' . (string) $this->type;
    }

    public function toNativeTypeString(): string
    {
        return 'mixed';
    }
}
