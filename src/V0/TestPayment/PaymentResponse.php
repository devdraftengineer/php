<?php

declare(strict_types=1);

namespace Devdraft\V0\TestPayment;

use Devdraft\Core\Attributes\Required;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Contracts\BaseModel;

/**
 * @phpstan-type PaymentResponseShape = array{
 *   id: string, amount: float, currency: string, status: string, timestamp: string
 * }
 */
final class PaymentResponse implements BaseModel
{
    /** @use SdkModel<PaymentResponseShape> */
    use SdkModel;

    /**
     * Payment ID.
     */
    #[Required]
    public string $id;

    /**
     * The amount charged.
     */
    #[Required]
    public float $amount;

    /**
     * The currency code.
     */
    #[Required]
    public string $currency;

    /**
     * Payment status.
     */
    #[Required]
    public string $status;

    /**
     * Timestamp of the payment.
     */
    #[Required]
    public string $timestamp;

    /**
     * `new PaymentResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PaymentResponse::with(
     *   id: ..., amount: ..., currency: ..., status: ..., timestamp: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PaymentResponse)
     *   ->withID(...)
     *   ->withAmount(...)
     *   ->withCurrency(...)
     *   ->withStatus(...)
     *   ->withTimestamp(...)
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
        string $id,
        float $amount,
        string $currency,
        string $status,
        string $timestamp,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['amount'] = $amount;
        $self['currency'] = $currency;
        $self['status'] = $status;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * Payment ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The amount charged.
     */
    public function withAmount(float $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * The currency code.
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * Payment status.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Timestamp of the payment.
     */
    public function withTimestamp(string $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }
}
