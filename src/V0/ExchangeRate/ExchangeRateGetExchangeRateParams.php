<?php

declare(strict_types=1);

namespace Devdraft\V0\ExchangeRate;

use Devdraft\Core\Attributes\Api;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;

/**
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
 * @see Devdraft\Services\V0\ExchangeRateService::getExchangeRate()
 *
 * @phpstan-type ExchangeRateGetExchangeRateParamsShape = array{
 *   from: string, to: string
 * }
 */
final class ExchangeRateGetExchangeRateParams implements BaseModel
{
    /** @use SdkModel<ExchangeRateGetExchangeRateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Source currency code (e.g., usd).
     */
    #[Api]
    public string $from;

    /**
     * Target currency code (e.g., eur).
     */
    #[Api]
    public string $to;

    /**
     * `new ExchangeRateGetExchangeRateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExchangeRateGetExchangeRateParams::with(from: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExchangeRateGetExchangeRateParams)->withFrom(...)->withTo(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $from, string $to): self
    {
        $obj = new self;

        $obj->from = $from;
        $obj->to = $to;

        return $obj;
    }

    /**
     * Source currency code (e.g., usd).
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * Target currency code (e.g., eur).
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }
}
