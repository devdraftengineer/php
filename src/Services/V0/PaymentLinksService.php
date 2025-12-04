<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\PaymentLinksContract;
use Devdraft\V0\PaymentLinks\PaymentLinkCreateParams;
use Devdraft\V0\PaymentLinks\PaymentLinkListParams;

final class PaymentLinksService implements PaymentLinksContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new payment link with the provided details. Supports both simple one-time payments and complex product bundles.
     *
     * @param array{
     *   allowMobilePayment?: bool,
     *   allowQuantityAdjustment?: bool,
     *   collectAddress?: bool,
     *   collectTax?: bool,
     *   currency?: 'usdc'|'eurc',
     *   linkType: 'INVOICE'|'PRODUCT'|'COLLECTION'|'DONATION',
     *   title: string,
     *   url: string,
     *   amount?: float,
     *   coverImage?: string,
     *   customerId?: string,
     *   customFields?: mixed,
     *   description?: string,
     *   expiration_date?: string|\DateTimeInterface,
     *   isForAllProduct?: bool,
     *   limitPayments?: bool,
     *   maxPayments?: float,
     *   paymentForId?: string,
     *   paymentLinkProducts?: list<array{productId: string, quantity: int}>,
     *   taxId?: string,
     * }|PaymentLinkCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|PaymentLinkCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = PaymentLinkCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/v0/payment-links',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get a payment link by ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/v0/payment-links/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Update a payment link
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['api/v0/payment-links/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get all payment links
     *
     * @param array{skip?: string, take?: string}|PaymentLinkListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|PaymentLinkListParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PaymentLinkListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'api/v0/payment-links',
            query: $parsed,
            options: $options,
            convert: null,
        );
    }
}
