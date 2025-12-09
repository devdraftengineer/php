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
        $obj = new self;

        $obj['beneficiaryID'] = $beneficiaryID;
        $obj['destinationCurrency'] = $destinationCurrency;
        $obj['sourceCurrency'] = $sourceCurrency;
        $obj['sourceWalletID'] = $sourceWalletID;

        null !== $amount && $obj['amount'] = $amount;
        null !== $blockchainMemo && $obj['blockchainMemo'] = $blockchainMemo;

        return $obj;
    }

    /**
     * Beneficiary ID for the stablecoin transfer.
     */
    public function withBeneficiaryID(string $beneficiaryID): self
    {
        $obj = clone $this;
        $obj['beneficiaryID'] = $beneficiaryID;

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
     * The ID of the source bridge wallet.
     */
    public function withSourceWalletID(string $sourceWalletID): self
    {
        $obj = clone $this;
        $obj['sourceWalletID'] = $sourceWalletID;

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
     * Blockchain memo for the transfer.
     */
    public function withBlockchainMemo(string $blockchainMemo): self
    {
        $obj = clone $this;
        $obj['blockchainMemo'] = $blockchainMemo;

        return $obj;
    }
}
