<?php

declare(strict_types=1);

namespace Devdraft\V0\PaymentLinks\PaymentLinkCreateParams;

/**
 * Currency.
 */
enum Currency: string
{
    case USDC = 'usdc';

    case EURC = 'eurc';
}
