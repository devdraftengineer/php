<?php

declare(strict_types=1);

namespace Devdraft\V0\Taxes;

use Devdraft\Core\Attributes\Optional;
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
 *   appIDs?: list<string>,
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
    #[Optional]
    public ?bool $active;

    /**
     * Array of app IDs where this tax should be available.
     *
     * @var list<string>|null $appIDs
     */
    #[Optional('appIds', list: 'string')]
    public ?array $appIDs;

    /**
     * Detailed description of what this tax covers.
     */
    #[Optional]
    public ?string $description;

    /**
     * Tax name for identification and display purposes.
     */
    #[Optional]
    public ?string $name;

    /**
     * Tax rate as a percentage (0-100).
     */
    #[Optional]
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
     * @param list<string> $appIDs
     */
    public static function with(
        ?bool $active = null,
        ?array $appIDs = null,
        ?string $description = null,
        ?string $name = null,
        ?float $percentage = null,
    ): self {
        $self = new self;

        null !== $active && $self['active'] = $active;
        null !== $appIDs && $self['appIDs'] = $appIDs;
        null !== $description && $self['description'] = $description;
        null !== $name && $self['name'] = $name;
        null !== $percentage && $self['percentage'] = $percentage;

        return $self;
    }

    /**
     * Whether this tax is currently active and can be applied.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    /**
     * Array of app IDs where this tax should be available.
     *
     * @param list<string> $appIDs
     */
    public function withAppIDs(array $appIDs): self
    {
        $self = clone $this;
        $self['appIDs'] = $appIDs;

        return $self;
    }

    /**
     * Detailed description of what this tax covers.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Tax name for identification and display purposes.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Tax rate as a percentage (0-100).
     */
    public function withPercentage(float $percentage): self
    {
        $self = clone $this;
        $self['percentage'] = $percentage;

        return $self;
    }
}
