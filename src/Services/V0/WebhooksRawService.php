<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Conversion\ListOf;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\WebhooksRawContract;
use Devdraft\V0\Webhooks\WebhookCreateParams;
use Devdraft\V0\Webhooks\WebhookListParams;
use Devdraft\V0\Webhooks\WebhookResponse;
use Devdraft\V0\Webhooks\WebhookUpdateParams;

final class WebhooksRawService implements WebhooksRawContract
{
    // @phpstan-ignore-next-line
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
     *   signingSecret?: string,
     * }|WebhookCreateParams $params
     *
     * @return BaseResponse<WebhookResponse>
     *
     * @throws APIException
     */
    public function create(
        array|WebhookCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = WebhookCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id Webhook unique identifier (UUID)
     *
     * @return BaseResponse<WebhookResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $id Webhook unique identifier (UUID)
     * @param array{
     *   encrypted?: bool,
     *   isActive?: bool,
     *   name?: string,
     *   signingSecret?: string,
     *   url?: string,
     * }|WebhookUpdateParams $params
     *
     * @return BaseResponse<WebhookResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|WebhookUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @return BaseResponse<list<WebhookResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|WebhookListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = WebhookListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id Webhook unique identifier (UUID)
     *
     * @return BaseResponse<WebhookResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/v0/webhooks/%1$s', $id],
            options: $requestOptions,
            convert: WebhookResponse::class,
        );
    }
}
