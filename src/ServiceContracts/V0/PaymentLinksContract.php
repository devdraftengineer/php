<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\PaymentLinks\PaymentLinkCreateParams;
use Devdraft\V0\PaymentLinks\PaymentLinkListParams;

interface PaymentLinksContract
{
    /**
     * @api
     *
     * @param array<mixed>|PaymentLinkCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|PaymentLinkCreateParams $params,
        ?RequestOptions $requestOptions = null,
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
     * @throws APIException
     */
    public function update(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|PaymentLinkListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|PaymentLinkListParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
