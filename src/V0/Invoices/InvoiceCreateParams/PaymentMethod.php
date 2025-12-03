<?php

declare(strict_types=1);

namespace Devdraft\V0\Invoices\InvoiceCreateParams;

enum PaymentMethod: string
{
    case ACH = 'ACH';

    case BANK_TRANSFER = 'BANK_TRANSFER';

    case CREDIT_CARD = 'CREDIT_CARD';

    case CASH = 'CASH';

    case MOBILE_MONEY = 'MOBILE_MONEY';

    case CRYPTO = 'CRYPTO';
}
