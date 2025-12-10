<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\ExchangeRateContract;
use Devdraft\V0\ExchangeRate\ExchangeRateResponse;

final class ExchangeRateService implements ExchangeRateContract
{
    /**
     * @api
     */
    public ExchangeRateRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ExchangeRateRawService($client);
    }

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
     * @throws APIException
     */
    public function getEurToUsd(
        ?RequestOptions $requestOptions = null
    ): ExchangeRateResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEurToUsd(requestOptions: $requestOptions);

        return $response->parse();
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
     * @param string $from Source currency code (e.g., usd)
     * @param string $to Target currency code (e.g., eur)
     *
     * @throws APIException
     */
    public function getExchangeRate(
        string $from,
        string $to,
        ?RequestOptions $requestOptions = null
    ): ExchangeRateResponse {
        $params = ['from' => $from, 'to' => $to];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getExchangeRate(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
     * @throws APIException
     */
    public function getUsdToEur(
        ?RequestOptions $requestOptions = null
    ): ExchangeRateResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getUsdToEur(requestOptions: $requestOptions);

        return $response->parse();
    }
}
