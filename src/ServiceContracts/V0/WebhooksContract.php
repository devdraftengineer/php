<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Webhooks\WebhookResponse;

interface WebhooksContract
{
    /**
     * @api
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
    ): WebhookResponse;

    /**
     * @api
     *
     * @param string $id Webhook unique identifier (UUID)
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WebhookResponse;

    /**
     * @api
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
    ): WebhookResponse;

    /**
     * @api
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
    ): array;

    /**
     * @api
     *
     * @param string $id Webhook unique identifier (UUID)
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WebhookResponse;
}
