<?php

declare(strict_types=1);

namespace Devdraft\V0\Customers;

use Devdraft\Core\Attributes\Optional;
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
 *   customerType?: CustomerType|value-of<CustomerType>,
 *   email?: string,
 *   firstName?: string,
 *   lastName?: string,
 *   phoneNumber?: string,
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
     * @var value-of<CustomerType>|null $customerType
     */
    #[Optional('customer_type', enum: CustomerType::class)]
    public ?string $customerType;

    /**
     * Customer's email address. Used for notifications, receipts, and account management. Must be a valid email format.
     */
    #[Optional]
    public ?string $email;

    /**
     * Customer's first name. Used for personalization and legal documentation.
     */
    #[Optional('first_name')]
    public ?string $firstName;

    /**
     * Customer's last name. Used for personalization and legal documentation.
     */
    #[Optional('last_name')]
    public ?string $lastName;

    /**
     * Customer's phone number. Used for SMS notifications and verification. Include country code for international numbers.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Current status of the customer account. Controls access to services and features.
     *
     * @var value-of<CustomerStatus>|null $status
     */
    #[Optional(enum: CustomerStatus::class)]
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
     * @param CustomerType|value-of<CustomerType> $customerType
     * @param CustomerStatus|value-of<CustomerStatus> $status
     */
    public static function with(
        CustomerType|string|null $customerType = null,
        ?string $email = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $phoneNumber = null,
        CustomerStatus|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $customerType && $obj['customerType'] = $customerType;
        null !== $email && $obj['email'] = $email;
        null !== $firstName && $obj['firstName'] = $firstName;
        null !== $lastName && $obj['lastName'] = $lastName;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
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
        $obj['customerType'] = $customerType;

        return $obj;
    }

    /**
     * Customer's email address. Used for notifications, receipts, and account management. Must be a valid email format.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    /**
     * Customer's first name. Used for personalization and legal documentation.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj['firstName'] = $firstName;

        return $obj;
    }

    /**
     * Customer's last name. Used for personalization and legal documentation.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj['lastName'] = $lastName;

        return $obj;
    }

    /**
     * Customer's phone number. Used for SMS notifications and verification. Include country code for international numbers.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

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
