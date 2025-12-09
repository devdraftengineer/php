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
        $obj = new self;

        $obj['id'] = $id;
        $obj['address'] = $address;
        $obj['chain'] = $chain;
        $obj['createdAt'] = $createdAt;
        $obj['currency'] = $currency;
        $obj['customerID'] = $customerID;
        $obj['state'] = $state;
        $obj['updatedAt'] = $updatedAt;

        null !== $bridgeWalletID && $obj['bridgeWalletID'] = $bridgeWalletID;
        null !== $customDeveloperFeePercent && $obj['customDeveloperFeePercent'] = $customDeveloperFeePercent;
        null !== $destinationCurrency && $obj['destinationCurrency'] = $destinationCurrency;
        null !== $destinationPaymentRail && $obj['destinationPaymentRail'] = $destinationPaymentRail;
        null !== $externalAccountID && $obj['externalAccountID'] = $externalAccountID;
        null !== $prefundedAccountID && $obj['prefundedAccountID'] = $prefundedAccountID;

        return $obj;
    }

    /**
     * Unique identifier for the liquidation address.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Liquidation address.
     */
    public function withAddress(string $address): self
    {
        $obj = clone $this;
        $obj['address'] = $address;

        return $obj;
    }

    /**
     * Blockchain chain.
     */
    public function withChain(string $chain): self
    {
        $obj = clone $this;
        $obj['chain'] = $chain;

        return $obj;
    }

    /**
     * Creation timestamp.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Currency.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj['currency'] = $currency;

        return $obj;
    }

    /**
     * Customer ID this liquidation address belongs to.
     */
    public function withCustomerID(string $customerID): self
    {
        $obj = clone $this;
        $obj['customerID'] = $customerID;

        return $obj;
    }

    /**
     * Current state of the liquidation address.
     */
    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj['state'] = $state;

        return $obj;
    }

    /**
     * Last update timestamp.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Bridge wallet ID.
     */
    public function withBridgeWalletID(string $bridgeWalletID): self
    {
        $obj = clone $this;
        $obj['bridgeWalletID'] = $bridgeWalletID;

        return $obj;
    }

    /**
     * Custom developer fee percent.
     */
    public function withCustomDeveloperFeePercent(
        string $customDeveloperFeePercent
    ): self {
        $obj = clone $this;
        $obj['customDeveloperFeePercent'] = $customDeveloperFeePercent;

        return $obj;
    }

    /**
     * Destination currency.
     */
    public function withDestinationCurrency(string $destinationCurrency): self
    {
        $obj = clone $this;
        $obj['destinationCurrency'] = $destinationCurrency;

        return $obj;
    }

    /**
     * Destination payment rail.
     */
    public function withDestinationPaymentRail(
        string $destinationPaymentRail
    ): self {
        $obj = clone $this;
        $obj['destinationPaymentRail'] = $destinationPaymentRail;

        return $obj;
    }

    /**
     * External account ID.
     */
    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj['externalAccountID'] = $externalAccountID;

        return $obj;
    }

    /**
     * Prefunded account ID.
     */
    public function withPrefundedAccountID(string $prefundedAccountID): self
    {
        $obj = clone $this;
        $obj['prefundedAccountID'] = $prefundedAccountID;

        return $obj;
    }
}
