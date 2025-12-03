<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Conversion\ListOf;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\WebhooksContract;
use Devdraft\V0\Webhooks\WebhookCreateParams;
use Devdraft\V0\Webhooks\WebhookListParams;
use Devdraft\V0\Webhooks\WebhookResponse;
use Devdraft\V0\Webhooks\WebhookUpdateParams;

final class WebhooksService implements WebhooksContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new webhook endpoint for receiving event notifications. Requires webhook:create scope.
     *
     * @param array{
     *   encrypted: bool,
     *   isActive: bool,
     *   name: string,
     *   url: string,
     *   signing_secret?: string,
     * }|WebhookCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|WebhookCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): WebhookResponse {
        [$parsed, $options] = WebhookCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'api/v0/webhooks',
            body: (object) $parsed,
            options: $options,
            convert: WebhookResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves details for a specific webhook. Requires webhook:read scope.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WebhookResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['api/v0/webhooks/%1$s', $id],
            options: $requestOptions,
            convert: WebhookResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates an existing webhook configuration. Requires webhook:update scope.
     *
     * @param array{
     *   encrypted?: bool,
     *   isActive?: bool,
     *   name?: string,
     *   signing_secret?: string,
     *   url?: string,
     * }|WebhookUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|WebhookUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): WebhookResponse {
        [$parsed, $options] = WebhookUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['api/v0/webhooks/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: WebhookResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves a list of all webhooks for your application. Requires webhook:read scope.
     *
     * @param array{skip?: float, take?: float}|WebhookListParams $params
     *
     * @return list<WebhookResponse>
     *
     * @throws APIException
     */
    public function list(
        array|WebhookListParams $params,
        ?RequestOptions $requestOptions = null
    ): array {
        [$parsed, $options] = WebhookListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'api/v0/webhooks',
            query: $parsed,
            options: $options,
            convert: new ListOf(WebhookResponse::class),
        );
    }

    /**
     * @api
     *
     * Deletes a webhook configuration. Requires webhook:delete scope.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WebhookResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['api/v0/webhooks/%1$s', $id],
            options: $requestOptions,
            convert: WebhookResponse::class,
        );
    }
}
