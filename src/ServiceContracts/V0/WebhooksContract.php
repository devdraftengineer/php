<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Webhooks\WebhookCreateParams;
use Devdraft\V0\Webhooks\WebhookListParams;
use Devdraft\V0\Webhooks\WebhookResponse;
use Devdraft\V0\Webhooks\WebhookUpdateParams;

interface WebhooksContract
{
    /**
     * @api
     *
     * @param array<mixed>|WebhookCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|WebhookCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): WebhookResponse;

    /**
     * @api
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
     * @param array<mixed>|WebhookUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|WebhookUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): WebhookResponse;

    /**
     * @api
     *
     * @param array<mixed>|WebhookListParams $params
     *
     * @return list<WebhookResponse>
     *
     * @throws APIException
     */
    public function list(
        array|WebhookListParams $params,
        ?RequestOptions $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WebhookResponse;
}
