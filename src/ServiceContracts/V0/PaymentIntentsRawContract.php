<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\PaymentIntents\PaymentIntentCreateBankParams;
use Devdraft\V0\PaymentIntents\PaymentIntentCreateStableParams;

/**
 * @phpstan-import-type RequestOpts from \Devdraft\RequestOptions
 */
interface PaymentIntentsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PaymentIntentCreateBankParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createBank(
        array|PaymentIntentCreateBankParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PaymentIntentCreateStableParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createStable(
        array|PaymentIntentCreateStableParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
