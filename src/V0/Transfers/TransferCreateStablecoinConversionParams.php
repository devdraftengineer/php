<?php

declare(strict_types=1);

namespace Devdraft\V0\Transfers;

use Devdraft\Core\Attributes\Required;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;

/**
 * Create a stablecoin conversion.
 *
 * @see Devdraft\Services\V0\TransfersService::createStablecoinConversion()
 *
 * @phpstan-type TransferCreateStablecoinConversionParamsShape = array{
 *   amount: float,
 *   destinationCurrency: string,
 *   sourceCurrency: string,
 *   sourceNetwork: string,
 *   walletId: string,
 * }
 */
final class TransferCreateStablecoinConversionParams implements BaseModel
{
    /** @use SdkModel<TransferCreateStablecoinConversionParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The amount to convert.
     */
    #[Required]
    public float $amount;

    /**
     * The destination currency.
     */
    #[Required]
    public string $destinationCurrency;

    /**
     * The source currency.
     */
    #[Required]
    public string $sourceCurrency;

    /**
     * The source network.
     */
    #[Required]
    public string $sourceNetwork;

    /**
     * The ID of the bridge wallet to use.
     */
    #[Required]
    public string $walletId;

    /**
     * `new TransferCreateStablecoinConversionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TransferCreateStablecoinConversionParams::with(
     *   amount: ...,
     *   destinationCurrency: ...,
     *   sourceCurrency: ...,
     *   sourceNetwork: ...,
     *   walletId: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TransferCreateStablecoinConversionParams)
     *   ->withAmount(...)
     *   ->withDestinationCurrency(...)
     *   ->withSourceCurrency(...)
     *   ->withSourceNetwork(...)
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
        string $destinationCurrency,
        string $sourceCurrency,
        string $sourceNetwork,
        string $walletId,
    ): self {
        $obj = new self;

        $obj['amount'] = $amount;
        $obj['destinationCurrency'] = $destinationCurrency;
        $obj['sourceCurrency'] = $sourceCurrency;
        $obj['sourceNetwork'] = $sourceNetwork;
        $obj['walletId'] = $walletId;

        return $obj;
    }

    /**
     * The amount to convert.
     */
    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj['amount'] = $amount;

        return $obj;
    }

    /**
     * The destination currency.
     */
    public function withDestinationCurrency(string $destinationCurrency): self
    {
        $obj = clone $this;
        $obj['destinationCurrency'] = $destinationCurrency;

        return $obj;
    }

    /**
     * The source currency.
     */
    public function withSourceCurrency(string $sourceCurrency): self
    {
        $obj = clone $this;
        $obj['sourceCurrency'] = $sourceCurrency;

        return $obj;
    }

    /**
     * The source network.
     */
    public function withSourceNetwork(string $sourceNetwork): self
    {
        $obj = clone $this;
        $obj['sourceNetwork'] = $sourceNetwork;

        return $obj;
    }

    /**
     * The ID of the bridge wallet to use.
     */
    public function withWalletID(string $walletID): self
    {
        $obj = clone $this;
        $obj['walletId'] = $walletID;

        return $obj;
    }
}
