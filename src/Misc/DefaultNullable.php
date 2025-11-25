<?php

declare(strict_types=1);

namespace Argo\Types\Misc;

use Argo\Types\Atomic\MixedType;
use Argo\Types\Atomic\NullType;
use Argo\Types\Complex\UnionType;
use Argo\Types\TypeInterface;

/**
 * @template-covariant TType
 * @psalm-require-implements TypeInterface
 * @psalm-immutable
 */
trait DefaultNullable
{
    public function isNullable(): bool
    {
        return $this instanceof NullType || $this instanceof MixedType;
    }

    /**
     * @return TypeInterface<TType|null>
     */
    public function setNullable(): TypeInterface
    {
        if ($this->isNullable()) {
            return $this;
        }

        return new UnionType($this, new NullType());
    }
}
