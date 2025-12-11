<?php

declare(strict_types=1);

namespace Devdraft\Core\Conversion;

use Devdraft\Core\Conversion\Concerns\ArrayOf;
use Devdraft\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class ListOf implements Converter
{
    use ArrayOf;

    // @phpstan-ignore-next-line missingType.iterableValue
    private function empty(): array|object
    {
        return [];
    }
}
