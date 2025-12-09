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
 *   paymentId: string,
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
    #[Required]
    public string $paymentId;

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
     *   id: ..., amount: ..., paymentId: ..., status: ..., timestamp: ...
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
        string $paymentId,
        string $status,
        string $timestamp,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['amount'] = $amount;
        $obj['paymentId'] = $paymentId;
        $obj['status'] = $status;
        $obj['timestamp'] = $timestamp;

        return $obj;
    }

    /**
     * Refund ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The amount refunded.
     */
    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj['amount'] = $amount;

        return $obj;
    }

    /**
     * Original payment ID.
     */
    public function withPaymentID(string $paymentID): self
    {
        $obj = clone $this;
        $obj['paymentId'] = $paymentID;

        return $obj;
    }

    /**
     * Refund status.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Timestamp of the refund.
     */
    public function withTimestamp(string $timestamp): self
    {
        $obj = clone $this;
        $obj['timestamp'] = $timestamp;

        return $obj;
    }
}
