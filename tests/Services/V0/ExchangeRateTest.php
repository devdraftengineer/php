<?php

namespace Tests\Services\V0;

use Devdraft\Client;
use Devdraft\V0\ExchangeRate\ExchangeRateResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ExchangeRateTest extends TestCase
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
    public function testGetEurToUsd(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->exchangeRate->getEurToUsd();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExchangeRateResponse::class, $result);
    }

    #[Test]
    public function testGetExchangeRate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->exchangeRate->getExchangeRate(
            from: 'usd',
            to: 'eur'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExchangeRateResponse::class, $result);
    }

    #[Test]
    public function testGetExchangeRateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->exchangeRate->getExchangeRate(
            from: 'usd',
            to: 'eur'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExchangeRateResponse::class, $result);
    }

    #[Test]
    public function testGetUsdToEur(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->exchangeRate->getUsdToEur();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExchangeRateResponse::class, $result);
    }
}
