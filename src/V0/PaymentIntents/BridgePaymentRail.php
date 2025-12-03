<?php

declare(strict_types=1);

namespace Devdraft\V0\PaymentIntents;

/**
 * The blockchain network where the source currency resides. Determines gas fees and transaction speed.
 */
enum BridgePaymentRail: string
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

    case BRIDGE_WALLET = 'bridge_wallet';

    case WIRE = 'wire';

    case ACH = 'ach';

    case ACH_PUSH = 'ach_push';

    case ACH_SAME_DAY = 'ach_same_day';

    case SEPA = 'sepa';

    case SWIFT = 'swift';

    case SPEI = 'spei';
}
