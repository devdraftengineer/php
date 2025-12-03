<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\ExchangeRate\ExchangeRateGetExchangeRateParams;
use Devdraft\V0\ExchangeRate\ExchangeRateResponse;

interface ExchangeRateContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function getEurToUsd(
        ?RequestOptions $requestOptions = null
    ): ExchangeRateResponse;

    /**
     * @api
     *
     * @param array<mixed>|ExchangeRateGetExchangeRateParams $params
     *
     * @throws APIException
     */
    public function getExchangeRate(
        array|ExchangeRateGetExchangeRateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExchangeRateResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getUsdToEur(
        ?RequestOptions $requestOptions = null
    ): ExchangeRateResponse;
}
