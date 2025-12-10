<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0\Customers;

use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressCreateParams;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressResponse;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressRetrieveParams;

interface LiquidationAddressesRawContract
{
    /**
     * @api
     *
     * @param string $customerID Unique identifier for the customer
     * @param array<mixed>|LiquidationAddressCreateParams $params
     *
     * @return BaseResponse<LiquidationAddressResponse>
     *
     * @throws APIException
     */
    public function create(
        string $customerID,
        array|LiquidationAddressCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $liquidationAddressID Unique identifier for the liquidation address
     * @param array<mixed>|LiquidationAddressRetrieveParams $params
     *
     * @return BaseResponse<LiquidationAddressResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $liquidationAddressID,
        array|LiquidationAddressRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $customerID Unique identifier for the customer
     *
     * @return BaseResponse<list<LiquidationAddressResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $customerID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
