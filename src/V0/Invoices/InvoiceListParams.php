<?php

declare(strict_types=1);

namespace Devdraft\V0\Invoices;

use Devdraft\Core\Attributes\Api;
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
    #[Api(optional: true)]
    public ?float $skip;

    /**
     * Number of records to take.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $skip && $obj['skip'] = $skip;
        null !== $take && $obj['take'] = $take;

        return $obj;
    }

    /**
     * Number of records to skip.
     */
    public function withSkip(float $skip): self
    {
        $obj = clone $this;
        $obj['skip'] = $skip;

        return $obj;
    }

    /**
     * Number of records to take.
     */
    public function withTake(float $take): self
    {
        $obj = clone $this;
        $obj['take'] = $take;

        return $obj;
    }
}
