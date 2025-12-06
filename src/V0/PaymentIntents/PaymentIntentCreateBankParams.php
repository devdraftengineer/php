<?php

declare(strict_types=1);

namespace Devdraft\V0\PaymentIntents;

use Devdraft\Core\Attributes\Api;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;
use Devdraft\V0\PaymentIntents\PaymentIntentCreateBankParams\SourceCurrency;

/**
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
 * @see Devdraft\Services\V0\PaymentIntentsService::createBank()
 *
 * @phpstan-type PaymentIntentCreateBankParamsShape = array{
 *   destinationCurrency: StableCoinCurrency|value-of<StableCoinCurrency>,
 *   destinationNetwork: BridgePaymentRail|value-of<BridgePaymentRail>,
 *   sourceCurrency: SourceCurrency|value-of<SourceCurrency>,
 *   sourcePaymentRail: BridgePaymentRail|value-of<BridgePaymentRail>,
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
 * }
 */
final class PaymentIntentCreateBankParams implements BaseModel
{
    /** @use SdkModel<PaymentIntentCreateBankParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The stablecoin currency to convert FROM. This is the currency the customer will pay with.
     *
     * @var value-of<StableCoinCurrency> $destinationCurrency
     */
    #[Api(enum: StableCoinCurrency::class)]
    public string $destinationCurrency;

    /**
     * The blockchain network where the source currency resides. Determines gas fees and transaction speed.
     *
     * @var value-of<BridgePaymentRail> $destinationNetwork
     */
    #[Api(enum: BridgePaymentRail::class)]
    public string $destinationNetwork;

    /**
     * The fiat currency to convert FROM. Must match the currency of the source payment rail.
     *
     * @var value-of<SourceCurrency> $sourceCurrency
     */
    #[Api(enum: SourceCurrency::class)]
    public string $sourceCurrency;

    /**
     * The blockchain network where the source currency resides. Determines gas fees and transaction speed.
     *
     * @var value-of<BridgePaymentRail> $sourcePaymentRail
     */
    #[Api(enum: BridgePaymentRail::class)]
    public string $sourcePaymentRail;

    /**
     * ACH reference (for ACH transfers).
     */
    #[Api(optional: true)]
    public ?string $ach_reference;

    /**
     * Payment amount (optional for flexible amount).
     */
    #[Api(optional: true)]
    public ?string $amount;

    /**
     * Customer address.
     */
    #[Api(optional: true)]
    public ?string $customer_address;

    /**
     * Customer country.
     */
    #[Api(optional: true)]
    public ?string $customer_country;

    /**
     * Customer country ISO code.
     */
    #[Api(optional: true)]
    public ?string $customer_countryISO;

    /**
     * Customer email address.
     */
    #[Api(optional: true)]
    public ?string $customer_email;

    /**
     * Customer first name.
     */
    #[Api(optional: true)]
    public ?string $customer_first_name;

    /**
     * Customer last name.
     */
    #[Api(optional: true)]
    public ?string $customer_last_name;

    /**
     * Customer province/state.
     */
    #[Api(optional: true)]
    public ?string $customer_province;

    /**
     * Customer province/state ISO code.
     */
    #[Api(optional: true)]
    public ?string $customer_provinceISO;

    /**
     * Destination wallet address. Supports Ethereum (0x...) and Solana address formats.
     */
    #[Api(optional: true)]
    public ?string $destinationAddress;

    /**
     * Customer phone number.
     */
    #[Api(optional: true)]
    public ?string $phoneNumber;

    /**
     * SEPA reference (for SEPA transfers).
     */
    #[Api(optional: true)]
    public ?string $sepa_reference;

    /**
     * Wire transfer message (for WIRE transfers).
     */
    #[Api(optional: true)]
    public ?string $wire_message;

