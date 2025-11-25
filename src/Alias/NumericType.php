<?php

declare(strict_types=1);

namespace Argo\Types\Alias;

use Argo\Types\Atomic\FloatType;
use Argo\Types\Atomic\IntType;
use Argo\Types\Complex\UnionType;

/**
 * @api
 * @extends UnionType<int|float|numeric-string>
 * @psalm-immutable
 */
readonly class NumericType extends UnionType
{
    /**
     * @codeCoverageIgnore
     */
    public function __construct()
    {
        parent::__construct(new IntType(), new FloatType(), new NumericStringType());
    }

    public function __toString(): string
    {
        return 'numeric';
    }
}
