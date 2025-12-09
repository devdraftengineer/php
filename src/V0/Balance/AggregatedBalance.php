<?php

declare(strict_types=1);

namespace Devdraft\V0\Balance;

use Devdraft\Core\Attributes\Required;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Contracts\BaseModel;
use Devdraft\Core\Conversion\ListOf;
use Devdraft\V0\Balance\AggregatedBalance\Currency;

/**
 * @phpstan-type AggregatedBalanceShape = array{
 *   balances: list<list<mixed>>,
 *   currency: value-of<Currency>,
 *   total_balance: string,
 * }
 */
final class AggregatedBalance implements BaseModel
{
    /** @use SdkModel<AggregatedBalanceShape> */
    use SdkModel;

    /**
     * Detailed breakdown of balances by wallet and chain.
     *
     * @var list<list<mixed>> $balances
     */
    #[Required(list: new ListOf('mixed'))]
    public array $balances;

    /**
     * The stablecoin currency.
     *
     * @var value-of<Currency> $currency
     */
    #[Required(enum: Currency::class)]
    public string $currency;

    /**
     * The total aggregated balance across all wallets and chains.
     */
    #[Required]
    public string $total_balance;

    /**
     * `new AggregatedBalance()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AggregatedBalance::with(balances: ..., currency: ..., total_balance: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AggregatedBalance)
     *   ->withBalances(...)
     *   ->withCurrency(...)
     *   ->withTotalBalance(...)
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
     * @param list<list<mixed>> $balances
     * @param Currency|value-of<Currency> $currency
     */
    public static function with(
        array $balances,
        Currency|string $currency,
        string $total_balance
    ): self {
        $obj = new self;

        $obj['balances'] = $balances;
        $obj['currency'] = $currency;
        $obj['total_balance'] = $total_balance;

        return $obj;
    }

    /**
     * Detailed breakdown of balances by wallet and chain.
     *
     * @param list<list<mixed>> $balances
     */
    public function withBalances(array $balances): self
    {
        $obj = clone $this;
        $obj['balances'] = $balances;

        return $obj;
    }

    /**
     * The stablecoin currency.
     *
     * @param Currency|value-of<Currency> $currency
     */
    public function withCurrency(Currency|string $currency): self
    {
        $obj = clone $this;
        $obj['currency'] = $currency;

        return $obj;
    }

    /**
     * The total aggregated balance across all wallets and chains.
     */
    public function withTotalBalance(string $totalBalance): self
    {
        $obj = clone $this;
        $obj['total_balance'] = $totalBalance;

        return $obj;
    }
}
