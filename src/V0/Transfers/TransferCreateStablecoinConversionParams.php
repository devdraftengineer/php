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
 *   walletID: string,
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
    #[Required('walletId')]
    public string $walletID;

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
     *   walletID: ...,
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
        string $walletID,
    ): self {
        $self = new self;

        $self['amount'] = $amount;
        $self['destinationCurrency'] = $destinationCurrency;
        $self['sourceCurrency'] = $sourceCurrency;
        $self['sourceNetwork'] = $sourceNetwork;
        $self['walletID'] = $walletID;

        return $self;
    }

    /**
     * The amount to convert.
     */
    public function withAmount(float $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * The destination currency.
     */
    public function withDestinationCurrency(string $destinationCurrency): self
    {
        $self = clone $this;
        $self['destinationCurrency'] = $destinationCurrency;

        return $self;
    }

    /**
     * The source currency.
     */
    public function withSourceCurrency(string $sourceCurrency): self
    {
        $self = clone $this;
        $self['sourceCurrency'] = $sourceCurrency;

        return $self;
    }

    /**
     * The source network.
     */
    public function withSourceNetwork(string $sourceNetwork): self
    {
        $self = clone $this;
        $self['sourceNetwork'] = $sourceNetwork;

        return $self;
    }

    /**
     * The ID of the bridge wallet to use.
     */
    public function withWalletID(string $walletID): self
    {
        $self = clone $this;
        $self['walletID'] = $walletID;

        return $self;
    }
}
