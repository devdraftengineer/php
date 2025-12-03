<?php

declare(strict_types=1);

namespace Devdraft\V0\Invoices\InvoiceUpdateParams;

/**
 * Delivery method.
 */
enum Delivery: string
{
    case EMAIL = 'EMAIL';

    case MANUALLY = 'MANUALLY';
}
