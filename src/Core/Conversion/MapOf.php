<?php

declare(strict_types=1);

namespace Devdraft\Core\Conversion;

use Devdraft\Core\Conversion\Concerns\ArrayOf;
use Devdraft\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class MapOf implements Converter
{
    use ArrayOf;
}
