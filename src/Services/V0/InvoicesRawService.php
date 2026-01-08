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
use Devdraft\V0\Invoices\InvoiceCreateParams\Item;
use Devdraft\V0\Invoices\InvoiceCreateParams\PaymentMethod;
use Devdraft\V0\Invoices\InvoiceCreateParams\Status;
use Devdraft\V0\Invoices\InvoiceListParams;
use Devdraft\V0\Invoices\InvoiceUpdateParams;

/**
 * @phpstan-import-type ItemShape from \Devdraft\V0\Invoices\InvoiceCreateParams\Item
 * @phpstan-import-type ItemShape from \Devdraft\V0\Invoices\InvoiceUpdateParams\Item as ItemShape1
 * @phpstan-import-type RequestOpts from \Devdraft\RequestOptions
 */
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
     *   currency: Currency|value-of<Currency>,
     *   customerID: string,
     *   delivery: Delivery|value-of<Delivery>,
     *   dueDate: \DateTimeInterface,
     *   email: string,
     *   items: list<Item|ItemShape>,
     *   name: string,
     *   partialPayment: bool,
     *   paymentLink: bool,
     *   paymentMethods: list<PaymentMethod|value-of<PaymentMethod>>,
     *   status: Status|value-of<Status>,
     *   address?: string,
     *   logo?: string,
     *   phoneNumber?: string,
     *   sendDate?: \DateTimeInterface,
     *   taxID?: string,
     * }|InvoiceCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function create(
        array|InvoiceCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
     *   currency: InvoiceUpdateParams\Currency|value-of<InvoiceUpdateParams\Currency>,
     *   customerID: string,
     *   delivery: InvoiceUpdateParams\Delivery|value-of<InvoiceUpdateParams\Delivery>,
     *   dueDate: \DateTimeInterface,
     *   email: string,
     *   items: list<InvoiceUpdateParams\Item|ItemShape1>,
     *   name: string,
     *   partialPayment: bool,
     *   paymentLink: bool,
     *   paymentMethods: list<InvoiceUpdateParams\PaymentMethod|value-of<InvoiceUpdateParams\PaymentMethod>>,
     *   status: InvoiceUpdateParams\Status|value-of<InvoiceUpdateParams\Status>,
     *   address?: string,
     *   logo?: string,
     *   phoneNumber?: string,
     *   sendDate?: \DateTimeInterface,
     *   taxID?: string,
     * }|InvoiceUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|InvoiceUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function list(
        array|InvoiceListParams $params,
        RequestOptions|array|null $requestOptions = null,
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
