<?php

declare(strict_types=1);

namespace Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressCreateParams;

/**
 * The blockchain chain for the liquidation address.
 */
enum Chain: string
{
    case ETHEREUM = 'ethereum';

    case SOLANA = 'solana';

    case POLYGON = 'polygon';

    case AVALANCHE_C_CHAIN = 'avalanche_c_chain';

    case BASE = 'base';

    case ARBITRUM = 'arbitrum';

    case OPTIMISM = 'optimism';

    case STELLAR = 'stellar';

    case TRON = 'tron';
}
