<?php

declare(strict_types=1);

namespace Argo\Types\Alias;

use Argo\Types\Atomic\MixedType;
use Argo\Types\Atomic\NeverType;
use Argo\Types\Atomic\NotType;
use Argo\Types\Complex\IntersectType;
use Argo\Types\Misc\ShapeItems;
use Argo\Types\TypeInterface;

/**
 * @api
 * @template-covariant TType of non-empty-list
 * @extends ListType<TType>
 * @psalm-immutable
 */
readonly class NonEmptyListType extends ListType
{
    /**
     * @template TValueType
     * @param TypeInterface<TValueType> $valueType
     * @psalm-this-out static<non-empty-list<TValueType>>
     * @codeCoverageIgnore
     */
    public function __construct(
        TypeInterface $valueType = new MixedType(),
        ?ShapeItems $shapeItems = null,
    ) {
        parent::__construct($valueType, $shapeItems);
    }

    public function isContravariantTo(TypeInterface $type): bool
    {
        $realType = new IntersectType(
            new ListType($this->valueType),
            new NotType(new ListType(new NeverType())),
        );

        return $realType->isContravariantTo($type);
    }

    protected function getStringAlias(): string
    {
        return 'non-empty-list';
    }
}
