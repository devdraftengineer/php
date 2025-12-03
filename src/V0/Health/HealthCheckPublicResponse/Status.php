<?php

declare(strict_types=1);

namespace Devdraft\V0\Health\HealthCheckPublicResponse;

/**
 * Basic health status of the service. Returns "ok" when the service is responding.
 */
enum Status: string
{
    case OK = 'ok';

    case ERROR = 'error';
}
