<?php

declare(strict_types=1);

namespace Devdraft\Core\Conversion\Contracts;

use Devdraft\Core\Conversion\CoerceState;
use Devdraft\Core\Conversion\DumpState;

/**
 * @internal
 */
interface Converter
{
    /**
     * @internal
     */
    public function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public function dump(mixed $value, DumpState $state): mixed;
}
