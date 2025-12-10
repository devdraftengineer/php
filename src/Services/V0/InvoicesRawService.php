<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\InvoicesRawContract;
use Devdraft\V0\Invoices\InvoiceCreateParams;
use Devdraft\V0\Invoices\InvoiceCreateParams\Currency;
use Devdraft\V0\Invoices\InvoiceCreateParams\Delivery;
use Devdraft\V0\Invoices\InvoiceCreateParams\PaymentMethod;
use Devdraft\V0\Invoices\InvoiceCreateParams\Status;
use Devdraft\V0\Invoices\InvoiceListParams;
use Devdraft\V0\Invoices\InvoiceUpdateParams;

final class InvoicesRawService implements InvoicesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new invoice
     *
     * @param array{
     *   currency: 'usdc'|'eurc'|Currency,
     *   customerID: string,
     *   delivery: 'EMAIL'|'MANUALLY'|Delivery,
     *   dueDate: string|\DateTimeInterface,
     *   email: string,
     *   items: list<array{productID: string, quantity: float}>,
     *   name: string,
     *   partialPayment: bool,
     *   paymentLink: bool,
     *   paymentMethods: list<'ACH'|'BANK_TRANSFER'|'CREDIT_CARD'|'CASH'|'MOBILE_MONEY'|'CRYPTO'|PaymentMethod>,
     *   status: 'DRAFT'|'OPEN'|'PASTDUE'|'PAID'|'PARTIALLYPAID'|Status,
     *   address?: string,
     *   logo?: string,
     *   phoneNumber?: string,
     *   sendDate?: string|\DateTimeInterface,
     *   taxID?: string,
     * }|InvoiceCreateParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function create(
        array|InvoiceCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = InvoiceCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/v0/invoices',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get an invoice by ID
     *
     * @param string $id Invoice ID
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/v0/invoices/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Update an invoice
     *
     * @param string $id Invoice ID
     * @param array{
     *   currency: 'usdc'|'eurc'|InvoiceUpdateParams\Currency,
     *   customerID: string,
     *   delivery: 'EMAIL'|'MANUALLY'|InvoiceUpdateParams\Delivery,
     *   dueDate: string|\DateTimeInterface,
     *   email: string,
     *   items: list<array{productID: string, quantity: float}>,
     *   name: string,
     *   partialPayment: bool,
     *   paymentLink: bool,
     *   paymentMethods: list<'ACH'|'BANK_TRANSFER'|'CREDIT_CARD'|'CASH'|'MOBILE_MONEY'|'CRYPTO'|InvoiceUpdateParams\PaymentMethod>,
     *   status: 'DRAFT'|'OPEN'|'PASTDUE'|'PAID'|'PARTIALLYPAID'|InvoiceUpdateParams\Status,
     *   address?: string,
     *   logo?: string,
     *   phoneNumber?: string,
     *   sendDate?: string|\DateTimeInterface,
     *   taxID?: string,
     * }|InvoiceUpdateParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|InvoiceUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InvoiceUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['api/v0/invoices/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get all invoices
     *
     * @param array{skip?: float, take?: float}|InvoiceListParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function list(
        array|InvoiceListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = InvoiceListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'api/v0/invoices',
            query: $parsed,
            options: $options,
            convert: null,
        );
    }
}
