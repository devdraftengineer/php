<?php

declare(strict_types=1);

namespace Devdraft\V0\Webhooks;

use Devdraft\Core\Attributes\Required;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Contracts\BaseModel;

/**
 * @phpstan-type WebhookResponseShape = array{
 *   id: string,
 *   createdAt: string,
 *   deliveryStats: mixed,
 *   encrypted: bool,
 *   isActive: bool,
 *   name: string,
 *   updatedAt: string,
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
    #[Required]
    public string $id;

    /**
     * Timestamp when the webhook was created.
     */
    #[Required('created_at')]
    public string $createdAt;

    /**
     * Webhook delivery statistics.
     */
    #[Required('delivery_stats')]
    public mixed $deliveryStats;

    /**
     * Whether webhook payloads are encrypted.
     */
    #[Required]
    public bool $encrypted;

    /**
     * Whether the webhook is currently active.
     */
    #[Required]
    public bool $isActive;

    /**
     * Name of the webhook.
     */
    #[Required]
    public string $name;

    /**
     * Timestamp when the webhook was last updated.
     */
    #[Required('updated_at')]
    public string $updatedAt;

    /**
     * URL where webhook events are sent.
     */
    #[Required]
    public string $url;

    /**
     * `new WebhookResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookResponse::with(
     *   id: ...,
     *   createdAt: ...,
     *   deliveryStats: ...,
     *   encrypted: ...,
     *   isActive: ...,
     *   name: ...,
     *   updatedAt: ...,
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
        string $createdAt,
        mixed $deliveryStats,
        bool $encrypted,
        bool $isActive,
        string $name,
        string $updatedAt,
        string $url,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['createdAt'] = $createdAt;
        $obj['deliveryStats'] = $deliveryStats;
        $obj['encrypted'] = $encrypted;
        $obj['isActive'] = $isActive;
        $obj['name'] = $name;
        $obj['updatedAt'] = $updatedAt;
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
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Webhook delivery statistics.
     */
    public function withDeliveryStats(mixed $deliveryStats): self
    {
        $obj = clone $this;
        $obj['deliveryStats'] = $deliveryStats;

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
        $obj['updatedAt'] = $updatedAt;

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
