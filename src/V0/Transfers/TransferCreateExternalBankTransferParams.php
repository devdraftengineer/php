<?php

declare(strict_types=1);

namespace Devdraft\V0\Transfers;

use Devdraft\Core\Attributes\Api;
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
 *   external_account_id: string,
 *   sourceCurrency: string,
 *   sourceWalletId: string,
 *   ach_reference?: string,
 *   amount?: float,
 *   sepa_reference?: string,
 *   spei_reference?: string,
 *   swift_charges?: string,
 *   swift_reference?: string,
 *   wire_message?: string,
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
    #[Api]
    public string $destinationCurrency;

    /**
     * The destination payment rail (fiat payment method).
     *
     * @var value-of<DestinationPaymentRail> $destinationPaymentRail
     */
    #[Api(enum: DestinationPaymentRail::class)]
    public string $destinationPaymentRail;

    /**
     * The external account ID for the bank transfer.
     */
    #[Api]
    public string $external_account_id;

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
     * ACH reference message (1-10 characters, only for ACH transfers).
     */
    #[Api(optional: true)]
    public ?string $ach_reference;

    /**
     * The amount to transfer.
     */
    #[Api(optional: true)]
    public ?float $amount;

    /**
     * SEPA reference message (6-140 characters, only for SEPA transfers).
     */
    #[Api(optional: true)]
    public ?string $sepa_reference;

    /**
     * SPEI reference message (1-40 characters, only for SPEI transfers).
     */
    #[Api(optional: true)]
    public ?string $spei_reference;

    /**
     * SWIFT charges bearer (only for SWIFT transfers).
     */
    #[Api(optional: true)]
    public ?string $swift_charges;

    /**
     * SWIFT reference message (1-190 characters, only for SWIFT transfers).
     */
    #[Api(optional: true)]
    public ?string $swift_reference;

    /**
     * Wire transfer message (1-256 characters, only for wire transfers).
     */
    #[Api(optional: true)]
    public ?string $wire_message;

    /**
     * `new TransferCreateExternalBankTransferParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TransferCreateExternalBankTransferParams::with(
     *   destinationCurrency: ...,
     *   destinationPaymentRail: ...,
     *   external_account_id: ...,
     *   sourceCurrency: ...,
     *   sourceWalletId: ...,
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
        string $external_account_id,
        string $sourceCurrency,
        string $sourceWalletId,
        ?string $ach_reference = null,
        ?float $amount = null,
        ?string $sepa_reference = null,
        ?string $spei_reference = null,
        ?string $swift_charges = null,
        ?string $swift_reference = null,
        ?string $wire_message = null,
    ): self {
        $obj = new self;

        $obj->destinationCurrency = $destinationCurrency;
        $obj['destinationPaymentRail'] = $destinationPaymentRail;
        $obj->external_account_id = $external_account_id;
        $obj->sourceCurrency = $sourceCurrency;
        $obj->sourceWalletId = $sourceWalletId;

        null !== $ach_reference && $obj->ach_reference = $ach_reference;
        null !== $amount && $obj->amount = $amount;
        null !== $sepa_reference && $obj->sepa_reference = $sepa_reference;
        null !== $spei_reference && $obj->spei_reference = $spei_reference;
        null !== $swift_charges && $obj->swift_charges = $swift_charges;
        null !== $swift_reference && $obj->swift_reference = $swift_reference;
        null !== $wire_message && $obj->wire_message = $wire_message;

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
        $obj->external_account_id = $externalAccountID;

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
     * ACH reference message (1-10 characters, only for ACH transfers).
     */
    public function withACHReference(string $achReference): self
    {
        $obj = clone $this;
        $obj->ach_reference = $achReference;

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
     * SEPA reference message (6-140 characters, only for SEPA transfers).
     */
    public function withSepaReference(string $sepaReference): self
    {
        $obj = clone $this;
        $obj->sepa_reference = $sepaReference;

        return $obj;
    }

    /**
     * SPEI reference message (1-40 characters, only for SPEI transfers).
     */
    public function withSpeiReference(string $speiReference): self
    {
        $obj = clone $this;
        $obj->spei_reference = $speiReference;

        return $obj;
    }

    /**
     * SWIFT charges bearer (only for SWIFT transfers).
     */
    public function withSwiftCharges(string $swiftCharges): self
    {
        $obj = clone $this;
        $obj->swift_charges = $swiftCharges;

        return $obj;
    }

    /**
     * SWIFT reference message (1-190 characters, only for SWIFT transfers).
     */
    public function withSwiftReference(string $swiftReference): self
    {
        $obj = clone $this;
        $obj->swift_reference = $swiftReference;

        return $obj;
    }

    /**
     * Wire transfer message (1-256 characters, only for wire transfers).
     */
    public function withWireMessage(string $wireMessage): self
    {
        $obj = clone $this;
        $obj->wire_message = $wireMessage;

        return $obj;
    }
}
