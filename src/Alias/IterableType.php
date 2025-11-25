<?php

declare(strict_types=1);

namespace Argo\Types\Alias;

use Argo\Types\Atomic\ArrayType;
use Argo\Types\Atomic\ClassType;
use Argo\Types\Atomic\MixedType;
use Argo\Types\Complex\UnionType;
use Argo\Types\Misc\TemplateType;
use Argo\Types\TypeInterface;

/**
 * @api
 * @extends UnionType<iterable>
 * @psalm-immutable
 */
readonly class IterableType extends UnionType
{
    /**
     * @codeCoverageIgnore
     */
    public function __construct(
        public TypeInterface $valueType = new MixedType(),
        public TypeInterface $keyType = new ArrayKeyType(),
    ) {
        $templateKeyType = new TemplateType($keyType);
        $templateValueType = new TemplateType($valueType, isCovariant: true);

        parent::__construct(
            new ArrayType($valueType, $keyType),
            new ClassType(\Traversable::class, [$templateKeyType, $templateValueType]),
        );
    }

    public function __toString(): string
    {
        $result = 'iterable';

        if ($this->keyType instanceof ArrayKeyType) {
            if ($this->valueType instanceof MixedType) {
                return $result;
            } else {
                return $result . '<' . (string) $this->valueType . '>';
            }
        }

        return $result . '<' . (string) $this->valueType . ', ' . (string) $this->keyType . '>';
    }


    public function toNativeTypeString(): string
    {
        return 'iterable';
    }
}
