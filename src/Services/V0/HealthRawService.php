<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\HealthRawContract;
use Devdraft\V0\Health\HealthCheckPublicResponse;
use Devdraft\V0\Health\HealthCheckResponse;

final class HealthRawService implements HealthRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Authenticated health check endpoint
     *
     * @return BaseResponse<HealthCheckResponse>
     *
     * @throws APIException
     */
    public function check(?RequestOptions $requestOptions = null): BaseResponse
    {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'api/v0/health',
            options: $requestOptions,
            convert: HealthCheckResponse::class,
        );
    }

    /**
     * @api
     *
     * Public health check endpoint
     *
     * @return BaseResponse<HealthCheckPublicResponse>
     *
     * @throws APIException
     */
    public function checkPublic(
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'api/v0/health/public',
            options: $requestOptions,
            convert: HealthCheckPublicResponse::class,
        );
    }
}
