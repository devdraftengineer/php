<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\PaymentIntentsContract;
use Devdraft\V0\PaymentIntents\BridgePaymentRail;
use Devdraft\V0\PaymentIntents\PaymentIntentCreateBankParams;
use Devdraft\V0\PaymentIntents\PaymentIntentCreateStableParams;

final class PaymentIntentsService implements PaymentIntentsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new bank payment intent for fiat-to-stablecoin transfers.
     *
     * This endpoint allows you to create payment intents for bank transfers (ACH, Wire, SEPA) that convert to stablecoins.
     * Perfect for onboarding users from traditional banking to crypto.
     *
     * ## Supported Payment Rails
     * - **ACH_PUSH**: US bank transfers (same-day or standard)
     * - **WIRE**: International wire transfers
     * - **SEPA**: European bank transfers
     *
     * ## Use Cases
     * - USD bank account to USDC conversion
     * - EUR bank account to EURC conversion
     * - MXN bank account to stablecoin conversion
     * - Flexible amount payment intents for variable pricing
     *
     * ## Supported Source Currencies
     * - **USD**: US Dollar
     * - **EUR**: Euro
     * - **MXN**: Mexican Peso
     *
     * ## Example: USD Bank to USDC
     * ```json
     * {
     *   "sourcePaymentRail": "ach_push",
     *   "sourceCurrency": "usd",
     *   "destinationCurrency": "usdc",
     *   "destinationNetwork": "ethereum",
     *   "destinationAddress": "0x742d35Cc6634C0532925a3b8D4C9db96c4b4d8e1",
     *   "amount": "1000.00",
     *   "customer_first_name": "John",
     *   "customer_last_name": "Doe",
     *   "customer_email": "john.doe@example.com",
     *   "ach_reference": "INV12345"
     * }
     * ```
     *
     * ## Reference Fields
     * Use appropriate reference fields based on the payment rail:
     * - `ach_reference`: For ACH transfers (max 10 chars, alphanumeric + spaces)
     * - `wire_message`: For wire transfers (max 256 chars)
     * - `sepa_reference`: For SEPA transfers (6-140 chars, specific character set)
     *
     * ## Idempotency
     * Include an `idempotency-key` header with a unique UUID v4 to prevent duplicate payments. Subsequent requests with the same key will return the original response.
     *
     * @param array{
     *   destinationCurrency: 'usdc'|'eurc',
     *   destinationNetwork: value-of<BridgePaymentRail>,
     *   sourceCurrency: 'usd'|'eur'|'mxn',
     *   sourcePaymentRail: value-of<BridgePaymentRail>,
     *   ach_reference?: string,
     *   amount?: string,
     *   customer_address?: string,
     *   customer_country?: string,
     *   customer_countryISO?: string,
     *   customer_email?: string,
     *   customer_first_name?: string,
     *   customer_last_name?: string,
     *   customer_province?: string,
     *   customer_provinceISO?: string,
     *   destinationAddress?: string,
     *   phoneNumber?: string,
     *   sepa_reference?: string,
     *   wire_message?: string,
     * }|PaymentIntentCreateBankParams $params
     *
     * @throws APIException
     */
    public function createBank(
        array|PaymentIntentCreateBankParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = PaymentIntentCreateBankParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'api/v0/payment-intents/bank',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Creates a new stable payment intent for stablecoin-to-stablecoin transfers.
     *
     * This endpoint allows you to create payment intents for transfers between different stablecoins and networks.
     * Perfect for cross-chain stablecoin swaps and conversions.
     *
     * ## Use Cases
     * - USDC to EURC conversions
     * - Cross-chain stablecoin transfers (e.g., Ethereum USDC to Polygon USDC)
     * - Flexible amount payment intents for dynamic pricing
     *
     * ## Example: USDC to EURC Conversion
     * ```json
     * {
     *   "sourceCurrency": "usdc",
     *   "sourceNetwork": "ethereum",
     *   "destinationCurrency": "eurc",
     *   "destinationNetwork": "polygon",
     *   "destinationAddress": "0x742d35Cc6634C0532925a3b8D4C9db96c4b4d8e1",
     *   "amount": "100.00",
     *   "customer_first_name": "John",
     *   "customer_last_name": "Doe",
     *   "customer_email": "john.doe@example.com"
     * }
     * ```
     *
     * ## Flexible Amount Payments
     * Omit the `amount` field to create a flexible payment intent where users can specify the amount during payment.
     *
     * ## Idempotency
     * Include an `idempotency-key` header with a unique UUID v4 to prevent duplicate payments. Subsequent requests with the same key will return the original response.
     *
     * @param array{
     *   destinationNetwork: value-of<BridgePaymentRail>,
     *   sourceCurrency: 'usdc'|'eurc',
     *   sourceNetwork: value-of<BridgePaymentRail>,
     *   amount?: string,
     *   customer_address?: string,
     *   customer_country?: string,
     *   customer_countryISO?: string,
     *   customer_email?: string,
     *   customer_first_name?: string,
     *   customer_last_name?: string,
     *   customer_province?: string,
     *   customer_provinceISO?: string,
     *   destinationAddress?: string,
     *   destinationCurrency?: 'usdc'|'eurc',
     *   phoneNumber?: string,
     * }|PaymentIntentCreateStableParams $params
     *
     * @throws APIException
     */
    public function createStable(
        array|PaymentIntentCreateStableParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = PaymentIntentCreateStableParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'api/v0/payment-intents/stablecoin',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
