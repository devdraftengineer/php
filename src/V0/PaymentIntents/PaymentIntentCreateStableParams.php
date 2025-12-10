<?php

declare(strict_types=1);

namespace Devdraft\V0\PaymentIntents;

use Devdraft\Core\Attributes\Optional;
use Devdraft\Core\Attributes\Required;
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
 *   customerAddress?: string,
 *   customerCountry?: string,
 *   customerCountryISO?: string,
 *   customerEmail?: string,
 *   customerFirstName?: string,
 *   customerLastName?: string,
 *   customerProvince?: string,
 *   customerProvinceISO?: string,
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
    #[Required(enum: BridgePaymentRail::class)]
    public string $destinationNetwork;

    /**
     * The stablecoin currency to convert FROM. This is the currency the customer will pay with.
     *
     * @var value-of<StableCoinCurrency> $sourceCurrency
     */
    #[Required(enum: StableCoinCurrency::class)]
    public string $sourceCurrency;

    /**
     * The blockchain network where the source currency resides. Determines gas fees and transaction speed.
     *
     * @var value-of<BridgePaymentRail> $sourceNetwork
     */
    #[Required(enum: BridgePaymentRail::class)]
    public string $sourceNetwork;

    /**
     * Payment amount in the source currency. Omit for flexible amount payments where users specify the amount during checkout.
     */
    #[Optional]
    public ?string $amount;

    /**
     * Customer's full address. Required for compliance in certain jurisdictions and high-value transactions.
     */
    #[Optional('customer_address')]
    public ?string $customerAddress;

    /**
     * Customer's country of residence. Used for compliance and tax reporting.
     */
    #[Optional('customer_country')]
    public ?string $customerCountry;

    /**
     * Customer's country ISO 3166-1 alpha-2 code. Used for automated compliance checks.
     */
    #[Optional('customer_countryISO')]
    public ?string $customerCountryISO;

    /**
     * Customer's email address. Used for transaction notifications and receipts. Highly recommended for all transactions.
     */
    #[Optional('customer_email')]
    public ?string $customerEmail;

    /**
     * Customer's first name. Used for transaction records and compliance. Required for amounts over $1000.
     */
    #[Optional('customer_first_name')]
    public ?string $customerFirstName;

    /**
     * Customer's last name. Used for transaction records and compliance. Required for amounts over $1000.
     */
    #[Optional('customer_last_name')]
    public ?string $customerLastName;

    /**
     * Customer's state or province. Required for US and Canadian customers.
     */
    #[Optional('customer_province')]
    public ?string $customerProvince;

    /**
     * Customer's state or province ISO code. Used for automated tax calculations.
     */
    #[Optional('customer_provinceISO')]
    public ?string $customerProvinceISO;

    /**
     * The wallet address where converted funds will be sent. Supports Ethereum (0x...) and Solana address formats.
     */
    #[Optional]
    public ?string $destinationAddress;

    /**
     * The stablecoin currency to convert FROM. This is the currency the customer will pay with.
     *
     * @var value-of<StableCoinCurrency>|null $destinationCurrency
     */
    #[Optional(enum: StableCoinCurrency::class)]
    public ?string $destinationCurrency;

    /**
     * Customer's phone number with country code. Used for SMS notifications and verification.
     */
    #[Optional]
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
        ?string $customerAddress = null,
        ?string $customerCountry = null,
        ?string $customerCountryISO = null,
        ?string $customerEmail = null,
        ?string $customerFirstName = null,
        ?string $customerLastName = null,
        ?string $customerProvince = null,
        ?string $customerProvinceISO = null,
        ?string $destinationAddress = null,
        StableCoinCurrency|string|null $destinationCurrency = null,
        ?string $phoneNumber = null,
    ): self {
        $self = new self;

        $self['destinationNetwork'] = $destinationNetwork;
        $self['sourceCurrency'] = $sourceCurrency;
        $self['sourceNetwork'] = $sourceNetwork;

        null !== $amount && $self['amount'] = $amount;
        null !== $customerAddress && $self['customerAddress'] = $customerAddress;
        null !== $customerCountry && $self['customerCountry'] = $customerCountry;
        null !== $customerCountryISO && $self['customerCountryISO'] = $customerCountryISO;
        null !== $customerEmail && $self['customerEmail'] = $customerEmail;
        null !== $customerFirstName && $self['customerFirstName'] = $customerFirstName;
        null !== $customerLastName && $self['customerLastName'] = $customerLastName;
        null !== $customerProvince && $self['customerProvince'] = $customerProvince;
        null !== $customerProvinceISO && $self['customerProvinceISO'] = $customerProvinceISO;
        null !== $destinationAddress && $self['destinationAddress'] = $destinationAddress;
        null !== $destinationCurrency && $self['destinationCurrency'] = $destinationCurrency;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * The blockchain network where the source currency resides. Determines gas fees and transaction speed.
     *
     * @param BridgePaymentRail|value-of<BridgePaymentRail> $destinationNetwork
     */
    public function withDestinationNetwork(
        BridgePaymentRail|string $destinationNetwork
    ): self {
        $self = clone $this;
        $self['destinationNetwork'] = $destinationNetwork;

        return $self;
    }

    /**
     * The stablecoin currency to convert FROM. This is the currency the customer will pay with.
     *
     * @param StableCoinCurrency|value-of<StableCoinCurrency> $sourceCurrency
     */
    public function withSourceCurrency(
        StableCoinCurrency|string $sourceCurrency
    ): self {
        $self = clone $this;
        $self['sourceCurrency'] = $sourceCurrency;

        return $self;
    }

    /**
     * The blockchain network where the source currency resides. Determines gas fees and transaction speed.
     *
     * @param BridgePaymentRail|value-of<BridgePaymentRail> $sourceNetwork
     */
    public function withSourceNetwork(
        BridgePaymentRail|string $sourceNetwork
    ): self {
        $self = clone $this;
        $self['sourceNetwork'] = $sourceNetwork;

        return $self;
    }

    /**
     * Payment amount in the source currency. Omit for flexible amount payments where users specify the amount during checkout.
     */
    public function withAmount(string $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * Customer's full address. Required for compliance in certain jurisdictions and high-value transactions.
     */
    public function withCustomerAddress(string $customerAddress): self
    {
        $self = clone $this;
        $self['customerAddress'] = $customerAddress;

        return $self;
    }

    /**
     * Customer's country of residence. Used for compliance and tax reporting.
     */
    public function withCustomerCountry(string $customerCountry): self
    {
        $self = clone $this;
        $self['customerCountry'] = $customerCountry;

        return $self;
    }

    /**
     * Customer's country ISO 3166-1 alpha-2 code. Used for automated compliance checks.
     */
    public function withCustomerCountryISO(string $customerCountryISO): self
    {
        $self = clone $this;
        $self['customerCountryISO'] = $customerCountryISO;

        return $self;
    }

    /**
     * Customer's email address. Used for transaction notifications and receipts. Highly recommended for all transactions.
     */
    public function withCustomerEmail(string $customerEmail): self
    {
        $self = clone $this;
        $self['customerEmail'] = $customerEmail;

        return $self;
    }

    /**
     * Customer's first name. Used for transaction records and compliance. Required for amounts over $1000.
     */
    public function withCustomerFirstName(string $customerFirstName): self
    {
        $self = clone $this;
        $self['customerFirstName'] = $customerFirstName;

        return $self;
    }

    /**
     * Customer's last name. Used for transaction records and compliance. Required for amounts over $1000.
     */
    public function withCustomerLastName(string $customerLastName): self
    {
        $self = clone $this;
        $self['customerLastName'] = $customerLastName;

        return $self;
    }

    /**
     * Customer's state or province. Required for US and Canadian customers.
     */
    public function withCustomerProvince(string $customerProvince): self
    {
        $self = clone $this;
        $self['customerProvince'] = $customerProvince;

        return $self;
    }

    /**
     * Customer's state or province ISO code. Used for automated tax calculations.
     */
    public function withCustomerProvinceISO(string $customerProvinceISO): self
    {
        $self = clone $this;
        $self['customerProvinceISO'] = $customerProvinceISO;

        return $self;
    }

    /**
     * The wallet address where converted funds will be sent. Supports Ethereum (0x...) and Solana address formats.
     */
    public function withDestinationAddress(string $destinationAddress): self
    {
        $self = clone $this;
        $self['destinationAddress'] = $destinationAddress;

        return $self;
    }

    /**
     * The stablecoin currency to convert FROM. This is the currency the customer will pay with.
     *
     * @param StableCoinCurrency|value-of<StableCoinCurrency> $destinationCurrency
     */
    public function withDestinationCurrency(
        StableCoinCurrency|string $destinationCurrency
    ): self {
        $self = clone $this;
        $self['destinationCurrency'] = $destinationCurrency;

        return $self;
    }

    /**
     * Customer's phone number with country code. Used for SMS notifications and verification.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
