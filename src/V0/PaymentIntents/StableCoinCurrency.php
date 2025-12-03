<?php

declare(strict_types=1);

namespace Devdraft\V0\PaymentIntents;

/**
 * The stablecoin currency to convert FROM. This is the currency the customer will pay with.
 */
enum StableCoinCurrency: string
{
    case USDC = 'usdc';

    case EURC = 'eurc';
}
