<?php

declare(strict_types=1);

namespace Devdraft\V0\Customers;

use Devdraft\Core\Attributes\Api;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;

/**
 * Updates an existing customer's information.
 *
 * This endpoint allows you to modify customer details while preserving their core information.
 *
 * ## Use Cases
 * - Update customer contact information
 * - Change customer type
 * - Modify customer status
 *
 * ## Path Parameters
 * - `id`: Customer UUID (required) - Must be a valid UUID format
 *
 * ## Example Request
 * `PATCH /api/v0/customers/123e4567-e89b-12d3-a456-426614174000`
 *
 * ## Example Request Body
 * ```json
 * {
 *   "first_name": "John",
 *   "last_name": "Smith",
 *   "phone_number": "+1-987-654-3210",
 *   "customer_type": "Small Business"
 * }
 * ```
 *
 * ## Notes
 * - Only include fields that need to be updated
 * - All fields are optional in updates
 * - Status changes may require additional verification
 *
 * @see Devdraft\Services\V0\CustomersService::update()
 *
 * @phpstan-type CustomerUpdateParamsShape = array{
 *   customer_type?: CustomerType|value-of<CustomerType>,
 *   email?: string,
 *   first_name?: string,
 *   last_name?: string,
 *   phone_number?: string,
 *   status?: CustomerStatus|value-of<CustomerStatus>,
 * }
 */
final class CustomerUpdateParams implements BaseModel
{
    /** @use SdkModel<CustomerUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Type of customer account. Determines available features and compliance requirements.
     *
     * @var value-of<CustomerType>|null $customer_type
     */
    #[Api(enum: CustomerType::class, optional: true)]
    public ?string $customer_type;

    /**
     * Customer's email address. Used for notifications, receipts, and account management. Must be a valid email format.
     */
    #[Api(optional: true)]
    public ?string $email;

    /**
     * Customer's first name. Used for personalization and legal documentation.
     */
    #[Api(optional: true)]
    public ?string $first_name;

    /**
     * Customer's last name. Used for personalization and legal documentation.
     */
    #[Api(optional: true)]
    public ?string $last_name;

    /**
     * Customer's phone number. Used for SMS notifications and verification. Include country code for international numbers.
     */
    #[Api(optional: true)]
    public ?string $phone_number;

    /**
     * Current status of the customer account. Controls access to services and features.
     *
     * @var value-of<CustomerStatus>|null $status
     */
    #[Api(enum: CustomerStatus::class, optional: true)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CustomerType|value-of<CustomerType> $customer_type
     * @param CustomerStatus|value-of<CustomerStatus> $status
     */
    public static function with(
        CustomerType|string|null $customer_type = null,
        ?string $email = null,
        ?string $first_name = null,
        ?string $last_name = null,
        ?string $phone_number = null,
        CustomerStatus|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $customer_type && $obj['customer_type'] = $customer_type;
        null !== $email && $obj->email = $email;
        null !== $first_name && $obj->first_name = $first_name;
        null !== $last_name && $obj->last_name = $last_name;
        null !== $phone_number && $obj->phone_number = $phone_number;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * Type of customer account. Determines available features and compliance requirements.
     *
     * @param CustomerType|value-of<CustomerType> $customerType
     */
    public function withCustomerType(CustomerType|string $customerType): self
    {
        $obj = clone $this;
        $obj['customer_type'] = $customerType;

        return $obj;
    }

    /**
     * Customer's email address. Used for notifications, receipts, and account management. Must be a valid email format.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * Customer's first name. Used for personalization and legal documentation.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj->first_name = $firstName;

        return $obj;
    }

    /**
     * Customer's last name. Used for personalization and legal documentation.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj->last_name = $lastName;

        return $obj;
    }

    /**
     * Customer's phone number. Used for SMS notifications and verification. Include country code for international numbers.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phone_number = $phoneNumber;

        return $obj;
    }

    /**
     * Current status of the customer account. Controls access to services and features.
     *
     * @param CustomerStatus|value-of<CustomerStatus> $status
     */
    public function withStatus(CustomerStatus|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
