<?php

declare(strict_types=1);

namespace Devdraft\V0\Transfers;

use Devdraft\Core\Attributes\Required;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;

/**
 * Create a direct wallet transfer.
 *
 * @see Devdraft\Services\V0\TransfersService::createDirectWallet()
 *
 * @phpstan-type TransferCreateDirectWalletParamsShape = array{
 *   amount: float, network: string, stableCoinCurrency: string, walletID: string
 * }
 */
final class TransferCreateDirectWalletParams implements BaseModel
{
    /** @use SdkModel<TransferCreateDirectWalletParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The amount to transfer.
     */
    #[Required]
    public float $amount;

    /**
     * The network to use for the transfer.
     */
    #[Required]
    public string $network;

    /**
     * The stablecoin currency to use.
     */
    #[Required]
    public string $stableCoinCurrency;

    /**
     * The ID of the bridge wallet to transfer from.
     */
    #[Required('walletId')]
    public string $walletID;

    /**
     * `new TransferCreateDirectWalletParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TransferCreateDirectWalletParams::with(
     *   amount: ..., network: ..., stableCoinCurrency: ..., walletID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TransferCreateDirectWalletParams)
     *   ->withAmount(...)
     *   ->withNetwork(...)
     *   ->withStableCoinCurrency(...)
     *   ->withWalletID(...)
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
        float $amount,
        string $network,
        string $stableCoinCurrency,
        string $walletID
    ): self {
        $self = new self;

        $self['amount'] = $amount;
        $self['network'] = $network;
        $self['stableCoinCurrency'] = $stableCoinCurrency;
        $self['walletID'] = $walletID;

        return $self;
    }

    /**
     * The amount to transfer.
     */
    public function withAmount(float $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * The network to use for the transfer.
     */
    public function withNetwork(string $network): self
    {
        $self = clone $this;
        $self['network'] = $network;

        return $self;
    }

    /**
     * The stablecoin currency to use.
     */
    public function withStableCoinCurrency(string $stableCoinCurrency): self
    {
        $self = clone $this;
        $self['stableCoinCurrency'] = $stableCoinCurrency;

        return $self;
    }

    /**
     * The ID of the bridge wallet to transfer from.
     */
    public function withWalletID(string $walletID): self
    {
        $self = clone $this;
        $self['walletID'] = $walletID;

        return $self;
    }
}
