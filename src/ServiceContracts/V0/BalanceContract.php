<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Balance\AggregatedBalance;
use Devdraft\V0\Balance\BalanceGetAllStablecoinBalancesResponse;

interface BalanceContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function getAllStablecoinBalances(
        ?RequestOptions $requestOptions = null
    ): BalanceGetAllStablecoinBalancesResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getEurc(
        ?RequestOptions $requestOptions = null
    ): AggregatedBalance;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getUsdc(
        ?RequestOptions $requestOptions = null
    ): AggregatedBalance;
}
