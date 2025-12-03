<?php

declare(strict_types=1);

namespace Devdraft\V0\Taxes;

use Devdraft\Core\Attributes\Api;
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
    #[Api(optional: true)]
    public ?bool $active;

    /**
     * Filter taxes by name (partial match, case-insensitive).
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Number of records to skip for pagination.
     */
    #[Api(optional: true)]
    public ?float $skip;

    /**
     * Number of records to return (max 100).
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
    public static function with(
        ?bool $active = null,
        ?string $name = null,
        ?float $skip = null,
        ?float $take = null,
    ): self {
        $obj = new self;

        null !== $active && $obj->active = $active;
        null !== $name && $obj->name = $name;
        null !== $skip && $obj->skip = $skip;
        null !== $take && $obj->take = $take;

        return $obj;
    }

    /**
     * Filter by active status.
     */
    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj->active = $active;

        return $obj;
    }

    /**
     * Filter taxes by name (partial match, case-insensitive).
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Number of records to skip for pagination.
     */
    public function withSkip(float $skip): self
    {
        $obj = clone $this;
        $obj->skip = $skip;

        return $obj;
    }

    /**
     * Number of records to return (max 100).
     */
    public function withTake(float $take): self
    {
        $obj = clone $this;
        $obj->take = $take;

        return $obj;
    }
}
