<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Health\HealthCheckPublicResponse;
use Devdraft\V0\Health\HealthCheckResponse;

interface HealthContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function check(
        ?RequestOptions $requestOptions = null
    ): HealthCheckResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function checkPublic(
        ?RequestOptions $requestOptions = null
    ): HealthCheckPublicResponse;
}
