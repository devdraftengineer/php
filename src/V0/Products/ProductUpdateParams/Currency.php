<?php

declare(strict_types=1);

namespace Devdraft\V0\Products\ProductUpdateParams;

/**
 * Currency code for the price. Defaults to USD if not specified.
 */
enum Currency: string
{
    case USD = 'USD';

    case EUR = 'EUR';

    case GBP = 'GBP';

    case CAD = 'CAD';

    case AUD = 'AUD';

    case JPY = 'JPY';
}
