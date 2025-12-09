<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\TestPaymentContract;
use Devdraft\V0\TestPayment\PaymentResponse;
use Devdraft\V0\TestPayment\TestPaymentProcessParams;
use Devdraft\V0\TestPayment\TestPaymentRefundResponse;

final class TestPaymentService implements TestPaymentContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get payment details by ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PaymentResponse {
        /** @var BaseResponse<PaymentResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['api/v0/test-payment/%1$s', $id],
            options: $requestOptions,
            convert: PaymentResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
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
     * @param array{
     *   amount: float, currency: string, description: string, customerId?: string
     * }|TestPaymentProcessParams $params
     *
     * @throws APIException
     */
    public function process(
        array|TestPaymentProcessParams $params,
        ?RequestOptions $requestOptions = null,
    ): PaymentResponse {
        [$parsed, $options] = TestPaymentProcessParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PaymentResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'api/v0/test-payment',
            body: (object) $parsed,
            options: $options,
            convert: PaymentResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Refunds an existing payment. Requires an idempotency key to prevent duplicate refunds on retry.
     *
     * ## Idempotency Key Benefits for Refunds
     *
     * Refunds are critical financial operations where duplicates can cause serious issues. Using idempotency keys ensures:
     *
     * 1. **Prevent duplicate refunds**: Even if a request times out or fails, retrying with the same key won't issue multiple refunds
     * 2. **Safe retries**: Network failures or timeouts won't risk creating multiple refunds
     * 3. **Consistent response**: Always get the same response for the same operation
     *
     * ## Example Request (curl)
     *
     * ```bash
     * curl -X POST \
     *   https://api.example.com/rest-api/v0/test-payment/pay_abc123xyz456/refund \
     *   -H 'Content-Type: application/json' \
     *   -H 'Client-Key: your-api-key' \
     *   -H 'Client-Secret: your-api-secret' \
     *   -H 'Idempotency-Key: refund_123456_unique_key'
     * ```
     *
     * ## Example Response (First Request)
     *
     * ```json
     * {
     *   "id": "ref_xyz789",
     *   "paymentId": "pay_abc123xyz456",
     *   "amount": 100.00,
     *   "status": "succeeded",
     *   "timestamp": "2023-07-01T14:30:00.000Z"
     * }
     * ```
     *
     * ## Example Response (Duplicate Request)
     *
     * The exact same response will be returned for any duplicate request with the same idempotency key, without creating a new refund.
     *
     * ## Idempotency Key Guidelines
     *
     * - Use a unique key for each distinct refund operation
     * - Store keys client-side to ensure you can retry with the same key if needed
     * - Keys expire after 24 hours by default
     *
     * @throws APIException
     */
    public function refund(
        string $id,
        ?RequestOptions $requestOptions = null
    ): TestPaymentRefundResponse {
        /** @var BaseResponse<TestPaymentRefundResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['api/v0/test-payment/%1$s/refund', $id],
            options: $requestOptions,
            convert: TestPaymentRefundResponse::class,
        );

        return $response->parse();
    }
}
