<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;

interface V0Contract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function getWallets(?RequestOptions $requestOptions = null): mixed;
}