    /**
     * `new PaymentIntentCreateBankParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PaymentIntentCreateBankParams::with(
     *   destinationCurrency: ...,
     *   destinationNetwork: ...,
     *   sourceCurrency: ...,
     *   sourcePaymentRail: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PaymentIntentCreateBankParams)
     *   ->withDestinationCurrency(...)
     *   ->withDestinationNetwork(...)
     *   ->withSourceCurrency(...)
     *   ->withSourcePaymentRail(...)
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
     * @param StableCoinCurrency|value-of<StableCoinCurrency> $destinationCurrency
     * @param BridgePaymentRail|value-of<BridgePaymentRail> $destinationNetwork
     * @param BridgePaymentRail|value-of<BridgePaymentRail> $sourcePaymentRail
     * @param SourceCurrency|value-of<SourceCurrency> $sourceCurrency
     */
    public static function with(
        StableCoinCurrency|string $destinationCurrency,
        BridgePaymentRail|string $destinationNetwork,
        BridgePaymentRail|string $sourcePaymentRail,
        SourceCurrency|string $sourceCurrency = 'usd',
        ?string $ach_reference = null,
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
        ?string $phoneNumber = null,
        ?string $sepa_reference = null,
        ?string $wire_message = null,
    ): self {
        $obj = new self;

        $obj['destinationCurrency'] = $destinationCurrency;
        $obj['destinationNetwork'] = $destinationNetwork;
        $obj['sourceCurrency'] = $sourceCurrency;
        $obj['sourcePaymentRail'] = $sourcePaymentRail;

        null !== $ach_reference && $obj['ach_reference'] = $ach_reference;
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
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $sepa_reference && $obj['sepa_reference'] = $sepa_reference;
        null !== $wire_message && $obj['wire_message'] = $wire_message;

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
     * The fiat currency to convert FROM. Must match the currency of the source payment rail.
     *
     * @param SourceCurrency|value-of<SourceCurrency> $sourceCurrency
     */
    public function withSourceCurrency(
        SourceCurrency|string $sourceCurrency
    ): self {
        $obj = clone $this;
        $obj['sourceCurrency'] = $sourceCurrency;

        return $obj;
    }

    /**
     * The blockchain network where the source currency resides. Determines gas fees and transaction speed.
     *
     * @param BridgePaymentRail|value-of<BridgePaymentRail> $sourcePaymentRail
     */
    public function withSourcePaymentRail(
        BridgePaymentRail|string $sourcePaymentRail
    ): self {
        $obj = clone $this;
        $obj['sourcePaymentRail'] = $sourcePaymentRail;

        return $obj;
    }

    /**
     * ACH reference (for ACH transfers).
     */
    public function withACHReference(string $achReference): self
    {
        $obj = clone $this;
        $obj['ach_reference'] = $achReference;

        return $obj;
    }

    /**
     * Payment amount (optional for flexible amount).
     */
    public function withAmount(string $amount): self
    {
        $obj = clone $this;
        $obj['amount'] = $amount;

        return $obj;
    }

    /**
     * Customer address.
     */
    public function withCustomerAddress(string $customerAddress): self
    {
        $obj = clone $this;
        $obj['customer_address'] = $customerAddress;

        return $obj;
    }

    /**
     * Customer country.
     */
    public function withCustomerCountry(string $customerCountry): self
    {
        $obj = clone $this;
        $obj['customer_country'] = $customerCountry;

        return $obj;
    }

    /**
     * Customer country ISO code.
     */
    public function withCustomerCountryISO(string $customerCountryISO): self
    {
        $obj = clone $this;
        $obj['customer_countryISO'] = $customerCountryISO;

        return $obj;
    }

    /**
     * Customer email address.
     */
    public function withCustomerEmail(string $customerEmail): self
    {
        $obj = clone $this;
        $obj['customer_email'] = $customerEmail;

        return $obj;
    }

    /**
     * Customer first name.
     */
    public function withCustomerFirstName(string $customerFirstName): self
    {
        $obj = clone $this;
        $obj['customer_first_name'] = $customerFirstName;

        return $obj;
    }

    /**
     * Customer last name.
     */
    public function withCustomerLastName(string $customerLastName): self
    {
        $obj = clone $this;
        $obj['customer_last_name'] = $customerLastName;

        return $obj;
    }

    /**
     * Customer province/state.
     */
    public function withCustomerProvince(string $customerProvince): self
    {
        $obj = clone $this;
        $obj['customer_province'] = $customerProvince;

        return $obj;
    }

    /**
     * Customer province/state ISO code.
     */
    public function withCustomerProvinceISO(string $customerProvinceISO): self
    {
        $obj = clone $this;
        $obj['customer_provinceISO'] = $customerProvinceISO;

        return $obj;
    }

    /**
     * Destination wallet address. Supports Ethereum (0x...) and Solana address formats.
     */
    public function withDestinationAddress(string $destinationAddress): self
    {
        $obj = clone $this;
        $obj['destinationAddress'] = $destinationAddress;

        return $obj;
    }

    /**
     * Customer phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * SEPA reference (for SEPA transfers).
     */
    public function withSepaReference(string $sepaReference): self
    {
        $obj = clone $this;
        $obj['sepa_reference'] = $sepaReference;

        return $obj;
    }

    /**
     * Wire transfer message (for WIRE transfers).
     */
    public function withWireMessage(string $wireMessage): self
    {
        $obj = clone $this;
        $obj['wire_message'] = $wireMessage;

        return $obj;
    }
}
