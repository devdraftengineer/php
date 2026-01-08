<?php

declare(strict_types=1);

namespace Devdraft;

use Devdraft\Core\BaseClient;
use Devdraft\Core\Util;
use Devdraft\Services\V0Service;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;

/**
 * @phpstan-import-type NormalizedRequest from \Devdraft\Core\BaseClient
 * @phpstan-import-type RequestOpts from \Devdraft\RequestOptions
 */
class Client extends BaseClient
{
    public string $apiKey;

    public string $secret;

    public string $idempotencyKey;

    /**
     * @api
     */
    public V0Service $v0;

    /**
     * @param RequestOpts|null $requestOptions
     */
    public function __construct(
        ?string $apiKey = null,
        ?string $secret = null,
        ?string $idempotencyKey = null,
        ?string $baseUrl = null,
        RequestOptions|array|null $requestOptions = null,
    ) {
        $this->apiKey = (string) ($apiKey ?? getenv('DEVDRAFT_API_KEY'));
        $this->secret = (string) ($secret ?? getenv('DEVDRAFT_SECRET'));
        $this->idempotencyKey = (string) ($idempotencyKey ?? getenv('DEVDRAFT_IDEMPOTENCY_KEY'));

        $baseUrl ??= getenv('DEVDRAFT_BASE_URL') ?: 'https://api.devdraft.ai';

        $options = RequestOptions::parse(
            RequestOptions::with(
                uriFactory: Psr17FactoryDiscovery::findUriFactory(),
                streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
                requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
                transporter: Psr18ClientDiscovery::find(),
            ),
            $requestOptions,
        );

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'User-Agent' => sprintf('devdraft/PHP %s', VERSION),
                'X-Stainless-Lang' => 'php',
                'X-Stainless-Package-Version' => '0.0.1',
                'X-Stainless-Arch' => Util::machtype(),
                'X-Stainless-OS' => Util::ostype(),
                'X-Stainless-Runtime' => php_sapi_name(),
                'X-Stainless-Runtime-Version' => phpversion(),
            ],
            baseUrl: $baseUrl,
            options: $options
        );

        $this->v0 = new V0Service($this);
    }

    /** @return array<string,string> */
    protected function authHeaders(): array
    {
        return [
            ...$this->xClientKey(),
            ...$this->xClientSecret(),
            ...$this->idempotencyKeyScheme(),
        ];
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

    /**
     * @internal
     *
     * @param string|list<string> $path
     * @param array<string,mixed> $query
     * @param array<string,string|int|list<string|int>|null> $headers
     * @param RequestOpts|null $opts
     *
     * @return array{NormalizedRequest, RequestOptions}
     */
    protected function buildRequest(
        string $method,
        string|array $path,
        array $query,
        array $headers,
        mixed $body,
        RequestOptions|array|null $opts,
    ): array {
        return parent::buildRequest(
            method: $method,
            path: $path,
            query: $query,
            headers: [...$this->authHeaders(), ...$headers],
            body: $body,
            opts: $opts,
        );
    }
}
