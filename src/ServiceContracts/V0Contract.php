<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Devdraft\RequestOptions
 */
interface V0Contract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getWallets(
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
