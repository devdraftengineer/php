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
final class PaymentLinksTest extends TestCase
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

        $result = $this->client->v0->paymentLinks->create(
            allowMobilePayment: true,
            allowQuantityAdjustment: true,
            collectAddress: true,
            collectTax: true,
            currency: 'usdc',
            linkType: 'PRODUCT',
            title: 'Premium Subscription',
            url: 'https://checkout.example.com/pay/123',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->paymentLinks->create(
            allowMobilePayment: true,
            allowQuantityAdjustment: true,
            collectAddress: true,
            collectTax: true,
            currency: 'usdc',
            linkType: 'PRODUCT',
            title: 'Premium Subscription',
            url: 'https://checkout.example.com/pay/123',
            amount: 29.99,
            coverImage: 'https://example.com/images/premium-subscription.jpg',
            customerID: '123e4567-e89b-12d3-a456-426614174002',
            customFields: ['customField1' => 'value1', 'customField2' => 'value2'],
            description: 'Get access to all premium features with our monthly subscription plan.',
            expirationDate: new \DateTimeImmutable('2024-12-31T23:59:59Z'),
            isForAllProduct: false,
            limitPayments: true,
            maxPayments: 100,
            paymentForID: 'sub_123456789',
            paymentLinkProducts: [
                [
                    'productID' => '123e4567-e89b-12d3-a456-426614174003', 'quantity' => 1,
                ],
                [
                    'productID' => '123e4567-e89b-12d3-a456-426614174004', 'quantity' => 2,
                ],
            ],
            taxID: '123e4567-e89b-12d3-a456-426614174005',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->paymentLinks->retrieve('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->paymentLinks->update('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->paymentLinks->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
