<?php

declare(strict_types=1);

namespace Devdraft\V0\TestPayment;

use Devdraft\Core\Attributes\Required;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Contracts\BaseModel;

/**
 * @phpstan-type TestPaymentRefundResponseShape = array{
 *   id: string,
 *   amount: float,
 *   paymentID: string,
 *   status: string,
 *   timestamp: string,
 * }
 */
final class TestPaymentRefundResponse implements BaseModel
{
    /** @use SdkModel<TestPaymentRefundResponseShape> */
    use SdkModel;

    /**
     * Refund ID.
     */
    #[Required]
    public string $id;

    /**
     * The amount refunded.
     */
    #[Required]
    public float $amount;

    /**
     * Original payment ID.
     */
    #[Required('paymentId')]
    public string $paymentID;

    /**
     * Refund status.
     */
    #[Required]
    public string $status;

    /**
     * Timestamp of the refund.
     */
    #[Required]
    public string $timestamp;

    /**
     * `new TestPaymentRefundResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TestPaymentRefundResponse::with(
     *   id: ..., amount: ..., paymentID: ..., status: ..., timestamp: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TestPaymentRefundResponse)
     *   ->withID(...)
     *   ->withAmount(...)
     *   ->withPaymentID(...)
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
        string $paymentID,
        string $status,
        string $timestamp,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['amount'] = $amount;
        $self['paymentID'] = $paymentID;
        $self['status'] = $status;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * Refund ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The amount refunded.
     */
    public function withAmount(float $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * Original payment ID.
     */
    public function withPaymentID(string $paymentID): self
    {
        $self = clone $this;
        $self['paymentID'] = $paymentID;

        return $self;
    }

    /**
     * Refund status.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Timestamp of the refund.
     */
    public function withTimestamp(string $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }
}
