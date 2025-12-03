<?php

declare(strict_types=1);

namespace Devdraft\V0\Customers;

/**
 * Type of customer account. Determines available features and compliance requirements.
 */
enum CustomerType: string
{
    case INDIVIDUAL = 'Individual';

    case STARTUP = 'Startup';

    case SMALL_BUSINESS = 'Small Business';

    case MEDIUM_BUSINESS = 'Medium Business';

    case ENTERPRISE = 'Enterprise';

    case NON_PROFIT = 'Non-Profit';

    case GOVERNMENT = 'Government';
}
