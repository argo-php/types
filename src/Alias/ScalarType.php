<?php

declare(strict_types=1);

namespace Argo\Types\Alias;

use Argo\Types\Atomic\BoolType;
use Argo\Types\Atomic\FloatType;
use Argo\Types\Atomic\IntType;
use Argo\Types\Atomic\StringType;
use Argo\Types\Complex\UnionType;

/**
 * @api
 * @extends UnionType<string|int|float|bool>
 * @psalm-immutable
 */
readonly class ScalarType extends UnionType
{
    /**
     * @codeCoverageIgnore
     */
    public function __construct()
    {
        parent::__construct(new StringType(), new IntType(), new FloatType(), new BoolType());
    }

    public function __toString(): string
    {
        return 'scalar';
    }
}
