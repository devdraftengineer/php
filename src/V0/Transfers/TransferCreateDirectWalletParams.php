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
 *   amount: float, network: string, stableCoinCurrency: string, walletId: string
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
    #[Required]
    public string $walletId;

    /**
     * `new TransferCreateDirectWalletParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TransferCreateDirectWalletParams::with(
     *   amount: ..., network: ..., stableCoinCurrency: ..., walletId: ...
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
        string $walletId
    ): self {
        $obj = new self;

        $obj['amount'] = $amount;
        $obj['network'] = $network;
        $obj['stableCoinCurrency'] = $stableCoinCurrency;
        $obj['walletId'] = $walletId;

        return $obj;
    }

    /**
     * The amount to transfer.
     */
    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj['amount'] = $amount;

        return $obj;
    }

    /**
     * The network to use for the transfer.
     */
    public function withNetwork(string $network): self
    {
        $obj = clone $this;
        $obj['network'] = $network;

        return $obj;
    }

    /**
     * The stablecoin currency to use.
     */
    public function withStableCoinCurrency(string $stableCoinCurrency): self
    {
        $obj = clone $this;
        $obj['stableCoinCurrency'] = $stableCoinCurrency;

        return $obj;
    }

    /**
     * The ID of the bridge wallet to transfer from.
     */
    public function withWalletID(string $walletID): self
    {
        $obj = clone $this;
        $obj['walletId'] = $walletID;

        return $obj;
    }
}
