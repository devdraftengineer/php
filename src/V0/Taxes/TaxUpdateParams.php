<?php

declare(strict_types=1);

namespace Devdraft\V0\Taxes;

use Devdraft\Core\Attributes\Api;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;

/**
 * Updates an existing tax's information.
 *
 * ## Use Cases
 * - Modify tax percentage rates
 * - Update tax descriptions
 * - Activate/deactivate taxes
 * - Change tax names
 *
 * ## Path Parameters
 * - `id`: Tax UUID (required) - Must be a valid UUID format
 *
 * ## Example Request
 * `PUT /api/v0/taxes/123e4567-e89b-12d3-a456-426614174000`
 *
 * ## Example Request Body
 * ```json
 * {
 *   "name": "Updated Sales Tax",
 *   "description": "Updated sales tax rate",
 *   "percentage": 9.0,
 *   "active": true
 * }
 * ```
 *
 * ## Notes
 * - Only include fields that need to be updated
 * - All fields are optional in updates
 * - Percentage changes affect future calculations only
 *
 * @see Devdraft\Services\V0\TaxesService::update()
 *
 * @phpstan-type TaxUpdateParamsShape = array{
 *   active?: bool,
 *   appIds?: list<string>,
 *   description?: string,
 *   name?: string,
 *   percentage?: float,
 * }
 */
final class TaxUpdateParams implements BaseModel
{
    /** @use SdkModel<TaxUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether this tax is currently active and can be applied.
     */
    #[Api(optional: true)]
    public ?bool $active;

    /**
     * Array of app IDs where this tax should be available.
     *
     * @var list<string>|null $appIds
     */
    #[Api(list: 'string', optional: true)]
    public ?array $appIds;

    /**
     * Detailed description of what this tax covers.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * Tax name for identification and display purposes.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Tax rate as a percentage (0-100).
     */
    #[Api(optional: true)]
    public ?float $percentage;

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
        ?bool $active = null,
        ?array $appIds = null,
        ?string $description = null,
        ?string $name = null,
        ?float $percentage = null,
    ): self {
        $obj = new self;

        null !== $active && $obj->active = $active;
        null !== $appIds && $obj->appIds = $appIds;
        null !== $description && $obj->description = $description;
        null !== $name && $obj->name = $name;
        null !== $percentage && $obj->percentage = $percentage;

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
     * Array of app IDs where this tax should be available.
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
     * Detailed description of what this tax covers.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * Tax name for identification and display purposes.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Tax rate as a percentage (0-100).
     */
    public function withPercentage(float $percentage): self
    {
        $obj = clone $this;
        $obj->percentage = $percentage;

        return $obj;
    }
}
