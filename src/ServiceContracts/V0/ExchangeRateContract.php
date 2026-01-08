<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\ExchangeRate\ExchangeRateResponse;

/**
 * @phpstan-import-type RequestOpts from \Devdraft\RequestOptions
 */
interface ExchangeRateContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEurToUsd(
        RequestOptions|array|null $requestOptions = null
    ): ExchangeRateResponse;

    /**
     * @api
     *
     * @param string $from Source currency code (e.g., usd)
     * @param string $to Target currency code (e.g., eur)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getExchangeRate(
        string $from,
        string $to,
        RequestOptions|array|null $requestOptions = null
    ): ExchangeRateResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getUsdToEur(
        RequestOptions|array|null $requestOptions = null
    ): ExchangeRateResponse;
}
