<?php

declare(strict_types=1);

namespace Devdraft\V0\Balance;

use Devdraft\Core\Attributes\Api;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Contracts\BaseModel;
use Devdraft\V0\Balance\AggregatedBalance\Currency;

/**
 * @phpstan-type BalanceGetAllStablecoinBalancesResponseShape = array{
 *   eurc: AggregatedBalance, total_usd_value: string, usdc: AggregatedBalance
 * }
 */
final class BalanceGetAllStablecoinBalancesResponse implements BaseModel
{
    /** @use SdkModel<BalanceGetAllStablecoinBalancesResponseShape> */
    use SdkModel;

    /**
     * EURC balance aggregation.
     */
    #[Api]
    public AggregatedBalance $eurc;

    /**
     * Total value in USD equivalent.
     */
    #[Api]
    public string $total_usd_value;

    /**
     * USDC balance aggregation.
     */
    #[Api]
    public AggregatedBalance $usdc;

    /**
     * `new BalanceGetAllStablecoinBalancesResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BalanceGetAllStablecoinBalancesResponse::with(
     *   eurc: ..., total_usd_value: ..., usdc: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BalanceGetAllStablecoinBalancesResponse)
     *   ->withEurc(...)
     *   ->withTotalUsdValue(...)
     *   ->withUsdc(...)
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
     *
     * @param AggregatedBalance|array{
     *   balances: list<list<mixed>>,
     *   currency: value-of<Currency>,
     *   total_balance: string,
     * } $eurc
     * @param AggregatedBalance|array{
     *   balances: list<list<mixed>>,
     *   currency: value-of<Currency>,
     *   total_balance: string,
     * } $usdc
     */
    public static function with(
        AggregatedBalance|array $eurc,
        string $total_usd_value,
        AggregatedBalance|array $usdc,
    ): self {
        $obj = new self;

        $obj['eurc'] = $eurc;
        $obj['total_usd_value'] = $total_usd_value;
        $obj['usdc'] = $usdc;

        return $obj;
    }

    /**
     * EURC balance aggregation.
     *
     * @param AggregatedBalance|array{
     *   balances: list<list<mixed>>,
     *   currency: value-of<Currency>,
     *   total_balance: string,
     * } $eurc
     */
    public function withEurc(AggregatedBalance|array $eurc): self
    {
        $obj = clone $this;
        $obj['eurc'] = $eurc;

        return $obj;
    }

    /**
     * Total value in USD equivalent.
     */
    public function withTotalUsdValue(string $totalUsdValue): self
    {
        $obj = clone $this;
        $obj['total_usd_value'] = $totalUsdValue;

        return $obj;
    }

    /**
     * USDC balance aggregation.
     *
     * @param AggregatedBalance|array{
     *   balances: list<list<mixed>>,
     *   currency: value-of<Currency>,
     *   total_balance: string,
     * } $usdc
     */
    public function withUsdc(AggregatedBalance|array $usdc): self
    {
        $obj = clone $this;
        $obj['usdc'] = $usdc;

        return $obj;
    }
}
