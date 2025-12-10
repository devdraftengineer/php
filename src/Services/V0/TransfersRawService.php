<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\TransfersRawContract;
use Devdraft\V0\Transfers\TransferCreateDirectBankParams;
use Devdraft\V0\Transfers\TransferCreateDirectWalletParams;
use Devdraft\V0\Transfers\TransferCreateExternalBankTransferParams;
use Devdraft\V0\Transfers\TransferCreateExternalBankTransferParams\DestinationPaymentRail;
use Devdraft\V0\Transfers\TransferCreateExternalStablecoinTransferParams;
use Devdraft\V0\Transfers\TransferCreateStablecoinConversionParams;

final class TransfersRawService implements TransfersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a direct bank transfer
     *
     * @param array{
     *   amount: float,
     *   destinationCurrency: string,
     *   paymentRail: string,
     *   sourceCurrency: string,
     *   walletID: string,
     *   achReference?: string,
     *   sepaReference?: string,
     *   wireMessage?: string,
     * }|TransferCreateDirectBankParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createDirectBank(
        array|TransferCreateDirectBankParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TransferCreateDirectBankParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/v0/transfers/direct-bank',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Create a direct wallet transfer
     *
     * @param array{
     *   amount: float, network: string, stableCoinCurrency: string, walletID: string
     * }|TransferCreateDirectWalletParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createDirectWallet(
        array|TransferCreateDirectWalletParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TransferCreateDirectWalletParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/v0/transfers/direct-wallet',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Create an external bank transfer
     *
     * @param array{
     *   destinationCurrency: string,
     *   destinationPaymentRail: 'ach'|'ach_push'|'ach_same_day'|'wire'|'sepa'|'swift'|'spei'|DestinationPaymentRail,
     *   externalAccountID: string,
     *   sourceCurrency: string,
     *   sourceWalletID: string,
     *   achReference?: string,
     *   amount?: float,
     *   sepaReference?: string,
     *   speiReference?: string,
     *   swiftCharges?: string,
     *   swiftReference?: string,
     *   wireMessage?: string,
     * }|TransferCreateExternalBankTransferParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createExternalBankTransfer(
        array|TransferCreateExternalBankTransferParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TransferCreateExternalBankTransferParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/v0/transfers/external-bank-transfer',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Create an external stablecoin transfer
     *
     * @param array{
     *   beneficiaryID: string,
     *   destinationCurrency: string,
     *   sourceCurrency: string,
     *   sourceWalletID: string,
     *   amount?: float,
     *   blockchainMemo?: string,
     * }|TransferCreateExternalStablecoinTransferParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createExternalStablecoinTransfer(
        array|TransferCreateExternalStablecoinTransferParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TransferCreateExternalStablecoinTransferParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/v0/transfers/external-stablecoin-transfer',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Create a stablecoin conversion
     *
     * @param array{
     *   amount: float,
     *   destinationCurrency: string,
     *   sourceCurrency: string,
     *   sourceNetwork: string,
     *   walletID: string,
     * }|TransferCreateStablecoinConversionParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createStablecoinConversion(
        array|TransferCreateStablecoinConversionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TransferCreateStablecoinConversionParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/v0/transfers/stablecoin-conversion',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
