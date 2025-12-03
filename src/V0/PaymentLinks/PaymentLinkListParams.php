<?php

declare(strict_types=1);

namespace Devdraft\V0\PaymentLinks;

use Devdraft\Core\Attributes\Api;
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
    #[Api(optional: true)]
    public ?string $skip;

    /**
     * Number of records to take (must be positive).
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $skip && $obj->skip = $skip;
        null !== $take && $obj->take = $take;

        return $obj;
    }

    /**
     * Number of records to skip (must be non-negative).
     */
    public function withSkip(string $skip): self
    {
        $obj = clone $this;
        $obj->skip = $skip;

        return $obj;
    }

    /**
     * Number of records to take (must be positive).
     */
    public function withTake(string $take): self
    {
        $obj = clone $this;
        $obj->take = $take;

        return $obj;
    }
}
