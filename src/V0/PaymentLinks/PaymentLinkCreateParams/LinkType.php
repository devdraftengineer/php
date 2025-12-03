<?php

declare(strict_types=1);

namespace Devdraft\V0\PaymentLinks\PaymentLinkCreateParams;

/**
 * Type of the payment link.
 */
enum LinkType: string
{
    case INVOICE = 'INVOICE';

    case PRODUCT = 'PRODUCT';

    case COLLECTION = 'COLLECTION';

    case DONATION = 'DONATION';
}
