<?php

declare(strict_types=1);

namespace Devdraft\Services\V0\Customers;

use Devdraft\Client;
use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Conversion\ListOf;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\Customers\LiquidationAddressesRawContract;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressCreateParams;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressCreateParams\Chain;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressCreateParams\Currency;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressCreateParams\DestinationCurrency;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressResponse;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressRetrieveParams;
use Devdraft\V0\PaymentIntents\BridgePaymentRail;

final class LiquidationAddressesRawService implements LiquidationAddressesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param string $customerID Unique identifier for the customer
     * @param array{
     *   address: string,
     *   chain: value-of<Chain>,
     *   currency: 'usdc'|'eurc'|'dai'|'pyusd'|'usdt'|Currency,
     *   bridgeWalletID?: string,
     *   customDeveloperFeePercent?: string,
     *   destinationACHReference?: string,
     *   destinationAddress?: string,
     *   destinationBlockchainMemo?: string,
     *   destinationCurrency?: 'usd'|'eur'|'mxn'|'usdc'|'eurc'|'dai'|'pyusd'|'usdt'|DestinationCurrency,
     *   destinationPaymentRail?: value-of<BridgePaymentRail>,
     *   destinationSepaReference?: string,
     *   destinationWireMessage?: string,
     *   externalAccountID?: string,
     *   prefundedAccountID?: string,
     *   returnAddress?: string,
     * }|LiquidationAddressCreateParams $params
     *
     * @return BaseResponse<LiquidationAddressResponse>
     *
     * @throws APIException
     */
    public function create(
        string $customerID,
        array|LiquidationAddressCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LiquidationAddressCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/v0/customers/%1$s/liquidation_addresses', $customerID],
            body: (object) $parsed,
            options: $options,
            convert: LiquidationAddressResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a specific liquidation address by its ID for a given customer.
     *
     * @param string $liquidationAddressID Unique identifier for the liquidation address
     * @param array{customerID: string}|LiquidationAddressRetrieveParams $params
     *
     * @return BaseResponse<LiquidationAddressResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $liquidationAddressID,
        array|LiquidationAddressRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LiquidationAddressRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $customerID = $parsed['customerID'];
        unset($parsed['customerID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'api/v0/customers/%1$s/liquidation_addresses/%2$s',
                $customerID,
                $liquidationAddressID,
            ],
            options: $options,
            convert: LiquidationAddressResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve all liquidation addresses associated with a specific customer.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/v0/customers/%1$s/liquidation_addresses', $customerID],
            options: $requestOptions,
            convert: new ListOf(LiquidationAddressResponse::class),
        );
    }
}
