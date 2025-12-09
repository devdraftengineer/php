<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\TransfersContract;
use Devdraft\V0\Transfers\TransferCreateDirectBankParams;
use Devdraft\V0\Transfers\TransferCreateDirectWalletParams;
use Devdraft\V0\Transfers\TransferCreateExternalBankTransferParams;
use Devdraft\V0\Transfers\TransferCreateExternalBankTransferParams\DestinationPaymentRail;
use Devdraft\V0\Transfers\TransferCreateExternalStablecoinTransferParams;
use Devdraft\V0\Transfers\TransferCreateStablecoinConversionParams;

final class TransfersService implements TransfersContract
{
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
     *   walletId: string,
     *   ach_reference?: string,
     *   sepa_reference?: string,
     *   wire_message?: string,
     * }|TransferCreateDirectBankParams $params
     *
     * @throws APIException
     */
    public function createDirectBank(
        array|TransferCreateDirectBankParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = TransferCreateDirectBankParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: 'api/v0/transfers/direct-bank',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a direct wallet transfer
     *
     * @param array{
     *   amount: float, network: string, stableCoinCurrency: string, walletId: string
     * }|TransferCreateDirectWalletParams $params
     *
     * @throws APIException
     */
    public function createDirectWallet(
        array|TransferCreateDirectWalletParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = TransferCreateDirectWalletParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: 'api/v0/transfers/direct-wallet',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Create an external bank transfer
     *
     * @param array{
     *   destinationCurrency: string,
     *   destinationPaymentRail: 'ach'|'ach_push'|'ach_same_day'|'wire'|'sepa'|'swift'|'spei'|DestinationPaymentRail,
     *   external_account_id: string,
     *   sourceCurrency: string,
     *   sourceWalletId: string,
     *   ach_reference?: string,
     *   amount?: float,
     *   sepa_reference?: string,
     *   spei_reference?: string,
     *   swift_charges?: string,
     *   swift_reference?: string,
     *   wire_message?: string,
     * }|TransferCreateExternalBankTransferParams $params
     *
     * @throws APIException
     */
    public function createExternalBankTransfer(
        array|TransferCreateExternalBankTransferParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = TransferCreateExternalBankTransferParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: 'api/v0/transfers/external-bank-transfer',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Create an external stablecoin transfer
     *
     * @param array{
     *   beneficiaryId: string,
     *   destinationCurrency: string,
     *   sourceCurrency: string,
     *   sourceWalletId: string,
     *   amount?: float,
     *   blockchain_memo?: string,
     * }|TransferCreateExternalStablecoinTransferParams $params
     *
     * @throws APIException
     */
    public function createExternalStablecoinTransfer(
        array|TransferCreateExternalStablecoinTransferParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = TransferCreateExternalStablecoinTransferParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: 'api/v0/transfers/external-stablecoin-transfer',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );

        return $response->parse();
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
     *   walletId: string,
     * }|TransferCreateStablecoinConversionParams $params
     *
     * @throws APIException
     */
    public function createStablecoinConversion(
        array|TransferCreateStablecoinConversionParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = TransferCreateStablecoinConversionParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: 'api/v0/transfers/stablecoin-conversion',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );

        return $response->parse();
    }
}
