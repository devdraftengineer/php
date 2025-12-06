<?php

declare(strict_types=1);

namespace Devdraft\V0\PaymentIntents;

use Devdraft\Core\Attributes\Api;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;

/**
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
 * @see Devdraft\Services\V0\PaymentIntentsService::createStable()
 *
 * @phpstan-type PaymentIntentCreateStableParamsShape = array{
 *   destinationNetwork: BridgePaymentRail|value-of<BridgePaymentRail>,
 *   sourceCurrency: StableCoinCurrency|value-of<StableCoinCurrency>,
 *   sourceNetwork: BridgePaymentRail|value-of<BridgePaymentRail>,
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
 *   destinationCurrency?: StableCoinCurrency|value-of<StableCoinCurrency>,
 *   phoneNumber?: string,
 * }
 */
final class PaymentIntentCreateStableParams implements BaseModel
{
    /** @use SdkModel<PaymentIntentCreateStableParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The blockchain network where the source currency resides. Determines gas fees and transaction speed.
     *
     * @var value-of<BridgePaymentRail> $destinationNetwork
     */
    #[Api(enum: BridgePaymentRail::class)]
    public string $destinationNetwork;

    /**
     * The stablecoin currency to convert FROM. This is the currency the customer will pay with.
     *
     * @var value-of<StableCoinCurrency> $sourceCurrency
     */
    #[Api(enum: StableCoinCurrency::class)]
    public string $sourceCurrency;

    /**
     * The blockchain network where the source currency resides. Determines gas fees and transaction speed.
     *
     * @var value-of<BridgePaymentRail> $sourceNetwork
     */
    #[Api(enum: BridgePaymentRail::class)]
    public string $sourceNetwork;

    /**
     * Payment amount in the source currency. Omit for flexible amount payments where users specify the amount during checkout.
     */
    #[Api(optional: true)]
    public ?string $amount;

    /**
     * Customer's full address. Required for compliance in certain jurisdictions and high-value transactions.
     */
    #[Api(optional: true)]
    public ?string $customer_address;

    /**
     * Customer's country of residence. Used for compliance and tax reporting.
     */
    #[Api(optional: true)]
    public ?string $customer_country;

    /**
     * Customer's country ISO 3166-1 alpha-2 code. Used for automated compliance checks.
     */
    #[Api(optional: true)]
    public ?string $customer_countryISO;

    /**
     * Customer's email address. Used for transaction notifications and receipts. Highly recommended for all transactions.
     */
    #[Api(optional: true)]
    public ?string $customer_email;

    /**
     * Customer's first name. Used for transaction records and compliance. Required for amounts over $1000.
     */
    #[Api(optional: true)]
    public ?string $customer_first_name;

    /**
     * Customer's last name. Used for transaction records and compliance. Required for amounts over $1000.
     */
    #[Api(optional: true)]
    public ?string $customer_last_name;

    /**
     * Customer's state or province. Required for US and Canadian customers.
     */
    #[Api(optional: true)]
    public ?string $customer_province;

    /**
     * Customer's state or province ISO code. Used for automated tax calculations.
     */
    #[Api(optional: true)]
    public ?string $customer_provinceISO;

    /**
     * The wallet address where converted funds will be sent. Supports Ethereum (0x...) and Solana address formats.
     */
    #[Api(optional: true)]
    public ?string $destinationAddress;

    /**
     * The stablecoin currency to convert FROM. This is the currency the customer will pay with.
     *
     * @var value-of<StableCoinCurrency>|null $destinationCurrency
     */
    #[Api(enum: StableCoinCurrency::class, optional: true)]
    public ?string $destinationCurrency;

    /**
     * Customer's phone number with country code. Used for SMS notifications and verification.
     */
    #[Api(optional: true)]
    public ?string $phoneNumber;

