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

interface TransfersRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|TransferCreateDirectBankParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createDirectBank(
        array|TransferCreateDirectBankParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|TransferCreateDirectWalletParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createDirectWallet(
        array|TransferCreateDirectWalletParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|TransferCreateExternalBankTransferParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createExternalBankTransfer(
        array|TransferCreateExternalBankTransferParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|TransferCreateExternalStablecoinTransferParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createExternalStablecoinTransfer(
        array|TransferCreateExternalStablecoinTransferParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|TransferCreateStablecoinConversionParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createStablecoinConversion(
        array|TransferCreateStablecoinConversionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
