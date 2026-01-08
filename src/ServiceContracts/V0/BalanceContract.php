<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Balance\AggregatedBalance;
use Devdraft\V0\Balance\BalanceGetAllStablecoinBalancesResponse;

/**
 * @phpstan-import-type RequestOpts from \Devdraft\RequestOptions
 */
interface BalanceContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getAllStablecoinBalances(
        RequestOptions|array|null $requestOptions = null
    ): BalanceGetAllStablecoinBalancesResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEurc(
        RequestOptions|array|null $requestOptions = null
    ): AggregatedBalance;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getUsdc(
        RequestOptions|array|null $requestOptions = null
    ): AggregatedBalance;
}
