<?php

declare(strict_types=1);

namespace Devdraft\V0\Customers;

/**
 * Current status of the customer account. Controls access to services and features.
 */
enum CustomerStatus: string
{
    case ACTIVE = 'ACTIVE';

    case BLACKLISTED = 'BLACKLISTED';

    case DEACTIVATED = 'DEACTIVATED';

    case DELETED = 'DELETED';
}
