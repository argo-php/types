<?php

declare(strict_types=1);

namespace Argo\Types\Alias;

use Argo\Types\Atomic\StringType;
use Argo\Types\TypeInterface;

/**
 * @api
 * @template-covariant TValueType of string
 * @template-extends StringType<TValueType>
 * @psalm-immutable
 */
readonly class StringConstType extends StringType
{
    /**
     * @psalm-param TValueType $value
     * @codeCoverageIgnore
     */
    public function __construct(
        public string $value,
    ) {}

    public function __toString(): string
    {
        return "'" . $this->value . "'";
    }

    public function isContravariantTo(TypeInterface $type): bool
    {
        return $type instanceof StringConstType && $type->value === $this->value;
    }
}
