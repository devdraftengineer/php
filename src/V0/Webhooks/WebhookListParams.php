<?php

declare(strict_types=1);

namespace Devdraft\V0\Webhooks;

use Devdraft\Core\Attributes\Optional;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;

/**
 * Retrieves a list of all webhooks for your application. Requires webhook:read scope.
 *
 * @see Devdraft\Services\V0\WebhooksService::list()
 *
 * @phpstan-type WebhookListParamsShape = array{skip?: float, take?: float}
 */
final class WebhookListParams implements BaseModel
{
    /** @use SdkModel<WebhookListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Number of records to skip (default: 0).
     */
    #[Optional]
    public ?float $skip;

    /**
     * Number of records to return (default: 10).
     */
    #[Optional]
    public ?float $take;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?float $skip = null, ?float $take = null): self
    {
        $self = new self;

        null !== $skip && $self['skip'] = $skip;
        null !== $take && $self['take'] = $take;

        return $self;
    }

    /**
     * Number of records to skip (default: 0).
     */
    public function withSkip(float $skip): self
    {
        $self = clone $this;
        $self['skip'] = $skip;

        return $self;
    }

    /**
     * Number of records to return (default: 10).
     */
    public function withTake(float $take): self
    {
        $self = clone $this;
        $self['take'] = $take;

        return $self;
    }
}
