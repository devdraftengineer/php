<?php

declare(strict_types=1);

namespace Devdraft\V0\PaymentIntents;

use Devdraft\Core\Attributes\Optional;
use Devdraft\Core\Attributes\Required;
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
 *   achReference?: string,
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
 *   phoneNumber?: string,
 *   sepaReference?: string,
 *   wireMessage?: string,
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
    #[Required(enum: StableCoinCurrency::class)]
    public string $destinationCurrency;

    /**
     * The blockchain network where the source currency resides. Determines gas fees and transaction speed.
     *
     * @var value-of<BridgePaymentRail> $destinationNetwork
     */
    #[Required(enum: BridgePaymentRail::class)]
    public string $destinationNetwork;

    /**
     * The fiat currency to convert FROM. Must match the currency of the source payment rail.
     *
     * @var value-of<SourceCurrency> $sourceCurrency
     */
    #[Required(enum: SourceCurrency::class)]
    public string $sourceCurrency;

    /**
     * The blockchain network where the source currency resides. Determines gas fees and transaction speed.
     *
     * @var value-of<BridgePaymentRail> $sourcePaymentRail
     */
    #[Required(enum: BridgePaymentRail::class)]
    public string $sourcePaymentRail;

    /**
     * ACH reference (for ACH transfers).
     */
    #[Optional('ach_reference')]
    public ?string $achReference;

    /**
     * Payment amount (optional for flexible amount).
     */
    #[Optional]
    public ?string $amount;

    /**
     * Customer address.
     */
    #[Optional('customer_address')]
    public ?string $customerAddress;

    /**
     * Customer country.
     */
    #[Optional('customer_country')]
    public ?string $customerCountry;

    /**
     * Customer country ISO code.
     */
    #[Optional('customer_countryISO')]
    public ?string $customerCountryISO;

    /**
     * Customer email address.
     */
    #[Optional('customer_email')]
    public ?string $customerEmail;

    /**
     * Customer first name.
     */
    #[Optional('customer_first_name')]
    public ?string $customerFirstName;

    /**
     * Customer last name.
     */
    #[Optional('customer_last_name')]
    public ?string $customerLastName;

    /**
     * Customer province/state.
     */
    #[Optional('customer_province')]
    public ?string $customerProvince;

    /**
     * Customer province/state ISO code.
     */
    #[Optional('customer_provinceISO')]
    public ?string $customerProvinceISO;

    /**
     * Destination wallet address. Supports Ethereum (0x...) and Solana address formats.
     */
    #[Optional]
    public ?string $destinationAddress;

    /**
     * Customer phone number.
     */
    #[Optional]
    public ?string $phoneNumber;

    /**
     * SEPA reference (for SEPA transfers).
     */
    #[Optional('sepa_reference')]
    public ?string $sepaReference;

    /**
     * Wire transfer message (for WIRE transfers).
     */
    #[Optional('wire_message')]
    public ?string $wireMessage;

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
    ): self {
        $obj = new self;

        $obj['destinationCurrency'] = $destinationCurrency;
        $obj['destinationNetwork'] = $destinationNetwork;
        $obj['sourceCurrency'] = $sourceCurrency;
        $obj['sourcePaymentRail'] = $sourcePaymentRail;

        null !== $achReference && $obj['achReference'] = $achReference;
        null !== $amount && $obj['amount'] = $amount;
        null !== $customerAddress && $obj['customerAddress'] = $customerAddress;
        null !== $customerCountry && $obj['customerCountry'] = $customerCountry;
        null !== $customerCountryISO && $obj['customerCountryISO'] = $customerCountryISO;
        null !== $customerEmail && $obj['customerEmail'] = $customerEmail;
        null !== $customerFirstName && $obj['customerFirstName'] = $customerFirstName;
        null !== $customerLastName && $obj['customerLastName'] = $customerLastName;
        null !== $customerProvince && $obj['customerProvince'] = $customerProvince;
        null !== $customerProvinceISO && $obj['customerProvinceISO'] = $customerProvinceISO;
        null !== $destinationAddress && $obj['destinationAddress'] = $destinationAddress;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $sepaReference && $obj['sepaReference'] = $sepaReference;
        null !== $wireMessage && $obj['wireMessage'] = $wireMessage;

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
        $obj['achReference'] = $achReference;

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
        $obj['customerAddress'] = $customerAddress;

        return $obj;
    }

    /**
     * Customer country.
     */
    public function withCustomerCountry(string $customerCountry): self
    {
        $obj = clone $this;
        $obj['customerCountry'] = $customerCountry;

        return $obj;
    }

    /**
     * Customer country ISO code.
     */
    public function withCustomerCountryISO(string $customerCountryISO): self
    {
        $obj = clone $this;
        $obj['customerCountryISO'] = $customerCountryISO;

        return $obj;
    }

    /**
     * Customer email address.
     */
    public function withCustomerEmail(string $customerEmail): self
    {
        $obj = clone $this;
        $obj['customerEmail'] = $customerEmail;

        return $obj;
    }

    /**
     * Customer first name.
     */
    public function withCustomerFirstName(string $customerFirstName): self
    {
        $obj = clone $this;
        $obj['customerFirstName'] = $customerFirstName;

        return $obj;
    }

    /**
     * Customer last name.
     */
    public function withCustomerLastName(string $customerLastName): self
    {
        $obj = clone $this;
        $obj['customerLastName'] = $customerLastName;

        return $obj;
    }

    /**
     * Customer province/state.
     */
    public function withCustomerProvince(string $customerProvince): self
    {
        $obj = clone $this;
        $obj['customerProvince'] = $customerProvince;

        return $obj;
    }

    /**
     * Customer province/state ISO code.
     */
    public function withCustomerProvinceISO(string $customerProvinceISO): self
    {
        $obj = clone $this;
        $obj['customerProvinceISO'] = $customerProvinceISO;

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
        $obj['sepaReference'] = $sepaReference;

        return $obj;
    }

    /**
     * Wire transfer message (for WIRE transfers).
     */
    public function withWireMessage(string $wireMessage): self
    {
        $obj = clone $this;
        $obj['wireMessage'] = $wireMessage;

        return $obj;
    }
}
