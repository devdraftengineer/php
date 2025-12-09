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
        $obj = new self;

        $obj['id'] = $id;
        $obj['amount'] = $amount;
        $obj['currency'] = $currency;
        $obj['status'] = $status;
        $obj['timestamp'] = $timestamp;

        return $obj;
    }

    /**
     * Payment ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The amount charged.
     */
    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj['amount'] = $amount;

        return $obj;
    }

    /**
     * The currency code.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj['currency'] = $currency;

        return $obj;
    }

    /**
     * Payment status.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Timestamp of the payment.
     */
    public function withTimestamp(string $timestamp): self
    {
        $obj = clone $this;
        $obj['timestamp'] = $timestamp;

        return $obj;
    }
}
