<?php

declare(strict_types=1);

namespace Devdraft\Services;

use Devdraft\Client;
use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0RawContract;

final class V0RawService implements V0RawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get wallets for an app
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getWallets(
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'api/v0/wallets',
            options: $requestOptions,
            convert: null,
        );
    }
}
