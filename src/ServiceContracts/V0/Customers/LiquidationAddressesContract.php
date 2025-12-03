<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0\Customers;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressCreateParams;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressResponse;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressRetrieveParams;

interface LiquidationAddressesContract
{
    /**
     * @api
     *
     * @param array<mixed>|LiquidationAddressCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $customerID,
        array|LiquidationAddressCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): LiquidationAddressResponse;

    /**
     * @api
     *
     * @param array<mixed>|LiquidationAddressRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $liquidationAddressID,
        array|LiquidationAddressRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): LiquidationAddressResponse;

    /**
     * @api
     *
     * @return list<LiquidationAddressResponse>
     *
     * @throws APIException
     */
    public function list(
        string $customerID,
        ?RequestOptions $requestOptions = null
    ): array;
}
