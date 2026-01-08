<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\PaymentIntents\BridgePaymentRail;
use Devdraft\V0\PaymentIntents\PaymentIntentCreateBankParams\SourceCurrency;
use Devdraft\V0\PaymentIntents\StableCoinCurrency;

/**
 * @phpstan-import-type RequestOpts from \Devdraft\RequestOptions
 */
interface PaymentIntentsContract
{
    /**
     * @api
     *
     * @param StableCoinCurrency|value-of<StableCoinCurrency> $destinationCurrency The stablecoin currency to convert FROM. This is the currency the customer will pay with.
     * @param BridgePaymentRail|value-of<BridgePaymentRail> $destinationNetwork The blockchain network where the source currency resides. Determines gas fees and transaction speed.
     * @param BridgePaymentRail|value-of<BridgePaymentRail> $sourcePaymentRail The blockchain network where the source currency resides. Determines gas fees and transaction speed.
     * @param SourceCurrency|value-of<SourceCurrency> $sourceCurrency The fiat currency to convert FROM. Must match the currency of the source payment rail.
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createBank(
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
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param BridgePaymentRail|value-of<BridgePaymentRail> $destinationNetwork The blockchain network where the source currency resides. Determines gas fees and transaction speed.
     * @param StableCoinCurrency|value-of<StableCoinCurrency> $sourceCurrency The stablecoin currency to convert FROM. This is the currency the customer will pay with.
     * @param BridgePaymentRail|value-of<BridgePaymentRail> $sourceNetwork The blockchain network where the source currency resides. Determines gas fees and transaction speed.
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
     * @param StableCoinCurrency|value-of<StableCoinCurrency> $destinationCurrency The stablecoin currency to convert FROM. This is the currency the customer will pay with.
     * @param string $phoneNumber Customer's phone number with country code. Used for SMS notifications and verification.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createStable(
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
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
