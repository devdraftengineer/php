<?php

declare(strict_types=1);

namespace Devdraft\V0\Taxes;

use Devdraft\Core\Attributes\Api;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;

/**
 * Creates a new tax rate that can be applied to products, invoices, and payment links.
 *
 * ## Use Cases
 * - Set up sales tax for different regions
 * - Create VAT rates for international customers
 * - Configure state and local tax rates
 * - Manage tax compliance requirements
 *
 * ## Example: Create Basic Sales Tax
 * ```json
 * {
 *   "name": "Sales Tax",
 *   "description": "Standard sales tax for retail transactions",
 *   "percentage": 8.5,
 *   "active": true
 * }
 * ```
 *
 * ## Required Fields
 * - `name`: Tax name for identification (1-100 characters)
 * - `percentage`: Tax rate percentage (0-100)
 *
 * ## Optional Fields
 * - `description`: Explanation of what this tax covers (max 255 characters)
 * - `active`: Whether this tax is currently active (default: true)
 * - `appIds`: Array of app IDs where this tax should be available
 *
 * @see Devdraft\Services\V0\TaxesService::create()
 *
 * @phpstan-type TaxCreateParamsShape = array{
 *   name: string,
 *   percentage: float,
 *   active?: bool,
 *   appIds?: list<string>,
 *   description?: string,
 * }
 */
final class TaxCreateParams implements BaseModel
{
    /** @use SdkModel<TaxCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Tax name. Used to identify and reference this tax rate.
     */
    #[Api]
    public string $name;

    /**
     * Tax percentage rate. Must be between 0 and 100.
     */
    #[Api]
    public float $percentage;

    /**
     * Whether this tax is currently active and can be applied.
     */
    #[Api(optional: true)]
    public ?bool $active;

    /**
     * Array of app IDs where this tax should be available. If not provided, tax will be available for the current app.
     *
     * @var list<string>|null $appIds
     */
    #[Api(list: 'string', optional: true)]
    public ?array $appIds;

    /**
     * Optional description explaining what this tax covers.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * `new TaxCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TaxCreateParams::with(name: ..., percentage: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TaxCreateParams)->withName(...)->withPercentage(...)
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
     *
     * @param list<string> $appIds
     */
    public static function with(
        string $name,
        float $percentage,
        ?bool $active = null,
        ?array $appIds = null,
        ?string $description = null,
    ): self {
        $obj = new self;

        $obj->name = $name;
        $obj->percentage = $percentage;

        null !== $active && $obj->active = $active;
        null !== $appIds && $obj->appIds = $appIds;
        null !== $description && $obj->description = $description;

        return $obj;
    }

    /**
     * Tax name. Used to identify and reference this tax rate.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Tax percentage rate. Must be between 0 and 100.
     */
    public function withPercentage(float $percentage): self
    {
        $obj = clone $this;
        $obj->percentage = $percentage;

        return $obj;
    }

    /**
     * Whether this tax is currently active and can be applied.
     */
    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj->active = $active;

        return $obj;
    }

    /**
     * Array of app IDs where this tax should be available. If not provided, tax will be available for the current app.
     *
     * @param list<string> $appIDs
     */
    public function withAppIDs(array $appIDs): self
    {
        $obj = clone $this;
        $obj->appIds = $appIDs;

        return $obj;
    }

    /**
     * Optional description explaining what this tax covers.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }
}
