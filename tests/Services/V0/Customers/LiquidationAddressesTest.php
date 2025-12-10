<?php

namespace Tests\Services\V0\Customers;

use Devdraft\Client;
use Devdraft\V0\Customers\LiquidationAddresses\LiquidationAddressResponse;
use Devdraft\V0\PaymentIntents\BridgePaymentRail;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class LiquidationAddressesTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            apiKey: 'My API Key',
            secret: 'My Secret',
            idempotencyKey: 'My Idempotency Key',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->customers->liquidationAddresses->create(
            'cust_123',
            address: '0x4d0280da2f2fDA5103914bCc5aad114743152A9c',
            chain: 'ethereum',
            currency: 'usdc',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(LiquidationAddressResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->customers->liquidationAddresses->create(
            'cust_123',
            address: '0x4d0280da2f2fDA5103914bCc5aad114743152A9c',
            chain: 'ethereum',
            currency: 'usdc',
            bridgeWalletID: 'bw_123',
            customDeveloperFeePercent: '2.5',
            destinationACHReference: 'ACH123',
            destinationAddress: '0x1234567890abcdef1234567890abcdef12345678',
            destinationBlockchainMemo: 'liquidation-memo-123',
            destinationCurrency: 'eur',
            destinationPaymentRail: BridgePaymentRail::SEPA,
            destinationSepaReference: 'SEPA-REF-123456',
            destinationWireMessage: 'Liquidation payment for customer',
            externalAccountID: 'ext_123',
            prefundedAccountID: 'pf_acc_123',
            returnAddress: '0xabcdefabcdefabcdefabcdefabcdefabcdef',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(LiquidationAddressResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->customers->liquidationAddresses->retrieve(
            'la_generated_id_123',
            customerID: 'cust_123'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(LiquidationAddressResponse::class, $result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->customers->liquidationAddresses->retrieve(
            'la_generated_id_123',
            customerID: 'cust_123'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(LiquidationAddressResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->customers->liquidationAddresses->list(
            'cust_123'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }
}
