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
final class InvoicesTest extends TestCase
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

        $result = $this->client->v0->invoices->create([
            'currency' => 'usdc',
            'customer_id' => 'customer_id',
            'delivery' => 'EMAIL',
            'due_date' => '2019-12-27T18:11:19.117Z',
            'email' => 'email',
            'items' => [['product_id' => 'product_id', 'quantity' => 0]],
            'name' => 'name',
            'partial_payment' => true,
            'payment_link' => true,
            'payment_methods' => ['ACH'],
            'status' => 'DRAFT',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->invoices->create([
            'currency' => 'usdc',
            'customer_id' => 'customer_id',
            'delivery' => 'EMAIL',
            'due_date' => '2019-12-27T18:11:19.117Z',
            'email' => 'email',
            'items' => [['product_id' => 'product_id', 'quantity' => 0]],
            'name' => 'name',
            'partial_payment' => true,
            'payment_link' => true,
            'payment_methods' => ['ACH'],
            'status' => 'DRAFT',
            'address' => 'address',
            'logo' => 'logo',
            'phone_number' => 'phone_number',
            'send_date' => '2019-12-27T18:11:19.117Z',
            'taxId' => 'taxId',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->invoices->retrieve('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->invoices->update(
            'id',
            [
                'currency' => 'usdc',
                'customer_id' => 'customer_id',
                'delivery' => 'EMAIL',
                'due_date' => '2019-12-27T18:11:19.117Z',
                'email' => 'email',
                'items' => [['product_id' => 'product_id', 'quantity' => 0]],
                'name' => 'name',
                'partial_payment' => true,
                'payment_link' => true,
                'payment_methods' => ['ACH'],
                'status' => 'DRAFT',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->invoices->update(
            'id',
            [
                'currency' => 'usdc',
                'customer_id' => 'customer_id',
                'delivery' => 'EMAIL',
                'due_date' => '2019-12-27T18:11:19.117Z',
                'email' => 'email',
                'items' => [['product_id' => 'product_id', 'quantity' => 0]],
                'name' => 'name',
                'partial_payment' => true,
                'payment_link' => true,
                'payment_methods' => ['ACH'],
                'status' => 'DRAFT',
                'address' => 'address',
                'logo' => 'logo',
                'phone_number' => 'phone_number',
                'send_date' => '2019-12-27T18:11:19.117Z',
                'taxId' => 'taxId',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->invoices->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
