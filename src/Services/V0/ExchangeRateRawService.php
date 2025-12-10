<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\ExchangeRateRawContract;
use Devdraft\V0\ExchangeRate\ExchangeRateGetExchangeRateParams;
use Devdraft\V0\ExchangeRate\ExchangeRateResponse;

final class ExchangeRateRawService implements ExchangeRateRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieves the current exchange rate for converting EUR to USD (EURC to USDC).
     *
     * This endpoint provides real-time exchange rate information for stablecoin conversions:
     * - Mid-market rate for reference pricing
     * - Buy rate for actual conversion calculations
     * - Sell rate for reverse conversion scenarios
     *
     * ## Use Cases
     * - Display current exchange rates in dashboards
     * - Calculate conversion amounts for EURC to USDC transfers
     * - Financial reporting and analytics
     * - Real-time pricing for multi-currency operations
     *
     * ## Rate Information
     * - **Mid-market rate**: The theoretical middle rate between buy and sell
     * - **Buy rate**: Rate used when converting FROM EUR TO USD (what you get)
     * - **Sell rate**: Rate used when converting FROM USD TO EUR (what you pay)
     *
     * The rates are updated in real-time and reflect current market conditions.
     *
     * @return BaseResponse<ExchangeRateResponse>
     *
     * @throws APIException
     */
    public function getEurToUsd(
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'api/v0/exchange-rate/eur-to-usd',
            options: $requestOptions,
            convert: ExchangeRateResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves the current exchange rate between two specified currencies.
     *
     * This flexible endpoint allows you to get exchange rates for any supported currency pair:
     * - Supports USD and EUR currency codes
     * - Provides comprehensive rate information
     * - Real-time market data
     *
     * ## Supported Currency Pairs
     * - USD to EUR (USDC to EURC)
     * - EUR to USD (EURC to USDC)
     *
     * ## Query Parameters
     * - **from**: Source currency code (usd, eur)
     * - **to**: Target currency code (usd, eur)
     *
     * ## Use Cases
     * - Flexible exchange rate queries
     * - Multi-currency application support
     * - Dynamic currency conversion calculations
     * - Financial analytics and reporting
     *
     * ## Rate Information
     * All rates are provided with full market context including mid-market, buy, and sell rates.
     *
     * @param array{from: string, to: string}|ExchangeRateGetExchangeRateParams $params
     *
     * @return BaseResponse<ExchangeRateResponse>
     *
     * @throws APIException
     */
    public function getExchangeRate(
        array|ExchangeRateGetExchangeRateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ExchangeRateGetExchangeRateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'api/v0/exchange-rate',
            query: $parsed,
            options: $options,
            convert: ExchangeRateResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves the current exchange rate for converting USD to EUR (USDC to EURC).
     *
     * This endpoint provides real-time exchange rate information for stablecoin conversions:
     * - Mid-market rate for reference pricing
     * - Buy rate for actual conversion calculations
     * - Sell rate for reverse conversion scenarios
     *
     * ## Use Cases
     * - Display current exchange rates in dashboards
     * - Calculate conversion amounts for USDC to EURC transfers
     * - Financial reporting and analytics
     * - Real-time pricing for multi-currency operations
     *
     * ## Rate Information
     * - **Mid-market rate**: The theoretical middle rate between buy and sell
     * - **Buy rate**: Rate used when converting FROM USD TO EUR (what you get)
     * - **Sell rate**: Rate used when converting FROM EUR TO USD (what you pay)
     *
     * The rates are updated in real-time and reflect current market conditions.
     *
     * @return BaseResponse<ExchangeRateResponse>
     *
     * @throws APIException
     */
    public function getUsdToEur(
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'api/v0/exchange-rate/usd-to-eur',
            options: $requestOptions,
            convert: ExchangeRateResponse::class,
        );
    }
}
