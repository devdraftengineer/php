<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Customers\CustomerCreateParams;
use Devdraft\V0\Customers\CustomerListParams;
use Devdraft\V0\Customers\CustomerUpdateParams;

interface CustomersRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|CustomerCreateParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function create(
        array|CustomerCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Customer unique identifier (UUID)
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Customer unique identifier (UUID)
     * @param array<mixed>|CustomerUpdateParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|CustomerUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|CustomerListParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function list(
        array|CustomerListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
