<?php

declare(strict_types=1);

namespace Argo\Types\Atomic;

use Argo\Types\Misc\DefaultNullable;
use Argo\Types\NamedTypeInterface;
use Argo\Types\TypeInterface;

/**
 * @api
 * @template-covariant TType of bool
 * @implements NamedTypeInterface<TType>
 * @psalm-immutable
 */
readonly class BoolType implements NamedTypeInterface
{
    /** @use DefaultNullable<TType> */
    use DefaultNullable;

    /**
     * @param TType $value
     * @codeCoverageIgnore
     */
    public function __construct(
        public ?bool $value = null,
    ) {}

    public function isContravariantTo(TypeInterface $type): bool
    {
        if (!$type instanceof BoolType) {
            return false;
        }

        return $this->value === $type->value || ($this->value === null && $type->value !== null);
    }

    public function __toString(): string
    {
        return $this->toNativeTypeString();
    }

    public function toNativeTypeString(): string
    {
        if ($this->value !== null) {
            return $this->value ? 'true' : 'false';
        }

        return 'bool';
    }
}
