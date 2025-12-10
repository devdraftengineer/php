<?php

declare(strict_types=1);

namespace Devdraft\V0\Webhooks;

use Devdraft\Core\Attributes\Optional;
use Devdraft\Core\Attributes\Required;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;

/**
 * Creates a new webhook endpoint for receiving event notifications. Requires webhook:create scope.
 *
 * @see Devdraft\Services\V0\WebhooksService::create()
 *
 * @phpstan-type WebhookCreateParamsShape = array{
 *   encrypted: bool,
 *   isActive: bool,
 *   name: string,
 *   url: string,
 *   signingSecret?: string,
 * }
 */
final class WebhookCreateParams implements BaseModel
{
    /** @use SdkModel<WebhookCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether webhook payloads should be encrypted.
     */
    #[Required]
    public bool $encrypted;

    /**
     * Whether the webhook is active and will receive events.
     */
    #[Required]
    public bool $isActive;

    /**
     * Name of the webhook for identification purposes.
     */
    #[Required]
    public string $name;

    /**
     * URL where webhook events will be sent.
     */
    #[Required]
    public string $url;

    /**
     * Secret key used to sign webhook payloads for verification.
     */
    #[Optional('signing_secret')]
    public ?string $signingSecret;

    /**
     * `new WebhookCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookCreateParams::with(encrypted: ..., isActive: ..., name: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookCreateParams)
     *   ->withEncrypted(...)
     *   ->withIsActive(...)
     *   ->withName(...)
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
        string $name,
        string $url,
        bool $encrypted = false,
        bool $isActive = true,
        ?string $signingSecret = null,
    ): self {
        $self = new self;

        $self['encrypted'] = $encrypted;
        $self['isActive'] = $isActive;
        $self['name'] = $name;
        $self['url'] = $url;

        null !== $signingSecret && $self['signingSecret'] = $signingSecret;

        return $self;
    }

    /**
     * Whether webhook payloads should be encrypted.
     */
    public function withEncrypted(bool $encrypted): self
    {
        $self = clone $this;
        $self['encrypted'] = $encrypted;

        return $self;
    }

    /**
     * Whether the webhook is active and will receive events.
     */
    public function withIsActive(bool $isActive): self
    {
        $self = clone $this;
        $self['isActive'] = $isActive;

        return $self;
    }

    /**
     * Name of the webhook for identification purposes.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * URL where webhook events will be sent.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * Secret key used to sign webhook payloads for verification.
     */
    public function withSigningSecret(string $signingSecret): self
    {
        $self = clone $this;
        $self['signingSecret'] = $signingSecret;

        return $self;
    }
}
