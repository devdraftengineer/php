<?php

declare(strict_types=1);

namespace Devdraft\V0\Health\HealthCheckResponse;

/**
 * Database connectivity status. Shows "connected" when database is accessible, "error" when connection fails.
 */
enum Database: string
{
    case CONNECTED = 'connected';

    case ERROR = 'error';
}
