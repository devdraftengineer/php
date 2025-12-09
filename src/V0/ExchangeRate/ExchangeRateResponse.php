<?php

declare(strict_types=1);

namespace Devdraft\V0\ExchangeRate;

use Devdraft\Core\Attributes\Optional;
use Devdraft\Core\Attributes\Required;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExchangeRateResponseShape = array{
 *   buyRate: string,
 *   from: string,
 *   midmarketRate: string,
 *   sellRate: string,
 *   to: string,
 *   timestamp?: string|null,
 * }
 */
final class ExchangeRateResponse implements BaseModel
{
    /** @use SdkModel<ExchangeRateResponseShape> */
    use SdkModel;

    /**
     * Rate for buying target currency (what you get when converting from source to target).
     */
    #[Required('buy_rate')]
    public string $buyRate;

    /**
     * Source currency code (USD for USDC).
     */
    #[Required]
    public string $from;

    /**
     * Mid-market exchange rate from source to target currency.
     */
    #[Required('midmarket_rate')]
    public string $midmarketRate;

    /**
     * Rate for selling target currency (what you pay when converting from target to source).
     */
    #[Required('sell_rate')]
    public string $sellRate;

    /**
     * Target currency code (EUR for EURC).
     */
    #[Required]
    public string $to;

    /**
     * Timestamp when the exchange rate was last updated.
     */
    #[Optional]
    public ?string $timestamp;

    /**
     * `new ExchangeRateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExchangeRateResponse::with(
     *   buyRate: ..., from: ..., midmarketRate: ..., sellRate: ..., to: ...
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
        string $buyRate,
        string $from,
        string $midmarketRate,
        string $sellRate,
        string $to,
        ?string $timestamp = null,
    ): self {
        $obj = new self;

        $obj['buyRate'] = $buyRate;
        $obj['from'] = $from;
        $obj['midmarketRate'] = $midmarketRate;
        $obj['sellRate'] = $sellRate;
        $obj['to'] = $to;

        null !== $timestamp && $obj['timestamp'] = $timestamp;

        return $obj;
    }

    /**
     * Rate for buying target currency (what you get when converting from source to target).
     */
    public function withBuyRate(string $buyRate): self
    {
        $obj = clone $this;
        $obj['buyRate'] = $buyRate;

        return $obj;
    }

    /**
     * Source currency code (USD for USDC).
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }

    /**
     * Mid-market exchange rate from source to target currency.
     */
    public function withMidmarketRate(string $midmarketRate): self
    {
        $obj = clone $this;
        $obj['midmarketRate'] = $midmarketRate;

        return $obj;
    }

    /**
     * Rate for selling target currency (what you pay when converting from target to source).
     */
    public function withSellRate(string $sellRate): self
    {
        $obj = clone $this;
        $obj['sellRate'] = $sellRate;

        return $obj;
    }

    /**
     * Target currency code (EUR for EURC).
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }

    /**
     * Timestamp when the exchange rate was last updated.
     */
    public function withTimestamp(string $timestamp): self
    {
        $obj = clone $this;
        $obj['timestamp'] = $timestamp;

        return $obj;
    }
}
