<?php

declare(strict_types=1);

namespace Argo\Types\Alias;

use Argo\Types\Atomic\StringType;
use Argo\Types\TypeInterface;

/**
 * @api
 * @template-extends StringType<callable-string>
 * @psalm-immutable
 */
readonly class CallableStringType extends StringType
{
    public function __toString(): string
    {
        return 'callable-string';
    }

    public function isContravariantTo(TypeInterface $type): bool
    {
        return $type instanceof CallableStringType;
    }
}
