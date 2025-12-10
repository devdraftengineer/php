<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\TestPayment\PaymentResponse;
use Devdraft\V0\TestPayment\TestPaymentRefundResponse;

interface TestPaymentContract
{
    /**
     * @api
     *
     * @param string $id Payment ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PaymentResponse;

    /**
     * @api
     *
     * @param float $amount The amount to charge
     * @param string $currency The currency code
     * @param string $description Description of the payment
     * @param string $customerID Customer reference ID
     *
     * @throws APIException
     */
    public function process(
        float $amount,
        string $currency,
        string $description,
        ?string $customerID = null,
        ?RequestOptions $requestOptions = null,
    ): PaymentResponse;

    /**
     * @api
     *
     * @param string $id Payment ID to refund
     *
     * @throws APIException
     */
    public function refund(
        string $id,
        ?RequestOptions $requestOptions = null
    ): TestPaymentRefundResponse;
}
