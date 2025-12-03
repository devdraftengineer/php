<?php

declare(strict_types=1);

namespace Devdraft\V0\Health\HealthCheckResponse;

/**
 * Overall health status of the service. Returns "ok" when healthy, "error" when issues detected.
 */
enum Status: string
{
    case OK = 'ok';

    case ERROR = 'error';
}
