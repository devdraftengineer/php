<?php

declare(strict_types=1);

namespace Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressCreateParams;

/**
 * The currency for the liquidation address.
 */
enum Currency: string
{
    case USDC = 'usdc';

    case EURC = 'eurc';

    case DAI = 'dai';

    case PYUSD = 'pyusd';

    case USDT = 'usdt';
}
