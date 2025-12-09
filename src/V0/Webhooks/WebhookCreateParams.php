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
 *   signing_secret?: string,
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
    #[Optional]
    public ?string $signing_secret;

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
        ?string $signing_secret = null,
    ): self {
        $obj = new self;

        $obj['encrypted'] = $encrypted;
        $obj['isActive'] = $isActive;
        $obj['name'] = $name;
        $obj['url'] = $url;

        null !== $signing_secret && $obj['signing_secret'] = $signing_secret;

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
     * URL where webhook events will be sent.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

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
}
