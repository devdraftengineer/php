<?php

declare(strict_types=1);

namespace Devdraft\V0\Transfers\TransferCreateExternalBankTransferParams;

/**
 * The destination payment rail (fiat payment method).
 */
enum DestinationPaymentRail: string
{
    case ACH = 'ach';

    case ACH_PUSH = 'ach_push';

    case ACH_SAME_DAY = 'ach_same_day';

    case WIRE = 'wire';

    case SEPA = 'sepa';

    case SWIFT = 'swift';

    case SPEI = 'spei';
}
