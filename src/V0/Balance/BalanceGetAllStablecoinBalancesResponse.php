<?php

declare(strict_types=1);

namespace Devdraft\V0\Balance;

use Devdraft\Core\Attributes\Required;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Contracts\BaseModel;
use Devdraft\V0\Balance\AggregatedBalance\Currency;

/**
 * @phpstan-type BalanceGetAllStablecoinBalancesResponseShape = array{
 *   eurc: AggregatedBalance, totalUsdValue: string, usdc: AggregatedBalance
 * }
 */
final class BalanceGetAllStablecoinBalancesResponse implements BaseModel
{
    /** @use SdkModel<BalanceGetAllStablecoinBalancesResponseShape> */
    use SdkModel;

    /**
     * EURC balance aggregation.
     */
    #[Required]
    public AggregatedBalance $eurc;

    /**
     * Total value in USD equivalent.
     */
    #[Required('total_usd_value')]
    public string $totalUsdValue;

    /**
     * USDC balance aggregation.
     */
    #[Required]
    public AggregatedBalance $usdc;

    /**
     * `new BalanceGetAllStablecoinBalancesResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BalanceGetAllStablecoinBalancesResponse::with(
     *   eurc: ..., totalUsdValue: ..., usdc: ...
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
     *   totalBalance: string,
     * } $eurc
     * @param AggregatedBalance|array{
     *   balances: list<list<mixed>>,
     *   currency: value-of<Currency>,
     *   totalBalance: string,
     * } $usdc
     */
    public static function with(
        AggregatedBalance|array $eurc,
        string $totalUsdValue,
        AggregatedBalance|array $usdc,
    ): self {
        $self = new self;

        $self['eurc'] = $eurc;
        $self['totalUsdValue'] = $totalUsdValue;
        $self['usdc'] = $usdc;

        return $self;
    }

    /**
     * EURC balance aggregation.
     *
     * @param AggregatedBalance|array{
     *   balances: list<list<mixed>>,
     *   currency: value-of<Currency>,
     *   totalBalance: string,
     * } $eurc
     */
    public function withEurc(AggregatedBalance|array $eurc): self
    {
        $self = clone $this;
        $self['eurc'] = $eurc;

        return $self;
    }

    /**
     * Total value in USD equivalent.
     */
    public function withTotalUsdValue(string $totalUsdValue): self
    {
        $self = clone $this;
        $self['totalUsdValue'] = $totalUsdValue;

        return $self;
    }

    /**
     * USDC balance aggregation.
     *
     * @param AggregatedBalance|array{
     *   balances: list<list<mixed>>,
     *   currency: value-of<Currency>,
     *   totalBalance: string,
     * } $usdc
     */
    public function withUsdc(AggregatedBalance|array $usdc): self
    {
        $self = clone $this;
        $self['usdc'] = $usdc;

        return $self;
    }
}
