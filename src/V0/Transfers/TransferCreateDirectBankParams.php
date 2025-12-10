<?php

declare(strict_types=1);

namespace Devdraft\V0\Transfers;

use Devdraft\Core\Attributes\Optional;
use Devdraft\Core\Attributes\Required;
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
 *   walletID: string,
 *   achReference?: string,
 *   sepaReference?: string,
 *   wireMessage?: string,
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
    #[Required]
    public float $amount;

    /**
     * The destination currency.
     */
    #[Required]
    public string $destinationCurrency;

    /**
     * The payment rail to use.
     */
    #[Required]
    public string $paymentRail;

    /**
     * The source currency.
     */
    #[Required]
    public string $sourceCurrency;

    /**
     * The ID of the bridge wallet to transfer from.
     */
    #[Required('walletId')]
    public string $walletID;

    /**
     * ACH transfer reference.
     */
    #[Optional('ach_reference')]
    public ?string $achReference;

    /**
     * SEPA transfer reference.
     */
    #[Optional('sepa_reference')]
    public ?string $sepaReference;

    /**
     * Wire transfer message.
     */
    #[Optional('wire_message')]
    public ?string $wireMessage;

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
     *   walletID: ...,
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
        string $walletID,
        ?string $achReference = null,
        ?string $sepaReference = null,
        ?string $wireMessage = null,
    ): self {
        $self = new self;

        $self['amount'] = $amount;
        $self['destinationCurrency'] = $destinationCurrency;
        $self['paymentRail'] = $paymentRail;
        $self['sourceCurrency'] = $sourceCurrency;
        $self['walletID'] = $walletID;

        null !== $achReference && $self['achReference'] = $achReference;
        null !== $sepaReference && $self['sepaReference'] = $sepaReference;
        null !== $wireMessage && $self['wireMessage'] = $wireMessage;

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
     * The destination currency.
     */
    public function withDestinationCurrency(string $destinationCurrency): self
    {
        $self = clone $this;
        $self['destinationCurrency'] = $destinationCurrency;

        return $self;
    }

    /**
     * The payment rail to use.
     */
    public function withPaymentRail(string $paymentRail): self
    {
        $self = clone $this;
        $self['paymentRail'] = $paymentRail;

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
     * The ID of the bridge wallet to transfer from.
     */
    public function withWalletID(string $walletID): self
    {
        $self = clone $this;
        $self['walletID'] = $walletID;

        return $self;
    }

    /**
     * ACH transfer reference.
     */
    public function withACHReference(string $achReference): self
    {
        $self = clone $this;
        $self['achReference'] = $achReference;

        return $self;
    }

    /**
     * SEPA transfer reference.
     */
    public function withSepaReference(string $sepaReference): self
    {
        $self = clone $this;
        $self['sepaReference'] = $sepaReference;

        return $self;
    }

    /**
     * Wire transfer message.
     */
    public function withWireMessage(string $wireMessage): self
    {
        $self = clone $this;
        $self['wireMessage'] = $wireMessage;

        return $self;
    }
}
