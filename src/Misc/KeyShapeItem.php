<?php

declare(strict_types=1);

namespace Argo\Types\Misc;

use Argo\Types\TypeInterface;

/**
 * @api
 * @template-covariant TType
 * @psalm-immutable
 */
readonly class KeyShapeItem
{
    /**
     * @psalm-param TypeInterface<TType> $valueType
     */
    public function __construct(
        public string $keyName,
        public TypeInterface $valueType,
        public bool $isOptional = false,
    ) {}
}
