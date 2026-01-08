<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\TestPayment\PaymentResponse;
use Devdraft\V0\TestPayment\TestPaymentRefundResponse;

/**
 * @phpstan-import-type RequestOpts from \Devdraft\RequestOptions
 */
interface TestPaymentContract
{
    /**
     * @api
     *
     * @param string $id Payment ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): PaymentResponse;

    /**
     * @api
     *
     * @param float $amount The amount to charge
     * @param string $currency The currency code
     * @param string $description Description of the payment
     * @param string $customerID Customer reference ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function process(
        float $amount,
        string $currency,
        string $description,
        ?string $customerID = null,
        RequestOptions|array|null $requestOptions = null,
    ): PaymentResponse;

    /**
     * @api
     *
     * @param string $id Payment ID to refund
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function refund(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): TestPaymentRefundResponse;
}
