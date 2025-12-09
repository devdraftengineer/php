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
 *   created_at: string,
 *   currency: string,
 *   customer_id: string,
 *   state: string,
 *   updated_at: string,
 *   bridge_wallet_id?: string|null,
 *   custom_developer_fee_percent?: string|null,
 *   destination_currency?: string|null,
 *   destination_payment_rail?: string|null,
 *   external_account_id?: string|null,
 *   prefunded_account_id?: string|null,
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
    #[Required]
    public string $created_at;

    /**
     * Currency.
     */
    #[Required]
    public string $currency;

    /**
     * Customer ID this liquidation address belongs to.
     */
    #[Required]
    public string $customer_id;

    /**
     * Current state of the liquidation address.
     */
    #[Required]
    public string $state;

    /**
     * Last update timestamp.
     */
    #[Required]
    public string $updated_at;

    /**
     * Bridge wallet ID.
     */
    #[Optional]
    public ?string $bridge_wallet_id;

    /**
     * Custom developer fee percent.
     */
    #[Optional]
    public ?string $custom_developer_fee_percent;

    /**
     * Destination currency.
     */
    #[Optional]
    public ?string $destination_currency;

    /**
     * Destination payment rail.
     */
    #[Optional]
    public ?string $destination_payment_rail;

    /**
     * External account ID.
     */
    #[Optional]
    public ?string $external_account_id;

    /**
     * Prefunded account ID.
     */
    #[Optional]
    public ?string $prefunded_account_id;

    /**
     * `new LiquidationAddressResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LiquidationAddressResponse::with(
     *   id: ...,
     *   address: ...,
     *   chain: ...,
     *   created_at: ...,
     *   currency: ...,
     *   customer_id: ...,
     *   state: ...,
     *   updated_at: ...,
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
        string $created_at,
        string $currency,
        string $customer_id,
        string $state,
        string $updated_at,
        ?string $bridge_wallet_id = null,
        ?string $custom_developer_fee_percent = null,
        ?string $destination_currency = null,
        ?string $destination_payment_rail = null,
        ?string $external_account_id = null,
        ?string $prefunded_account_id = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['address'] = $address;
        $obj['chain'] = $chain;
        $obj['created_at'] = $created_at;
        $obj['currency'] = $currency;
        $obj['customer_id'] = $customer_id;
        $obj['state'] = $state;
        $obj['updated_at'] = $updated_at;

        null !== $bridge_wallet_id && $obj['bridge_wallet_id'] = $bridge_wallet_id;
        null !== $custom_developer_fee_percent && $obj['custom_developer_fee_percent'] = $custom_developer_fee_percent;
        null !== $destination_currency && $obj['destination_currency'] = $destination_currency;
        null !== $destination_payment_rail && $obj['destination_payment_rail'] = $destination_payment_rail;
        null !== $external_account_id && $obj['external_account_id'] = $external_account_id;
        null !== $prefunded_account_id && $obj['prefunded_account_id'] = $prefunded_account_id;

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
        $obj['created_at'] = $createdAt;

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
        $obj['customer_id'] = $customerID;

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
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }

    /**
     * Bridge wallet ID.
     */
    public function withBridgeWalletID(string $bridgeWalletID): self
    {
        $obj = clone $this;
        $obj['bridge_wallet_id'] = $bridgeWalletID;

        return $obj;
    }

    /**
     * Custom developer fee percent.
     */
    public function withCustomDeveloperFeePercent(
        string $customDeveloperFeePercent
    ): self {
        $obj = clone $this;
        $obj['custom_developer_fee_percent'] = $customDeveloperFeePercent;

        return $obj;
    }

    /**
     * Destination currency.
     */
    public function withDestinationCurrency(string $destinationCurrency): self
    {
        $obj = clone $this;
        $obj['destination_currency'] = $destinationCurrency;

        return $obj;
    }

    /**
     * Destination payment rail.
     */
    public function withDestinationPaymentRail(
        string $destinationPaymentRail
    ): self {
        $obj = clone $this;
        $obj['destination_payment_rail'] = $destinationPaymentRail;

        return $obj;
    }

    /**
     * External account ID.
     */
    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj['external_account_id'] = $externalAccountID;

        return $obj;
    }

    /**
     * Prefunded account ID.
     */
    public function withPrefundedAccountID(string $prefundedAccountID): self
    {
        $obj = clone $this;
        $obj['prefunded_account_id'] = $prefundedAccountID;

        return $obj;
    }
}
