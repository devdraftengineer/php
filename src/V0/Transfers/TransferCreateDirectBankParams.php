<?php

declare(strict_types=1);

namespace Devdraft\V0\Transfers;

use Devdraft\Core\Attributes\Api;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;

/**
 * Create a direct bank transfer.
 *
 * @see Devdraft\Services\V0\TransfersService::createDirectBank()
 *
 * @phpstan-type TransferCreateDirectBankParamsShape = array{
 *   amount: float,
 *   destinationCurrency: string,
 *   paymentRail: string,
 *   sourceCurrency: string,
 *   walletId: string,
 *   ach_reference?: string,
 *   sepa_reference?: string,
 *   wire_message?: string,
 * }
 */
final class TransferCreateDirectBankParams implements BaseModel
{
    /** @use SdkModel<TransferCreateDirectBankParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The amount to transfer.
     */
    #[Api]
    public float $amount;

    /**
     * The destination currency.
     */
    #[Api]
    public string $destinationCurrency;

    /**
     * The payment rail to use.
     */
    #[Api]
    public string $paymentRail;

    /**
     * The source currency.
     */
    #[Api]
    public string $sourceCurrency;

    /**
     * The ID of the bridge wallet to transfer from.
     */
    #[Api]
    public string $walletId;

    /**
     * ACH transfer reference.
     */
    #[Api(optional: true)]
    public ?string $ach_reference;

    /**
     * SEPA transfer reference.
     */
    #[Api(optional: true)]
    public ?string $sepa_reference;

    /**
     * Wire transfer message.
     */
    #[Api(optional: true)]
    public ?string $wire_message;

    /**
     * `new TransferCreateDirectBankParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TransferCreateDirectBankParams::with(
     *   amount: ...,
     *   destinationCurrency: ...,
     *   paymentRail: ...,
     *   sourceCurrency: ...,
     *   walletId: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TransferCreateDirectBankParams)
     *   ->withAmount(...)
     *   ->withDestinationCurrency(...)
     *   ->withPaymentRail(...)
     *   ->withSourceCurrency(...)
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
        string $paymentRail,
        string $sourceCurrency,
        string $walletId,
        ?string $ach_reference = null,
        ?string $sepa_reference = null,
        ?string $wire_message = null,
    ): self {
        $obj = new self;

        $obj['amount'] = $amount;
        $obj['destinationCurrency'] = $destinationCurrency;
        $obj['paymentRail'] = $paymentRail;
        $obj['sourceCurrency'] = $sourceCurrency;
        $obj['walletId'] = $walletId;

        null !== $ach_reference && $obj['ach_reference'] = $ach_reference;
        null !== $sepa_reference && $obj['sepa_reference'] = $sepa_reference;
        null !== $wire_message && $obj['wire_message'] = $wire_message;

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
     * The destination currency.
     */
    public function withDestinationCurrency(string $destinationCurrency): self
    {
        $obj = clone $this;
        $obj['destinationCurrency'] = $destinationCurrency;

        return $obj;
    }

    /**
     * The payment rail to use.
     */
    public function withPaymentRail(string $paymentRail): self
    {
        $obj = clone $this;
        $obj['paymentRail'] = $paymentRail;

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
     * The ID of the bridge wallet to transfer from.
     */
    public function withWalletID(string $walletID): self
    {
        $obj = clone $this;
        $obj['walletId'] = $walletID;

        return $obj;
    }

    /**
     * ACH transfer reference.
     */
    public function withACHReference(string $achReference): self
    {
        $obj = clone $this;
        $obj['ach_reference'] = $achReference;

        return $obj;
    }

    /**
     * SEPA transfer reference.
     */
    public function withSepaReference(string $sepaReference): self
    {
        $obj = clone $this;
        $obj['sepa_reference'] = $sepaReference;

        return $obj;
    }

    /**
     * Wire transfer message.
     */
    public function withWireMessage(string $wireMessage): self
    {
        $obj = clone $this;
        $obj['wire_message'] = $wireMessage;

        return $obj;
    }
}
