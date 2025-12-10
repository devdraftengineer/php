<?php

declare(strict_types=1);

namespace Devdraft\V0\Customers\LiquidationAddresses;

use Devdraft\Core\Attributes\Optional;
use Devdraft\Core\Attributes\Required;
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
 *   bridgeWalletID?: string,
 *   customDeveloperFeePercent?: string,
 *   destinationACHReference?: string,
 *   destinationAddress?: string,
 *   destinationBlockchainMemo?: string,
 *   destinationCurrency?: DestinationCurrency|value-of<DestinationCurrency>,
 *   destinationPaymentRail?: BridgePaymentRail|value-of<BridgePaymentRail>,
 *   destinationSepaReference?: string,
 *   destinationWireMessage?: string,
 *   externalAccountID?: string,
 *   prefundedAccountID?: string,
 *   returnAddress?: string,
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
    #[Required]
    public string $address;

    /**
     * The blockchain chain for the liquidation address.
     *
     * @var value-of<Chain> $chain
     */
    #[Required(enum: Chain::class)]
    public string $chain;

    /**
     * The currency for the liquidation address.
     *
     * @var value-of<Currency> $currency
     */
    #[Required(enum: Currency::class)]
    public string $currency;

    /**
     * Bridge Wallet to send funds to.
     */
    #[Optional('bridge_wallet_id')]
    public ?string $bridgeWalletID;

    /**
     * Custom developer fee percentage (Base 100 percentage: 10.2% = "10.2").
     */
    #[Optional('custom_developer_fee_percent')]
    public ?string $customDeveloperFeePercent;

    /**
     * Reference for ACH transactions.
     */
    #[Optional('destination_ach_reference')]
    public ?string $destinationACHReference;

    /**
     * Crypto wallet address for crypto transfers.
     */
    #[Optional('destination_address')]
    public ?string $destinationAddress;

    /**
     * Memo for blockchain transactions.
     */
    #[Optional('destination_blockchain_memo')]
    public ?string $destinationBlockchainMemo;

    /**
     * Currency for sending funds.
     *
     * @var value-of<DestinationCurrency>|null $destinationCurrency
     */
    #[Optional('destination_currency', enum: DestinationCurrency::class)]
    public ?string $destinationCurrency;

    /**
     * The blockchain network where the source currency resides. Determines gas fees and transaction speed.
     *
     * @var value-of<BridgePaymentRail>|null $destinationPaymentRail
     */
    #[Optional('destination_payment_rail', enum: BridgePaymentRail::class)]
    public ?string $destinationPaymentRail;

    /**
     * Reference for SEPA transactions.
     */
    #[Optional('destination_sepa_reference')]
    public ?string $destinationSepaReference;

    /**
     * Message for wire transfers.
     */
    #[Optional('destination_wire_message')]
    public ?string $destinationWireMessage;

    /**
     * External bank account to send funds to.
     */
    #[Optional('external_account_id')]
    public ?string $externalAccountID;

    /**
     * Developer's prefunded account id.
     */
    #[Optional('prefunded_account_id')]
    public ?string $prefundedAccountID;

    /**
     * Address to return funds on failed transactions (Not supported on Stellar).
     */
    #[Optional('return_address')]
    public ?string $returnAddress;

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
     * @param DestinationCurrency|value-of<DestinationCurrency> $destinationCurrency
     * @param BridgePaymentRail|value-of<BridgePaymentRail> $destinationPaymentRail
     */
    public static function with(
        string $address,
        Chain|string $chain,
        Currency|string $currency,
        ?string $bridgeWalletID = null,
        ?string $customDeveloperFeePercent = null,
        ?string $destinationACHReference = null,
        ?string $destinationAddress = null,
        ?string $destinationBlockchainMemo = null,
        DestinationCurrency|string|null $destinationCurrency = null,
        BridgePaymentRail|string|null $destinationPaymentRail = null,
        ?string $destinationSepaReference = null,
        ?string $destinationWireMessage = null,
        ?string $externalAccountID = null,
        ?string $prefundedAccountID = null,
        ?string $returnAddress = null,
    ): self {
        $self = new self;

        $self['address'] = $address;
        $self['chain'] = $chain;
        $self['currency'] = $currency;

        null !== $bridgeWalletID && $self['bridgeWalletID'] = $bridgeWalletID;
        null !== $customDeveloperFeePercent && $self['customDeveloperFeePercent'] = $customDeveloperFeePercent;
        null !== $destinationACHReference && $self['destinationACHReference'] = $destinationACHReference;
        null !== $destinationAddress && $self['destinationAddress'] = $destinationAddress;
        null !== $destinationBlockchainMemo && $self['destinationBlockchainMemo'] = $destinationBlockchainMemo;
        null !== $destinationCurrency && $self['destinationCurrency'] = $destinationCurrency;
        null !== $destinationPaymentRail && $self['destinationPaymentRail'] = $destinationPaymentRail;
        null !== $destinationSepaReference && $self['destinationSepaReference'] = $destinationSepaReference;
        null !== $destinationWireMessage && $self['destinationWireMessage'] = $destinationWireMessage;
        null !== $externalAccountID && $self['externalAccountID'] = $externalAccountID;
        null !== $prefundedAccountID && $self['prefundedAccountID'] = $prefundedAccountID;
        null !== $returnAddress && $self['returnAddress'] = $returnAddress;

        return $self;
    }

    /**
     * The liquidation address on the blockchain.
     */
    public function withAddress(string $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    /**
     * The blockchain chain for the liquidation address.
     *
     * @param Chain|value-of<Chain> $chain
     */
    public function withChain(Chain|string $chain): self
    {
        $self = clone $this;
        $self['chain'] = $chain;

        return $self;
    }

    /**
     * The currency for the liquidation address.
     *
     * @param Currency|value-of<Currency> $currency
     */
    public function withCurrency(Currency|string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * Bridge Wallet to send funds to.
     */
    public function withBridgeWalletID(string $bridgeWalletID): self
    {
        $self = clone $this;
        $self['bridgeWalletID'] = $bridgeWalletID;

        return $self;
    }

    /**
     * Custom developer fee percentage (Base 100 percentage: 10.2% = "10.2").
     */
    public function withCustomDeveloperFeePercent(
        string $customDeveloperFeePercent
    ): self {
        $self = clone $this;
        $self['customDeveloperFeePercent'] = $customDeveloperFeePercent;

        return $self;
    }

    /**
     * Reference for ACH transactions.
     */
    public function withDestinationACHReference(
        string $destinationACHReference
    ): self {
        $self = clone $this;
        $self['destinationACHReference'] = $destinationACHReference;

        return $self;
    }

    /**
     * Crypto wallet address for crypto transfers.
     */
    public function withDestinationAddress(string $destinationAddress): self
    {
        $self = clone $this;
        $self['destinationAddress'] = $destinationAddress;

        return $self;
    }

    /**
     * Memo for blockchain transactions.
     */
    public function withDestinationBlockchainMemo(
        string $destinationBlockchainMemo
    ): self {
        $self = clone $this;
        $self['destinationBlockchainMemo'] = $destinationBlockchainMemo;

        return $self;
    }

    /**
     * Currency for sending funds.
     *
     * @param DestinationCurrency|value-of<DestinationCurrency> $destinationCurrency
     */
    public function withDestinationCurrency(
        DestinationCurrency|string $destinationCurrency
    ): self {
        $self = clone $this;
        $self['destinationCurrency'] = $destinationCurrency;

        return $self;
    }

    /**
     * The blockchain network where the source currency resides. Determines gas fees and transaction speed.
     *
     * @param BridgePaymentRail|value-of<BridgePaymentRail> $destinationPaymentRail
     */
    public function withDestinationPaymentRail(
        BridgePaymentRail|string $destinationPaymentRail
    ): self {
        $self = clone $this;
        $self['destinationPaymentRail'] = $destinationPaymentRail;

        return $self;
    }

    /**
     * Reference for SEPA transactions.
     */
    public function withDestinationSepaReference(
        string $destinationSepaReference
    ): self {
        $self = clone $this;
        $self['destinationSepaReference'] = $destinationSepaReference;

        return $self;
    }

    /**
     * Message for wire transfers.
     */
    public function withDestinationWireMessage(
        string $destinationWireMessage
    ): self {
        $self = clone $this;
        $self['destinationWireMessage'] = $destinationWireMessage;

        return $self;
    }

    /**
     * External bank account to send funds to.
     */
    public function withExternalAccountID(string $externalAccountID): self
    {
        $self = clone $this;
        $self['externalAccountID'] = $externalAccountID;

        return $self;
    }

    /**
     * Developer's prefunded account id.
     */
    public function withPrefundedAccountID(string $prefundedAccountID): self
    {
        $self = clone $this;
        $self['prefundedAccountID'] = $prefundedAccountID;

        return $self;
    }

    /**
     * Address to return funds on failed transactions (Not supported on Stellar).
     */
    public function withReturnAddress(string $returnAddress): self
    {
        $self = clone $this;
        $self['returnAddress'] = $returnAddress;

        return $self;
    }
}
