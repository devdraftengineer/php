<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Webhooks\WebhookCreateParams;
use Devdraft\V0\Webhooks\WebhookListParams;
use Devdraft\V0\Webhooks\WebhookResponse;
use Devdraft\V0\Webhooks\WebhookUpdateParams;

interface WebhooksRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|WebhookCreateParams $params
     *
     * @return BaseResponse<WebhookResponse>
     *
     * @throws APIException
     */
    public function create(
        array|WebhookCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Webhook unique identifier (UUID)
     * @param array<mixed>|WebhookUpdateParams $params
     *
     * @return BaseResponse<WebhookResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|WebhookUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|WebhookListParams $params
     *
     * @return BaseResponse<list<WebhookResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|WebhookListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;
}
