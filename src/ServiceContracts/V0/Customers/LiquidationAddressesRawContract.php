<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0\Customers;

use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressCreateParams;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressResponse;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressRetrieveParams;

/**
 * @phpstan-import-type RequestOpts from \Devdraft\RequestOptions
 */
interface LiquidationAddressesRawContract
{
    /**
     * @api
     *
     * @param string $customerID Unique identifier for the customer
     * @param array<string,mixed>|LiquidationAddressCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LiquidationAddressResponse>
     *
     * @throws APIException
     */
    public function create(
        string $customerID,
        array|LiquidationAddressCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $liquidationAddressID Unique identifier for the liquidation address
     * @param array<string,mixed>|LiquidationAddressRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LiquidationAddressResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $liquidationAddressID,
        array|LiquidationAddressRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $customerID Unique identifier for the customer
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<LiquidationAddressResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $customerID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
