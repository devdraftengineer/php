<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\TestPayment\PaymentResponse;
use Devdraft\V0\TestPayment\TestPaymentProcessParams;
use Devdraft\V0\TestPayment\TestPaymentRefundResponse;

interface TestPaymentContract
{
    /**
     * @api
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
     * @param array<mixed>|TestPaymentProcessParams $params
     *
     * @throws APIException
     */
    public function process(
        array|TestPaymentProcessParams $params,
        ?RequestOptions $requestOptions = null,
    ): PaymentResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function refund(
        string $id,
        ?RequestOptions $requestOptions = null
    ): TestPaymentRefundResponse;
}
