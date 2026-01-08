<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Balance\AggregatedBalance;
use Devdraft\V0\Balance\BalanceGetAllStablecoinBalancesResponse;

/**
 * @phpstan-import-type RequestOpts from \Devdraft\RequestOptions
 */
interface BalanceRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BalanceGetAllStablecoinBalancesResponse>
     *
     * @throws APIException
     */
    public function getAllStablecoinBalances(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AggregatedBalance>
     *
     * @throws APIException
     */
    public function getEurc(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AggregatedBalance>
     *
     * @throws APIException
     */
    public function getUsdc(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
