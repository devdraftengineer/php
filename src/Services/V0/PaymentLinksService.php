<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\Core\Util;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\PaymentLinksContract;
use Devdraft\V0\PaymentLinks\PaymentLinkCreateParams\Currency;
use Devdraft\V0\PaymentLinks\PaymentLinkCreateParams\LinkType;

final class PaymentLinksService implements PaymentLinksContract
{
    /**
     * @api
     */
    public PaymentLinksRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PaymentLinksRawService($client);
    }

    /**
     * @api
     *
     * Creates a new payment link with the provided details. Supports both simple one-time payments and complex product bundles.
     *
     * @param 'INVOICE'|'PRODUCT'|'COLLECTION'|'DONATION'|LinkType $linkType Type of the payment link
     * @param string $title Display title for the payment link. This appears on the checkout page and in customer communications.
     * @param string $url Unique URL slug for the payment link. Can be a full URL or just the path segment. Must be unique within your account.
     * @param bool $allowMobilePayment Whether to allow mobile payment
     * @param bool $allowQuantityAdjustment Whether to allow quantity adjustment
     * @param bool $collectAddress Whether to collect address
     * @param bool $collectTax Whether to collect tax
     * @param 'usdc'|'eurc'|Currency $currency Currency
     * @param float $amount Amount for the payment link
     * @param string $coverImage Cover image URL
     * @param string $customerID Customer ID
     * @param mixed $customFields Custom fields
     * @param string $description Detailed description of what the customer is purchasing. Supports markdown formatting.
     * @param string|\DateTimeInterface $expirationDate Expiration date
     * @param bool $isForAllProduct Whether the payment link is for all products
     * @param bool $limitPayments Whether to limit payments
     * @param float $maxPayments Maximum number of payments
     * @param string $paymentForID Payment for ID
     * @param list<array{
     *   productID: string, quantity: int
     * }> $paymentLinkProducts Array of products in the payment link
     * @param string $taxID Tax ID
     *
     * @throws APIException
     */
    public function create(
        string|LinkType $linkType,
        string $title,
        string $url,
        bool $allowMobilePayment = false,
        bool $allowQuantityAdjustment = true,
        bool $collectAddress = false,
        bool $collectTax = false,
        string|Currency $currency = 'usdc',
        ?float $amount = null,
        ?string $coverImage = null,
        ?string $customerID = null,
        mixed $customFields = null,
        ?string $description = null,
        string|\DateTimeInterface|null $expirationDate = null,
        bool $isForAllProduct = false,
        bool $limitPayments = false,
        ?float $maxPayments = null,
        ?string $paymentForID = null,
        ?array $paymentLinkProducts = null,
        ?string $taxID = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'allowMobilePayment' => $allowMobilePayment,
                'allowQuantityAdjustment' => $allowQuantityAdjustment,
                'collectAddress' => $collectAddress,
                'collectTax' => $collectTax,
                'currency' => $currency,
                'linkType' => $linkType,
                'title' => $title,
                'url' => $url,
                'amount' => $amount,
                'coverImage' => $coverImage,
                'customerID' => $customerID,
                'customFields' => $customFields,
                'description' => $description,
                'expirationDate' => $expirationDate,
                'isForAllProduct' => $isForAllProduct,
                'limitPayments' => $limitPayments,
                'maxPayments' => $maxPayments,
                'paymentForID' => $paymentForID,
                'paymentLinkProducts' => $paymentLinkProducts,
                'taxID' => $taxID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a payment link by ID
     *
     * @param string $id Payment Link ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a payment link
     *
     * @param string $id Payment Link ID
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all payment links
     *
     * @param string $skip Number of records to skip (must be non-negative)
     * @param string $take Number of records to take (must be positive)
     *
     * @throws APIException
     */
    public function list(
        ?string $skip = null,
        ?string $take = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['skip' => $skip, 'take' => $take]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
