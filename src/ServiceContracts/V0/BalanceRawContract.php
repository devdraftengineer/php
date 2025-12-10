<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Balance\AggregatedBalance;
use Devdraft\V0\Balance\BalanceGetAllStablecoinBalancesResponse;

interface BalanceRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<BalanceGetAllStablecoinBalancesResponse>
     *
     * @throws APIException
     */
    public function getAllStablecoinBalances(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<AggregatedBalance>
     *
     * @throws APIException
     */
    public function getEurc(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<AggregatedBalance>
     *
     * @throws APIException
     */
    public function getUsdc(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
