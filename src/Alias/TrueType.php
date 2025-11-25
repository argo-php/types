<?php

declare(strict_types=1);

namespace Argo\Types\Alias;

use Argo\Types\Atomic\BoolType;

/**
 * @api
 * @extends BoolType<true>
 * @psalm-immutable
 */
readonly class TrueType extends BoolType
{
    /**
     * @codeCoverageIgnore
     */
    public function __construct()
    {
        parent::__construct(true);
    }
}
