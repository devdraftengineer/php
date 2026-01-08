<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Transfers\TransferCreateDirectBankParams;
use Devdraft\V0\Transfers\TransferCreateDirectWalletParams;
use Devdraft\V0\Transfers\TransferCreateExternalBankTransferParams;
use Devdraft\V0\Transfers\TransferCreateExternalStablecoinTransferParams;
use Devdraft\V0\Transfers\TransferCreateStablecoinConversionParams;

/**
 * @phpstan-import-type RequestOpts from \Devdraft\RequestOptions
 */
interface TransfersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TransferCreateDirectBankParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createDirectBank(
        array|TransferCreateDirectBankParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TransferCreateDirectWalletParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createDirectWallet(
        array|TransferCreateDirectWalletParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TransferCreateExternalBankTransferParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createExternalBankTransfer(
        array|TransferCreateExternalBankTransferParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TransferCreateExternalStablecoinTransferParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createExternalStablecoinTransfer(
        array|TransferCreateExternalStablecoinTransferParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TransferCreateStablecoinConversionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createStablecoinConversion(
        array|TransferCreateStablecoinConversionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