    /**
     * `new PaymentIntentCreateStableParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PaymentIntentCreateStableParams::with(
     *   destinationNetwork: ..., sourceCurrency: ..., sourceNetwork: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PaymentIntentCreateStableParams)
     *   ->withDestinationNetwork(...)
     *   ->withSourceCurrency(...)
     *   ->withSourceNetwork(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param BridgePaymentRail|value-of<BridgePaymentRail> $destinationNetwork
     * @param StableCoinCurrency|value-of<StableCoinCurrency> $sourceCurrency
     * @param BridgePaymentRail|value-of<BridgePaymentRail> $sourceNetwork
     * @param StableCoinCurrency|value-of<StableCoinCurrency> $destinationCurrency
     */
    public static function with(
        BridgePaymentRail|string $destinationNetwork,
        StableCoinCurrency|string $sourceCurrency,
        BridgePaymentRail|string $sourceNetwork,
        ?string $amount = null,
        ?string $customer_address = null,
        ?string $customer_country = null,
        ?string $customer_countryISO = null,
        ?string $customer_email = null,
        ?string $customer_first_name = null,
        ?string $customer_last_name = null,
        ?string $customer_province = null,
        ?string $customer_provinceISO = null,
        ?string $destinationAddress = null,
        StableCoinCurrency|string|null $destinationCurrency = null,
        ?string $phoneNumber = null,
    ): self {
        $obj = new self;

        $obj['destinationNetwork'] = $destinationNetwork;
        $obj['sourceCurrency'] = $sourceCurrency;
        $obj['sourceNetwork'] = $sourceNetwork;

        null !== $amount && $obj['amount'] = $amount;
        null !== $customer_address && $obj['customer_address'] = $customer_address;
        null !== $customer_country && $obj['customer_country'] = $customer_country;
        null !== $customer_countryISO && $obj['customer_countryISO'] = $customer_countryISO;
        null !== $customer_email && $obj['customer_email'] = $customer_email;
        null !== $customer_first_name && $obj['customer_first_name'] = $customer_first_name;
        null !== $customer_last_name && $obj['customer_last_name'] = $customer_last_name;
        null !== $customer_province && $obj['customer_province'] = $customer_province;
        null !== $customer_provinceISO && $obj['customer_provinceISO'] = $customer_provinceISO;
        null !== $destinationAddress && $obj['destinationAddress'] = $destinationAddress;
        null !== $destinationCurrency && $obj['destinationCurrency'] = $destinationCurrency;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * The blockchain network where the source currency resides. Determines gas fees and transaction speed.
     *
     * @param BridgePaymentRail|value-of<BridgePaymentRail> $destinationNetwork
     */
    public function withDestinationNetwork(
        BridgePaymentRail|string $destinationNetwork
    ): self {
        $obj = clone $this;
        $obj['destinationNetwork'] = $destinationNetwork;

        return $obj;
    }

    /**
     * The stablecoin currency to convert FROM. This is the currency the customer will pay with.
     *
     * @param StableCoinCurrency|value-of<StableCoinCurrency> $sourceCurrency
     */
    public function withSourceCurrency(
        StableCoinCurrency|string $sourceCurrency
    ): self {
        $obj = clone $this;
        $obj['sourceCurrency'] = $sourceCurrency;

        return $obj;
    }

    /**
     * The blockchain network where the source currency resides. Determines gas fees and transaction speed.
     *
     * @param BridgePaymentRail|value-of<BridgePaymentRail> $sourceNetwork
     */
    public function withSourceNetwork(
        BridgePaymentRail|string $sourceNetwork
    ): self {
        $obj = clone $this;
        $obj['sourceNetwork'] = $sourceNetwork;

        return $obj;
    }

    /**
     * Payment amount in the source currency. Omit for flexible amount payments where users specify the amount during checkout.
     */
    public function withAmount(string $amount): self
    {
        $obj = clone $this;
        $obj['amount'] = $amount;

        return $obj;
    }

    /**
     * Customer's full address. Required for compliance in certain jurisdictions and high-value transactions.
     */
    public function withCustomerAddress(string $customerAddress): self
    {
        $obj = clone $this;
        $obj['customer_address'] = $customerAddress;

        return $obj;
    }

    /**
     * Customer's country of residence. Used for compliance and tax reporting.
     */
    public function withCustomerCountry(string $customerCountry): self
    {
        $obj = clone $this;
        $obj['customer_country'] = $customerCountry;

        return $obj;
    }

    /**
     * Customer's country ISO 3166-1 alpha-2 code. Used for automated compliance checks.
     */
    public function withCustomerCountryISO(string $customerCountryISO): self
    {
        $obj = clone $this;
        $obj['customer_countryISO'] = $customerCountryISO;

        return $obj;
    }

    /**
     * Customer's email address. Used for transaction notifications and receipts. Highly recommended for all transactions.
     */
    public function withCustomerEmail(string $customerEmail): self
    {
        $obj = clone $this;
        $obj['customer_email'] = $customerEmail;

        return $obj;
    }

    /**
     * Customer's first name. Used for transaction records and compliance. Required for amounts over $1000.
     */
    public function withCustomerFirstName(string $customerFirstName): self
    {
        $obj = clone $this;
        $obj['customer_first_name'] = $customerFirstName;

        return $obj;
    }

    /**
     * Customer's last name. Used for transaction records and compliance. Required for amounts over $1000.
     */
    public function withCustomerLastName(string $customerLastName): self
    {
        $obj = clone $this;
        $obj['customer_last_name'] = $customerLastName;

        return $obj;
    }

    /**
     * Customer's state or province. Required for US and Canadian customers.
     */
    public function withCustomerProvince(string $customerProvince): self
    {
        $obj = clone $this;
        $obj['customer_province'] = $customerProvince;

        return $obj;
    }

    /**
     * Customer's state or province ISO code. Used for automated tax calculations.
     */
    public function withCustomerProvinceISO(string $customerProvinceISO): self
    {
        $obj = clone $this;
        $obj['customer_provinceISO'] = $customerProvinceISO;

        return $obj;
    }

    /**
     * The wallet address where converted funds will be sent. Supports Ethereum (0x...) and Solana address formats.
     */
    public function withDestinationAddress(string $destinationAddress): self
    {
        $obj = clone $this;
        $obj['destinationAddress'] = $destinationAddress;

        return $obj;
    }

    /**
     * The stablecoin currency to convert FROM. This is the currency the customer will pay with.
     *
     * @param StableCoinCurrency|value-of<StableCoinCurrency> $destinationCurrency
     */
    public function withDestinationCurrency(
        StableCoinCurrency|string $destinationCurrency
    ): self {
        $obj = clone $this;
        $obj['destinationCurrency'] = $destinationCurrency;

        return $obj;
    }

    /**
     * Customer's phone number with country code. Used for SMS notifications and verification.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }
}
