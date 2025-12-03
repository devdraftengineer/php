<?php

declare(strict_types=1);

namespace Devdraft\V0\Balance\AggregatedBalance;

/**
 * The stablecoin currency.
 */
enum Currency: string
{
    case USDC = 'usdc';

    case EURC = 'eurc';
}
