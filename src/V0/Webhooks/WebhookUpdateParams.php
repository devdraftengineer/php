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
 *   signing_secret?: string,
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
    #[Optional]
    public ?string $signing_secret;

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
        ?string $signing_secret = null,
        ?string $url = null,
    ): self {
        $obj = new self;

        null !== $encrypted && $obj['encrypted'] = $encrypted;
        null !== $isActive && $obj['isActive'] = $isActive;
        null !== $name && $obj['name'] = $name;
        null !== $signing_secret && $obj['signing_secret'] = $signing_secret;
        null !== $url && $obj['url'] = $url;

        return $obj;
    }

    /**
     * Whether webhook payloads should be encrypted.
     */
    public function withEncrypted(bool $encrypted): self
    {
        $obj = clone $this;
        $obj['encrypted'] = $encrypted;

        return $obj;
    }

    /**
     * Whether the webhook is active and will receive events.
     */
    public function withIsActive(bool $isActive): self
    {
        $obj = clone $this;
        $obj['isActive'] = $isActive;

        return $obj;
    }

    /**
     * Name of the webhook for identification purposes.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Secret key used to sign webhook payloads for verification.
     */
    public function withSigningSecret(string $signingSecret): self
    {
        $obj = clone $this;
        $obj['signing_secret'] = $signingSecret;

        return $obj;
    }

    /**
     * URL where webhook events will be sent.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }
}
