<?php

declare(strict_types=1);

namespace Devdraft\V0\TestPayment;

use Devdraft\Core\Attributes\Api;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;

/**
 * Creates a new payment. Requires an idempotency key to prevent duplicate payments on retry.
 *
 * ## Idempotency Key Best Practices
 *
 * 1. **Generate unique keys**: Use UUIDs or similar unique identifiers, prefixed with a descriptive operation name
 * 2. **Store keys client-side**: Save the key with the original request so you can retry with the same key
 * 3. **Key format**: Between 6-64 alphanumeric characters
 * 4. **Expiration**: Keys expire after 24 hours by default
 * 5. **Use case**: Perfect for ensuring payment operations are never processed twice, even during network failures
 *
 * ## Example Request (curl)
 *
 * ```bash
 * curl -X POST \
 *   https://api.example.com/rest-api/v0/test-payment \
 *   -H 'Content-Type: application/json' \
 *   -H 'Client-Key: your-api-key' \
 *   -H 'Client-Secret: your-api-secret' \
 *   -H 'Idempotency-Key: payment_123456_unique_key' \
 *   -d '{
 *     "amount": 100.00,
 *     "currency": "USD",
 *     "description": "Test payment for order #12345",
 *     "customerId": "cus_12345"
 *   }'
 * ```
 *
 * ## Example Response (First Request)
 *
 * ```json
 * {
 *   "id": "pay_abc123xyz456",
 *   "amount": 100.00,
 *   "currency": "USD",
 *   "status": "succeeded",
 *   "timestamp": "2023-07-01T12:00:00.000Z"
 * }
 * ```
 *
 * ## Example Response (Duplicate Request)
 *
 * The exact same response will be returned for any duplicate request with the same idempotency key, without creating a new payment.
 *
 * ## Retry Scenario Example
 *
 * Network failure during payment submission:
 * 1. Client creates payment request with idempotency key: "payment_123456_unique_key"
 * 2. Request begins processing, but network connection fails before response received
 * 3. Client retries the exact same request with the same idempotency key
 * 4. Server detects duplicate idempotency key and returns the result of the first request
 * 5. No duplicate payment is created
 *
 * If you retry with same key but different parameters (e.g., different amount), you'll receive a 409 Conflict error.
 *
 * @see Devdraft\Services\V0\TestPaymentService::process()
 *
 * @phpstan-type TestPaymentProcessParamsShape = array{
 *   amount: float, currency: string, description: string, customerId?: string
 * }
 */
final class TestPaymentProcessParams implements BaseModel
{
    /** @use SdkModel<TestPaymentProcessParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The amount to charge.
     */
    #[Api]
    public float $amount;

    /**
     * The currency code.
     */
    #[Api]
    public string $currency;

    /**
     * Description of the payment.
     */
    #[Api]
    public string $description;

    /**
     * Customer reference ID.
     */
    #[Api(optional: true)]
    public ?string $customerId;

    /**
     * `new TestPaymentProcessParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TestPaymentProcessParams::with(amount: ..., currency: ..., description: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TestPaymentProcessParams)
     *   ->withAmount(...)
     *   ->withCurrency(...)
     *   ->withDescription(...)
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
        string $currency,
        string $description,
        ?string $customerId = null,
    ): self {
        $obj = new self;

        $obj['amount'] = $amount;
        $obj['currency'] = $currency;
        $obj['description'] = $description;

        null !== $customerId && $obj['customerId'] = $customerId;

        return $obj;
    }

    /**
     * The amount to charge.
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
     * Description of the payment.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * Customer reference ID.
     */
    public function withCustomerID(string $customerID): self
    {
        $obj = clone $this;
        $obj['customerId'] = $customerID;

        return $obj;
    }
}
