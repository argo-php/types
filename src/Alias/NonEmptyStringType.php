<?php

declare(strict_types=1);

namespace Argo\Types\Alias;

use Argo\Types\Atomic\NotType;
use Argo\Types\Atomic\StringType;
use Argo\Types\Complex\IntersectType;
use Argo\Types\TypeInterface;

/**
 * @api
 * @extends StringType<non-empty-string>
 * @psalm-immutable
 */
readonly class NonEmptyStringType extends StringType
{
    public function isContravariantTo(TypeInterface $type): bool
    {
        $realType = new IntersectType(
            new StringType(),
            new NotType(new StringConstType('')),
        );

        return $realType->isContravariantTo($type);
    }

    public function __toString(): string
    {
        return 'non-empty-string';
    }
}
