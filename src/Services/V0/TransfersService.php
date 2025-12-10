<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\TransfersContract;
use Devdraft\V0\Transfers\TransferCreateExternalBankTransferParams\DestinationPaymentRail;

final class TransfersService implements TransfersContract
{
    /**
     * @api
     */
    public TransfersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TransfersRawService($client);
    }

    /**
     * @api
     *
     * Create a direct bank transfer
     *
     * @param float $amount The amount to transfer
     * @param string $destinationCurrency The destination currency
     * @param string $paymentRail The payment rail to use
     * @param string $sourceCurrency The source currency
     * @param string $walletID The ID of the bridge wallet to transfer from
     * @param string $achReference ACH transfer reference
     * @param string $sepaReference SEPA transfer reference
     * @param string $wireMessage Wire transfer message
     *
     * @throws APIException
     */
    public function createDirectBank(
        float $amount,
        string $destinationCurrency,
        string $paymentRail,
        string $sourceCurrency,
        string $walletID,
        ?string $achReference = null,
        ?string $sepaReference = null,
        ?string $wireMessage = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'amount' => $amount,
            'destinationCurrency' => $destinationCurrency,
            'paymentRail' => $paymentRail,
            'sourceCurrency' => $sourceCurrency,
            'walletID' => $walletID,
            'achReference' => $achReference,
            'sepaReference' => $sepaReference,
            'wireMessage' => $wireMessage,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createDirectBank(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a direct wallet transfer
     *
     * @param float $amount The amount to transfer
     * @param string $network The network to use for the transfer
     * @param string $stableCoinCurrency The stablecoin currency to use
     * @param string $walletID The ID of the bridge wallet to transfer from
     *
     * @throws APIException
     */
    public function createDirectWallet(
        float $amount,
        string $network,
        string $stableCoinCurrency,
        string $walletID,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'amount' => $amount,
            'network' => $network,
            'stableCoinCurrency' => $stableCoinCurrency,
            'walletID' => $walletID,
        ];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createDirectWallet(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create an external bank transfer
     *
     * @param string $destinationCurrency The destination currency
     * @param 'ach'|'ach_push'|'ach_same_day'|'wire'|'sepa'|'swift'|'spei'|DestinationPaymentRail $destinationPaymentRail The destination payment rail (fiat payment method)
     * @param string $externalAccountID The external account ID for the bank transfer
     * @param string $sourceCurrency The source currency
     * @param string $sourceWalletID The ID of the source bridge wallet
     * @param string $achReference ACH reference message (1-10 characters, only for ACH transfers)
     * @param float $amount The amount to transfer
     * @param string $sepaReference SEPA reference message (6-140 characters, only for SEPA transfers)
     * @param string $speiReference SPEI reference message (1-40 characters, only for SPEI transfers)
     * @param string $swiftCharges SWIFT charges bearer (only for SWIFT transfers)
     * @param string $swiftReference SWIFT reference message (1-190 characters, only for SWIFT transfers)
     * @param string $wireMessage Wire transfer message (1-256 characters, only for wire transfers)
     *
     * @throws APIException
     */
    public function createExternalBankTransfer(
        string $destinationCurrency,
        string|DestinationPaymentRail $destinationPaymentRail,
        string $externalAccountID,
        string $sourceCurrency,
        string $sourceWalletID,
        ?string $achReference = null,
        ?float $amount = null,
        ?string $sepaReference = null,
        ?string $speiReference = null,
        ?string $swiftCharges = null,
        ?string $swiftReference = null,
        ?string $wireMessage = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'destinationCurrency' => $destinationCurrency,
            'destinationPaymentRail' => $destinationPaymentRail,
            'externalAccountID' => $externalAccountID,
            'sourceCurrency' => $sourceCurrency,
            'sourceWalletID' => $sourceWalletID,
            'achReference' => $achReference,
            'amount' => $amount,
            'sepaReference' => $sepaReference,
            'speiReference' => $speiReference,
            'swiftCharges' => $swiftCharges,
            'swiftReference' => $swiftReference,
            'wireMessage' => $wireMessage,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createExternalBankTransfer(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create an external stablecoin transfer
     *
     * @param string $beneficiaryID Beneficiary ID for the stablecoin transfer
     * @param string $destinationCurrency The destination currency
     * @param string $sourceCurrency The source currency
     * @param string $sourceWalletID The ID of the source bridge wallet
     * @param float $amount The amount to transfer
     * @param string $blockchainMemo Blockchain memo for the transfer
     *
     * @throws APIException
     */
    public function createExternalStablecoinTransfer(
        string $beneficiaryID,
        string $destinationCurrency,
        string $sourceCurrency,
        string $sourceWalletID,
        ?float $amount = null,
        ?string $blockchainMemo = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'beneficiaryID' => $beneficiaryID,
            'destinationCurrency' => $destinationCurrency,
            'sourceCurrency' => $sourceCurrency,
            'sourceWalletID' => $sourceWalletID,
            'amount' => $amount,
            'blockchainMemo' => $blockchainMemo,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createExternalStablecoinTransfer(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a stablecoin conversion
     *
     * @param float $amount The amount to convert
     * @param string $destinationCurrency The destination currency
     * @param string $sourceCurrency The source currency
     * @param string $sourceNetwork The source network
     * @param string $walletID The ID of the bridge wallet to use
     *
     * @throws APIException
     */
    public function createStablecoinConversion(
        float $amount,
        string $destinationCurrency,
        string $sourceCurrency,
        string $sourceNetwork,
        string $walletID,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'amount' => $amount,
            'destinationCurrency' => $destinationCurrency,
            'sourceCurrency' => $sourceCurrency,
            'sourceNetwork' => $sourceNetwork,
            'walletID' => $walletID,
        ];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createStablecoinConversion(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
