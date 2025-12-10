<?php

declare(strict_types=1);

namespace Devdraft\V0\Customers\LiquidationAddresses;

use Devdraft\Core\Attributes\Optional;
use Devdraft\Core\Attributes\Required;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Contracts\BaseModel;

/**
 * @phpstan-type LiquidationAddressResponseShape = array{
 *   id: string,
 *   address: string,
 *   chain: string,
 *   createdAt: string,
 *   currency: string,
 *   customerID: string,
 *   state: string,
 *   updatedAt: string,
 *   bridgeWalletID?: string|null,
 *   customDeveloperFeePercent?: string|null,
 *   destinationCurrency?: string|null,
 *   destinationPaymentRail?: string|null,
 *   externalAccountID?: string|null,
 *   prefundedAccountID?: string|null,
 * }
 */
final class LiquidationAddressResponse implements BaseModel
{
    /** @use SdkModel<LiquidationAddressResponseShape> */
    use SdkModel;

    /**
     * Unique identifier for the liquidation address.
     */
    #[Required]
    public string $id;

    /**
     * Liquidation address.
     */
    #[Required]
    public string $address;

    /**
     * Blockchain chain.
     */
    #[Required]
    public string $chain;

    /**
     * Creation timestamp.
     */
    #[Required('created_at')]
    public string $createdAt;

    /**
     * Currency.
     */
    #[Required]
    public string $currency;

    /**
     * Customer ID this liquidation address belongs to.
     */
    #[Required('customer_id')]
    public string $customerID;

    /**
     * Current state of the liquidation address.
     */
    #[Required]
    public string $state;

    /**
     * Last update timestamp.
     */
    #[Required('updated_at')]
    public string $updatedAt;

    /**
     * Bridge wallet ID.
     */
    #[Optional('bridge_wallet_id')]
    public ?string $bridgeWalletID;

    /**
     * Custom developer fee percent.
     */
    #[Optional('custom_developer_fee_percent')]
    public ?string $customDeveloperFeePercent;

    /**
     * Destination currency.
     */
    #[Optional('destination_currency')]
    public ?string $destinationCurrency;

    /**
     * Destination payment rail.
     */
    #[Optional('destination_payment_rail')]
    public ?string $destinationPaymentRail;

    /**
     * External account ID.
     */
    #[Optional('external_account_id')]
    public ?string $externalAccountID;

    /**
     * Prefunded account ID.
     */
    #[Optional('prefunded_account_id')]
    public ?string $prefundedAccountID;

    /**
     * `new LiquidationAddressResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LiquidationAddressResponse::with(
     *   id: ...,
     *   address: ...,
     *   chain: ...,
     *   createdAt: ...,
     *   currency: ...,
     *   customerID: ...,
     *   state: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LiquidationAddressResponse)
     *   ->withID(...)
     *   ->withAddress(...)
     *   ->withChain(...)
     *   ->withCreatedAt(...)
     *   ->withCurrency(...)
     *   ->withCustomerID(...)
     *   ->withState(...)
     *   ->withUpdatedAt(...)
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
     */
    public static function with(
        string $id,
        string $address,
        string $chain,
        string $createdAt,
        string $currency,
        string $customerID,
        string $state,
        string $updatedAt,
        ?string $bridgeWalletID = null,
        ?string $customDeveloperFeePercent = null,
        ?string $destinationCurrency = null,
        ?string $destinationPaymentRail = null,
        ?string $externalAccountID = null,
        ?string $prefundedAccountID = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['address'] = $address;
        $self['chain'] = $chain;
        $self['createdAt'] = $createdAt;
        $self['currency'] = $currency;
        $self['customerID'] = $customerID;
        $self['state'] = $state;
        $self['updatedAt'] = $updatedAt;

        null !== $bridgeWalletID && $self['bridgeWalletID'] = $bridgeWalletID;
        null !== $customDeveloperFeePercent && $self['customDeveloperFeePercent'] = $customDeveloperFeePercent;
        null !== $destinationCurrency && $self['destinationCurrency'] = $destinationCurrency;
        null !== $destinationPaymentRail && $self['destinationPaymentRail'] = $destinationPaymentRail;
        null !== $externalAccountID && $self['externalAccountID'] = $externalAccountID;
        null !== $prefundedAccountID && $self['prefundedAccountID'] = $prefundedAccountID;

        return $self;
    }

    /**
     * Unique identifier for the liquidation address.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Liquidation address.
     */
    public function withAddress(string $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    /**
     * Blockchain chain.
     */
    public function withChain(string $chain): self
    {
        $self = clone $this;
        $self['chain'] = $chain;

        return $self;
    }

    /**
     * Creation timestamp.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Currency.
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * Customer ID this liquidation address belongs to.
     */
    public function withCustomerID(string $customerID): self
    {
        $self = clone $this;
        $self['customerID'] = $customerID;

        return $self;
    }

    /**
     * Current state of the liquidation address.
     */
    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * Last update timestamp.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Bridge wallet ID.
     */
    public function withBridgeWalletID(string $bridgeWalletID): self
    {
        $self = clone $this;
        $self['bridgeWalletID'] = $bridgeWalletID;

        return $self;
    }

    /**
     * Custom developer fee percent.
     */
    public function withCustomDeveloperFeePercent(
        string $customDeveloperFeePercent
    ): self {
        $self = clone $this;
        $self['customDeveloperFeePercent'] = $customDeveloperFeePercent;

        return $self;
    }

    /**
     * Destination currency.
     */
    public function withDestinationCurrency(string $destinationCurrency): self
    {
        $self = clone $this;
        $self['destinationCurrency'] = $destinationCurrency;

        return $self;
    }

    /**
     * Destination payment rail.
     */
    public function withDestinationPaymentRail(
        string $destinationPaymentRail
    ): self {
        $self = clone $this;
        $self['destinationPaymentRail'] = $destinationPaymentRail;

        return $self;
    }

    /**
     * External account ID.
     */
    public function withExternalAccountID(string $externalAccountID): self
    {
        $self = clone $this;
        $self['externalAccountID'] = $externalAccountID;

        return $self;
    }

    /**
     * Prefunded account ID.
     */
    public function withPrefundedAccountID(string $prefundedAccountID): self
    {
        $self = clone $this;
        $self['prefundedAccountID'] = $prefundedAccountID;

        return $self;
    }
}
