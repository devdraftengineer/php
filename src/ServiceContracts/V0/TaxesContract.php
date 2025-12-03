<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Taxes\TaxCreateParams;
use Devdraft\V0\Taxes\TaxListParams;
use Devdraft\V0\Taxes\TaxNewResponse;
use Devdraft\V0\Taxes\TaxUpdateParams;

interface TaxesContract
{
    /**
     * @api
     *
     * @param array<mixed>|TaxCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|TaxCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): TaxNewResponse;

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
     * @param array<mixed>|TaxUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|TaxUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|TaxListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|TaxListParams $params,
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
    public function deleteAll(?RequestOptions $requestOptions = null): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function updateAll(?RequestOptions $requestOptions = null): mixed;
}
