<?php

declare(strict_types=1);

namespace Devdraft\V0\PaymentIntents\PaymentIntentCreateBankParams;

/**
 * The fiat currency to convert FROM. Must match the currency of the source payment rail.
 */
enum SourceCurrency: string
{
    case USD = 'usd';

    case EUR = 'eur';

    case MXN = 'mxn';
}
