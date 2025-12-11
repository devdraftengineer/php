<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\Core\Util;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\WebhooksContract;
use Devdraft\V0\Webhooks\WebhookResponse;

final class WebhooksService implements WebhooksContract
{
    /**
     * @api
     */
    public WebhooksRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WebhooksRawService($client);
    }

    /**
     * @api
     *
     * Creates a new webhook endpoint for receiving event notifications. Requires webhook:create scope.
     *
     * @param string $name Name of the webhook for identification purposes
     * @param string $url URL where webhook events will be sent
     * @param bool $encrypted Whether webhook payloads should be encrypted
     * @param bool $isActive Whether the webhook is active and will receive events
     * @param string $signingSecret Secret key used to sign webhook payloads for verification
     *
     * @throws APIException
     */
    public function create(
        string $name,
        string $url,
        bool $encrypted = false,
        bool $isActive = true,
        ?string $signingSecret = null,
        ?RequestOptions $requestOptions = null,
    ): WebhookResponse {
        $params = Util::removeNulls(
            [
                'encrypted' => $encrypted,
                'isActive' => $isActive,
                'name' => $name,
                'url' => $url,
                'signingSecret' => $signingSecret,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves details for a specific webhook. Requires webhook:read scope.
     *
     * @param string $id Webhook unique identifier (UUID)
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WebhookResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates an existing webhook configuration. Requires webhook:update scope.
     *
     * @param string $id Webhook unique identifier (UUID)
     * @param bool $encrypted Whether webhook payloads should be encrypted
     * @param bool $isActive Whether the webhook is active and will receive events
     * @param string $name Name of the webhook for identification purposes
     * @param string $signingSecret Secret key used to sign webhook payloads for verification
     * @param string $url URL where webhook events will be sent
     *
     * @throws APIException
     */
    public function update(
        string $id,
        bool $encrypted = false,
        bool $isActive = true,
        ?string $name = null,
        ?string $signingSecret = null,
        ?string $url = null,
        ?RequestOptions $requestOptions = null,
    ): WebhookResponse {
        $params = Util::removeNulls(
            [
                'encrypted' => $encrypted,
                'isActive' => $isActive,
                'name' => $name,
                'signingSecret' => $signingSecret,
                'url' => $url,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves a list of all webhooks for your application. Requires webhook:read scope.
     *
     * @param float $skip Number of records to skip (default: 0)
     * @param float $take Number of records to return (default: 10)
     *
     * @return list<WebhookResponse>
     *
     * @throws APIException
     */
    public function list(
        ?float $skip = null,
        ?float $take = null,
        ?RequestOptions $requestOptions = null,
    ): array {
        $params = Util::removeNulls(['skip' => $skip, 'take' => $take]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a webhook configuration. Requires webhook:delete scope.
     *
     * @param string $id Webhook unique identifier (UUID)
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WebhookResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
