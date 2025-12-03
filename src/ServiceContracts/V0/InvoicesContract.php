<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Invoices\InvoiceCreateParams;
use Devdraft\V0\Invoices\InvoiceListParams;
use Devdraft\V0\Invoices\InvoiceUpdateParams;

interface InvoicesContract
{
    /**
     * @api
     *
     * @param array<mixed>|InvoiceCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|InvoiceCreateParams $params,
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
     * @param array<mixed>|InvoiceUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|InvoiceUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|InvoiceListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|InvoiceListParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
