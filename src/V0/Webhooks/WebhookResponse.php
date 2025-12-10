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
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['deliveryStats'] = $deliveryStats;
        $self['encrypted'] = $encrypted;
        $self['isActive'] = $isActive;
        $self['name'] = $name;
        $self['updatedAt'] = $updatedAt;
        $self['url'] = $url;

        return $self;
    }

    /**
     * Unique identifier for the webhook.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Timestamp when the webhook was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Webhook delivery statistics.
     */
    public function withDeliveryStats(mixed $deliveryStats): self
    {
        $self = clone $this;
        $self['deliveryStats'] = $deliveryStats;

        return $self;
    }

    /**
     * Whether webhook payloads are encrypted.
     */
    public function withEncrypted(bool $encrypted): self
    {
        $self = clone $this;
        $self['encrypted'] = $encrypted;

        return $self;
    }

    /**
     * Whether the webhook is currently active.
     */
    public function withIsActive(bool $isActive): self
    {
        $self = clone $this;
        $self['isActive'] = $isActive;

        return $self;
    }

    /**
     * Name of the webhook.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Timestamp when the webhook was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * URL where webhook events are sent.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
