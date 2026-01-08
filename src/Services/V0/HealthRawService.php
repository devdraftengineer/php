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

/**
 * @phpstan-import-type RequestOpts from \Devdraft\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HealthCheckResponse>
     *
     * @throws APIException
     */
    public function check(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HealthCheckPublicResponse>
     *
     * @throws APIException
     */
    public function checkPublic(
        RequestOptions|array|null $requestOptions = null
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
