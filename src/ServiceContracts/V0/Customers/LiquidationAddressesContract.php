<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0\Customers;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressCreateParams\Chain;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressCreateParams\Currency;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressCreateParams\DestinationCurrency;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressResponse;
use Devdraft\V0\PaymentIntents\BridgePaymentRail;

interface LiquidationAddressesContract
{
    /**
     * @api
     *
     * @param string $customerID Unique identifier for the customer
     * @param string $address The liquidation address on the blockchain
     * @param 'ethereum'|'solana'|'polygon'|'avalanche_c_chain'|'base'|'arbitrum'|'optimism'|'stellar'|'tron'|Chain $chain The blockchain chain for the liquidation address
     * @param 'usdc'|'eurc'|'dai'|'pyusd'|'usdt'|Currency $currency The currency for the liquidation address
     * @param string $bridgeWalletID Bridge Wallet to send funds to
     * @param string $customDeveloperFeePercent Custom developer fee percentage (Base 100 percentage: 10.2% = "10.2")
     * @param string $destinationACHReference Reference for ACH transactions
     * @param string $destinationAddress Crypto wallet address for crypto transfers
     * @param string $destinationBlockchainMemo Memo for blockchain transactions
     * @param 'usd'|'eur'|'mxn'|'usdc'|'eurc'|'dai'|'pyusd'|'usdt'|DestinationCurrency $destinationCurrency Currency for sending funds
     * @param 'ethereum'|'solana'|'polygon'|'avalanche_c_chain'|'base'|'arbitrum'|'optimism'|'stellar'|'tron'|'bridge_wallet'|'wire'|'ach'|'ach_push'|'ach_same_day'|'sepa'|'swift'|'spei'|BridgePaymentRail $destinationPaymentRail The blockchain network where the source currency resides. Determines gas fees and transaction speed.
     * @param string $destinationSepaReference Reference for SEPA transactions
     * @param string $destinationWireMessage Message for wire transfers
     * @param string $externalAccountID External bank account to send funds to
     * @param string $prefundedAccountID Developer's prefunded account id
     * @param string $returnAddress Address to return funds on failed transactions (Not supported on Stellar)
     *
     * @throws APIException
     */
    public function create(
        string $customerID,
        string $address,
        string|Chain $chain,
        string|Currency $currency,
        ?string $bridgeWalletID = null,
        ?string $customDeveloperFeePercent = null,
        ?string $destinationACHReference = null,
        ?string $destinationAddress = null,
        ?string $destinationBlockchainMemo = null,
        string|DestinationCurrency $destinationCurrency = 'usd',
        string|BridgePaymentRail|null $destinationPaymentRail = null,
        ?string $destinationSepaReference = null,
        ?string $destinationWireMessage = null,
        ?string $externalAccountID = null,
        ?string $prefundedAccountID = null,
        ?string $returnAddress = null,
        ?RequestOptions $requestOptions = null,
    ): LiquidationAddressResponse;

    /**
     * @api
     *
     * @param string $liquidationAddressID Unique identifier for the liquidation address
     * @param string $customerID Unique identifier for the customer
     *
     * @throws APIException
     */
    public function retrieve(
        string $liquidationAddressID,
        string $customerID,
        ?RequestOptions $requestOptions = null,
    ): LiquidationAddressResponse;

    /**
     * @api
     *
     * @param string $customerID Unique identifier for the customer
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
