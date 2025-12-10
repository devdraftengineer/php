<?php

declare(strict_types=1);

namespace Devdraft\V0\Transfers;

use Devdraft\Core\Attributes\Optional;
use Devdraft\Core\Attributes\Required;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;

/**
 * Create an external stablecoin transfer.
 *
 * @see Devdraft\Services\V0\TransfersService::createExternalStablecoinTransfer()
 *
 * @phpstan-type TransferCreateExternalStablecoinTransferParamsShape = array{
 *   beneficiaryID: string,
 *   destinationCurrency: string,
 *   sourceCurrency: string,
 *   sourceWalletID: string,
 *   amount?: float,
 *   blockchainMemo?: string,
 * }
 */
final class TransferCreateExternalStablecoinTransferParams implements BaseModel
{
    /** @use SdkModel<TransferCreateExternalStablecoinTransferParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Beneficiary ID for the stablecoin transfer.
     */
    #[Required('beneficiaryId')]
    public string $beneficiaryID;

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
     * The ID of the source bridge wallet.
     */
    #[Required('sourceWalletId')]
    public string $sourceWalletID;

    /**
     * The amount to transfer.
     */
    #[Optional]
    public ?float $amount;

    /**
     * Blockchain memo for the transfer.
     */
    #[Optional('blockchain_memo')]
    public ?string $blockchainMemo;

    /**
     * `new TransferCreateExternalStablecoinTransferParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TransferCreateExternalStablecoinTransferParams::with(
     *   beneficiaryID: ...,
     *   destinationCurrency: ...,
     *   sourceCurrency: ...,
     *   sourceWalletID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TransferCreateExternalStablecoinTransferParams)
     *   ->withBeneficiaryID(...)
     *   ->withDestinationCurrency(...)
     *   ->withSourceCurrency(...)
     *   ->withSourceWalletID(...)
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
        string $beneficiaryID,
        string $destinationCurrency,
        string $sourceCurrency,
        string $sourceWalletID,
        ?float $amount = null,
        ?string $blockchainMemo = null,
    ): self {
        $self = new self;

        $self['beneficiaryID'] = $beneficiaryID;
        $self['destinationCurrency'] = $destinationCurrency;
        $self['sourceCurrency'] = $sourceCurrency;
        $self['sourceWalletID'] = $sourceWalletID;

        null !== $amount && $self['amount'] = $amount;
        null !== $blockchainMemo && $self['blockchainMemo'] = $blockchainMemo;

        return $self;
    }

    /**
     * Beneficiary ID for the stablecoin transfer.
     */
    public function withBeneficiaryID(string $beneficiaryID): self
    {
        $self = clone $this;
        $self['beneficiaryID'] = $beneficiaryID;

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
     * The ID of the source bridge wallet.
     */
    public function withSourceWalletID(string $sourceWalletID): self
    {
        $self = clone $this;
        $self['sourceWalletID'] = $sourceWalletID;

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
     * Blockchain memo for the transfer.
     */
    public function withBlockchainMemo(string $blockchainMemo): self
    {
        $self = clone $this;
        $self['blockchainMemo'] = $blockchainMemo;

        return $self;
    }
}
