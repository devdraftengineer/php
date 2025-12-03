<?php

declare(strict_types=1);

namespace Devdraft\V0\Customers\LiquidationAddresses;

use Devdraft\Core\Attributes\Api;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressCreateParams\Chain;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressCreateParams\Currency;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressCreateParams\DestinationCurrency;
use Devdraft\V0\PaymentIntents\BridgePaymentRail;

/**
 *       Create a new liquidation address for a customer. Liquidation addresses allow
 *       customers to automatically liquidate cryptocurrency holdings to fiat or other
 *       stablecoins based on configured parameters.
 *
 *       **Required fields:**
 *       - chain: Blockchain network (ethereum, polygon, arbitrum, base)
 *       - currency: Stablecoin currency (usdc, eurc, dai, pyusd, usdt)
 *       - address: Valid blockchain address
 *
 *       **At least one destination must be specified:**
 *       - external_account_id: External bank account
 *       - prefunded_account_id: Developer's prefunded account
 *       - bridge_wallet_id: Bridge wallet
 *       - destination_address: Crypto wallet address
 *
 *       **Payment Rails:**
 *       Different payment rails have different requirements:
 *       - ACH: Requires external_account_id, supports destination_ach_reference
 *       - SEPA: Requires external_account_id, supports destination_sepa_reference
 *       - Wire: Requires external_account_id, supports destination_wire_message
 *       - Crypto: Requires destination_address, supports destination_blockchain_memo
 *
 * @see Devdraft\Services\V0\Customers\LiquidationAddressesService::create()
 *
 * @phpstan-type LiquidationAddressCreateParamsShape = array{
 *   address: string,
 *   chain: Chain|value-of<Chain>,
 *   currency: Currency|value-of<Currency>,
 *   bridge_wallet_id?: string,
 *   custom_developer_fee_percent?: string,
 *   destination_ach_reference?: string,
 *   destination_address?: string,
 *   destination_blockchain_memo?: string,
 *   destination_currency?: DestinationCurrency|value-of<DestinationCurrency>,
 *   destination_payment_rail?: BridgePaymentRail|value-of<BridgePaymentRail>,
 *   destination_sepa_reference?: string,
 *   destination_wire_message?: string,
 *   external_account_id?: string,
 *   prefunded_account_id?: string,
 *   return_address?: string,
 * }
 */
final class LiquidationAddressCreateParams implements BaseModel
{
    /** @use SdkModel<LiquidationAddressCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The liquidation address on the blockchain.
     */
    #[Api]
    public string $address;

    /**
     * The blockchain chain for the liquidation address.
     *
     * @var value-of<Chain> $chain
     */
    #[Api(enum: Chain::class)]
    public string $chain;

    /**
     * The currency for the liquidation address.
     *
     * @var value-of<Currency> $currency
     */
    #[Api(enum: Currency::class)]
    public string $currency;

    /**
     * Bridge Wallet to send funds to.
     */
    #[Api(optional: true)]
    public ?string $bridge_wallet_id;

    /**
     * Custom developer fee percentage (Base 100 percentage: 10.2% = "10.2").
     */
    #[Api(optional: true)]
    public ?string $custom_developer_fee_percent;

    /**
     * Reference for ACH transactions.
     */
    #[Api(optional: true)]
    public ?string $destination_ach_reference;

    /**
     * Crypto wallet address for crypto transfers.
     */
    #[Api(optional: true)]
    public ?string $destination_address;

    /**
     * Memo for blockchain transactions.
     */
    #[Api(optional: true)]
    public ?string $destination_blockchain_memo;

    /**
     * Currency for sending funds.
     *
     * @var value-of<DestinationCurrency>|null $destination_currency
     */
    #[Api(enum: DestinationCurrency::class, optional: true)]
    public ?string $destination_currency;

    /**
     * The blockchain network where the source currency resides. Determines gas fees and transaction speed.
     *
     * @var value-of<BridgePaymentRail>|null $destination_payment_rail
     */
    #[Api(enum: BridgePaymentRail::class, optional: true)]
    public ?string $destination_payment_rail;

    /**
     * Reference for SEPA transactions.
     */
    #[Api(optional: true)]
    public ?string $destination_sepa_reference;

    /**
     * Message for wire transfers.
     */
    #[Api(optional: true)]
    public ?string $destination_wire_message;

    /**
     * External bank account to send funds to.
     */
    #[Api(optional: true)]
    public ?string $external_account_id;

    /**
     * Developer's prefunded account id.
     */
    #[Api(optional: true)]
    public ?string $prefunded_account_id;

    /**
     * Address to return funds on failed transactions (Not supported on Stellar).
     */
    #[Api(optional: true)]
    public ?string $return_address;

