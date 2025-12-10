<?php

declare(strict_types=1);

namespace Devdraft\V0\Invoices;

use Devdraft\Core\Attributes\Optional;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;

/**
 * Get all invoices.
 *
 * @see Devdraft\Services\V0\InvoicesService::list()
 *
 * @phpstan-type InvoiceListParamsShape = array{skip?: float, take?: float}
 */
final class InvoiceListParams implements BaseModel
{
    /** @use SdkModel<InvoiceListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Number of records to skip.
     */
    #[Optional]
    public ?float $skip;

    /**
     * Number of records to take.
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
     * Number of records to skip.
     */
    public function withSkip(float $skip): self
    {
        $self = clone $this;
        $self['skip'] = $skip;

        return $self;
    }

    /**
     * Number of records to take.
     */
    public function withTake(float $take): self
    {
        $self = clone $this;
        $self['take'] = $take;

        return $self;
    }
}
