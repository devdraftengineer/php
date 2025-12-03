<?php

declare(strict_types=1);

namespace Devdraft\V0\Transfers;

use Devdraft\Core\Attributes\Api;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;

/**
 * Create an external stablecoin transfer.
 *
 * @see Devdraft\Services\V0\TransfersService::createExternalStablecoinTransfer()
 *
 * @phpstan-type TransferCreateExternalStablecoinTransferParamsShape = array{
 *   beneficiaryId: string,
 *   destinationCurrency: string,
 *   sourceCurrency: string,
 *   sourceWalletId: string,
 *   amount?: float,
 *   blockchain_memo?: string,
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
    #[Api]
    public string $beneficiaryId;

    /**
     * The destination currency.
     */
    #[Api]
    public string $destinationCurrency;

    /**
     * The source currency.
     */
    #[Api]
    public string $sourceCurrency;

    /**
     * The ID of the source bridge wallet.
     */
    #[Api]
    public string $sourceWalletId;

    /**
     * The amount to transfer.
     */
    #[Api(optional: true)]
    public ?float $amount;

    /**
     * Blockchain memo for the transfer.
     */
    #[Api(optional: true)]
    public ?string $blockchain_memo;

    /**
     * `new TransferCreateExternalStablecoinTransferParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TransferCreateExternalStablecoinTransferParams::with(
     *   beneficiaryId: ...,
     *   destinationCurrency: ...,
     *   sourceCurrency: ...,
     *   sourceWalletId: ...,
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
        string $beneficiaryId,
        string $destinationCurrency,
        string $sourceCurrency,
        string $sourceWalletId,
        ?float $amount = null,
        ?string $blockchain_memo = null,
    ): self {
        $obj = new self;

        $obj->beneficiaryId = $beneficiaryId;
        $obj->destinationCurrency = $destinationCurrency;
        $obj->sourceCurrency = $sourceCurrency;
        $obj->sourceWalletId = $sourceWalletId;

        null !== $amount && $obj->amount = $amount;
        null !== $blockchain_memo && $obj->blockchain_memo = $blockchain_memo;

        return $obj;
    }

    /**
     * Beneficiary ID for the stablecoin transfer.
     */
    public function withBeneficiaryID(string $beneficiaryID): self
    {
        $obj = clone $this;
        $obj->beneficiaryId = $beneficiaryID;

        return $obj;
    }

    /**
     * The destination currency.
     */
    public function withDestinationCurrency(string $destinationCurrency): self
    {
        $obj = clone $this;
        $obj->destinationCurrency = $destinationCurrency;

        return $obj;
    }

    /**
     * The source currency.
     */
    public function withSourceCurrency(string $sourceCurrency): self
    {
        $obj = clone $this;
        $obj->sourceCurrency = $sourceCurrency;

        return $obj;
    }

    /**
     * The ID of the source bridge wallet.
     */
    public function withSourceWalletID(string $sourceWalletID): self
    {
        $obj = clone $this;
        $obj->sourceWalletId = $sourceWalletID;

        return $obj;
    }

    /**
     * The amount to transfer.
     */
    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    /**
     * Blockchain memo for the transfer.
     */
    public function withBlockchainMemo(string $blockchainMemo): self
    {
        $obj = clone $this;
        $obj->blockchain_memo = $blockchainMemo;

        return $obj;
    }
}
