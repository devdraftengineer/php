<?php

declare(strict_types=1);

namespace Devdraft\V0\Customers\LiquidationAddresses;

use Devdraft\Core\Attributes\Required;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;

/**
 * Retrieve a specific liquidation address by its ID for a given customer.
 *
 * @see Devdraft\Services\V0\Customers\LiquidationAddressesService::retrieve()
 *
 * @phpstan-type LiquidationAddressRetrieveParamsShape = array{customerId: string}
 */
final class LiquidationAddressRetrieveParams implements BaseModel
{
    /** @use SdkModel<LiquidationAddressRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $customerId;

    /**
     * `new LiquidationAddressRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LiquidationAddressRetrieveParams::with(customerId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LiquidationAddressRetrieveParams)->withCustomerID(...)
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
    public static function with(string $customerId): self
    {
        $obj = new self;

        $obj['customerId'] = $customerId;

        return $obj;
    }

    public function withCustomerID(string $customerID): self
    {
        $obj = clone $this;
        $obj['customerId'] = $customerID;

        return $obj;
    }
}
