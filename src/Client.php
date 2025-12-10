<?php

declare(strict_types=1);

namespace Devdraft;

use Devdraft\Core\BaseClient;
use Devdraft\Core\Util;
use Devdraft\Services\V0Service;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;

class Client extends BaseClient
{
    public string $apiKey;

    public string $secret;

    public string $idempotencyKey;

    /**
     * @api
     */
    public V0Service $v0;

    public function __construct(
        ?string $apiKey = null,
        ?string $secret = null,
        ?string $idempotencyKey = null,
        ?string $baseUrl = null,
    ) {
        $this->apiKey = (string) ($apiKey ?? getenv('DEVDRAFT_API_KEY'));
        $this->secret = (string) ($secret ?? getenv('DEVDRAFT_SECRET'));
        $this->idempotencyKey = (string) ($idempotencyKey ?? getenv('DEVDRAFT_IDEMPOTENCY_KEY'));

        $baseUrl ??= getenv('DEVDRAFT_BASE_URL') ?: 'https://api.devdraft.ai';

        $options = RequestOptions::with(
            uriFactory: Psr17FactoryDiscovery::findUriFactory(),
            streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
            requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
            transporter: Psr18ClientDiscovery::find(),
        );

        parent::__construct(
            // x-release-please-start-version
            headers: [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'User-Agent' => sprintf('devdraft/PHP %s', '0.0.1'),
                'X-Stainless-Lang' => 'php',
                'X-Stainless-Package-Version' => '0.0.1',
                'X-Stainless-Arch' => Util::machtype(),
                'X-Stainless-OS' => Util::ostype(),
                'X-Stainless-Runtime' => php_sapi_name(),
                'X-Stainless-Runtime-Version' => phpversion(),
            ],
            // x-release-please-end
            baseUrl: $baseUrl,
            options: $options,
        );

        $this->v0 = new V0Service($this);
    }

    /** @return array<string,string> */
    protected function xClientKey(): array
    {
        return $this->apiKey ? ['x-client-key' => $this->apiKey] : [];
    }

    /** @return array<string,string> */
    protected function xClientSecret(): array
    {
        return $this->secret ? ['x-client-secret' => $this->secret] : [];
    }

    /** @return array<string,string> */
    protected function idempotencyKeyScheme(): array
    {
        return $this->idempotencyKey ? [
            'idempotency-key' => $this->idempotencyKey,
        ] : [];
    }
}
