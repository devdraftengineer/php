<?php

namespace Tests\Services\V0;

use Devdraft\Client;
use Devdraft\V0\PaymentIntents\BridgePaymentRail;
use Devdraft\V0\PaymentIntents\StableCoinCurrency;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class PaymentIntentsTest extends TestCase
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
    public function testCreateBank(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->paymentIntents->createBank([
            'destinationCurrency' => StableCoinCurrency::USDC,
            'destinationNetwork' => BridgePaymentRail::ETHEREUM,
            'sourceCurrency' => 'usd',
            'sourcePaymentRail' => BridgePaymentRail::ACH_PUSH,
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateBankWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->paymentIntents->createBank([
            'destinationCurrency' => StableCoinCurrency::USDC,
            'destinationNetwork' => BridgePaymentRail::ETHEREUM,
            'sourceCurrency' => 'usd',
            'sourcePaymentRail' => BridgePaymentRail::ACH_PUSH,
            'ach_reference' => 'INV12345',
            'amount' => '1000.00',
            'customer_address' => '123 Main St, New York, NY 10001',
            'customer_country' => 'United States',
            'customer_countryISO' => 'US',
            'customer_email' => 'john.doe@example.com',
            'customer_first_name' => 'John',
            'customer_last_name' => 'Doe',
            'customer_province' => 'New York',
            'customer_provinceISO' => 'NY',
            'destinationAddress' => '0x742d35Cc6634C0532925a3b8D4C9db96c4b4d8e1',
            'phoneNumber' => '+1-555-123-4567',
            'sepa_reference' => 'REF-123456789',
            'wire_message' => 'Payment for invoice #12345',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateStable(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->paymentIntents->createStable([
            'destinationNetwork' => BridgePaymentRail::POLYGON,
            'sourceCurrency' => StableCoinCurrency::USDC,
            'sourceNetwork' => BridgePaymentRail::ETHEREUM,
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateStableWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->paymentIntents->createStable([
            'destinationNetwork' => BridgePaymentRail::POLYGON,
            'sourceCurrency' => StableCoinCurrency::USDC,
            'sourceNetwork' => BridgePaymentRail::ETHEREUM,
            'amount' => '100.00',
            'customer_address' => '123 Main St, New York, NY 10001',
            'customer_country' => 'United States',
            'customer_countryISO' => 'US',
            'customer_email' => 'john.doe@example.com',
            'customer_first_name' => 'John',
            'customer_last_name' => 'Doe',
            'customer_province' => 'New York',
            'customer_provinceISO' => 'NY',
            'destinationAddress' => '0x742d35Cc6634C0532925a3b8D4C9db96c4b4d8e1',
            'destinationCurrency' => StableCoinCurrency::EURC,
            'phoneNumber' => '+1-555-123-4567',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
