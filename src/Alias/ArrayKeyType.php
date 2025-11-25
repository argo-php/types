<?php

declare(strict_types=1);

namespace Argo\Types\Alias;

use Argo\Types\Atomic\IntType;
use Argo\Types\Atomic\StringType;
use Argo\Types\Complex\UnionType;

/**
 * @api
 * @extends UnionType<int|string>
 * @psalm-immutable
 */
readonly class ArrayKeyType extends UnionType
{
    /**
     * @codeCoverageIgnore
     */
    public function __construct()
    {
        parent::__construct(new IntType(), new StringType());
    }

    public function __toString(): string
    {
        return 'array-key';
    }
}
