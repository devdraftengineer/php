<?php

declare(strict_types=1);

namespace Devdraft\V0\PaymentLinks;

use Devdraft\Core\Attributes\Optional;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;

/**
 * Get all payment links.
 *
 * @see Devdraft\Services\V0\PaymentLinksService::list()
 *
 * @phpstan-type PaymentLinkListParamsShape = array{skip?: string, take?: string}
 */
final class PaymentLinkListParams implements BaseModel
{
    /** @use SdkModel<PaymentLinkListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Number of records to skip (must be non-negative).
     */
    #[Optional]
    public ?string $skip;

    /**
     * Number of records to take (must be positive).
     */
    #[Optional]
    public ?string $take;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $skip = null, ?string $take = null): self
    {
        $self = new self;

        null !== $skip && $self['skip'] = $skip;
        null !== $take && $self['take'] = $take;

        return $self;
    }

    /**
     * Number of records to skip (must be non-negative).
     */
    public function withSkip(string $skip): self
    {
        $self = clone $this;
        $self['skip'] = $skip;

        return $self;
    }

    /**
     * Number of records to take (must be positive).
     */
    public function withTake(string $take): self
    {
        $self = clone $this;
        $self['take'] = $take;

        return $self;
    }
}
