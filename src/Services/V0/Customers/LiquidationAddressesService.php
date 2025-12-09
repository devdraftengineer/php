<?php

declare(strict_types=1);

namespace Devdraft\Services\V0\Customers;

use Devdraft\Client;
use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Conversion\ListOf;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\Customers\LiquidationAddressesContract;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressCreateParams;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressCreateParams\Chain;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressCreateParams\Currency;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressCreateParams\DestinationCurrency;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressResponse;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressRetrieveParams;
use Devdraft\V0\PaymentIntents\BridgePaymentRail;

final class LiquidationAddressesService implements LiquidationAddressesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
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
     * @throws APIException
     */
    public function create(
        string $customerID,
        array|LiquidationAddressCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): LiquidationAddressResponse {
        [$parsed, $options] = LiquidationAddressCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<LiquidationAddressResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['api/v0/customers/%1$s/liquidation_addresses', $customerID],
            body: (object) $parsed,
            options: $options,
            convert: LiquidationAddressResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific liquidation address by its ID for a given customer.
     *
     * @param array{customerID: string}|LiquidationAddressRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $liquidationAddressID,
        array|LiquidationAddressRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): LiquidationAddressResponse {
        [$parsed, $options] = LiquidationAddressRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $customerID = $parsed['customerID'];
        unset($parsed['customerID']);

        /** @var BaseResponse<LiquidationAddressResponse> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'api/v0/customers/%1$s/liquidation_addresses/%2$s',
                $customerID,
                $liquidationAddressID,
            ],
            options: $options,
            convert: LiquidationAddressResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve all liquidation addresses associated with a specific customer.
     *
     * @return list<LiquidationAddressResponse>
     *
     * @throws APIException
     */
    public function list(
        string $customerID,
        ?RequestOptions $requestOptions = null
    ): array {
        /** @var BaseResponse<list<LiquidationAddressResponse>> */
        $response = $this->client->request(
            method: 'get',
            path: ['api/v0/customers/%1$s/liquidation_addresses', $customerID],
            options: $requestOptions,
            convert: new ListOf(LiquidationAddressResponse::class),
        );

        return $response->parse();
    }
}
