<?php

declare(strict_types=1);

namespace Devdraft\V0\ExchangeRate;

use Devdraft\Core\Attributes\Api;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkResponse;
use Devdraft\Core\Contracts\BaseModel;
use Devdraft\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type ExchangeRateResponseShape = array{
 *   buy_rate: string,
 *   from: string,
 *   midmarket_rate: string,
 *   sell_rate: string,
 *   to: string,
 *   timestamp?: string|null,
 * }
 */
final class ExchangeRateResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ExchangeRateResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Rate for buying target currency (what you get when converting from source to target).
     */
    #[Api]
    public string $buy_rate;

    /**
     * Source currency code (USD for USDC).
     */
    #[Api]
    public string $from;

    /**
     * Mid-market exchange rate from source to target currency.
     */
    #[Api]
    public string $midmarket_rate;

    /**
     * Rate for selling target currency (what you pay when converting from target to source).
     */
    #[Api]
    public string $sell_rate;

    /**
     * Target currency code (EUR for EURC).
     */
    #[Api]
    public string $to;

    /**
     * Timestamp when the exchange rate was last updated.
     */
    #[Api(optional: true)]
    public ?string $timestamp;

    /**
     * `new ExchangeRateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExchangeRateResponse::with(
     *   buy_rate: ..., from: ..., midmarket_rate: ..., sell_rate: ..., to: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExchangeRateResponse)
     *   ->withBuyRate(...)
     *   ->withFrom(...)
     *   ->withMidmarketRate(...)
     *   ->withSellRate(...)
     *   ->withTo(...)
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
    public static function with(
        string $buy_rate,
        string $from,
        string $midmarket_rate,
        string $sell_rate,
        string $to,
        ?string $timestamp = null,
    ): self {
        $obj = new self;

        $obj->buy_rate = $buy_rate;
        $obj->from = $from;
        $obj->midmarket_rate = $midmarket_rate;
        $obj->sell_rate = $sell_rate;
        $obj->to = $to;

        null !== $timestamp && $obj->timestamp = $timestamp;

        return $obj;
    }

    /**
     * Rate for buying target currency (what you get when converting from source to target).
     */
    public function withBuyRate(string $buyRate): self
    {
        $obj = clone $this;
        $obj->buy_rate = $buyRate;

        return $obj;
    }

    /**
     * Source currency code (USD for USDC).
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * Mid-market exchange rate from source to target currency.
     */
    public function withMidmarketRate(string $midmarketRate): self
    {
        $obj = clone $this;
        $obj->midmarket_rate = $midmarketRate;

        return $obj;
    }

    /**
     * Rate for selling target currency (what you pay when converting from target to source).
     */
    public function withSellRate(string $sellRate): self
    {
        $obj = clone $this;
        $obj->sell_rate = $sellRate;

        return $obj;
    }

    /**
     * Target currency code (EUR for EURC).
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    /**
     * Timestamp when the exchange rate was last updated.
     */
    public function withTimestamp(string $timestamp): self
    {
        $obj = clone $this;
        $obj->timestamp = $timestamp;

        return $obj;
    }
}
