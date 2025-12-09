<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\BalanceContract;
use Devdraft\V0\Balance\AggregatedBalance;
use Devdraft\V0\Balance\BalanceGetAllStablecoinBalancesResponse;

final class BalanceService implements BalanceContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieves both USDC and EURC balances across all wallets for the specified app.
     *
     * This comprehensive endpoint provides:
     * - Complete USDC balance aggregation with detailed breakdown
     * - Complete EURC balance aggregation with detailed breakdown
     * - Total USD equivalent value across both currencies
     * - Individual wallet and chain-specific balance details
     *
     * ## Use Cases
     * - Complete financial dashboard overview
     * - Multi-currency balance reporting
     * - Comprehensive wallet management
     * - Cross-currency analytics and reporting
     *
     * ## Response Format
     * The response includes separate aggregations for each currency plus a combined
     * USD value estimate, providing complete visibility into stablecoin holdings.
     *
     * @throws APIException
     */
    public function getAllStablecoinBalances(
        ?RequestOptions $requestOptions = null
    ): BalanceGetAllStablecoinBalancesResponse {
        /** @var BaseResponse<BalanceGetAllStablecoinBalancesResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'api/v0/balance',
            options: $requestOptions,
            convert: BalanceGetAllStablecoinBalancesResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves the total EURC balance across all wallets for the specified app.
     *
     * This endpoint aggregates EURC balances from all associated wallets and provides:
     * - Total EURC balance across all chains and wallets
     * - Detailed breakdown by individual wallet and blockchain network
     * - Contract addresses and wallet identifiers for each balance
     *
     * ## Use Cases
     * - Dashboard balance display
     * - European market operations
     * - Euro-denominated financial reporting
     * - Cross-currency balance tracking
     *
     * ## Response Format
     * The response includes both the aggregated total and detailed breakdown, enabling
     * comprehensive euro stablecoin balance management.
     *
     * @throws APIException
     */
    public function getEurc(
        ?RequestOptions $requestOptions = null
    ): AggregatedBalance {
        /** @var BaseResponse<AggregatedBalance> */
        $response = $this->client->request(
            method: 'get',
            path: 'api/v0/balance/eurc',
            options: $requestOptions,
            convert: AggregatedBalance::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves the total USDC balance across all wallets for the specified app.
     *
     * This endpoint aggregates USDC balances from all associated wallets and provides:
     * - Total USDC balance across all chains and wallets
     * - Detailed breakdown by individual wallet and blockchain network
     * - Contract addresses and wallet identifiers for each balance
     *
     * ## Use Cases
     * - Dashboard balance display
     * - Financial reporting and reconciliation
     * - Real-time balance monitoring
     * - Multi-chain balance aggregation
     *
     * ## Response Format
     * The response includes both the aggregated total and detailed breakdown, allowing for
     * comprehensive balance tracking and wallet-specific analysis.
     *
     * @throws APIException
     */
    public function getUsdc(
        ?RequestOptions $requestOptions = null
    ): AggregatedBalance {
        /** @var BaseResponse<AggregatedBalance> */
        $response = $this->client->request(
            method: 'get',
            path: 'api/v0/balance/usdc',
            options: $requestOptions,
            convert: AggregatedBalance::class,
        );

        return $response->parse();
    }
}
