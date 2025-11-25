<?php

declare(strict_types=1);

namespace Argo\Types\Misc;

use Argo\Types\Atomic\MixedType;
use Argo\Types\TypeInterface;

/**
 * @api
 * @psalm-immutable
 */
readonly class TemplateType
{
    public function __construct(
        public TypeInterface $type = new MixedType(),
        public bool $isCovariant = false,
        public bool $isContravariant = false,
    ) {}

    public function isContravariantTo(TemplateType $templateType): bool
    {
        if ($this->isContravariant || $templateType->isCovariant) {
            return $this->type->isContravariantTo($templateType->type);
        }

        return $this->type == $templateType->type;
    }
}
