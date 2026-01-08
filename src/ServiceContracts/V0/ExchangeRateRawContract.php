<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\ExchangeRate\ExchangeRateGetExchangeRateParams;
use Devdraft\V0\ExchangeRate\ExchangeRateResponse;

/**
 * @phpstan-import-type RequestOpts from \Devdraft\RequestOptions
 */
interface ExchangeRateRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExchangeRateResponse>
     *
     * @throws APIException
     */
    public function getEurToUsd(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ExchangeRateGetExchangeRateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExchangeRateResponse>
     *
     * @throws APIException
     */
    public function getExchangeRate(
        array|ExchangeRateGetExchangeRateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExchangeRateResponse>
     *
     * @throws APIException
     */
    public function getUsdToEur(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
