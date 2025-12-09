<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\InvoicesContract;
use Devdraft\V0\Invoices\InvoiceCreateParams;
use Devdraft\V0\Invoices\InvoiceListParams;
use Devdraft\V0\Invoices\InvoiceUpdateParams;

final class InvoicesService implements InvoicesContract
{
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
     *   currency: 'usdc'|'eurc',
     *   customer_id: string,
     *   delivery: 'EMAIL'|'MANUALLY',
     *   due_date: string|\DateTimeInterface,
     *   email: string,
     *   items: list<array{product_id: string, quantity: float}>,
     *   name: string,
     *   partial_payment: bool,
     *   payment_link: bool,
     *   payment_methods: list<'ACH'|'BANK_TRANSFER'|'CREDIT_CARD'|'CASH'|'MOBILE_MONEY'|'CRYPTO'>,
     *   status: 'DRAFT'|'OPEN'|'PASTDUE'|'PAID'|'PARTIALLYPAID',
     *   address?: string,
     *   logo?: string,
     *   phone_number?: string,
     *   send_date?: string|\DateTimeInterface,
     *   taxId?: string,
     * }|InvoiceCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|InvoiceCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = InvoiceCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: 'api/v0/invoices',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get an invoice by ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'get',
            path: ['api/v0/invoices/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an invoice
     *
     * @param array{
     *   currency: 'usdc'|'eurc',
     *   customer_id: string,
     *   delivery: 'EMAIL'|'MANUALLY',
     *   due_date: string|\DateTimeInterface,
     *   email: string,
     *   items: list<array{product_id: string, quantity: float}>,
     *   name: string,
     *   partial_payment: bool,
     *   payment_link: bool,
     *   payment_methods: list<'ACH'|'BANK_TRANSFER'|'CREDIT_CARD'|'CASH'|'MOBILE_MONEY'|'CRYPTO'>,
     *   status: 'DRAFT'|'OPEN'|'PASTDUE'|'PAID'|'PARTIALLYPAID',
     *   address?: string,
     *   logo?: string,
     *   phone_number?: string,
     *   send_date?: string|\DateTimeInterface,
     *   taxId?: string,
     * }|InvoiceUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|InvoiceUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = InvoiceUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'put',
            path: ['api/v0/invoices/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all invoices
     *
     * @param array{skip?: float, take?: float}|InvoiceListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|InvoiceListParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = InvoiceListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'get',
            path: 'api/v0/invoices',
            query: $parsed,
            options: $options,
            convert: null,
        );

        return $response->parse();
    }
}
