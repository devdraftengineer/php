<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Products\ProductCreateParams;
use Devdraft\V0\Products\ProductListParams;
use Devdraft\V0\Products\ProductUpdateParams;

interface ProductsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ProductCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|ProductCreateParams $params,
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
     * @param array<mixed>|ProductUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|ProductUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|ProductListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|ProductListParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function uploadImages(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
