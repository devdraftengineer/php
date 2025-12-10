<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts;

use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;

interface V0RawContract
{
    /**
     * @api
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getWallets(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
