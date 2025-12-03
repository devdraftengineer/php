<?php

declare(strict_types=1);

namespace Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressCreateParams;

/**
 * Currency for sending funds.
 */
enum DestinationCurrency: string
{
    case USD = 'usd';

    case EUR = 'eur';

    case MXN = 'mxn';

    case USDC = 'usdc';

    case EURC = 'eurc';

    case DAI = 'dai';

    case PYUSD = 'pyusd';

    case USDT = 'usdt';
}
