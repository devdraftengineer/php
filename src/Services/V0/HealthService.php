<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\HealthContract;
use Devdraft\V0\Health\HealthCheckPublicResponse;
use Devdraft\V0\Health\HealthCheckResponse;

final class HealthService implements HealthContract
{
    /**
     * @api
     */
    public HealthRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new HealthRawService($client);
    }

    /**
     * @api
     *
     * Authenticated health check endpoint
     *
     * @throws APIException
     */
    public function check(
        ?RequestOptions $requestOptions = null
    ): HealthCheckResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->check(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Public health check endpoint
     *
     * @throws APIException
     */
    public function checkPublic(
        ?RequestOptions $requestOptions = null
    ): HealthCheckPublicResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->checkPublic(requestOptions: $requestOptions);

        return $response->parse();
    }
}
