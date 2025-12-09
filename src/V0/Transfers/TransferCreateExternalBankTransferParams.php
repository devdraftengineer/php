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
        $obj = new self;

        $obj['destinationCurrency'] = $destinationCurrency;
        $obj['destinationPaymentRail'] = $destinationPaymentRail;
        $obj['externalAccountID'] = $externalAccountID;
        $obj['sourceCurrency'] = $sourceCurrency;
        $obj['sourceWalletID'] = $sourceWalletID;

        null !== $achReference && $obj['achReference'] = $achReference;
        null !== $amount && $obj['amount'] = $amount;
        null !== $sepaReference && $obj['sepaReference'] = $sepaReference;
        null !== $speiReference && $obj['speiReference'] = $speiReference;
        null !== $swiftCharges && $obj['swiftCharges'] = $swiftCharges;
        null !== $swiftReference && $obj['swiftReference'] = $swiftReference;
        null !== $wireMessage && $obj['wireMessage'] = $wireMessage;

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
     * The destination payment rail (fiat payment method).
     *
     * @param DestinationPaymentRail|value-of<DestinationPaymentRail> $destinationPaymentRail
     */
    public function withDestinationPaymentRail(
        DestinationPaymentRail|string $destinationPaymentRail
    ): self {
        $obj = clone $this;
        $obj['destinationPaymentRail'] = $destinationPaymentRail;

        return $obj;
    }

    /**
     * The external account ID for the bank transfer.
     */
    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj['externalAccountID'] = $externalAccountID;

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
     * ACH reference message (1-10 characters, only for ACH transfers).
     */
    public function withACHReference(string $achReference): self
    {
        $obj = clone $this;
        $obj['achReference'] = $achReference;

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
     * SEPA reference message (6-140 characters, only for SEPA transfers).
     */
    public function withSepaReference(string $sepaReference): self
    {
        $obj = clone $this;
        $obj['sepaReference'] = $sepaReference;

        return $obj;
    }

    /**
     * SPEI reference message (1-40 characters, only for SPEI transfers).
     */
    public function withSpeiReference(string $speiReference): self
    {
        $obj = clone $this;
        $obj['speiReference'] = $speiReference;

        return $obj;
    }

    /**
     * SWIFT charges bearer (only for SWIFT transfers).
     */
    public function withSwiftCharges(string $swiftCharges): self
    {
        $obj = clone $this;
        $obj['swiftCharges'] = $swiftCharges;

        return $obj;
    }

    /**
     * SWIFT reference message (1-190 characters, only for SWIFT transfers).
     */
    public function withSwiftReference(string $swiftReference): self
    {
        $obj = clone $this;
        $obj['swiftReference'] = $swiftReference;

        return $obj;
    }

    /**
     * Wire transfer message (1-256 characters, only for wire transfers).
     */
    public function withWireMessage(string $wireMessage): self
    {
        $obj = clone $this;
        $obj['wireMessage'] = $wireMessage;

        return $obj;
    }
}
