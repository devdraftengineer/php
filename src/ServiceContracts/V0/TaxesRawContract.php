<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Taxes\TaxCreateParams;
use Devdraft\V0\Taxes\TaxListParams;
use Devdraft\V0\Taxes\TaxNewResponse;
use Devdraft\V0\Taxes\TaxUpdateParams;

interface TaxesRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|TaxCreateParams $params
     *
     * @return BaseResponse<TaxNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|TaxCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Tax unique identifier (UUID)
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
     * @param string $id Tax unique identifier (UUID)
     * @param array<mixed>|TaxUpdateParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|TaxUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|TaxListParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function list(
        array|TaxListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Tax unique identifier (UUID)
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteAll(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateAll(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
