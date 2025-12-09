<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\HealthContract;
use Devdraft\V0\Health\HealthCheckPublicResponse;
use Devdraft\V0\Health\HealthCheckResponse;

final class HealthService implements HealthContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
        /** @var BaseResponse<HealthCheckResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'api/v0/health',
            options: $requestOptions,
            convert: HealthCheckResponse::class,
        );

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
        /** @var BaseResponse<HealthCheckPublicResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'api/v0/health/public',
            options: $requestOptions,
            convert: HealthCheckPublicResponse::class,
        );

        return $response->parse();
    }
}
