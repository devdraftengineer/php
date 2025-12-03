<?php

declare(strict_types=1);

namespace Devdraft\V0\Invoices\InvoiceCreateParams;

/**
 * Currency for the invoice.
 */
enum Currency: string
{
    case USDC = 'usdc';

    case EURC = 'eurc';
}
