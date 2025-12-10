<?php

declare(strict_types=1);

namespace Devdraft\V0\Webhooks;

use Devdraft\Core\Attributes\Optional;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;

/**
 * Updates an existing webhook configuration. Requires webhook:update scope.
 *
 * @see Devdraft\Services\V0\WebhooksService::update()
 *
 * @phpstan-type WebhookUpdateParamsShape = array{
 *   encrypted?: bool,
 *   isActive?: bool,
 *   name?: string,
 *   signingSecret?: string,
 *   url?: string,
 * }
 */
final class WebhookUpdateParams implements BaseModel
{
    /** @use SdkModel<WebhookUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether webhook payloads should be encrypted.
     */
    #[Optional]
    public ?bool $encrypted;

    /**
     * Whether the webhook is active and will receive events.
     */
    #[Optional]
    public ?bool $isActive;

    /**
     * Name of the webhook for identification purposes.
     */
    #[Optional]
    public ?string $name;

    /**
     * Secret key used to sign webhook payloads for verification.
     */
    #[Optional('signing_secret')]
    public ?string $signingSecret;

    /**
     * URL where webhook events will be sent.
     */
    #[Optional]
    public ?string $url;

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
        ?bool $encrypted = null,
        ?bool $isActive = null,
        ?string $name = null,
        ?string $signingSecret = null,
        ?string $url = null,
    ): self {
        $self = new self;

        null !== $encrypted && $self['encrypted'] = $encrypted;
        null !== $isActive && $self['isActive'] = $isActive;
        null !== $name && $self['name'] = $name;
        null !== $signingSecret && $self['signingSecret'] = $signingSecret;
        null !== $url && $self['url'] = $url;

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
     * Secret key used to sign webhook payloads for verification.
     */
    public function withSigningSecret(string $signingSecret): self
    {
        $self = clone $this;
        $self['signingSecret'] = $signingSecret;

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
}
