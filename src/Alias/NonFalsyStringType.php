<?php

declare(strict_types=1);

namespace Argo\Types\Alias;

use Argo\Types\Atomic\NotType;
use Argo\Types\Atomic\StringType;
use Argo\Types\Complex\IntersectType;
use Argo\Types\TypeInterface;

/**
 * @api
 * @extends StringType<non-falsy-string>
 * @psalm-immutable
 */
readonly class NonFalsyStringType extends StringType
{
    public function isContravariantTo(TypeInterface $type): bool
    {
        $realType = new IntersectType(
            new NonEmptyStringType(),
            new NotType(new StringConstType('0')),
        );

        return $realType->isContravariantTo($type);
    }

    public function __toString(): string
    {
        return 'non-falsy-string';
    }
}