    /**
     * `new LiquidationAddressCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LiquidationAddressCreateParams::with(address: ..., chain: ..., currency: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LiquidationAddressCreateParams)
     *   ->withAddress(...)
     *   ->withChain(...)
     *   ->withCurrency(...)
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
     * @param Chain|value-of<Chain> $chain
     * @param Currency|value-of<Currency> $currency
     * @param DestinationCurrency|value-of<DestinationCurrency> $destination_currency
     * @param BridgePaymentRail|value-of<BridgePaymentRail> $destination_payment_rail
     */
    public static function with(
        string $address,
        Chain|string $chain,
        Currency|string $currency,
        ?string $bridge_wallet_id = null,
        ?string $custom_developer_fee_percent = null,
        ?string $destination_ach_reference = null,
        ?string $destination_address = null,
        ?string $destination_blockchain_memo = null,
        DestinationCurrency|string|null $destination_currency = null,
        BridgePaymentRail|string|null $destination_payment_rail = null,
        ?string $destination_sepa_reference = null,
        ?string $destination_wire_message = null,
        ?string $external_account_id = null,
        ?string $prefunded_account_id = null,
        ?string $return_address = null,
    ): self {
        $obj = new self;

        $obj->address = $address;
        $obj['chain'] = $chain;
        $obj['currency'] = $currency;

        null !== $bridge_wallet_id && $obj->bridge_wallet_id = $bridge_wallet_id;
        null !== $custom_developer_fee_percent && $obj->custom_developer_fee_percent = $custom_developer_fee_percent;
        null !== $destination_ach_reference && $obj->destination_ach_reference = $destination_ach_reference;
        null !== $destination_address && $obj->destination_address = $destination_address;
        null !== $destination_blockchain_memo && $obj->destination_blockchain_memo = $destination_blockchain_memo;
        null !== $destination_currency && $obj['destination_currency'] = $destination_currency;
        null !== $destination_payment_rail && $obj['destination_payment_rail'] = $destination_payment_rail;
        null !== $destination_sepa_reference && $obj->destination_sepa_reference = $destination_sepa_reference;
        null !== $destination_wire_message && $obj->destination_wire_message = $destination_wire_message;
        null !== $external_account_id && $obj->external_account_id = $external_account_id;
        null !== $prefunded_account_id && $obj->prefunded_account_id = $prefunded_account_id;
        null !== $return_address && $obj->return_address = $return_address;

        return $obj;
    }

    /**
     * The liquidation address on the blockchain.
     */
    public function withAddress(string $address): self
    {
        $obj = clone $this;
        $obj->address = $address;

        return $obj;
    }

    /**
     * The blockchain chain for the liquidation address.
     *
     * @param Chain|value-of<Chain> $chain
     */
    public function withChain(Chain|string $chain): self
    {
        $obj = clone $this;
        $obj['chain'] = $chain;

        return $obj;
    }

    /**
     * The currency for the liquidation address.
     *
     * @param Currency|value-of<Currency> $currency
     */
    public function withCurrency(Currency|string $currency): self
    {
        $obj = clone $this;
        $obj['currency'] = $currency;

        return $obj;
    }

    /**
     * Bridge Wallet to send funds to.
     */
    public function withBridgeWalletID(string $bridgeWalletID): self
    {
        $obj = clone $this;
        $obj->bridge_wallet_id = $bridgeWalletID;

        return $obj;
    }

    /**
     * Custom developer fee percentage (Base 100 percentage: 10.2% = "10.2").
     */
    public function withCustomDeveloperFeePercent(
        string $customDeveloperFeePercent
    ): self {
        $obj = clone $this;
        $obj->custom_developer_fee_percent = $customDeveloperFeePercent;

        return $obj;
    }

    /**
     * Reference for ACH transactions.
     */
    public function withDestinationACHReference(
        string $destinationACHReference
    ): self {
        $obj = clone $this;
        $obj->destination_ach_reference = $destinationACHReference;

        return $obj;
    }

    /**
     * Crypto wallet address for crypto transfers.
     */
    public function withDestinationAddress(string $destinationAddress): self
    {
        $obj = clone $this;
        $obj->destination_address = $destinationAddress;

        return $obj;
    }

    /**
     * Memo for blockchain transactions.
     */
    public function withDestinationBlockchainMemo(
        string $destinationBlockchainMemo
    ): self {
        $obj = clone $this;
        $obj->destination_blockchain_memo = $destinationBlockchainMemo;

        return $obj;
    }

    /**
     * Currency for sending funds.
     *
     * @param DestinationCurrency|value-of<DestinationCurrency> $destinationCurrency
     */
    public function withDestinationCurrency(
        DestinationCurrency|string $destinationCurrency
    ): self {
        $obj = clone $this;
        $obj['destination_currency'] = $destinationCurrency;

        return $obj;
    }

    /**
     * The blockchain network where the source currency resides. Determines gas fees and transaction speed.
     *
     * @param BridgePaymentRail|value-of<BridgePaymentRail> $destinationPaymentRail
     */
    public function withDestinationPaymentRail(
        BridgePaymentRail|string $destinationPaymentRail
    ): self {
        $obj = clone $this;
        $obj['destination_payment_rail'] = $destinationPaymentRail;

        return $obj;
    }

    /**
     * Reference for SEPA transactions.
     */
    public function withDestinationSepaReference(
        string $destinationSepaReference
    ): self {
        $obj = clone $this;
        $obj->destination_sepa_reference = $destinationSepaReference;

        return $obj;
    }

    /**
     * Message for wire transfers.
     */
    public function withDestinationWireMessage(
        string $destinationWireMessage
    ): self {
        $obj = clone $this;
        $obj->destination_wire_message = $destinationWireMessage;

        return $obj;
    }

    /**
     * External bank account to send funds to.
     */
    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj->external_account_id = $externalAccountID;

        return $obj;
    }

    /**
     * Developer's prefunded account id.
     */
    public function withPrefundedAccountID(string $prefundedAccountID): self
    {
        $obj = clone $this;
        $obj->prefunded_account_id = $prefundedAccountID;

        return $obj;
    }

    /**
     * Address to return funds on failed transactions (Not supported on Stellar).
     */
    public function withReturnAddress(string $returnAddress): self
    {
        $obj = clone $this;
        $obj->return_address = $returnAddress;

        return $obj;
    }
}
