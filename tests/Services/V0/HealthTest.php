<?php

namespace Tests\Services\V0;

use Devdraft\Client;
use Devdraft\V0\Health\HealthCheckPublicResponse;
use Devdraft\V0\Health\HealthCheckResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class HealthTest extends TestCase
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
    public function testCheck(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->health->check();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HealthCheckResponse::class, $result);
    }

    #[Test]
    public function testCheckPublic(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->v0->health->checkPublic();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HealthCheckPublicResponse::class, $result);
    }
}
