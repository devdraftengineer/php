<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\TestPayment\PaymentResponse;
use Devdraft\V0\TestPayment\TestPaymentProcessParams;
use Devdraft\V0\TestPayment\TestPaymentRefundResponse;

interface TestPaymentRawContract
{
    /**
     * @api
     *
     * @param string $id Payment ID
     *
     * @return BaseResponse<PaymentResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|TestPaymentProcessParams $params
     *
     * @return BaseResponse<PaymentResponse>
     *
     * @throws APIException
     */
    public function process(
        array|TestPaymentProcessParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Payment ID to refund
     *
     * @return BaseResponse<TestPaymentRefundResponse>
     *
     * @throws APIException
     */
    public function refund(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
