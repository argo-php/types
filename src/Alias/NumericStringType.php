<?php

declare(strict_types=1);

namespace Argo\Types\Alias;

use Argo\Types\Atomic\StringType;

/**
 * @api
 * @template-extends StringType<numeric-string>
 * @psalm-immutable
 */
readonly class NumericStringType extends StringType
{
    public function __toString(): string
    {
        return 'numeric-string';
    }
}
