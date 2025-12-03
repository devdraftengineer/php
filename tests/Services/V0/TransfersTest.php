<?php

namespace Tests\Services\V0;

use Devdraft\Client;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class TransfersTest extends TestCase
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
    public function testCreateDirectBank(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->transfers->createDirectBank([
            'amount' => 0,
            'destinationCurrency' => 'destinationCurrency',
            'paymentRail' => 'paymentRail',
            'sourceCurrency' => 'sourceCurrency',
            'walletId' => 'walletId',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateDirectBankWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->transfers->createDirectBank([
            'amount' => 0,
            'destinationCurrency' => 'destinationCurrency',
            'paymentRail' => 'paymentRail',
            'sourceCurrency' => 'sourceCurrency',
            'walletId' => 'walletId',
            'ach_reference' => 'ach_reference',
            'sepa_reference' => 'sepa_reference',
            'wire_message' => 'wire_message',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateDirectWallet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->transfers->createDirectWallet([
            'amount' => 0,
            'network' => 'network',
            'stableCoinCurrency' => 'stableCoinCurrency',
            'walletId' => 'walletId',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateDirectWalletWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->transfers->createDirectWallet([
            'amount' => 0,
            'network' => 'network',
            'stableCoinCurrency' => 'stableCoinCurrency',
            'walletId' => 'walletId',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateExternalBankTransfer(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->transfers->createExternalBankTransfer([
            'destinationCurrency' => 'destinationCurrency',
            'destinationPaymentRail' => 'ach',
            'external_account_id' => 'external_account_id',
            'sourceCurrency' => 'sourceCurrency',
            'sourceWalletId' => 'sourceWalletId',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateExternalBankTransferWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->transfers->createExternalBankTransfer([
            'destinationCurrency' => 'destinationCurrency',
            'destinationPaymentRail' => 'ach',
            'external_account_id' => 'external_account_id',
            'sourceCurrency' => 'sourceCurrency',
            'sourceWalletId' => 'sourceWalletId',
            'ach_reference' => 'x',
            'amount' => 0,
            'sepa_reference' => 'xxxxxx',
            'spei_reference' => 'x',
            'swift_charges' => 'swift_charges',
            'swift_reference' => 'x',
            'wire_message' => 'x',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateExternalStablecoinTransfer(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->transfers->createExternalStablecoinTransfer([
            'beneficiaryId' => 'beneficiary_12345',
            'destinationCurrency' => 'destinationCurrency',
            'sourceCurrency' => 'sourceCurrency',
            'sourceWalletId' => 'sourceWalletId',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateExternalStablecoinTransferWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->transfers->createExternalStablecoinTransfer([
            'beneficiaryId' => 'beneficiary_12345',
            'destinationCurrency' => 'destinationCurrency',
            'sourceCurrency' => 'sourceCurrency',
            'sourceWalletId' => 'sourceWalletId',
            'amount' => 0,
            'blockchain_memo' => 'blockchain_memo',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateStablecoinConversion(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->transfers->createStablecoinConversion([
            'amount' => 0,
            'destinationCurrency' => 'destinationCurrency',
            'sourceCurrency' => 'sourceCurrency',
            'sourceNetwork' => 'sourceNetwork',
            'walletId' => 'walletId',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateStablecoinConversionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->transfers->createStablecoinConversion([
            'amount' => 0,
            'destinationCurrency' => 'destinationCurrency',
            'sourceCurrency' => 'sourceCurrency',
            'sourceNetwork' => 'sourceNetwork',
            'walletId' => 'walletId',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
