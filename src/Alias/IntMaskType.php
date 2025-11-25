<?php

declare(strict_types=1);

namespace Argo\Types\Alias;

use Argo\Types\Atomic\IntType;

/**
 * @api
 * @extends IntType<int>
 * @psalm-immutable
 */
readonly class IntMaskType extends IntType
{
    public array $values;

    /**
     * @codeCoverageIgnore
     */
    public function __construct(int $value, int ...$values)
    {
        $this->values = array_merge([$value], $values);
    }

    public function __toString(): string
    {
        return 'int-mask<' . implode(', ', $this->values) . '>';
    }
}
