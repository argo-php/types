<?php

declare(strict_types=1);

namespace Argo\Types\Alias;

use Argo\Types\Atomic\FloatType;
use Argo\Types\TypeInterface;

/**
 * @api
 * @template-covariant TValueType of float
 * @extends FloatType<TValueType>
 * @psalm-immutable
 */
readonly class FloatConstType extends FloatType
{
    /**
     * @psalm-param TValueType $value
     * @codeCoverageIgnore
     */
    public function __construct(
        public float $value,
    ) {}

    public function __toString(): string
    {
        return (string) $this->value;
    }

    public function isContravariantTo(TypeInterface $type): bool
    {
        if ($type instanceof FloatConstType) {
            return $type->value === $this->value;
        }

        return false;
    }
}
