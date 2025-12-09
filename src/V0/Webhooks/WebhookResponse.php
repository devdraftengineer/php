<?php

declare(strict_types=1);

namespace Devdraft\V0\Webhooks;

use Devdraft\Core\Attributes\Api;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Contracts\BaseModel;

/**
 * @phpstan-type WebhookResponseShape = array{
 *   id: string,
 *   created_at: string,
 *   delivery_stats: mixed,
 *   encrypted: bool,
 *   isActive: bool,
 *   name: string,
 *   updated_at: string,
 *   url: string,
 * }
 */
final class WebhookResponse implements BaseModel
{
    /** @use SdkModel<WebhookResponseShape> */
    use SdkModel;

    /**
     * Unique identifier for the webhook.
     */
    #[Api]
    public string $id;

    /**
     * Timestamp when the webhook was created.
     */
    #[Api]
    public string $created_at;

    /**
     * Webhook delivery statistics.
     */
    #[Api]
    public mixed $delivery_stats;

    /**
     * Whether webhook payloads are encrypted.
     */
    #[Api]
    public bool $encrypted;

    /**
     * Whether the webhook is currently active.
     */
    #[Api]
    public bool $isActive;

    /**
     * Name of the webhook.
     */
    #[Api]
    public string $name;

    /**
     * Timestamp when the webhook was last updated.
     */
    #[Api]
    public string $updated_at;

    /**
     * URL where webhook events are sent.
     */
    #[Api]
    public string $url;

    /**
     * `new WebhookResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookResponse::with(
     *   id: ...,
     *   created_at: ...,
     *   delivery_stats: ...,
     *   encrypted: ...,
     *   isActive: ...,
     *   name: ...,
     *   updated_at: ...,
     *   url: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookResponse)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withDeliveryStats(...)
     *   ->withEncrypted(...)
     *   ->withIsActive(...)
     *   ->withName(...)
     *   ->withUpdatedAt(...)
     *   ->withURL(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        string $id,
        string $created_at,
        mixed $delivery_stats,
        bool $encrypted,
        bool $isActive,
        string $name,
        string $updated_at,
        string $url,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['created_at'] = $created_at;
        $obj['delivery_stats'] = $delivery_stats;
        $obj['encrypted'] = $encrypted;
        $obj['isActive'] = $isActive;
        $obj['name'] = $name;
        $obj['updated_at'] = $updated_at;
        $obj['url'] = $url;

        return $obj;
    }

    /**
     * Unique identifier for the webhook.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Timestamp when the webhook was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Webhook delivery statistics.
     */
    public function withDeliveryStats(mixed $deliveryStats): self
    {
        $obj = clone $this;
        $obj['delivery_stats'] = $deliveryStats;

        return $obj;
    }

    /**
     * Whether webhook payloads are encrypted.
     */
    public function withEncrypted(bool $encrypted): self
    {
        $obj = clone $this;
        $obj['encrypted'] = $encrypted;

        return $obj;
    }

    /**
     * Whether the webhook is currently active.
     */
    public function withIsActive(bool $isActive): self
    {
        $obj = clone $this;
        $obj['isActive'] = $isActive;

        return $obj;
    }

    /**
     * Name of the webhook.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Timestamp when the webhook was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }

    /**
     * URL where webhook events are sent.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }
}
