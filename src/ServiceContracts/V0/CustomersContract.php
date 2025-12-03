<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Customers\CustomerCreateParams;
use Devdraft\V0\Customers\CustomerListParams;
use Devdraft\V0\Customers\CustomerUpdateParams;

interface CustomersContract
{
    /**
     * @api
     *
     * @param array<mixed>|CustomerCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|CustomerCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|CustomerUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|CustomerUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|CustomerListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|CustomerListParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
