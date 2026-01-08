<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts;

use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Devdraft\RequestOptions
 */
interface V0RawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getWallets(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
