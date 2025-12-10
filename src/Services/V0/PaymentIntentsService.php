<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\PaymentIntentsContract;
use Devdraft\V0\PaymentIntents\BridgePaymentRail;
use Devdraft\V0\PaymentIntents\PaymentIntentCreateBankParams\SourceCurrency;
use Devdraft\V0\PaymentIntents\StableCoinCurrency;

final class PaymentIntentsService implements PaymentIntentsContract
{
    /**
     * @api
     */
    public PaymentIntentsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PaymentIntentsRawService($client);
    }

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
     * @param 'usdc'|'eurc'|StableCoinCurrency $destinationCurrency The stablecoin currency to convert FROM. This is the currency the customer will pay with.
     * @param 'ethereum'|'solana'|'polygon'|'avalanche_c_chain'|'base'|'arbitrum'|'optimism'|'stellar'|'tron'|'bridge_wallet'|'wire'|'ach'|'ach_push'|'ach_same_day'|'sepa'|'swift'|'spei'|BridgePaymentRail $destinationNetwork The blockchain network where the source currency resides. Determines gas fees and transaction speed.
     * @param 'ethereum'|'solana'|'polygon'|'avalanche_c_chain'|'base'|'arbitrum'|'optimism'|'stellar'|'tron'|'bridge_wallet'|'wire'|'ach'|'ach_push'|'ach_same_day'|'sepa'|'swift'|'spei'|BridgePaymentRail $sourcePaymentRail The blockchain network where the source currency resides. Determines gas fees and transaction speed.
     * @param 'usd'|'eur'|'mxn'|SourceCurrency $sourceCurrency The fiat currency to convert FROM. Must match the currency of the source payment rail.
     * @param string $achReference ACH reference (for ACH transfers)
     * @param string $amount Payment amount (optional for flexible amount)
     * @param string $customerAddress Customer address
     * @param string $customerCountry Customer country
     * @param string $customerCountryISO Customer country ISO code
     * @param string $customerEmail Customer email address
     * @param string $customerFirstName Customer first name
     * @param string $customerLastName Customer last name
     * @param string $customerProvince Customer province/state
     * @param string $customerProvinceISO Customer province/state ISO code
     * @param string $destinationAddress Destination wallet address. Supports Ethereum (0x...) and Solana address formats.
     * @param string $phoneNumber Customer phone number
     * @param string $sepaReference SEPA reference (for SEPA transfers)
     * @param string $wireMessage Wire transfer message (for WIRE transfers)
     *
     * @throws APIException
     */
    public function createBank(
        string|StableCoinCurrency $destinationCurrency,
        string|BridgePaymentRail $destinationNetwork,
        string|BridgePaymentRail $sourcePaymentRail,
        string|SourceCurrency $sourceCurrency = 'usd',
        ?string $achReference = null,
        ?string $amount = null,
        ?string $customerAddress = null,
        ?string $customerCountry = null,
        ?string $customerCountryISO = null,
        ?string $customerEmail = null,
        ?string $customerFirstName = null,
        ?string $customerLastName = null,
        ?string $customerProvince = null,
        ?string $customerProvinceISO = null,
        ?string $destinationAddress = null,
        ?string $phoneNumber = null,
        ?string $sepaReference = null,
        ?string $wireMessage = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'destinationCurrency' => $destinationCurrency,
            'destinationNetwork' => $destinationNetwork,
            'sourceCurrency' => $sourceCurrency,
            'sourcePaymentRail' => $sourcePaymentRail,
            'achReference' => $achReference,
            'amount' => $amount,
            'customerAddress' => $customerAddress,
            'customerCountry' => $customerCountry,
            'customerCountryISO' => $customerCountryISO,
            'customerEmail' => $customerEmail,
            'customerFirstName' => $customerFirstName,
            'customerLastName' => $customerLastName,
            'customerProvince' => $customerProvince,
            'customerProvinceISO' => $customerProvinceISO,
            'destinationAddress' => $destinationAddress,
            'phoneNumber' => $phoneNumber,
            'sepaReference' => $sepaReference,
            'wireMessage' => $wireMessage,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createBank(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
     * @param 'ethereum'|'solana'|'polygon'|'avalanche_c_chain'|'base'|'arbitrum'|'optimism'|'stellar'|'tron'|'bridge_wallet'|'wire'|'ach'|'ach_push'|'ach_same_day'|'sepa'|'swift'|'spei'|BridgePaymentRail $destinationNetwork The blockchain network where the source currency resides. Determines gas fees and transaction speed.
     * @param 'usdc'|'eurc'|StableCoinCurrency $sourceCurrency The stablecoin currency to convert FROM. This is the currency the customer will pay with.
     * @param 'ethereum'|'solana'|'polygon'|'avalanche_c_chain'|'base'|'arbitrum'|'optimism'|'stellar'|'tron'|'bridge_wallet'|'wire'|'ach'|'ach_push'|'ach_same_day'|'sepa'|'swift'|'spei'|BridgePaymentRail $sourceNetwork The blockchain network where the source currency resides. Determines gas fees and transaction speed.
     * @param string $amount Payment amount in the source currency. Omit for flexible amount payments where users specify the amount during checkout.
     * @param string $customerAddress Customer's full address. Required for compliance in certain jurisdictions and high-value transactions.
     * @param string $customerCountry Customer's country of residence. Used for compliance and tax reporting.
     * @param string $customerCountryISO Customer's country ISO 3166-1 alpha-2 code. Used for automated compliance checks.
     * @param string $customerEmail Customer's email address. Used for transaction notifications and receipts. Highly recommended for all transactions.
     * @param string $customerFirstName Customer's first name. Used for transaction records and compliance. Required for amounts over $1000.
     * @param string $customerLastName Customer's last name. Used for transaction records and compliance. Required for amounts over $1000.
     * @param string $customerProvince Customer's state or province. Required for US and Canadian customers.
     * @param string $customerProvinceISO Customer's state or province ISO code. Used for automated tax calculations.
     * @param string $destinationAddress The wallet address where converted funds will be sent. Supports Ethereum (0x...) and Solana address formats.
     * @param 'usdc'|'eurc'|StableCoinCurrency $destinationCurrency The stablecoin currency to convert FROM. This is the currency the customer will pay with.
     * @param string $phoneNumber Customer's phone number with country code. Used for SMS notifications and verification.
     *
     * @throws APIException
     */
    public function createStable(
        string|BridgePaymentRail $destinationNetwork,
        string|StableCoinCurrency $sourceCurrency,
        string|BridgePaymentRail $sourceNetwork,
        ?string $amount = null,
        ?string $customerAddress = null,
        ?string $customerCountry = null,
        ?string $customerCountryISO = null,
        ?string $customerEmail = null,
        ?string $customerFirstName = null,
        ?string $customerLastName = null,
        ?string $customerProvince = null,
        ?string $customerProvinceISO = null,
        ?string $destinationAddress = null,
        string|StableCoinCurrency|null $destinationCurrency = null,
        ?string $phoneNumber = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'destinationNetwork' => $destinationNetwork,
            'sourceCurrency' => $sourceCurrency,
            'sourceNetwork' => $sourceNetwork,
            'amount' => $amount,
            'customerAddress' => $customerAddress,
            'customerCountry' => $customerCountry,
            'customerCountryISO' => $customerCountryISO,
            'customerEmail' => $customerEmail,
            'customerFirstName' => $customerFirstName,
            'customerLastName' => $customerLastName,
            'customerProvince' => $customerProvince,
            'customerProvinceISO' => $customerProvinceISO,
            'destinationAddress' => $destinationAddress,
            'destinationCurrency' => $destinationCurrency,
            'phoneNumber' => $phoneNumber,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createStable(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
