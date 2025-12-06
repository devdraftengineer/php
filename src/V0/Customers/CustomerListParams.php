<?php

declare(strict_types=1);

namespace Devdraft\V0\Customers;

use Devdraft\Core\Attributes\Api;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;

/**
 * Retrieves a list of customers with optional filtering and pagination.
 *
 * This endpoint allows you to search and filter customers based on various criteria.
 *
 * ## Use Cases
 * - List all customers with pagination
 * - Search customers by name or email
 * - Filter customers by status
 * - Export customer data
 *
 * ## Query Parameters
 * - `skip`: Number of records to skip (default: 0, min: 0)
 * - `take`: Number of records to take (default: 10, min: 1, max: 100)
 * - `status`: Filter by customer status (ACTIVE, BLACKLISTED, DEACTIVATED)
 * - `name`: Filter by customer name (partial match, case-insensitive)
 * - `email`: Filter by customer email (exact match, case-insensitive)
 *
 * ## Example Request
 * `GET /api/v0/customers?skip=0&take=20&status=ACTIVE&name=John`
 *
 * ## Example Response
 * ```json
 * {
 *   "data": [
 *     {
 *       "id": "cust_123456",
 *       "first_name": "John",
 *       "last_name": "Doe",
 *       "email": "john.doe@example.com",
 *       "phone_number": "+1-555-123-4567",
 *       "customer_type": "Startup",
 *       "status": "ACTIVE",
 *       "created_at": "2024-03-20T10:00:00Z",
 *       "updated_at": "2024-03-20T10:00:00Z"
 *     }
 *   ],
 *   "total": 100,
 *   "skip": 0,
 *   "take": 10
 * }
 * ```
 *
 * @see Devdraft\Services\V0\CustomersService::list()
 *
 * @phpstan-type CustomerListParamsShape = array{
 *   email?: string,
 *   name?: string,
 *   skip?: float,
 *   status?: CustomerStatus|value-of<CustomerStatus>,
 *   take?: float,
 * }
 */
final class CustomerListParams implements BaseModel
{
    /** @use SdkModel<CustomerListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter customers by email (exact match, case-insensitive).
     */
    #[Api(optional: true)]
    public ?string $email;

    /**
     * Filter customers by name (partial match, case-insensitive).
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Number of records to skip for pagination.
     */
    #[Api(optional: true)]
    public ?float $skip;

    /**
     * Filter customers by status.
     *
     * @var value-of<CustomerStatus>|null $status
     */
    #[Api(enum: CustomerStatus::class, optional: true)]
    public ?string $status;

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
     *
     * @param CustomerStatus|value-of<CustomerStatus> $status
     */
    public static function with(
        ?string $email = null,
        ?string $name = null,
        ?float $skip = null,
        CustomerStatus|string|null $status = null,
        ?float $take = null,
    ): self {
        $obj = new self;

        null !== $email && $obj['email'] = $email;
        null !== $name && $obj['name'] = $name;
        null !== $skip && $obj['skip'] = $skip;
        null !== $status && $obj['status'] = $status;
        null !== $take && $obj['take'] = $take;

        return $obj;
    }

    /**
     * Filter customers by email (exact match, case-insensitive).
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    /**
     * Filter customers by name (partial match, case-insensitive).
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Number of records to skip for pagination.
     */
    public function withSkip(float $skip): self
    {
        $obj = clone $this;
        $obj['skip'] = $skip;

        return $obj;
    }

    /**
     * Filter customers by status.
     *
     * @param CustomerStatus|value-of<CustomerStatus> $status
     */
    public function withStatus(CustomerStatus|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Number of records to return (max 100).
     */
    public function withTake(float $take): self
    {
        $obj = clone $this;
        $obj['take'] = $take;

        return $obj;
    }
}
