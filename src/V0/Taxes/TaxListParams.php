<?php

declare(strict_types=1);

namespace Devdraft\V0\Taxes;

use Devdraft\Core\Attributes\Optional;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;

/**
 * Retrieves a list of taxes with optional filtering and pagination.
 *
 * ## Use Cases
 * - List all available tax rates
 * - Search taxes by name
 * - Filter active/inactive taxes
 * - Export tax configuration
 *
 * ## Query Parameters
 * - `skip`: Number of records to skip (default: 0, min: 0)
 * - `take`: Number of records to return (default: 10, min: 1, max: 100)
 * - `name`: Filter taxes by name (partial match, case-insensitive)
 * - `active`: Filter by active status (true/false)
 *
 * ## Example Request
 * `GET /api/v0/taxes?skip=0&take=20&active=true&name=Sales`
 *
 * ## Example Response
 * ```json
 * [
 *   {
 *     "id": "tax_123456",
 *     "name": "Sales Tax",
 *     "description": "Standard sales tax for retail transactions",
 *     "percentage": 8.5,
 *     "active": true,
 *     "created_at": "2024-03-20T10:00:00Z",
 *     "updated_at": "2024-03-20T10:00:00Z"
 *   }
 * ]
 * ```
 *
 * @see Devdraft\Services\V0\TaxesService::list()
 *
 * @phpstan-type TaxListParamsShape = array{
 *   active?: bool, name?: string, skip?: float, take?: float
 * }
 */
final class TaxListParams implements BaseModel
{
    /** @use SdkModel<TaxListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by active status.
     */
    #[Optional]
    public ?bool $active;

    /**
     * Filter taxes by name (partial match, case-insensitive).
     */
    #[Optional]
    public ?string $name;

    /**
     * Number of records to skip for pagination.
     */
    #[Optional]
    public ?float $skip;

    /**
     * Number of records to return (max 100).
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
    public static function with(
        ?bool $active = null,
        ?string $name = null,
        ?float $skip = null,
        ?float $take = null,
    ): self {
        $self = new self;

        null !== $active && $self['active'] = $active;
        null !== $name && $self['name'] = $name;
        null !== $skip && $self['skip'] = $skip;
        null !== $take && $self['take'] = $take;

        return $self;
    }

    /**
     * Filter by active status.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    /**
     * Filter taxes by name (partial match, case-insensitive).
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Number of records to skip for pagination.
     */
    public function withSkip(float $skip): self
    {
        $self = clone $this;
        $self['skip'] = $skip;

        return $self;
    }

    /**
     * Number of records to return (max 100).
     */
    public function withTake(float $take): self
    {
        $self = clone $this;
        $self['take'] = $take;

        return $self;
    }
}
