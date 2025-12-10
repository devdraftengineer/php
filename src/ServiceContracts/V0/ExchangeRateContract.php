<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
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
     * @param string $from Source currency code (e.g., usd)
     * @param string $to Target currency code (e.g., eur)
     *
     * @throws APIException
     */
    public function getExchangeRate(
        string $from,
        string $to,
        ?RequestOptions $requestOptions = null
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
