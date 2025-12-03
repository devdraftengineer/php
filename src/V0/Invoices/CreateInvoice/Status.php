<?php

declare(strict_types=1);

namespace Devdraft\V0\Invoices\CreateInvoice;

/**
 * Invoice status.
 */
enum Status: string
{
    case DRAFT = 'DRAFT';

    case OPEN = 'OPEN';

    case PASTDUE = 'PASTDUE';

    case PAID = 'PAID';

    case PARTIALLYPAID = 'PARTIALLYPAID';
}
