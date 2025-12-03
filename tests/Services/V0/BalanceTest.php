<?php

namespace Tests\Services\V0;

use Devdraft\Client;
use Devdraft\V0\Balance\AggregatedBalance;
use Devdraft\V0\Balance\BalanceGetAllStablecoinBalancesResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class BalanceTest extends TestCase
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
    public function testGetAllStablecoinBalances(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->balance->getAllStablecoinBalances();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BalanceGetAllStablecoinBalancesResponse::class,
            $result
        );
    }

    #[Test]
    public function testGetEurc(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->balance->getEurc();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AggregatedBalance::class, $result);
    }

    #[Test]
    public function testGetUsdc(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->balance->getUsdc();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AggregatedBalance::class, $result);
    }
}
