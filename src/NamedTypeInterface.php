<?php

declare(strict_types=1);

namespace Argo\Types;

/**
 * @api
 * @template-covariant TType
 * @extends TypeInterface<TType>
 * @psalm-immutable
 */
interface NamedTypeInterface extends TypeInterface {}
