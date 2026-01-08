<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\TestPayment\PaymentResponse;
use Devdraft\V0\TestPayment\TestPaymentProcessParams;
use Devdraft\V0\TestPayment\TestPaymentRefundResponse;

/**
 * @phpstan-import-type RequestOpts from \Devdraft\RequestOptions
 */
interface TestPaymentRawContract
{
    /**
     * @api
     *
     * @param string $id Payment ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PaymentResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TestPaymentProcessParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PaymentResponse>
     *
     * @throws APIException
     */
    public function process(
        array|TestPaymentProcessParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Payment ID to refund
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TestPaymentRefundResponse>
     *
     * @throws APIException
     */
    public function refund(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
