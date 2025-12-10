<?php

declare(strict_types=1);

namespace Devdraft\V0\Transfers;

use Devdraft\Core\Attributes\Optional;
use Devdraft\Core\Attributes\Required;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;
use Devdraft\V0\Transfers\TransferCreateExternalBankTransferParams\DestinationPaymentRail;

/**
 * Create an external bank transfer.
 *
 * @see Devdraft\Services\V0\TransfersService::createExternalBankTransfer()
 *
 * @phpstan-type TransferCreateExternalBankTransferParamsShape = array{
 *   destinationCurrency: string,
 *   destinationPaymentRail: DestinationPaymentRail|value-of<DestinationPaymentRail>,
 *   externalAccountID: string,
 *   sourceCurrency: string,
 *   sourceWalletID: string,
 *   achReference?: string,
 *   amount?: float,
 *   sepaReference?: string,
 *   speiReference?: string,
 *   swiftCharges?: string,
 *   swiftReference?: string,
 *   wireMessage?: string,
 * }
 */
final class TransferCreateExternalBankTransferParams implements BaseModel
{
    /** @use SdkModel<TransferCreateExternalBankTransferParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The destination currency.
     */
    #[Required]
    public string $destinationCurrency;

    /**
     * The destination payment rail (fiat payment method).
     *
     * @var value-of<DestinationPaymentRail> $destinationPaymentRail
     */
    #[Required(enum: DestinationPaymentRail::class)]
    public string $destinationPaymentRail;

    /**
     * The external account ID for the bank transfer.
     */
    #[Required('external_account_id')]
    public string $externalAccountID;

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
     * ACH reference message (1-10 characters, only for ACH transfers).
     */
    #[Optional('ach_reference')]
    public ?string $achReference;

    /**
     * The amount to transfer.
     */
    #[Optional]
    public ?float $amount;

    /**
     * SEPA reference message (6-140 characters, only for SEPA transfers).
     */
    #[Optional('sepa_reference')]
    public ?string $sepaReference;

    /**
     * SPEI reference message (1-40 characters, only for SPEI transfers).
     */
    #[Optional('spei_reference')]
    public ?string $speiReference;

    /**
     * SWIFT charges bearer (only for SWIFT transfers).
     */
    #[Optional('swift_charges')]
    public ?string $swiftCharges;

    /**
     * SWIFT reference message (1-190 characters, only for SWIFT transfers).
     */
    #[Optional('swift_reference')]
    public ?string $swiftReference;

    /**
     * Wire transfer message (1-256 characters, only for wire transfers).
     */
    #[Optional('wire_message')]
    public ?string $wireMessage;

    /**
     * `new TransferCreateExternalBankTransferParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TransferCreateExternalBankTransferParams::with(
     *   destinationCurrency: ...,
     *   destinationPaymentRail: ...,
     *   externalAccountID: ...,
     *   sourceCurrency: ...,
     *   sourceWalletID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TransferCreateExternalBankTransferParams)
     *   ->withDestinationCurrency(...)
     *   ->withDestinationPaymentRail(...)
     *   ->withExternalAccountID(...)
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
     *
     * @param DestinationPaymentRail|value-of<DestinationPaymentRail> $destinationPaymentRail
     */
    public static function with(
        string $destinationCurrency,
        DestinationPaymentRail|string $destinationPaymentRail,
        string $externalAccountID,
        string $sourceCurrency,
        string $sourceWalletID,
        ?string $achReference = null,
        ?float $amount = null,
        ?string $sepaReference = null,
        ?string $speiReference = null,
        ?string $swiftCharges = null,
        ?string $swiftReference = null,
        ?string $wireMessage = null,
    ): self {
        $self = new self;

        $self['destinationCurrency'] = $destinationCurrency;
        $self['destinationPaymentRail'] = $destinationPaymentRail;
        $self['externalAccountID'] = $externalAccountID;
        $self['sourceCurrency'] = $sourceCurrency;
        $self['sourceWalletID'] = $sourceWalletID;

        null !== $achReference && $self['achReference'] = $achReference;
        null !== $amount && $self['amount'] = $amount;
        null !== $sepaReference && $self['sepaReference'] = $sepaReference;
        null !== $speiReference && $self['speiReference'] = $speiReference;
        null !== $swiftCharges && $self['swiftCharges'] = $swiftCharges;
        null !== $swiftReference && $self['swiftReference'] = $swiftReference;
        null !== $wireMessage && $self['wireMessage'] = $wireMessage;

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
     * The destination payment rail (fiat payment method).
     *
     * @param DestinationPaymentRail|value-of<DestinationPaymentRail> $destinationPaymentRail
     */
    public function withDestinationPaymentRail(
        DestinationPaymentRail|string $destinationPaymentRail
    ): self {
        $self = clone $this;
        $self['destinationPaymentRail'] = $destinationPaymentRail;

        return $self;
    }

    /**
     * The external account ID for the bank transfer.
     */
    public function withExternalAccountID(string $externalAccountID): self
    {
        $self = clone $this;
        $self['externalAccountID'] = $externalAccountID;

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
     * ACH reference message (1-10 characters, only for ACH transfers).
     */
    public function withACHReference(string $achReference): self
    {
        $self = clone $this;
        $self['achReference'] = $achReference;

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
     * SEPA reference message (6-140 characters, only for SEPA transfers).
     */
    public function withSepaReference(string $sepaReference): self
    {
        $self = clone $this;
        $self['sepaReference'] = $sepaReference;

        return $self;
    }

    /**
     * SPEI reference message (1-40 characters, only for SPEI transfers).
     */
    public function withSpeiReference(string $speiReference): self
    {
        $self = clone $this;
        $self['speiReference'] = $speiReference;

        return $self;
    }

    /**
     * SWIFT charges bearer (only for SWIFT transfers).
     */
    public function withSwiftCharges(string $swiftCharges): self
    {
        $self = clone $this;
        $self['swiftCharges'] = $swiftCharges;

        return $self;
    }

    /**
     * SWIFT reference message (1-190 characters, only for SWIFT transfers).
     */
    public function withSwiftReference(string $swiftReference): self
    {
        $self = clone $this;
        $self['swiftReference'] = $swiftReference;

        return $self;
    }

    /**
     * Wire transfer message (1-256 characters, only for wire transfers).
     */
    public function withWireMessage(string $wireMessage): self
    {
        $self = clone $this;
        $self['wireMessage'] = $wireMessage;

        return $self;
    }
}
